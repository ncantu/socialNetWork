<?php

class ActionButtonRefuseRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Accepter la recommandation';
    public $confirm                = 'CONFIRMER LE REFUS DE LA RECOMMANDATION';
}

?>