<?php

class ActionButtonRemoveContact extends ActionButtonAdd {

    public $microserviceLabelName  = 'Contact';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Retirer un contact';
    public $confirm                = 'CONFIRMER LE RETRAIT DU CONTACT';
}

?>