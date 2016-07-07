<?php 

class FieldList extends Field {

    public $itemList                        = array();
    public $actionButtonAdd                 = false;
    public $actionButtonNext                = false;
    public $actionButtonPrec                = false;
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;

    public function add($obj, $attritutList = array()) {
         
        if(isset($obj->id) === false) {

            if(isset($attritutList->id) === false) {

                return false;
            }
            $obj->id = $attritutList->id;
        }
        $update = $this->update($obj, $attritutList);

        if($update === false) {

            return false;
        }
        if(empty($this->itemList) === true) {

            $this->defaultSet($obj->id);
        }
        $this->actionButtonItemToolsCrudRemove();
        $this->actionButtonItemToolspaginationRemove();

        if($this->actionButtonItemToolsCrud  === true) {

            $this->actionButtonItemToolsCrudAdd();
        }
        if($this->actionButtonItemToolsPagination  === true) {

            $this->actionButtonItemToolsPaginationAdd();
        }
        return true;
    }

    public function update($obj, $attritutList = array()) {

        if(isset($obj->id) === false) {

            return false;
        }
        foreach($attritutList as $k => $v) {

            $obj->$k = $v;
        }
        $this->itemList[$obj->id] = $obj;

        return true;
    }
    public function remove($obj) {

        if(isset($obj->id) === false) {

            return false;
        }
        if(isset($this->itemList[$obj->id]) === false) {

            return false;
        }
        unset($this->itemList[$obj->id]);

        return true;
    }
    public function itemValueSet($obj, $value, $attributName = 'value') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemShowSet($obj, $value, $attributName = 'show') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemAccessModeSet($obj, $value, $attributName = 'accessMode') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemDefaultSet($obj, $value, $attributName = 'valueDefault') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemTitleSet($obj, $value, $attributName = 'title') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemTitleDefaultSet($obj, $value, $attributName = 'titleDefault') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemUrlDefaultSet($obj, $value, $attributName = 'urlDefault') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemUrlSet($obj, $value, $attributName = 'url') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemQtQuantitySet($obj, $value, $attributName = 'ptQuantity') {

        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemAttributSet($obj, $attributName, $value) {

        $function = $attributName.'Set';

        if(isset($obj->id) === false) {

            return false;
        }
        $this->itemList[$obj->id]->$function($value);

        return true;
    }
    public function actionButtonItemToolsAdd() {

        $this->actionButtonItemToolsCrudAdd;
        $this->actionButtonItemToolsPaginationAdd();

        return true;
    }
    public function actionButtonItemToolsPaginationAdd() {

        $this->actionButtonNextAdd();
        $this->actionButtonPrecAdd();

        return true;
    }
    public function actionButtonItemToolsCrudAdd() {

        $this->actionButtonAddAdd();

        return true;
    }
    public function actionButtonItemToolsCrudRemove() {

        $this->actionButtonAddRemove();

        return true;
    }
    public function actionButtonItemToolsRemove() {

        $this->actionButtonAddRemove();
        $this->actionButtonItemToolspaginationRemove();

        return true;
    }
    public function actionButtonItemToolspaginationRemove() {

        $this->actionButtonNextRemove();
        $this->actionButtonPrecRemove();

        return true;
    }
    public function actionButtonAddRemove() {

        $this->actionButtonAdd = false;

        return true;
    }
    public function actionButtonNextRemove() {

        $this->actionButtonNext = false;

        return true;
    }
    public function actionButtonPrecRemove() {


        $this->actionButtonPrec = false;

        return true;
    }
    public function actionButtonAddAdd() {

        $this->actionButtonAdd = new ActionButtonAdd();

        $this->actionButtonAdd->setUp($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        return true;
    }
    public function actionButtonNextAdd() {

        $this->actionButtonNext = new ActionButtonNext();

        $this->actionButtonNext->setUp($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        return true;
    }
    public function actionButtonPrecAdd() {

        $this->actionButtonPrec = new ActionButtonPrec($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);

        $this->actionButtonPrec->setUp();

        return true;
    }
}

?>