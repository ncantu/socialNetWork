<?php

class ActionButtonRemoveRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Retirer la recommandation';
    public $confirm                = 'CONFIRMER LE RETRAIT DE LA RECOMMANDATION';
}

?>