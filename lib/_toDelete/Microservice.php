<?php 

class Microservice {

    public $labelName;
    public $accessMode;
    public $filter;
    public $token;

    public function setUp($labelName, $accessMode, $show, $filer = false, $token = false) {

        $this->labelName  = $labelName;
        $this->accessMode = $accessMode;
        $this->show       = $show;
        $this->filter     = $filer;
        $this->token      = $token;
    }
    public function templateSet() {
         
        $labelName                  = $this->labelName;
        $this->microserviceTemplate = new $labelName();

        $this->microserviceTemplate->setUp($this->labelName, $this->accessMode, $this->show);

        return true;
    }
}

?>