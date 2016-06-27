<?php 

class UserLoginPrivateFake extends UserLoginPrivate {

    use TraitFake;

    public static function setUp($labelName, $accessMode, $show, $notificationList = true) {

        parent::setUp($labelName, $accessMode, $show, $notificationList);

        $id = $this->fakeGetId();

        $this->valueSet($id.' token');
    }
}

?>