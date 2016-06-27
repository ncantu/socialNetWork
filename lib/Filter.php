<?php 

class Filter {

    public $attributList              = array();
    public $avantageMaxFilter         = 'all';
    public $userLoginPublicFilter     = 'all';
    public $userCreatedBy             = 'all';
    public $semanticListFilter        = 'all';
    public $themeListFilter           = 'all';
    public $domainListFilter          = 'all';
    public $langListFilter            = 'all';
    public $accessModeListFilter      = 'all';
    public $userCreatedNot;

    public function set($attributName, $attributValue) {

        $this->attributList[$attributName] = $attributValue;
    }
}

?>