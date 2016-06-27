<?php 

class ActionButtonMenuItemProfilListMy extends ActionButtonMenuItem {

    public $microserviceLabelName  = 'Profil';
    public $microserviceAccessMode = 'update';
    public $microserviceShow       = 'showVisible';

    public function filterSet($token) {

        $userNodeName = $token->getUserNodeName();
        $filter       = new Filter();

        $filter->set('user', $userNodeName);

        return $filter;
    }
}

?>