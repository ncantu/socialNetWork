<?php

class ProfilConnected extends ProfilIntern {

    public $saveActionButtonParamShow  = 'showVisible';
    public $saveActionButtonParamValue = 'METTRE A JOUR LE COMPTE UN COMPTE';

    public static function get($parent, $accessMode, $show) {
         
        $field = parent::getFake($parent, $accessMode, $show, 2);

        return $field;
    }
}

?>