<?php

class ActionButtonPagination extends ActionButtonItemTool {

    public $microservicelenghtShow = 10;
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';

    public function filterSet($token) {

        $userNodeName = $token->getUserNodeName();
        $filter       = new Filter();

        $filter->set('microservice', $this->microservice);
        $filter->set('user', $userNodeName);
        $filter->set('start', array());
        $filter->set('lenghtShow', $this->microservicelenghtShow);
        $filter->set('lenght', $this->microservicelenght);
        $filter->set('attributList', array());

        return $filter;
    }
}

?>