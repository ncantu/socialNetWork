<?php 

class ProfilFake extends Profil {

    use TraitFake;

    public static function setUp($labelName, $accessMode, $show, $notificationList = true) {

        parent::setUp($labelName, $accessMode, $show, $notificationList);

        $id = $this->fakeGetId();

        $this->itemNameSet($id.' name');
        $this->itemSurnameSet($id.' surname');
        $this->itemTitleSet($id.' title');
        $this->itemEmailSet($id.'@instriit.com');
    }
}

?>