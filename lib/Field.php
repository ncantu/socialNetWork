<?php 

class Field {

    use TraitGraph;

    public $id;
    public $value;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    public $valueDefault;
    public $title;
    public $titleDefault;
    public $urlDefault;
    public $url;
    public $ptQuantity;
    public $idList;
    public $microservice;
    public $filter;
    public $emotionList;
    public $actionList;
    public $actionButtonRemove        = false;
    public $actionButtonEdit          = false;
    public $actionButtonDetail        = false;
    public $actionButtonUpdate        = false;
    public $fake                      = false;
    public $actionButtonItemTools     = false;
    public $actionButtonItemToolsEdit = false;

    public function setUp($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {

        $nodeName           = get_class($this);
        $this->id           = $labelName.'-'.$nodeName;
        $this->nodeName     = $nodeName;
        $this->labelName    = $labelName;
        $this->accessMode   = $accessMode;
        $this->show         = $show;
        $this->emotionList  = new EmotionList();
        $this->actionList   = new ActionList();

        $this->emotionList->setUp($labelName, $accessMode, $show);
        $this->actionList->setUp($labelName, $accessMode, $show);
        $this->filterSet();

        if($value !== false) {

            $this->valueSet($value);
        }
        $this->actionButtonItemToolsRemove();
        $this->actionButtonItemToolsEditRemove();

        if($this->actionButtonItemTools  === true) {

            $this->actionButtonItemToolsAdd();
        }
        if($this->actionButtonItemToolsEdit  === true) {

            $this->actionButtonItemToolsEditAdd();
        }
    }
    public function remove($id) {

        unset($this->fieldList->fieldItemList[$id]);

        return $this;
    }
    public function valueSet($value, $attributName = 'value') {

        return $this->attributSet($attributName, $value);
    }
    public function showSet($value, $attributName = 'show') {

        return $this->attributSet($attributName, $value);
    }
    public function accessModeSet($value, $attributName = 'accessMode') {

        return $this->attributSet($attributName, $value);
    }
    public function defaultSet($value, $attributName = 'default') {

        return $this->attributSet($attributName, $value);
    }
    public function titleSet($value, $attributName = 'title') {

        return $this->attributSet($attributName, $value);
    }
    public function titleDefaultSet($value, $attributName = 'titleDefault') {

        return $this->attributSet($attributName, $value);
    }
    public function urlDefaultSet($value, $attributName = 'urlDefault') {

        return $this->attributSet($attributName, $value);
    }
    public function urlSet($value, $attributName = 'url') {

        return $this->attributSet($attributName, $value);
    }
    public function ptQuantitySet($value, $attributName = 'ptQuantity') {

        return $this->attributSet($attributName, $value);
    }
    public function attributSet($attributName, $value) {

        $this->$attributName = $value;

        return true;
    }
    public function actionButtonItemToolsRemove() {

        $this->actionButtonRemoveRemove();
        $this->actionButtonEditRemove();
        $this->actionButtonDetailRemove();

        return true;
    }
    public function actionButtonItemToolsAdd() {

        $this->actionButtonRemoveAdd();
        $this->actionButtonEditAdd();
        $this->actionButtonDetailAdd();

        return true;
    }
    public function actionButtonItemToolsEditAdd() {

        $this->actionButtonUpdateAdd();
        $this->actionButtonDetailAdd();

        return true;
    }
    public function actionButtonItemToolsEditRemove() {

        $this->actionButtonUpdateRemove();
        $this->actionButtonDetailRemove();

        return true;
    }
    public function actionButtonRemoveRemove() {

        $this->actionButtonRemove = false;

        return true;
    }
    public function actionButtonEditRemove() {

        $this->actionButtonEdit = false;

        return true;
    }
    public function actionButtonDetailRemove() {

        $this->actionButtonDetail = false;

        return true;
    }
    public function actionButtonUpdateRemove() {

        $this->actionButtonUpdate = false;

        return true;
    }
    public function actionButtonRemoveAdd() {

        $this->actionButtonRemove = new ActionButtonRemove();

        $this->actionButtonRemove->setUp($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        return true;
    }
    public function actionButtonEditAdd() {

        $this->actionButtonEdit = new ActionButtonEdit();

        $this->actionButtonEdit->setUp($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        return true;
    }
    public function actionButtonDetailAdd() {

        $this->actionButtonDetail = new ActionButtonDetail();

        $this->actionButtonEdit->setUp($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        return true;
    }
    public function actionButtonUpdateAdd() {

        $this->actionButtonUpdate = new ActionButtonUpdate();

        $this->actionButtonUpdate->setUp($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        return true;
    }
    public function microserviceSet($microserviceLabelName, $microserviceAccessMode, $microserviceShow) {

        $token              = new Token();
        $filter             = $this->filterSet($token);
        $this->microservice = new Microservice();

        $this->microservice->setUp($microserviceLabelName, $microserviceAccessMode, $microserviceShow, $filter, $token);

        return true;
    }
    public function filterSet() {

        $this->filter = new Filter();

        return true;
    }
}

?>