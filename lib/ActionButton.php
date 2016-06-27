<?php 

class ActionButton extends FieldList {

    public $show                            = 'showNone';
    public $confirm                         = false;
    public $microserviceLabelName           = false;
    public $microserviceAccessMode          = 'read';
    public $microserviceShow                = 'showNone';
    public $confirmButton                   = false;
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    public $value;

    public static function setUp($labelName, $show, $microserviceLabelName = false, $microserviceAccessMode = false, $microserviceShow = false) {

        if($microserviceLabelName !== false) {

            $this->microserviceLabelName = $microserviceLabelName;
        }
        if($microserviceAccessMode !== false) {

            $this->microserviceAccessMode = $microserviceAccessMode;
        }
        if($microserviceShow !== false) {

            $this->microserviceShow = $microserviceShow;
        }
        $field = parent::setUp($labelName, 'read', $show, $this->value);

        if($this->confirm !== false) {
             
            $this->confirmUpdate($this->confirm);
        }
        $this->microserviceSet($this->microserviceLabelName, $this->microserviceAccessMode, $this->microserviceShow);

        return $field;
    }

    public function confirmUpdate($confirm) {

        $this->confirmButton = new ActionButtonConfirm();

        $this->confirmButton->setUp($this->nodeName, 'read', 'showNone', $confirm);

        return true;
    }
}

?>