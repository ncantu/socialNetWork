<?php 

class Category extends Text {
}
class ProfilCategory extends Category {
}
class ActionButtonMenuItemCategoryList extends ActionButtonMenuItem {
    
    public $value                  = 'VOIR LES CATEGORIES';
    public $microserviceLabelName  = 'Caterory';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('oderFied', 'name');
        
        return $filter;
    }
}
class ActionButtonMenuItemAvantageList extends ActionButtonMenuItem {
    
    public $value                  = 'AVANTAGES';
    public $microserviceLabelName  = 'Avantage';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('oderFied', 'price');
        
        return $filter;
    }
}
class ActionButtonAddContact extends ActionButtonAdd {
    
    public $microserviceLabelName  = 'Contact';
    public $microserviceAccessMode = 'create';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Ajouter un contact';
}
class ActionButtonRemoveContact extends ActionButtonAdd {

    public $microserviceLabelName  = 'Contact';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Retirer un contact';
    public $confirm                = 'CONFIRMER LE RETRAIT DU CONTACT';
}
class ActionButtonAcceptContact extends ActionButtonAdd {

    public $microserviceLabelName  = 'Contact';
    public $microserviceAccessMode = 'stateTrue';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Retirer un contact';
    public $confirm                = 'CONFIRMER LE RETRAIT DU CONTACT';
}
class ActionButtonRefuseContact extends ActionButtonAdd {

    public $microserviceLabelName  = 'Contact';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Retirer un contact';
    public $confirm                = 'CONFIRMER LE RETRAIT DU CONTACT';
}
class ActionButtonAddRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'create';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Recommander';
}
class ActionButtonRemoveRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Retirer la recommandation';
    public $confirm                = 'CONFIRMER LE RETRAIT DE LA RECOMMANDATION';
}
class ActionButtonAcceptRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'stateTrue';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Accepter la recommandation';
}
class ActionButtonRefuseRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'Accepter la recommandation';
    public $confirm                = 'CONFIRMER LE REFUS DE LA RECOMMANDATION';
}
class ProfilSaveActionButton extends ActionButtonUpdate {
    
    public $microserviceLabelName  = 'Profil';
    public $microserviceAccessMode = 'update';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'CREER UN COMPTE';
}
class ProfilSeparateActionButton extends ActionButtonRemove {
    
    public $microserviceLabelName  = 'Profil';
    public $microserviceAccessMode = 'stateFalse';
    public $microserviceShow       = 'showVisible';
    public $value                  = 'DISSOCIER LE COMPTE';
    public $confirm                = 'CONFIRMER LA DISSOCIATION DU COMPTE';
}
class MainMenu extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    
    public function setUp($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {
    
        parent::setUp($labelName, $accessMode, $show, $value);

        $actionButtonMenuItemProfilListMy         = new ActionButtonMenuItemProfilListMy();        
        $actionButtonMenuItemNotificationList     = new ActionButtonMenuItemNotificationList();
        $actionButtonMenuItemContactList          = new ActionButtonMenuItemContactList();
        $actionButtonMenuItemPortfolioListMy      = new ActionButtonMenuItemPortfolioListMy();        
        $actionButtonAddContact                   = new ActionButtonAddContact();
        $actionButtonAddRecommandation            = new ActionButtonAddRecommandation();        
        $actionButtonMenuItemRecommandationListMe = new ActionButtonMenuItemRecommandationListMe();
        $actionButtonMenuItemRecommandationListMy = new ActionButtonMenuItemRecommandationListMy();
        $actionButtonMenuItemCategoryList         = new ActionButtonMenuItemCategoryList();
        $actionButtonMenuItemAvantageList         = new ActionButtonMenuItemAvantageList();
        
        $actionButtonMenuItemProfilListMy->setUp($this->nodeName);
        $actionButtonMenuItemNotificationList->setUp($this->nodeName);
        $actionButtonMenuItemContactList->setUp($this->nodeName);
        $actionButtonMenuItemPortfolioListMy->setUp($this->nodeName);
        $actionButtonAddContact->setUp($this->nodeName);
        $actionButtonAddRecommandation->setUp($this->nodeName);
        $actionButtonMenuItemRecommandationListMe->setUp($this->nodeName);
        $actionButtonMenuItemRecommandationListMy->setUp($this->nodeName);
        $actionButtonMenuItemCategoryList->setUp($this->nodeName);
        $actionButtonMenuItemAvantageList->setUp($this->nodeName);
        
        $actionButtonMenuItemNotificationList->actionButtonItemToolsPaginationAdd();
        $actionButtonMenuItemRecommandationListMe->actionButtonItemToolsPaginationAdd();
        $actionButtonMenuItemCategoryList->actionButtonItemToolsPaginationAdd();

        $actionButtonMenuItemContactList->actionButtonItemToolsAdd();
        $actionButtonMenuItemPortfolioListMy->actionButtonItemToolsAdd();
        $actionButtonMenuItemRecommandationListMy->actionButtonItemToolsAdd();
        $actionButtonMenuItemAvantageList->actionButtonItemToolsAdd();
                
        $this->add($actionButtonMenuItemProfilListMy);
        $this->add($actionButtonMenuItemNotificationList);
        $this->add($actionButtonMenuItemContactList);
        $this->add($actionButtonMenuItemPortfolioListMy);
        $this->add($actionButtonAddContact);
        $this->add($actionButtonAddRecommandation);        
        $this->add($actionButtonMenuItemRecommandationListMe);
        $this->add($actionButtonMenuItemRecommandationListMy);
        $this->add($actionButtonMenuItemCategoryList);
        $this->add($actionButtonMenuItemAvantageList);        
        
        return $this;
    }
}
class Url extends Field {

    public function setUp($labelName, $show, $url) {
        
        parent::setUp($labelName, 'read', $show);        
        
        $this->url = $url;
    }
}
trait TraitMedia {
    
    public function mediapathGet() {
        
        return Token::$domainValueDefault.'/'.Token::$lang.'/'.Token::$themeValueDefault.'/'.Token::$semanticValueDefault.'/'.Token::$avantageMax.'/';
    }    
    public function mediaJsUrlGet (){
        
        $path = $this->mediapathGet();
        
        return 'http://'.$path.'/js/'.$this->nodeName.'.js';
    }
    public function mediaImageUrlGet (){$path = Token::$domainValueDefault.'/'.Token::$lang.'/'.Token::$themeValueDefault.'/'.Token::$semanticValueDefault.'/'.Token::$avantageMax.'/';

        $path = $this->mediapathGet();
        
        return 'http://'.$path.'/image/'.$this->nodeName.'.png';
    }
    public function mediaCssUrlGet (){
        
        $path = $this->mediapathGet();
        
        return 'http://'.$path.'/css/'.$this->nodeName.'.css';
    }
}
class ScriptUpload extends Field {
    
    use TraitMedia;

    public function setUp($labelName, $show) {
    
        parent::setUp($labelName, 'read', $show);
        
        $this->url = $this->mediaJsUrlGet();
    }
}
class Image extends Field {
    
    public $url;
    public $scriptUpload;
    
    public function setUp($labelName, $accessMode, $show, $url) {
        
        parent::setUp($labelName, $accessMode, $show);
        
        $this->url          = new Url();        
        $this->scriptUpload = new ScriptUpload();

        $this->url->setUp($this->nodeName, $show, $url);
        $this->scriptUpload->setUp($this->nodeName, 'showVisible');
    }
}
class SeparateActionButton extends ActionButton {
}
class ProfilText extends Text {
}
class ProfilUrl extends Url {
}
class ProfilScriptUpload extends ScriptUpload {
}
class NotificationImage extends Image {
}
class Title extends Text {
}
class NotificationTitle extends Title {
}
class NotificationIcon extends Image {
}
class NotificationText extends Text {
}
class ProfilImage extends Image {
}
class Name extends Text {
}
class ProfilName extends Name {
}
class Surname extends Text {
}
class ProfilSurname extends Surname {
}
class ProfilTitle extends Title {
}
class Email extends Field {
}
class ProfilEmail extends Email {
}
class Mdp extends Field {
}
class ProfilMdp extends Mdp {
}
class MdpConfirm extends Mdp {
}
class ProfilMdpConfirm extends MdpConfirm {
}
class ContactList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
}
class PortFolioTitle extends Title {
}
class PortFolioImage extends Image {
}
class PortFolio extends FieldList { 
    
    use TraitMedia;
    
    public $titleId;
    public $ImageId;    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
    
    public static function setUp($labelName, $accessMode, $show, $title) {

        parent::setUp($labelName, $accessMode, $show);
        
        $url           = $this->mediaImageUrlGet();
        $title         = new PortFolioTitle();        
        $this->titleId = $title->id;
        $image         = new PortFolioImage();
        $this->imageId = $image->id;
        

        $title->setUp($this->nodeName, $this->accessMode, $this->show, $title);
        $image->setUp($this->nodeName, $this->accessMode, $this->show, $url);
        
        $this->add($title);
        $this->add($image);
    }    
    public function itemTitleSet($value, $attributName = 'value') {

        $obj = $this->itemList[$this->tileId];
        
        return $this->itemAttributSet($obj, $attributName, $value);
    }    
    public function itemImageSet($title, $url) {

        $obj = $this->itemList[$this->ImageId];
        
        $this->itemAttributSet($obj, 'title', $title);        
        $this->itemAttributSet($obj, 'url', $url);
        
        return true;
    }
}
class PortfolioList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
}
class PortfolioListMy extends PortfolioList { 
    
    public $actionButtonItemToolsCrud       = true;
    public $actionButtonItemToolsPagination = true;
}
class Recommandation extends Field {

    public static function setUp($labelName, $accessMode, $show) {
    
        parent::setUp($labelName, $accessMode, $show);
        
        // @todo
    }    
}
class RecommandationList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class RecommandationListMe extends RecommandationList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
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
class ProfilIntern extends Profil {

    public static function get($parent, $accessMode, $show) {

        $field = parent::get($parent, $accessMode, $show);
        $field = self::remove($field, $this->separateActionButtonId);

        return $field;
    }
}
class ProfilDisconnected extends ProfilIntern {
    
    public $myState = false;

    public $saveActionButtonParamShow  = 'showVisible';
    public $saveActionButtonParamValue = 'CREER UN COMPTE UN COMPTE';
}
class ProfilConnected extends ProfilIntern {

    public $saveActionButtonParamShow  = 'showVisible';
    public $saveActionButtonParamValue = 'METTRE A JOUR LE COMPTE UN COMPTE';

    public static function get($parent, $accessMode, $show) {
         
        $field = parent::getFake($parent, $accessMode, $show, 2);

        return $field;
    }
}
class Avantage extends Field {

    public static function get($parent, $accessMode, $show, $ptQuantity = 0) {

        $field             = parent::get($parent, $accessMode, $show, $ptQuantity);
        $field->ptQuantity = $ptQuantity;

        return $field;
    }
}
class AvantagePersonnal extends Avantage {

}
class AvantageBusiness extends Avantage {

}
class AvantageBusinessPack1 extends AvantageBusiness {

}
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
class ProfilSocial extends Profil {
    
    public $myState = false;

    public static function get($parent, $accessMode, $show) {

        $field = parent::get($parent, $accessMode, $show);
        $field = self::remove($field, $this->emailId);
        $field = self::remove($field, $this->mdpId);
        $field = self::remove($field, $this->mdpConfirmId);
        $field = self::remove($field, $this->recommandationOnActionButtonId);
        $field = self::remove($field, $this->recommandationOffActionButtonId);
        $field = self::remove($field, $this->contactAddActionButtonId);
        $field = self::remove($field, $this->contactRemoveActionButtonId);
        $field = self::remove($field, $this->recommandationAcceptActionButtonId);
        $field = self::remove($field, $this->contactAskAcceptActionButtonId);
        $field = self::remove($field, $this->notificationListId);
        $field = self::remove($field, $this->contactListId);
        $field = self::remove($field, $this->portfolioListMyId);
        $field = self::remove($field, $this->contactAddId);
        $field = self::remove($field, $this->recommandationAddId);
        $field = self::remove($field, $this->recommandationListMeId);
        $field = self::remove($field, $this->recommandationListMyId);
        $field = self::remove($field, $this->categoryListId);
        $field = self::remove($field, $this->avantageListId);

        return $field;
    }
}
class ProfilGoogle extends ProfilSocial {
     
    public $saveActionButtonShow             = 'showNone';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE GOOGLE+';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE GOOGLE+';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE GOOGLE+';
}
class ProfilFacebook extends ProfilSocial {

    public $saveActionButtonShow             = 'showVisible';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE FACEBOOK';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE FACEBOOK';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE FACEBOOK';
}
class ProfilLinledIn extends ProfilSocial {

    public $saveActionButtonShow             = 'showVisible';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE LINKEDIN';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE LINKEDIN';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE LINKEDIN';
}
class ProfilTwitter extends ProfilSocial {

    public $saveActionButtonShow             = 'showVisible';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE TWITTER';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE TWITTER';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE TWITTER';
}
class ProfilPinterest extends ProfilSocial {

    public $saveActionButtonShow             = 'showVisible';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE PINTEREST';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE PINTEREST';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE PINTEREST';
}
class ProfilInstagram extends ProfilSocial {

    public $saveActionButtonShow             = 'showVisible';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE INSTAGRAMM';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE INSTAGRAMM';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE INSTAGRAMM';
}
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
class RecommandationOnActionButton extends ActionButton {  
}
class NotificationRecommandationNew extends Notification {
    
    use TraitMedia;
    
    public $title = 'Demande de recommandation';
    public $text  = 'Demande de recommandation';
    
    public function setUp($labelName, $accessMode, $show) {
        
        parent::setUp($labelName, $accessMode, $show);
        
        $urlIcon                                  = $this->mediaImageUrlGet();        
        $notificationTitle                        = new NotificationTitle();
        $notificationIcon                         = new NotificationImage();
        $notificationProfil                       = new ProfilAvantagePersonnal(); // fake
        $notificationTexte                        = new NotificationText();
        $notificationRecommandationOnActionButton = new RecommandationOnActionButton();
        
        $notificationTitle->setUp($this->nodeName, 'read', $show, $this->title);
        $notificationIcon->setUp($this->nodeName, 'read', $show, $urlIcon);
        $notificationProfil->setUp($this->nodeName, 'read', $show, 1, false); // fake
        $notificationTexte->setUp($this->nodeName, 'read', $show, $this->text);
        $notificationRecommandationOnActionButton->setUp($this->nodeName, $accessMode);
        
        $toto = '<div class="item notification my">
        <p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
        <p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER
        
        
        <div
        class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
        vous sur de vouloir dérecommander le profil?</div>
        </p>
        <p class="field contactAddActionButton my edit hidden">AJOUTER
        AUX CONTACTS</p>
        <p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
        DES CONTACTS
        <div
        class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
        vous sur de vouloir supprimer le profil?</div>
        </p>
        
        <p class="field recommandationAcceptActionButton my edit">ACCEPTER</p>
        <p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
        <div class="detail profil"></div>
        </div>
        </div>
        <div class="item notification hidden">
        <p class="field type recommandationAccepted my hidden">Recommandation
        acceptée</p>
        <p class="field avatar my hidden">Avatar</p>
        <p class="field name hidden">Nom</p>
        <p class="field surname my hidden">Prénom</p>
        <p class="field title my hidden">Titre du profil</p>
        <p class="field notificationContent my hidden">Recommandation
        acceptée</p>
        <p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
        <p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER
        
        
        <div
        class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
        vous sur de vouloir dérecommander le profil?</div>
        </p>
        <p class="field contactAddActionButton my edit hidden">AJOUTER
        AUX CONTACTS</p>
        <p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
        DES CONTACTS
        <div
        class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
        vous sur de vouloir supprimer le profil?</div>
        </p>
        
        <p
        class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
        <p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
        <div class="detail profil"></div>
        </div>';
    }
}
class NotificationList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;

    public function setUp($labelName, $accessMode, $show) {
    
        parent::setUp($labelName, $accessMode, $show);
        
       $list                  = parent::get($labelName, $accessMode, $show);       
       $notification1         = new NotificationRecommandationNew();
       
       $notification1->setUp($this->nodeName, $accessMode, $show);
       
       $this->notification1Id = $list->fieldItemListAddObj($notification1);       
    }
}
class RecommandationListMy extends FieldList {
    
    public $actionButtonItemToolsCrud       = true;
    public $actionButtonItemToolsPagination = true;
}
class CategoryList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
}
class AvantageList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
}
class MainContent {
    
    public $profilListMyId;

    public function setUp($labelName, $accessMode, $show) {
    
        parent::setUp($labelName, $accessMode, $show);
              
        $profilListMy = new ProfilListMy();
        
        $profilListMy->setUp($this->nodeName, $accessMode, $show);
        
        $this->profilListMyId = $profilListMy->id;
        
        $this->add($profilListMy);
    }
}

class Page extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    
    public function setUp($labelName, $accessMode, $show) {
        
        parent::setUp($labelName, $accessMode, $show);     
        
        $token = new Token();
        
        if($token->value === false) {
            
            return  false;
        }  
        $mainMenu    = new MainMenu();
        $mainContent = new MainContent();
        
        $mainMenu->setUp($this->nodeName, $accessMode, $show);
        $mainContent->setUp($this->nodeName, $accessMode, $show);        
        $this->add($mainMenu);
        $this->add($mainContent);
        
        echo json_encode($this);

$todo ="

'notificationList': {
'url': 'index.php?menu=notificationList',
'nodeName': 'portfolioList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showNone',
'label': 'Notifications'
},
'paramList': {
'url': 'index.php?menu=paramList',
'nodeName': 'portfolioList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showNone',
'label': 'Paramètres'
}
}
}
},
'avatar':{
'nodeName': 'create',
'labelName': 'avatar',
'accessMode': 'create',
'default': '',
'title':'',
'titleDefault':'',
'urlDefault': '',
'url': 'http://{domain}/media/profilCreate.png',
'fieldList': {
'image': {
'nodeName': 'create',
'labelName': 'avatar',
'accessMode': 'create',
'default': '',
'value':'',
'show': 'showNone'
},
'script': {
'nodeName': 'avatar',
'labelName': 'upload',
'accessMode': 'read',
'show': 'showVisible'
}
},
'show': 'showVisible'
},
'name':{
'nodeName': 'create',
'labelName': 'name',
'accessMode': 'create',
'default': 'Name',
'value':'',
'show': 'showVisible'
},
'surname':{
'nodeName': 'create',
'labelName': 'surname',
'accessMode': 'create',
'default': 'Surname',
'value':'',
'show': 'showVisible'
},
'title':{
'nodeName': 'create',
'labelName': 'title',
'accessMode': 'create',
'default': 'Title',
'value':'',
'show': 'showVisible'
},
'recommandationOnActionButton':{
'nodeName': 'create',
'labelName': 'recommandationOnActionButton',
'accessMode': 'create',
'value':'RECOMMANDER',
'show': 'showNone'
},
'recommandationOffActionButton':{
'nodeName': 'create',
'labelName': 'recommandationOffActionButton',
'accessMode': 'create',
'value':'DERECOMMANDER',
'show': 'showNone',
'fieldList': {
'confirm':{
'nodeName': 'create',
'labelName': 'confirm',
'accessMode': 'create',
'value':'CONFIRMER SUPPRESSION DE LA RECOMMANDATION',
'show': 'showNone'
}
}
},
'contactAddActionButton':{
'nodeName': 'create',
'labelName': 'contactAddActionButton',
'accessMode': 'create',
'value':'AJOUTER AUX CONTACTS',
'show': 'showNone'
},
'contactRemoveActionButton':{
'nodeName': 'create',
'labelName': 'contactRemoveActionButton',
'accessMode': 'create',
'value':'SUPPRIMER DES CONTACTS',
'show': 'showNone'
},
'contactRemoveActionButtonConfirm':{
'nodeName': 'create',
'labelName': 'contactRemoveActionButtonConfirm',
'accessMode': 'create',
'value':'CONFIRMER LA SUPPRESSION DU CONTACT',
'show': 'showNone',
'confirm':{
'nodeName': 'create',
'labelName': 'confirm',
'accessMode': 'create',
'value':'ACCEPTER LA RECOMMANDATION',
'show': 'showNone'
}
},
'recommandationAcceptActionButton':{
'nodeName': 'create',
'labelName': 'recommandationAcceptActionButton',
'accessMode': 'create',
'value':'ACCEPTER LA RECOMMANDATION',
'show': 'showNone'
},
'contactAskAcceptActionButton':{
'nodeName': 'create',
'labelName': 'contactAskAcceptActionButton',
'accessMode': 'create',
'value':'ACCEPTER LA MISE EN CONTACT',
'show': 'showNone'
},
'saveActionButton':{
'nodeName': 'create',
'labelName': 'saveActionButton',
'accessMode': 'create',
'value':'CREER UN COMPTE',
'show': 'showVisible'
}
}
},
'connected1Item':{
'nodeName': 'connected1',
'labelName': 'profil',
'accessMode': 'update',
'recommandState': false,
'show': 'showVisible',
'contactState': false,
'avantage': 'personnConnected',
'sponsorshipNb': 3,
'recommandationNb': 0,
'fieldList':{
'avatar': {
'nodeName': 'connected1',
'labelName': 'avatar',
'accessMode': 'update',
'default': '',
'title':'connected1',
'titleDefault':'',
'urlDefault': '',
'show': 'showVisible',
'url': 'http://{domain}/media/connected1.png',
'fieldList': {
'image': {
'nodeName': 'connected1',
'labelName': 'avatar',
'accessMode': 'update',
'default': '',
'value':'',
'show': 'showNone'
},
'script': {
'nodeName': 'avatar',
'labelName': 'upload',
'accessMode': 'read',
'show': 'showVisible'
}
}
},
'name':{
'nodeName': 'connected1',
'labelName': 'name',
'accessMode': 'update',
'default': 'Name',
'value':'',
'show': 'showVisible'
},
'surname':{
'nodeName': 'connected1',
'labelName': 'surname',
'accessMode': 'update',
'default': 'Surname',
'value':'',
'show': 'showVisible'
},
'title':{
'nodeName': 'connected1',
'labelName': 'title',
'accessMode': 'update',
'default': 'Title',
'value':'',
'show': 'showVisible'
},
'recommandationOnActionButton':{
'nodeName': 'connected1',
'labelName': 'recommandationOnActionButton',
'accessMode': 'update',
'value':'RECOMMANDER',
'show': 'showNone'
},
'recommandationOffActionButton':{
'nodeName': 'connected1',
'labelName': 'recommandationOffActionButton',
'accessMode': 'update',
'value':'DERECOMMANDER',
'show': 'showNone',
'confirm':{
'nodeName': 'connected1',
'labelName': 'confirm',
'accessMode': 'update',
'value':'CONFIRMER SUPPRESSION DE LA RECOMMANDATION',
'show': 'showNone'
}
},
'contactAddActionButton':{
'nodeName': 'connected1',
'labelName': 'contactAddActionButton',
'accessMode': 'update',
'value':'AJOUTER AUX CONTACTS',
'show': 'showNone'
},
'contactRemoveActionButton':{
'nodeName': 'connected1',
'labelName': 'contactRemoveActionButton',
'accessMode': 'update',
'value':'SUPPRIMER DES CONTACTS',
'show': 'showNone',
'confirm':{
'nodeName': 'connected1',
'labelName': 'confirm',
'accessMode': 'update',
'value':'CONFIRMER LA SUPPRESSION DU CONTACT',
'show': 'showNone'
}
},
'recommandationAcceptActionButton':{
'nodeName': 'connected1',
'labelName': 'recommandationAcceptActionButton',
'accessMode': 'update',
'value':'ACCEPTER LA RECOMMANDATION',
'show': 'showNone'
},
'contactAskAcceptActionButton':{
'nodeName': 'connected1',
'labelName': 'contactAskAcceptActionButton',
'accessMode': 'update',
'value':'ACCEPTER LA MISE EN CONTACT',
'show': 'showNone'
},
'saveActionButton':{
'nodeName': 'connected1',
'labelName': 'saveActionButton',
'accessMode': 'update',
'value':'CREER UN COMPTE',
'show': 'showNone'
},
'detail':{
'nodeName': 'connected1',
'labelName': 'profil',
'accessMode': 'update',
'recommandState': false,,
'show': 'showVisible',
'contactState': false,
'avantage': 'personnConnected',
'sponsorshipNb': 3,
'recommandationNb': 0,
'item': {
'nodeName': 'connected1',
'labelName': 'profil',
'accessMode': 'update',
'recommandState': false,,
'show': 'showVisible',
'contactState': false,
'avantage': 'personnConnected',
'sponsorshipNb': 3,
'recommandationNb': 0
},
'menuList': {
'nodeName': 'createProfilItem',
'labelName': 'menuList',
'accessMode': 'create',
'show': 'showVisible',
'menuItemList': {
'avantageList': {
'url': 'index.php?menu=avantageList',
'nodeName': 'avantageList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showVisible',
'label': 'Recevez des recommandations'
},
'portfolioList': {
'url': 'index.php?menu=portfolioList',
'nodeName': 'portfolioList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showVisible',
'label': 'Portfolio'
},
'notificationList': {
'url': 'index.php?menu=notificationList',
'nodeName': 'portfolioList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showVisible',
'label': 'Notifications'
},
'paramList': {
'url': 'index.php?menu=paramList',
'nodeName': 'portfolioList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showVisible',
'label': 'Paramètres'
}
}
'portFolioList':{
'create': {
'nodeName': 'create',
'labelName': 'portfolio',
'accessMode': 'create',
'value':'CREER UN COMPTE',
'show': 'showVisible',
'title':{
'nodeName': 'create',
'labelName': 'title',
'accessMode': 'create',
'default': 'Title',
'value':'',
'show': 'showVisible',
},
'image':{
'nodeName': 'create',
'labelName': 'image',
'accessMode': 'create',
'default': '',
'title':'',
'titleDefault':'',
'urlDefault': '',
'show': 'showVisible',
'url': 'http://{domain}/media/portFolioCreate.png',
'fieldList': {
'nodeName': 'create',
'labelName': 'image',
'accessMode': 'create',
'default': '',
'value':'',
'show': 'showNone'
}
},
'description':{
'nodeName': 'create',
'labelName': 'description',
'accessMode': 'create',
'default': 'description',
'value':'',
'show': 'showVisible'
}
},
'sample1': {
'nodeName': 'sample1',
'labelName': 'portfolio',
'accessMode': 'create',
'value':'CREER UN COMPTE',
'show': 'showVisible',
'title':{
'nodeName': 'sample1',
'labelName': 'title',
'accessMode': 'create',
'default': 'Title',
'value':'sample1',
'show': 'showVisible'
},
'image':{
'nodeName': 'sample1',
'labelName': 'image',
'accessMode': 'create',
'show': 'showVisible',
'default': '',
'title':'sample1',
'titleDefault':'',
'urlDefault': '',
'url': 'http://{domain}/media/portFolioSample1.png',
'fieldList': {
'nodeName': 'sample1',
'labelName': 'image',
'accessMode': 'create',
'default': '',
'value':'',
'show': 'showNone'
}
},
'description':{
'nodeName': 'sample1',
'labelName': 'description',
'accessMode': 'create',
'default': 'description',
'value':'sample1',
'show': 'showVisible'
}
},
'sample2': {
'nodeName': 'sample2',
'labelName': 'portfolio',
'accessMode': 'create',
'value':'CREER UN COMPTE',
'show': 'showVisible',
'title':{
'nodeName': 'sample2',
'labelName': 'title',
'accessMode': 'create',
'default': 'Title',
'value':'sample2',
'show': 'showVisible'
},
'image':{
'nodeName': 'sample2',
'labelName': 'image',
'accessMode': 'create',,
'show': 'showVisible',
'default': '',
'title':'sample2',
'titleDefault':'',
'urlDefault': '',
'url': 'http://{domain}/media/portFolioSample2.png',
'fieldList': {
'nodeName': 'sample2',
'labelName': 'image',
'accessMode': 'create',
'default': '',
'value':'',
'show': 'showNone'
}
},
'description':{
'nodeName': 'sample2',
'labelName': 'description',
'accessMode': 'create',
'default': 'description',
'value':'sample2',
'show': 'showVisible'
}
}
}
}
},
'conntected2Item':{
},
'googleConnectedItem':{
},
'googleDeConnectedItem':{
},
'facebookConnectedItem':{
},
'facebookDeConnectedItem':{
},

}
}
}";


    }
}

?>