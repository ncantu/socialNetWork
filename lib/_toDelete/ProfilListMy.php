<?php

class ProfilListMy extends FieldList {

    public $actionButtonItemToolsCrud       = true;
    public $actionButtonItemToolsPagination = true;
    public $disconnectedId;
    public $avantagePersonnalId;
    public $avantageBusinessId;
    public $googleId;
    public $facebookId;
    public $linkedInId;
    public $twitterId;
    public $pinterestId;
    public $instagramId;

    public static function get($parent, $accessMode, $show) {

        $fieldItem                 = parent::get($parent, $accessMode, $show);
        $disconnected              = ProfilDisconnected::get(get_class($this), 'create', 'showVisible');
        $avantagePersonnal         = ProfilAvantagePersonnal::get(get_class($this), 'read', 'showVisible');
        $avantageBusiness          = ProfilAvantageBusiness::get(get_class($this), 'update', 'showVisible', 1000);
        $google                    = ProfilGoogle::get(get_class($this), 'create', 'showVisible');
        $facebook                  = ProfilFacebook::get(get_class($this), 'create', 'showVisible');
        $linkedIn                  = ProfilLinledIn::get(get_class($this), 'create', 'showVisible');
        $twitter                   = ProfilTwitter::get(get_class($this), 'create', 'showVisible');
        $pinterest                 = ProfilPinterest::get(get_class($this), 'create', 'showVisible');
        $instagram                 = ProfilInstagram::get(get_class($this), 'create', 'showVisible');
        $this->disconnectedId      = $fieldItem->fieldItemListAddObj($disconnected);
        $this->AvantagePersonnalId = $fieldItem->fieldItemListAddObj($avantagePersonnal);
        $this->AvantagePersonnalId = $fieldItem->fieldItemListAddObj($avantageBusiness);
        $this->googleId            = $fieldItem->fieldItemListAddObj($google);
        $this->facebookId          = $fieldItem->fieldItemListAddObj($facebook);
        $this->linkedInId          = $fieldItem->fieldItemListAddObj($linkedIn);
        $this->twitterId           = $fieldItem->fieldItemListAddObj($twitter);
        $this->pinterestId         = $fieldItem->fieldItemListAddObj($pinterest);
        $this->instagramId         = $fieldItem->fieldItemListAddObj($instagram);

        return $fieldItem;
    }
}

?>