<?php 

class ActionButtonMenuItemNotificationList extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Notification';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('user', $userNodeName);
        $filter->set('oderFied', 'dateCreated');
        
        return $filter;
    }
}

?>