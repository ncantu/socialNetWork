<?php 

class ActionButtonMenuItemRecommandationListMe extends ActionButtonMenuItem {

    public $value                  = 'VOIR LES RECOMMANDATIONS';
    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';

    public function filterSet($token) {

        $userNodeName = $token->getUserNodeName();
        $filter       = new Filter();

        $filter->set('userRecommanded', $userNodeName);
        $filter->set('oderFied', 'dateCreated');

        return $filter;
    }
}

?>