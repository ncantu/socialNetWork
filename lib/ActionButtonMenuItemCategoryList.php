<?php

class ActionButtonMenuItemCategoryList extends ActionButtonMenuItem {
    
    public $value                  = 'VOIR LES CATEGORIES';
    public $microserviceLabelName  = 'Caterory';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('oderFied', 'name');
        
        return $filter;
    }
}

?>