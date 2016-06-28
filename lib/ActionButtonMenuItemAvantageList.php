<?php

class ActionButtonMenuItemAvantageList extends ActionButtonMenuItem {
    
    public $value                  = 'AVANTAGES';
    public $microserviceLabelName  = 'Avantage';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('oderFied', 'price');
        
        return $filter;
    }
}

?>