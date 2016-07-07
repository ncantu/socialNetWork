<?php 

class ActionButtonMenuItemRecommandationListMy extends ActionButtonMenuItem {
    
    public $value                  = 'VOIR MES RECOMMANDATIONS';
    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'update';
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