<?php 

class ActionButtonMenuItemPortfolioListMy extends ActionButtonMenuItem {

    public $value                  = 'VOIR LE PORTFOLIO';
    public $microserviceLabelName  = 'Portfolio';
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