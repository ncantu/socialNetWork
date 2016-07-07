<?php

class ProfilAvantageBusiness extends ProfilConnected {

    public $avantageBusinessId;

    public static function get($parent, $accessMode, $show, $ptQuantity) {

        $field                 = parent::get($parent, $accessMode, $show);
        $avantageBusiness      = AvantageBusiness::get(get_class($this), $accessMode, $show, 0);
        $avantageBusinessPack1 = AvantageBusiness::get(get_class($this), $accessMode, $show, $ptQuantity);

        $avantageBusiness->fieldItemListAddObj($avantageBusinessPack1);

        $field = self::addTo($field, $this->avantageListId, $avantageBusiness);

        return $field;
    }
}

?>