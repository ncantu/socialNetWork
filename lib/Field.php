<?php 

class Field {
    
    CONST AUDIT_CREATE_STEP              = 'create';
    CONST AUDIT_UPDATE_STEP              = 'update';    
    CONST ACTION_CONFIRM_NODE_NAME       = 'confirm';
    CONST ACTION_CONFIRM_TITLE           = 'CONFIRM';
    CONST ACTION_UPDATE_NODE_NAME        = 'update';
    CONST ACTION_UPDATE_TITLE            = 'UPDATE';
    CONST ACTION_DELETE_NODE_NAME        = 'delete';
    CONST ACTION_DELETE_TITLE            = 'DELETE';
    CONST ACTION_DETAIL_NODE_NAME        = 'detail';
    CONST ACTION_DETAIL_TITLE            = 'DETAIL';    
    CONST ACTION_NEXT_NODE_NAME          = 'next';
    CONST ACTION_NEXT_TITLE              = 'NEXT';
    CONST ACTION_PREC_NODE_NAME          = 'prec';
    CONST ACTION_PREC_TITLE              = 'PREC';
    CONST ACTION_ADD_NODE_NAME           = 'add';
    CONST ACTION_ADD_TITLE               = 'ADD';
    CONST ACTION_REMOVE_NODE_NAME        = 'remove';
    CONST ACTION_REMOVE_TITLE            = 'REMOVE';
    CONST ACTION_CHILD_DETAIL_NODE_NAME  = 'detail';
    CONST ACTION_CHILD_DETAIL_TITLE      = 'DETAIL';    

    private $toolNameList                = array();
    private $attributNameList            = array(
        'publicId',
        'nodeName',
        'labelName', 
        'title', 
        'url', 
        'image',
        'fake', 
        'lang',
        'descriptionLong',
        'descriptionShort');
    
    private $workflowStepList                = array();
    private $relationshipList                = array();
    private $attributList                    = array();
    private $versionConfList                 = array();
    
    private $nextActionId;
    private $precActionId;
    private $detailActionId;
    private $updateActionId;
    private $deleteActionId;
    private $childAddActionId;
    private $childRemoveActionId;
    private $childDetailActionId;

    public $auditState                       = true;    
    public $editableState                    = false;
    public $detailState                      = false;
    public $childPaginationState             = false;
    public $childEditableState               = false;
    public $childDetailState                 = false;  
    public $keywordList                      = array();
    public $accessModeList                   = array();
    public $showList                         = array();
    public $themeList                        = array();
    public $semanticList                     = array();
    public $domainList                       = array();
    public $scoreList                        = array();
    public $avantageList                     = array();
    public $rightList                        = array();
    public $filterList                       = array();
    public $valueList                        = array();
    public $stateList                        = array();
    public $childList                        = array();
    public $emotionList                      = array();
    public $actionList                       = array();

    public function getId() {
        
        $id = $this->publicId;
        
        if(empty($id) === true || $id === false) {
            
            $this->publicId = $this->nodeName;
        }        
        return $this->publicId;
    }
    public function __get($name) {
        
        $id      = false;
        $default = null;
        
        if(isset($this->$name) === true) {
             
            return $this->$name;
        }
        if($this->__isset($name) === false) {

            $this->__set($name, $default, $id);
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

        $objName = str_replace('List', '', $listName);
        
        if($obj === null) {
        
            $obj = new Field(true, false, $this);
        }
        if($this->__isset($listName) === false) {

            return false;
        }
        $id   = $obj->getId();
        $list = $this->$listName;

        if(isset($list[$id]) === true) {

            return false;
        }
        $obj->labelName        = $objName;
        $this->$$listName[$id] = $obj;
        
        return $obj->publicId;        
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
        $obj->publicId = $id;
        
        $this->$$listName[$id]->update($obj, $full);
        
        return $obj->publicId;
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
    public function auditGet($step, $conf) {
        
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
        
        return $workflowStep;
    }    
    public function audit($step) {
        
        if($this->auditState === false) {
             
            return true;
        }
        $workflowStep = $this->auditGet($step, $this);
        
        $this->workflowStepListAdd($workflowStep);
        
        return true;
    }    
    public function create() {

        $this->conf();

        $this->audit(self::AUDIT_CREATE_STEP);
        
        return $this->publicId;
    }
    public function update($obj, $full = false) {
        
        if(isset($obj->attributList) === true) {
            
            return $this->updateFromObj($obj, $full);
        }
        foreach($obj as $k => $v) {
            
            $this->$k = $v;
        }
        $this->audit(self::AUDIT_UPDATE_STEP);
        $this->conf();

        return $this->publicId;
    }
    private function updateFromObj($obj, $full = false) {
    
        if($full === true) {

            $this->attributList = $obj->attributList;

            return true;
        }
        foreach($obj->attributList as $k => $v) {

            $this->$k = $v->get();
        }
        $this->audit(self::AUDIT_UPDATE_STEP);
        $this->conf();

        return true;
    }
    private function req($lib){

        $file = 'lib'.DIRECTORY_SEPARATOR.$lib.'.php';

        if(is_file($file) === false) {

            return false;
        }
        require_once $file;

        return true;
    }
    private function actionAdd($conf, $filterConf, $confirmConf = false) {

        $filterConf->auditState = false;
        $filter                 = new Field(false, $filterConf);
        $conf->auditState       = false;
        $action                 = new Field(false, $conf);

        $action->filterListAdd($filter);
        
        if($confirmConf !== false) {
         
            $confirmConf->auditState = false;
            $confirm                 = new Field(false, $confirmConf);
        
            $action->childListAdd($confirm);
        }
        $id = $this->actionListAdd($action);
        
        return $id;
    }    
    public function accessModeConf($conf) {
        
        $this->accessModeList = array();        
        $accessMode           = new Field(false, $conf);
        
        $this->accessModeListAdd($accessMode);
        
        return true;
    }
    public function showConf($conf) {

        $this->showList = array();        
        $show           = new Field(false, $conf);
               
        $this->showListAdd($show);
        
        return true;
    }    
    public function avantageConf($conf) {
        
        $this->avantageList = array();
        $avantagePersonnal  = new Field(false, $conf);
        
        $this->avantageListAdd($avantagePersonnal);
        
        return true;
    }    
    private function conf() {

        foreach($this->toolNameList as $toolName) {

            $this->req($toolName);          
        }
        foreach($this->atttibutNameList as $attibutName) {

            $this->req($attibutName); 
            
            $this->$attibutName = null;
        }
        if(empty($this->accessModeList) === true) {
            
            $conf = new stdClass();
            
            $this->accessModeConf($conf);
        }
        if(empty($this->showList) === true) {
            
            $conf = new stdClass();
        
            $this->showConf($conf);
        }
        if(empty($this->avantageList) === true) {
            
            $conf = new stdClass();
        
            $this->avantageConf($conf);
        }
        $this->confActionList();
    
        return true;
    }
    private function confActionList() {
        
        $selfActionConf                  = new stdClass();
        $selfActionWorkflowStep          = $this->auditGet(self::AUDIT_CREATE_STEP, $selfActionConf);
        $selfActionWorkflowStepId        = $selfActionWorkflowStep->getId();
        $selfActionFilterConf            = new stdClass();
        $selfActionFilterConf->nodeName  = $this->nodeName;
        $selfActionFilterConf->labelName = $this->labelName;        
        $selfActionConfirmConf           = new stdClass();
        $selfActionConfirmConf->nodeName = self::ACTION_CONFIRM_NODE_NAME;
        $selfActionConfirmConf->title    = self::ACTION_CONFIRM_TITLE;
        
        if($this->editableState === true) {
        
            $selfActionConf->nodeName = self::ACTION_UPDATE_NODE_NAME;
            $selfActionConf->title    = self::ACTION_UPDATE_TITLE;
            $this->updateActionId     = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
            $selfActionConf->nodeName = self::ACTION_DELETE_NODE_NAME;
            $selfActionConf->title    = self::ACTION_DELETE_TITLE;
            $this->deleteActionId     = $this->actionAdd($selfActionConf, $selfActionFilterConf, $selfActionConfirmConf);
        }
        else {
        
            $this->actionListRemove($this->updateActionId);
            $this->actionListRemove($this->deleteActionId);
        }
        if($this->detailState === true) {
        
            $selfActionConf->nodeName = self::ACTION_DETAIL_NODE_NAME;
            $selfActionConf->title    = self::ACTION_DETAIL_TITLE;
            $this->detailActionId     = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->detailActionId);
        }
        if($this->childPaginationState === true) {
        
            $selfActionConf->nodeName = self::ACTION_NEXT_NODE_NAME;
            $selfActionConf->title    = self::ACTION_NEXT_TITLE;
            $this->nextActionId       = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
            $selfActionConf->nodeName = self::ACTION_PREC_NODE_NAME;
            $selfActionConf->title    = self::ACTION_PREC_TITLE;
            $this->precActionId       = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->nextActionId);
            $this->actionListRemove($this->precActionId);
        }
        if($this->childEditableState === true) {
        
            $selfActionConf->nodeName  = self::ACTION_ADD_NODE_NAME;
            $selfActionConf->title     = self::ACTION_ADD_TITLE;
            $this->childAddActionId    = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
            $selfActionConf->nodeName  = self::ACTION_REMOVE_NODE_NAME;
            $selfActionConf->title     = self::ACTION_REMOVE_TITLE;
            $this->childRemoveActionId = $this->actionAdd($selfActionConf, $selfActionFilterConf, $selfActionConfirmConf);
        }
        else {
        
            $this->actionListRemove($this->childAddActionId);
            $this->actionListRemove($this->childRemoveActionId);
        }
        if($this->childDetailState === true) {
        
            $selfActionConf->nodeName  = self::ACTION_CHILD_DETAIL_NODE_NAME;
            $selfActionConf->title     = self::ACTION_CHILD_DETAIL_TITLE;
            $this->childDetailActionId = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->childDetailActionId);
        }
        return true;
    }
}

?>