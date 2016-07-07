<?php

class ProfilIntern extends Profil {

    public static function get($parent, $accessMode, $show) {

        $field = parent::get($parent, $accessMode, $show);
        $field = self::remove($field, $this->separateActionButtonId);

        return $field;
    }
}

?>