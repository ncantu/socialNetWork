<?php 

class ActionButtonItemToolCrud extends ActionButtonItemTool {

    public function filterSet($token) {

        $userNodeName = $token->getUserNodeName();
        $filter       = new Filter();

        $filter->set('microservice', $this->microservice);
        $filter->set('user', $userNodeName);
        $filter->set('attributList', array());

        return $filter;
    }
}

?>