<?php

class Profil extends FieldList  {
    
    use TraitMedia;
    use TraitMy;
    
    public $actionButtonItemToolsCrud        = false;
    public $actionButtonItemToolsPagination  = true;
    public $saveActionButtonShow             = 'showNone';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE RESEAU SOCIAL';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE';
    public $myState                          = true;
    public $imageId;
    public $nameId;
    public $surnameId;
    public $titleId;
    public $emailId;
    public $mdpId;
    public $mdpConfirmId;
    public $categoryId;
    public $recommandationOnActionButtonId;
    public $recommandationOffActionButtonId;
    public $contactAddActionButtonId;
    public $contactRemoveActionButtonId;
    public $recommandationAcceptActionButtonId;
    public $contactAskAcceptActionButtonId;
    public $saveActionButtonId;
    public $separateActionButtonId;
    public $notificationListId;
    public $contactListId;
    public $portfolioListMyId;
    public $contactAddId;
    public $recommandationAddId;
    public $recommandationListMeId;
    public $recommandationListMyId;
    public $categoryListId;
    public $avantageListId;

    public static function setUp($labelName, $accessMode, $show, $notificationList = true) {
         
        $profil                                   = parent::setUp($labelName, $accessMode, $show);
        $urlAvatar                                = $this->mediaCssUrlGet();
        $image                                    = new ProfilImage();
        $this->imageId                            = $image->id;
        $name                                     = new ProfilName();
        $this->nameId                             = $name->id;
        $surname                                  = new ProfilSurname();
        $this->accessModeId                       = $surname->id;
        $title                                    = new ProfilTitle();
        $this->titleId                            = $title->id;
        $email                                    = new ProfilEmail();
        $this->emailId                            = $email->id;
        $mdp                                      = new ProfilMdp();
        $this->mdpId                              = $mdp->id;
        $mdpConfirm                               = new ProfilMdpConfirm();
        $this->mdpConfirmId                       = $mdpConfirm->id;
        $recommandationOnActionButton             = new ActionButtonAddRecommandation();
        $this->recommandationOnActionButtonId     = $recommandationOnActionButton->id;
        $recommandationOffActionButton            = new ActionButtonRemoveRecommandation();
        $this->recommandationOffActionButtonId    = $recommandationOffActionButton->id;
        $contactAddActionButton                   = new ActionButtonAddContact();
        $this->nameId                             = $contactAddActionButton->id;
        $contactRemoveActionButton                = new ActionButtonRemoveContact();
        $this->contactRemoveActionButtonId        = $contactRemoveActionButton->id;
        $recommandationAcceptActionButton         = new ActionButtonAcceptRecommandation();
        $this->recommandationAcceptActionButtonId = $recommandationAcceptActionButton->id;
        $recommandationRefuseActionButton         = new ActionButtonRefuseRecommandation();
        $this->recommandationRefuseActionButtonId = $recommandationRefuseActionButton->id;
        $contactAskAcceptActionButton             = new ActionButtonAcceptContact();
        $this->contactAskAcceptActionButtonId     = $contactAskAcceptActionButton->id;
        $contactAskRefuseActionButton             = new ActionButtonRefuseContact();
        $this->contactAskRefuseActionButtonId     = $contactAskRefuseActionButton->id;
        $saveActionButton                         = new ProfilSaveActionButton();
        
        $image->setUp($this->nodeName, $accessMode, $show, $urlAvatar);
        $name->setUp($this->nodeName, $accessMode, $show);
        $surname->setUp($this->nodeName, $accessMode, $show);
        $title->setUp($this->nodeName, $accessMode, $show);
        $email->setUp($this->nodeName, $accessMode, $show);
        $mdp->setUp($this->nodeName, $accessMode, $show);
        $mdpConfirm->setUp($this->nodeName, $accessMode, $show);
        $recommandationOnActionButton->setUp($this->nodeName);
        $recommandationOffActionButton->setUp($this->nodeName);
        $contactAddActionButton->setUp($this->nodeName);
        $contactRemoveActionButton->setUp($this->nodeName);
        $recommandationAcceptActionButton->setUp($this->nodeName);
        $recommandationRefuseActionButton->setUp($this->nodeName);
        $contactAskAcceptActionButton->setUp($this->nodeName);
        $contactAskRefuseActionButton->setUp($this->nodeName);
        $saveActionButton ->setUp($this->nodeName);
        
        $saveActionButton->valueSet($this->saveActionButtonValue);
        $saveActionButton->showSet($this->saveActionButtonValue);
        
        $this->saveActionButtonId = $saveActionButton->id;
        $separateActionButton     = new ProfilSeparateActionButton();
        
        $separateActionButton->setUp($this->nodeName);
        
        $separateActionButton->valueSet($this->separateActionButtonValue);
        $separateActionButton->showSet($this->separateActionButtonShow);
        $separateActionButton->confirmButton->valueSet($this->separateActionButtonConfirmValue);
        
        $this->separateActionButtonId = $separateActionButton->id;
        $category                     = new ProfilCategory();
        $this->categoryId             = $category->id;
        $contactAdd                   = new ActionButtonAddContact();
        $this->contactAddId           = $contactAdd->id;
        $recommandationAdd            = new ActionButtonAddRecommandation();
        $this->recommandationAddId    = $recommandationAdd->id;
        $recommandationListMy         = new RecommandationListMy();
        $this->recommandationListMyId = $recommandationListMy->id;
        $categoryList                 = new CategoryList();
        $this->categoryListId         = $categoryList->id;
        $avantageList                 = new AvantageList();
        $this->avantageListId         = $avantageList->id;
        
        $category->setUp($this->nodeName, $accessMode, $show);
        $contactAdd->setUp($this->nodeName, $accessMode, $show);
        $recommandationAdd->setUp($this->nodeName, $accessMode, $show);
        $recommandationListMy->setUp($this->nodeName, $accessMode, $show);
        $categoryList->setUp($this->nodeName, $accessMode, $show);
        $avantageList->setUp($this->nodeName, $accessMode, $show);
        
        $filter = $this->myGetFilter($this->myState);
        
        $this->contactListGet();
        $this->portfolioListGet();
        $this->recommandationListMeGet();
        
        $this->add($image);
        $this->add($name);
        $this->add($surname);
        $this->add($title);
        $this->add($email);
        $this->add($mdp);
        $this->add($mdpConfirm);
        $this->add($category);
        $this->add($recommandationOnActionButton);
        $this->add($recommandationOffActionButton);
        $this->add($contactAddActionButton);
        $this->add($contactRemoveActionButton);
        $this->add($recommandationAcceptActionButton);
        $this->add($recommandationRefuseActionButton);
        $this->add($contactAskAcceptActionButton);
        $this->add($contactAskRefuseActionButton);
        $this->add($saveActionButton);
        $this->add($separateActionButton);
        $this->add($contactAdd);
        $this->add($recommandationAdd);
        $this->add($recommandationListMy);
        $this->add($categoryList);
        $this->add($avantageList);

        if($notificationList === true) {

            $notificationList = new NotificationList();
            
            $notificationList->setUp($this->nodeName, $accessMode, $show);
            
            $this->add($notificationList);
        }
        return $profil;
    }
    public function contactListGet($filter) {
        
        $request             = new GraphRequestContactListGet();
        $list                = $request->graphRequest($filter);     
        $this->contactListId = $list->id;
        
        $list->actionButtonItemToolsAdd();        
        $this->add($list);
        
        return true;
    }
    public function portfolioListGet($filter) {
        
        $request             = new GraphRequestPortfolioListGet();
        $list                = $request->graphRequest($filter);         
        $this->contactListId = $list->id;
        
        $list->actionButtonItemToolsAdd();        
        $this->add($list);
        
        return true;
    }
    public function recommandationListMeGet($filter) {
        
        $request                      = new GraphRequestRecommandationListGet();
        $list                         = $request->graphRequest($filter);  
        $this->recommandationListMeId = $list->id;
        
        $list->actionButtonItemToolsAdd();
        $this->add($list);
        
        return true;        
    }    
    public function itemImageSet($value, $attributName = 'value') {
    
        $obj = $this->itemList[$this->imageId];
        
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemNameSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->nameId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemSurnameSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->surnameId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemTitleSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->titleId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemEmailSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->emailId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemCategorySet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->categoryId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemRecommandationOnActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->recommandationOnActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemRecommandationOffActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->recommandationOffActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemContactAddActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->contactAddActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }    
    public function itemCcontactRemoveActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->contactRemoveActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemRecommandationAcceptActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->recommandationAcceptActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemContactAskAcceptActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->contactAskAcceptActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemSaveActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->saveActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemSeparateActionButtonSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->separateActionButtonId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function iteNotificationListSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->notificationListId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemContactListSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->contactListId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemPortfolioListMySet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->portfolioListMyId];
    
        return $this->itemAttributSet($attributName, $value);
    }
    public function itemContactAddSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->contactAddId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemRecommandationAddSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->recommandationAddId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemRecommandationListMeSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->recommandationListMeId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemRecommandationListMySet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->recommandationListMyId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemCategoryListSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->categoryListId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemAvantageListSet($value, $attributName = 'value') {
        
        $obj = $this->itemList[$this->avantageListId];
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
}

?>