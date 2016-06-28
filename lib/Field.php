<?php 

class Field {

    private $toolNameList     = array();
    private $attributNameList = array(
        'publicId',
        'NodeName',
        'LabelName', 
        'AccessMode', 
        'Show', 
        'Title', 
        'Url', 
        'Image',
        'Microservice', 
        'Fake', 
        'show',
        'accessMode',
        'state',
        'theme',
        'semantic',
        'domain',
        'lang',
        'descriptionLong',
        'descriptionShort',
        'versionConf');

    private $auditState           = true;
    private $editableState        = false;
    private $detailState          = false;
    private $childPaginationState = false;
    private $childEditableState   = false;
    private $childDetailState     = false;    
    private $workflowStepList     = array();
    private $nextButtonId;
    private $precButtonId;
    private $detailButtonId;
    private $updateButtonId;
    private $deleteButtonId;
    private $childAddButtonId;
    private $childRemoveButtonId;
    private $childDetailButtonId;

    public $keywordList          = array();
    public $accessModeList       = array();
    public $showList             = array();
    public $scoreList            = array();
    public $workflowList         = array();
    public $avantageList         = array();
    public $rightList            = array();
    public $filterList           = array();
    public $valueList            = array();
    public $stateList            = array();
    public $childList            = array();
    public $emotionList          = array();
    public $actionList           = array();
    public $attributList         = array();

    public function __get($name) {

        if($this->__isset($name) === false) {

            $this->__set($name, $name::$valueDefault);
        }
        $value = $this->attributList[$name]->value;

        return $this->attributList[$name];
    }
    public function __set($name, $value = null) {
        
        if($this->__isset($name) === true) {

            $attribut = $this->attributList[$name];
        }
        else $attribut = new $name();

        if($value === null) {

            $value =  $name::$valueDefault;
        }
        $attribut->value          = $value;
        $obj                      = new stdClass();
        $obj->attributList        = array();
        $obj->attributList[$name] = $attribut;

        return $this->update($obj);
    }
    public function __isset($name) { 
     
        return isset($this->attributList[$name]);
    }
    public function __unset($name) { 
        
        return unset( $this->attributList[$name]);        
    }
    private public function listAdd($listName, $obj = null) { 

        if($obj === null) {
        
            $objName = str_replace('List', '', $listName);
            $obj     = new $objName();

            $obj->conf($this);
        }
        if($this->__isset($listName) === false) {

            return false;
        }
        $id = $obj->publicId->value;

        if(isset($this->$listName[$id]) === true) {

            return false;
        }
        $this->$listName[$id] = $obj;
        
        return true;        
    }
    private public function listRemove($listName, $id) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        if(is_object($id) === true) {

            $id = $obj->publicId->value;
        }
        unset($this->$listName[$id]);

        return true;        
    }
    private public function listGet($listName, $id) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        if(is_object($id) === true) {

            $id = $obj->publicId->value;
        }
        return $this->$listName[$id];
    }
    private public function listGetLast($listName, $id = null) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        return end($listName);
    }
    private public function listUpdate($listName, $obj, $full = false) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        $id = $obj->publicId->value;

        if(isset($this->$listName[$id]) === false) {

            return $this->listAdd($listName, $obj);
        }
        return  $this->$listName[$id]->update($obj, $full);
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
    public function __construct() {

        $this->conf();

        if($this->auditState === true) {
 
            $time                = time();
            $audit               = new Audit();
            $audit->step         = Audit::CREATE_STEP;
            $audit->user         = Token::userPublicId;
            $audit->date         = $time;
            $audit->conf         = $this;
            $workflowStep        = new WorkflowStep();
            $workflowStep->audit = $audit;

            $this->workflowStepListAdd($workflowStep);
        }
    }
    public function update($obj, $full = false) {
    
        if($this->auditState === false) {

            return false;
        }
        if($full === true) {

            $this->$listName[$id] = $obj;

            return true;            
        } 
        foreach($obj->attributList as $k => $v) {

            if(isset($v->value) === false) {

                return false;
            }
            $this->attributList[$k]->value = $v->value;
        }
        $this->valueListAdd($obj->value);
 
        $time                = time();
        $audit               = new Audit();
        $audit->step         = Audit::UPDATE_STEP;
        $audit->user         = Token::userPublicId;
        $audit->date         = $time;
        $audit->conf         = $obj;
        $audit->state        = $this->stateDefault;
        $workflowStep        = new WorkflowStep();
        $workflowStep->audit = $audit;

        $this->workflowStepListAdd($workflowStep);

        $this->conf();

        return true;
    }
    private req($lib){

        $file = 'lib'.DIRECTORY_SEPARATOR.$lib.'.php';if(is_file() === false) {

        if(is_file($file) === true) {

            return false;
        }
        require_once $file;

        return true;
    }
    public function conf() {

        $this->__set('LabelName', get_class($this);

        foreach($this->toolNameList as $toolName) {

            $this->req($toolName);          
        }
        foreach($this->atttibutNameList as $attibutName) {

            $this->req($attibutName); 
            $this->__set($attibutName, null);
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