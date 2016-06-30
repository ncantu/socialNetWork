<?php 

class Node {
    
    CONST AUDIT_CREATE_STEP           = 'create';
    CONST AUDIT_UPDATE_STEP           = 'update';    
    
    private $toolNameList             = array();
    private $attributNameList         = array(
        'publicId',
        'nodeName',
        'labelName',
        'title',
        'style',
        'script',
        'url', 
        'image',
        'icon', 
        'fake', 
        'lang',
        'descriptionLong',
        'descriptionShort');
    private $workflowStepList            = array();
    private $relationshipList            = array();
    private $attributList                = array();
    private $versionConfList             = array();    
    private $microserviceId;
    private $nextActionId;
    private $precActionId;
    private $detailActionId;
    private $updateActionId;
    private $deleteActionId;
    private $childAddActionId;
    private $childRemoveActionId;
    private $childDetailActionId;        
    private $favoriteActionId;
    private $loveActionId;
    private $followActionId;
    private $shareActionId;
    private $shareInternActionId;
    private $pdfActionId;
    private $printActionId;
    private $listActionId;


    public $confirmActionNodeName     = 'confirm';
    public $confirmActionTitle        = 'CONFIRM';
    public $updateActionNodeName      = 'update';
    public $updateActionTitle         = 'UPDATE';
    public $deleteActionNodeName      = 'delete';
    public $deleteActionTitle         = 'DELETE';
    public $detailActionNodeName      = 'detail';
    public $detailActionTitle         = 'DETAIL';
    public $nextActionNodeName        = 'next';
    public $nextActionTitle           = 'NEXT';
    public $precActionNodeName        = 'prec';
    public $precActionTitle           = 'PREC';
    public $listActionNodeName        = 'list';
    public $listActionTitle           = 'LIST';
    public $addActionNodeName         = 'add';
    public $addActionTitle            = 'ADD';
    public $removeActionNodeName      = 'remove';
    public $removeActionTitle         = 'REMOVE';
    public $favoriteActionNodeName    = 'favorite';
    public $favoriteActionTitle       = 'FAVORITE';
    public $loveActionNodeName        = 'love';
    public $loveActionTitle           = 'LOVE';
    public $followActionNodeName      = 'follow';
    public $followActionTitle         = 'FOLLOW';
    public $shareActionNodeName       = 'share';
    public $shareActionTitle          = 'SHARE';
    public $shareInternActionNodeName = 'shareInter';
    public $shareInternActionTitle    = 'PROMOTE';
    public $pdfActionNodeName         = 'pdf';
    public $prfActionTitle            = 'PDF';
    public $printActionNodeName       = 'print';
    public $printActionTitle          = 'PRINT';
    public $childDetailActionNodeName = 'detail';
    public $childDetailActionTitle    = 'DETAIL';
    public $listFuncList              = array(
        'Add',
        'Remove',
        'Update',
        'Clean');
    public $confFuncList              = array(
        'Clean');
    public $microserviceFuncList      = array(
        'Confirm',
        'Update',
        'Delete',
        'Next',
        'Prec',
        'List',
        'Add',
        'Remove',
        'Favorite',
        'Love',
        'Follow',
        'Share',
        'ShareInter',
        'Pdf',
        'Print',
        'Detail');
    public $listDefaultList           = array(
         'accessMode', 
        'showConf', 
        'versionConf', 
        'theme', 
        'semantic', 
        'domain', 
        'avantage');    
    public $accessModeDefault         = 'read';
    public $showDefault               = 'showNone';
    public $versionConfDefault        = 'all';
    public $themeDefault              = 'all';
    public $semanticDefault           = 'all';
    public $domainDefault             = 'all';
    public $avantageConfDefault       = 'all';
    public $auditState                = true;    
    public $editableState             = false;
    public $detailState               = false;
    public $childPaginationState      = false;
    public $childEditableState        = false;
    public $childDetailState          = false;      
    public $favoriteActionState       = false;
    public $loveActionState           = false;
    public $followActionState         = false;
    public $shareActionState          = false;
    public $shareInternActionState    = false;
    public $pdfActionState            = false;
    public $printActionState          = false;    
    public $listActionState           = false;   
    public $keywordList               = array();
    public $accessModeList            = array();
    public $showList                  = array();
    public $themeList                 = array();
    public $semanticList              = array();
    public $domainList                = array();
    public $scoreList                 = array();
    public $avantageList              = array();
    public $rightList                 = array();
    public $valueList                 = array();
    public $stateList                 = array();
    public $childList                 = array();
    public $emotionList               = array();
    public $actionList                = array();
    public $filterList                = array();

    public function getId() {
        
        $id = $this->publicId;
        
        if(empty($id) === true || $id === false) {
            
            $this->publicId = $this->labelName.'_'.$this->nodeName;
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
    private function childTorelationship($objName, $obj) {
     
        foreach($this->workflowStepList as $this->workflowStep) {
        
            foreach($this->workflowStep->childList as $child) {
        
                if($child->labelName === 'Audit') {
        
                    $relationshipWorkflowStep = $child;
                }
            }
        }
        $relationshipName      = $this->nodeName.'_'.$obj->nodeName;
        $relationshipLabelName = strtoupper($objName).'_TO';
        $relationship          = new Relationship($relationshipName, $relationshipLabelName, $this->nodeName, $obj->nodeName, $relationshipWorkflowStep);
        
        return $relationship;
    }    
    private function listAdd($listName, $obj = null) { 

        $objName = str_replace('List', '', $listName);
        
        if($obj === null) {
        
            $obj = new Node(true, false, $this);
        }
        if($this->__isset($listName) === false) {

            return false;
        }
        $id   = $obj->getId();
        $list = $this->$listName;

        if(isset($list[$id]) === true) {

            return false;
        }
        $obj->labelName                              = $objName;
        $this->$$listName[$id]                       = $obj;                
        $relationship                                = $this->childTorelationship($objName, $obj);        
        $this->relationshipList[$relationship->name] = $relationship;
        
        return $obj->publicId;        
    }
    private function listRemove($listName, $id) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        if(is_object($id) === true) {

            $id = $id->getId();
        }
        $objNodeName = $this->$$listName[$id]->nodeName;
        
        unset($this->$$listName[$id]);
        
        $relationshipName = $this->nodeName.'_'.$objNodeName;
        
        unset($this->relationshipList[$relationshipName]);

        return true;        
    }
    private function listClean($listName) { 
        
        if($this->__isset($listName) === false) {

            return false;
        }
        foreach($this->$$listName as $id => $obj) {
         
            $this->listRemove($listName, $id);
        }
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
        
        $objName = str_replace('List', '', $listName);
        
        if($this->__isset($listName) === false) {

            return false;
        }
        $id = $obj->getId();

        if(isset($this->$$listName[$id]) === false) {

            return $this->listAdd($listName, $obj);
        }
        $obj->publicId = $id;
        
        $this->$$listName[$id]->update($obj, $full);
                  
        $relationship                                = $this->childTorelationship($objName, $obj);        
        $this->relationshipList[$relationship->name] = $relationship;
        
        return $obj->publicId;
    }
    public function confClean($labelName, $conf) {
    
        $conf->auditState = false;
        $defaultVar       = $labelName.'Default';
        $defaultVal       = $this->$defaultVar;        
        $conf->labelName  = $labelName;
    
        if(isset($conf->nodeName) === false) {
    
            $conf->nodeName = $defaultVal;
        }
        $funcClean = $labelName.'ListClean';
        
        $this->$$funcClean();
    
        $obj     = new Node(false, $conf);        
        $funcAdd = $labelName.'ListAdd';
    
        return $this->$$funcAdd($obj);
    }
    
    public function microserviceCreate($nodeName, $actionName, $conf, $filterConf) {
    
        $labelNameVar                = $actionName.'actionNodeName';   
        $titleVar                    = $actionName.'actionTitle';    
        $id                          = self::$$labelNameVar.'_'.$nodeName;
        $filterConf->auditState      = false;
        $filterConf->nodeName        = $nodeName;
        $filterConf->labelName       = $this->$labelNameVar;
        $filterConf->title           = $this->$titleVar;
        $this->microserviceList[$id] = $this->actionAdd($conf, $filterConf);

        return $id;
    }
    private function __callFuncList($name, $argumentList = array()) {

        if(isset($argumentList[0]) === false) {
            
            $argumentList[0] = null;
        }
        $conf = $argumentList[0];
        
        if(strstr($name, 'List') === false) {
        
            return false;
        }    
        foreach($this->listFuncList as $func) {
    
            $funcBaseName = 'list'.$func;
            $listName     = str_replace(ucfirst($funcBaseName), '', $name).'List';
    
            if(strstr($name, $funcBaseName) !== false) {
    
                return $this->$funcBaseName($listName, $argumentList[0]);
            }
        }
        return false;
    }
    private function __callFuncConf($name, $argumentList = array()) {

        if(isset($argumentList[0]) === false) {
            
            $argumentList[0] = null;
        }
        $conf = $argumentList[0];
        
        if(strstr($name, 'Conf') === false) {
        
            return false;
        }
        foreach($this->confFuncList as $func) {
    
            $funcBaseName = 'conf'.$func;
            $labelName    = str_replace(ucfirst($funcBaseName), '', $name);
    
            if(strstr($name, $funcBaseName) !== false) {
    
                return $this->$funcBaseName($labelName, $conf);
            }
        }
        return false;
    }
    private function __callFuncMicroservice($name, $argumentList = array()) {

        if(isset($argumentList[0]) === false) {
            
            $argumentList[0] = null;
        }
        $conf = $argumentList[0];
        
        if(strstr($name, 'Microservice') === false) {
        
            return false;
        }
        foreach($this->microserviceFuncList as $func) {

            $funcBaseName = 'microservice'.$func;
            $labelName    = str_replace(ucfirst($funcBaseName), '', $name);

            if(strstr($name, $funcBaseName) !== false) {

                return $this->microserviceCreate($labelName, $func, $conf, $argumentList[1]);
            }
        }
        return false;
    }    
    public function __call($name, $argumentList = array()) { 
        
        $this->__callFuncList($name, $argumentList);
        $this->__callFuncConf($name, $argumentList);
        $this->__callFuncMicroservice($name, $argumentList);
        
        return false;
    }
    public function __construct($create = false, $update = false, $conf = false, $state = true) {
        
        $confState        = new stdClass();
        $confState->value = $state;
        $state            = new Node(false, $confState);
        
        $this->stateListAdd($state);
        
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
        $time                  = time();
        $conf                  = new stdClass();
        $conf->auditState      = false;
        $auditConf             = $conf;
        $auditConf->step       = $step;
        $auditConf->user       = Token::userPublicId;
        $auditConf->date       = $time;
        $auditConf->conf       = $this;
        $auditConf->labelName  = 'Audit';
        $audit                 = new Node(false, $auditConf);
        $workflowStep          = new Node(false, $conf);
        
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

        $conf->auditState       = false;
        $action                 = new Node(false, $conf);
        
        if($confirmConf !== false) {
         
            $confirmConf->auditState = false;
            $confirm                 = new Node(false, $confirmConf);
        
            $action->childListAdd($confirm);
        }
        $filterConf->auditState = false;
        $filter                 = new Node(false, $filterConf);
        $microservice           = new Node(false, $this);

        $microservice->filterListAdd($filter);
        
        $action->microservice = $microservice;
        
        $id = $this->actionListAdd($action);
        
        return $id;
    }
    private function reqConf() {
        
        foreach($this->toolNameList as $toolName) {
        
            $this->req($toolName);
        }
        foreach($this->atttibutNameList as $attibutName) {
        
            $this->req($attibutName);
        
            $this->$attibutName = null;
        }
        return true;
    }    
    private function conf() {
        
        $this->reqConf();
        
        $id           = $this->getId();        
        $this->url    = 'http://'.Token::$context->domain.'/'.$id.'.php';
        $this->style  = 'http://cdn.'.Token::$context->domain.'/style/'.$id.'.css';
        $this->script = 'http://cdn.'.Token::$context->domain.'/script/'.$id.'.js';
        $this->image  = 'http://cdn.'.Token::$context->domain.'/image/'.$id.'.png';
        $this->icon   = 'http://cdn.'.Token::$context->domain.'/image/'.$this->labelName.'_icon.png';
        
        foreach($this->listDefaultList as $listName){
            
            $listObj = $listName.'List';
        
            if(empty($this->$listObj) === true) {
                
                $func = $listObj.'ConfClean';
                
                $this->$func(new stdClass());
            }
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
        if($this->favoriteActionState === true) {
        
            $selfActionConf->nodeName = self::ACTION_FAVORITE_NODE_NAME;
            $selfActionConf->title    = self::ACTION_FAVORITE_TITLE;
            $this->favoriteActionId   = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }        
        else {
        
            $this->actionListRemove($this->favoriteActionId);
        }
        if($this->loveActionState === true) {
        
            $selfActionConf->nodeName = self::ACTION_LOVE_NODE_NAME;
            $selfActionConf->title    = self::ACTION_LOVE_TITLE;
            $this->loveActionId       = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->loveActionId);
        }
       if($this->followActionState === true) {
        
            $selfActionConf->nodeName = self::ACTION_FOLLOW_NODE_NAME;
            $selfActionConf->title    = self::ACTION_FOLLOW_TITLE;
            $this->followActionId     = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->followActionId);
        }
        if($this->shareActionState === true) {
        
            $selfActionConf->nodeName = self::ACTION_SHARE_NODE_NAME;
            $selfActionConf->title    = self::ACTION_SHARE_TITLE;
            $this->shareActionId      = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->shareActionId);
        }
       if($this->shareInternActionState === true) {
        
            $selfActionConf->nodeName  = self::ACTION_SHARE_INTERN_NODE_NAME;
            $selfActionConf->title     = self::ACTION_SHARE_INTERN_TITLE;
            $this->shareInternActionId = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->shareInternActionId);
        }
       if($this->pdfActionState === true) {
        
            $selfActionConf->nodeName = self::ACTION_PDF_NODE_NAME;
            $selfActionConf->title    = self::ACTION_PDF_TITLE;
            $this->pdfActionId        = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->pdfActionId);
        }
        if($this->printActionState === true) {
        
            $selfActionConf->nodeName = self::ACTION_PRINT_NODE_NAME;
            $selfActionConf->title    = self::ACTION_PREC_TITLE;
            $this->printActionId      = $this->actionAdd($selfActionConf, $selfActionFilterConf, false);
        }
        else {
        
            $this->actionListRemove($this->printActionId);
        }
        return true;
    }
}

?>