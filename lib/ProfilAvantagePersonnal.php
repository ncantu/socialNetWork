<?php

class ProfilAvantagePersonnal extends ProfilConnected {

    public $avantagepersonnalId;

    public static function get($parent, $accessMode, $show) {

        $field                     = parent::get($parent, $accessMode, $show);
        $field                     = self::remove($field, $this->categoryId);
        $field                     = self::remove($field, $this->recommandationAcceptActionButtonId);
        $field                     = self::remove($field, $this->portfolioListMyId);
        $field                     = self::remove($field, $this->recommandationListMeId);
        $field                     = self::remove($field, $this->avantageListId);
        $avantagePersonnal         = AvantageBusiness::get(get_class($this), $accessMode, $show, 0);
        $this->avantagepersonnalId = $field->fieldItemListAddObj($avantagePersonnal);

        return $field;
    }
}

?>