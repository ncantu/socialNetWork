<?php

class Avantage extends Field {

    public static function get($parent, $accessMode, $show, $ptQuantity = 0) {

        $field             = parent::get($parent, $accessMode, $show, $ptQuantity);
        $field->ptQuantity = $ptQuantity;

        return $field;
    }
}

?>