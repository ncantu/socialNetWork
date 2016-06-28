<?php 

class Field {
    
    CONST AUDIT_CREATE_STEP = 'create';
    CONST AUDIT_UPDATE_STEP = 'update';

    private $toolNameList     = array();
    private $attributNameList = array(
        'publicId',
        'NodeName',
        'LabelName', 
        'Title', 
        'Url', 
        'Image',
        'Fake', 
        'lang',
        'descriptionLong',
        'descriptionShort');

  
    
    private $workflowStepList     = array();
    private $relationshipList     = array();
    private $attributList         = array();
    private $versionConfList      = array();
    
    private $nextButtonId;
    private $precButtonId;
    private $detailButtonId;
    private $updateButtonId;
    private $deleteButtonId;
    private $childAddButtonId;
    private $childRemoveButtonId;
    private $childDetailButtonId;

    public $auditState           = true;    
    public $editableState        = false;
    public $detailState          = false;
    public $childPaginationState = false;
    public $childEditableState   = false;
    public $childDetailState     = false;  
    public $keywordList          = array();
    public $accessModeList       = array();
    public $showList             = array();
    public $themeList            = array();
    public $semanticList         = array();
    public $domainList           = array();
    public $scoreList            = array();
    public $avantageList         = array();
    public $rightList            = array();
    public $filterList           = array();
    public $valueList            = array();
    public $stateList            = array();
    public $childList            = array();
    public $emotionList          = array();
    public $actionList           = array();

    public function getId() {
        
        return $this->publicId;
    }
    public function __get($name) {
        
        $id = false;
        
        if(isset($this->$name) === true) {
             
            return $this->$name;
        }
        if($this->__isset($name) === false) {

            $this->__set($name, $name::$valueDefault, $id);
        }
        $value = $this->attributList[$name]->get($id);

        return $this->attributList[$name];
    }
    public function __set($name, $value = null) {

        $id = false;
        
        if(isset($this->$name) === true) {
             
            $this->$name = $value;
            
            return true;
        }
        if($this->__isset($name) === true) {

            $attribut = $this->attributList[$name];
            
            $attribut->update($value, $id);
        }
        else {
            
            $attribut = new Attribut($name, $value, $id);
        }
        $obj                      = new stdClass();
        $obj->attributList        = array();
        $obj->attributList[$name] = $attribut;

        return $this->update($obj);
    }
    public function __isset($name) { 
        
        if(isset($this->$name) === true) {
         
            return true;
        }     
        return isset($this->attributList[$name]);
    }
    public function __unset($name) { 
        
        if(isset($this->$name) === true) {
        
            unset($this->$name);
            
            return true;
        }
        unset($this->attributList[$name]);
        
        return true;
    }
    private function listAdd($listName, $obj = null) { 

        if($obj === null) {
        
            $objName = str_replace('List', '', $listName);
            $obj     = new $objName();

            $obj->conf($this);
        }
        if($this->__isset($listName) === false) {

            return false;
        }
        $id   = $obj->getId();
        $list = $this->$listName;

        if(isset($list[$id]) === true) {

            return false;
        }
        $this->$$listName[$id] = $obj;
        
        return true;        
    }
    private function listRemove($listName, $id) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        if(is_object($id) === true) {

            $id = $id->getId();
        }
        unset($this->$$listName[$id]);

        return true;        
    }
    private function listGet($listName, $id) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        if(is_object($id) === true) {

            $id = $id->getId();
        }
        return $this->$$listName[$id];
    }
    private function listGetLast($listName, $id = null) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        return end($this->$listName);
    }
    private function listUpdate($listName, $obj, $full = false) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        $id = $obj->getId();

        if(isset($this->$$listName[$id]) === false) {

            return $this->listAdd($listName, $obj);
        }
        return  $this->$$listName[$id]->update($obj, $full);
    }
    public function __call($name, $argumentList = array()) { 

        if(strstr($name, 'List') !== false) {

            $funcList   = array();
            $funcList[] = 'Add';
            $funcList[] = 'Remove';
            $funcList[] = 'Update';

            foreach($funcList as $func) {

                $funcBaseName = 'list'.$func;
                $listName     = str_replace(ucfirst($funcBaseName), '', $name).'List';

                if(strstr($name, $funcBaseName) !== false) {

                    if(isset($argumentList[0]) === false) {

                        $argumentList[0] = null;
                    }
                    return $this->$funcBaseName($listName, $argumentList[0]);
                }
            }
        }
        return false;
    }
    public function __construct($create = false, $update = false, $conf = false) {
        
        if($create === true) {
            
            $this->create();
        }
        if($update !== false) {
            
            $this->update($update);
        }
        if($conf === true) {
            
            $this->conf();
        }
    }
    public function audit($step) {
        
        if($this->auditState === false) {
             
            return true;
        }
        $time             = time();
        $conf             = new stdClass();
        $conf->auditState = false;
        $auditConf        = $conf;
        $auditConf->step  = $step;
        $auditConf->user  = Token::userPublicId;
        $auditConf->date  = $time;
        $auditConf->conf  = $this;        
        $audit            = new Field(false, $auditConf);
        $workflowStep     = new Field(false, $conf);
        
        $workflowStep->childListAdd($audit);        
        $this->workflowStepListAdd($workflowStep);
        
        return true;
    }    
    public function create() {

        $this->conf();

        $this->audit(self::AUDIT_CREATE_STEP);
        
        return true;
    }
    public function update($obj, $full = false) {
    
        if($full === true) {

            $this->attributList = $obj->attributList;

            return true;
        }
        foreach($obj->attributList as $k => $v) {

            $this->$k = $v->get();
        }        
        $this->valueListAdd($obj->value);
        $this->audit(self::AUDIT_UPDATE_STEP);
        $this->conf();

        return true;
    }
    private function req($lib){

        $file = 'lib'.DIRECTORY_SEPARATOR.$lib.'.php';

        if(is_file($file) === true) {

            return false;
        }
        require_once $file;

        return true;
    }
    private function buttonSet(){

        $conf             = new stdClass();
        $conf->auditState = false;        
        $button           = new Field(false, $conf);
        
        return $button;
    }
    
    private function conf() {

        $class           = get_class($this);        
        $this->LabelName = $class;

        foreach($this->toolNameList as $toolName) {

            $this->req($toolName);          
        }
        foreach($this->atttibutNameList as $attibutName) {

            $this->req($attibutName); 
            
            $this->$attibutName = null;
        }
        if($this->editableState === true) {

            
            
            $updateButton = new UpdateButton($this);
            $deleteButton = new DeleteButton($this);

            $this->actionListAdd($updateButton);
            $this->actionListAdd($deleteButton);

            $this->updateButtonId = $updateButton;
            $this->deleteButtonId = $deleteButton;
        }
        else {

            $this->actionListRemove($this->updateButtonId);
            $this->actionListRemove($this->deleteButtonId);
        }
        if($this->detailState === true) {

            $detailButton = new DetailButton($this);

           $this->actionListAdd($detailButton);

            $this->detailButtonId = $detailButton;
        }
        else {

            $this->actionListRemove($this->detailButtonId);            
        }
        if($this->childPaginationState === true) {

            $nextButton = new NextButton($this);
            $precButton = new PrecButton($this);

            $this->actionListAdd($nextButton);
            $this->actionListAdd($precButton);
           
            $this->nextButtonId = $nextButton;           
            $this->precButtonId = $precButton;
        }
        else {

            $this->actionListRemove($this->nextButtonId);  
            $this->actionListRemove($this->precButtonId);           
        }
        if($this->childEditableState === true) {

            $childAddButton    = new ChildAddButton($this);
            $childRemoveButton = new ChildRemoveButton($this);

            $this->actionListAdd($childAddButton);
            $this->actionListAdd($childRemoveButton);

            $this->childAddButtonId    = $childAddButton;   
            $this->childRemoveButtonId = $childRemoveButton;   
        }
        else {

            $this->actionListRemove($this->childAddButtonId);  
            $this->actionListRemove($this->childRemoveButtonId);           
        }
        if($this->childDetailState === true) {

            $childDetailButton = new ChildDetailButton($this);

           $this->actionListAdd($childDetailButton);

            $this->childDetailButtonId = $childDetailButton;   
        }
        else {

            $this->actionListRemove($this->childDetailButtonId);         
        }
        $this->accessModeListAdd($this->accessMode);
        $this->showListAdd($this->show);

        $avantagePersonnal = new avantagePersonnal($this);

        $this->avantageListAdd($avantagePersonnal);

        return true;
    }
}

?>