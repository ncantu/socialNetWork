<?php 

class Filter {
 
    public $attributList = array();
    
    public function set($attributName, $attributValue){
        
        $this->attributList[$attributName] = $attributValue;
    }
}

class Token {
    
    public static $idPublic = 'lnsdlfnsdlf';
    
    public function getUserNodeName(){
        
        return 'toto';
    }
}

class Microservice {
    
    public $labelName;
    public $accessMode;
    public $filter;
    public $token;

    public function __construct($labelName, $accessMode, $show, $filer = false, $token = false) {
    
        $this->labelName        = $labelName;
        $this->accessMode       = $accessMode;
        $this->show             = $show;
        $this->filter           = $filer;
        $this->token            = $token;
    }
    public function templateSet() {
   
        $labelName                  = $this->labelName;
        $this->microserviceTemplate = new $labelName($this->labelName, $this->accessMode, $this->show);
        
        return true;
    }
}

class Field {

    public $id;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    public $valueDefault;
    public $title;
    public $titleDefault;
    public $urlDefault;
    public $url;
    public $ptQuantity;
    public $idList;
    public $microservice;
    
    public function __construct($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {

        $nodeName           = get_class($this);
        $this->id           = $labelName.'-'.$nodeName;
        $this->nodeName     = $nodeName;
        $this->labelName    = $labelName;
        $this->accessMode   = $accessMode;
        $this->show         = $show;

        if($value !== false) {

            $this->value = $value;
        }
    }
    public function remove($id) {

        unset($this->fieldList->fieldItemList[$id]);

        return $this;
    }
    public function valueSet($value, $attributName = 'value') {

        return $this->attributSet($attributName, $value);
    }
    public function showSet($value, $attributName = 'show') {

        return $this->attributSet($attributName, $value);
    }
    public function accessModeSet($value, $attributName = 'accessMode') {

        return $this->attributSet($attributName, $value);
    }
    public function defaultSet($value, $attributName = 'default') {

        return $this->attributSet($attributName, $value);
    }
    public function titleSet($value, $attributName = 'title') {

        return $this->attributSet($attributName, $value);
    }
    public function titleDefaultSet($value, $attributName = 'titleDefault') {

        return $this->attributSet($attributName, $value);
    }
    public function urlDefaultSet($value, $attributName = 'urlDefault') {

        return $this->attributSet($attributName, $value);
    }
    public function urlSet($value, $attributName = 'url') {

        return $this->attributSet($attributName, $value);
    }
    public function ptQuantitySet($value, $attributName = 'ptQuantity') {

        return $this->attributSet($attributName, $value);
    }    
    public function attributSet($attributName, $value) {
    
        $this->$attributName = $value;
    
        return true;
    }
    public function actionButtonItemToolsRemove() {
        
        $this->actionButtonRemoveRemove();
        $this->actionButtonEditRemove();
        $this->actionButtonDetailRemove();
        
        return true;        
    }
    public function actionButtonItemToolsAdd($labelName, $microserviceTemplate, $show) {
        
        $this->actionButtonRemoveAdd();
        $this->actionButtonEditAdd();
        $this->actionButtonDetailAdd();
        
        return true;
    }  
    public function actionButtonRemoveRemove() {

        $this->actionButtonRemove = false;
        
        return true;
    }   
    public function actionButtonEditRemove() {

        $this->actionButtonEdit = false;
        
        return true;
    } 
    public function actionButtonDetailRemove() {

        $this->actionButtonDetail = false;
        
        return true;
    }   
    public function actionButtonRemoveAdd() {
        
        $this->actionButtonRemove = new ActionButtonRemove($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;       
    }
    public function actionButtonEditAdd() {
        
        $this->actionButtonEdit = new ActionButtonEdit($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;       
    }
    public function actionButtonDetailAdd() {
        
        $this->actionButtonetail = new ActionButtonDetail($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;       
    }
    public function microserviceSet($microserviceLabelName, $microserviceAccessMode, $microserviceShow) {
        
        $token              = new Token();
        $filter             = $this->filterSet($token);        
        $this->microservice = new Microservice($microserviceLabelName, $microserviceAccessMode, $microserviceShow, $filter, $token);
        
        return true;
    }   
    public function filterSet() {
        
        return new Filter();
    }
}
class FieldList extends Field {

    public $itemList           = array();    
    public $actionButtonAdd    = false;
    public $actionButtonNext   = false;
    public $actionButtonPrec   = false;
        
    public function add($obj, $attritutList = array()) {
             
        if(isset($obj->id) === false) {

            if(isset($attritutList->id) === false) {
                
                return false;
            }            
            $obj->id = $attritutList->id;
        }        
        $update = $this->update($obj, $attritutList);
        
        if($update === false) {
            
            return false;
        }
        if(empty($this->itemList) === true) {
        
            $this->defaultSet($obj->id);
        }
        return true;
    }
    
    public function update($obj, $attritutList = array()) {
        
        if(isset($obj->id) === false) {
        
            return false;
        }    
        foreach($attritutList as $k => $v) {
            
            $obj->$k = $v;
        }
        $this->itemList[$obj->id] = $obj;
    
        return true;
    }
    public function remove($obj) {
        
        if(isset($obj->id) === false) {
        
            return false;
        }        
        if(isset($this->itemList[$obj->id]) === false) {
        
            return false;
        }    
        unset($this->itemList[$obj->id]);
    
        return true;
    }
    public function itemValueSet($obj, $value, $attributName = 'value') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemShowSet($obj, $value, $attributName = 'show') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemAccessModeSet($obj, $value, $attributName = 'accessMode') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemDefaultSet($obj, $value, $attributName = 'valueDefault') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemTitleSet($obj, $value, $attributName = 'title') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemTitleDefaultSet($obj, $value, $attributName = 'titleDefault') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemUrlDefaultSet($obj, $value, $attributName = 'urlDefault') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemUrlSet($obj, $value, $attributName = 'url') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemQtQuantitySet($obj, $value, $attributName = 'ptQuantity') {
    
        return $this->itemAttributSet($obj, $attributName, $value);
    }
    public function itemAttributSet($obj, $attributName, $value) {
    
        $function = $attributName.'Set';
        
        if(isset($obj->id) === false) {
        
            return false;
        }        
        $this->itemList[$obj->id]->$function($value);
    
        return true;
    }
    public function actionButtonItemToolsAdd() {
        
        $this->actionButtonItemToolsCrudAdd;
        $this->actionButtonItemToolsPaginationAdd();
        
        return true;
    }
    public function actionButtonItemToolsPaginationAdd() {
        
        $this->actionButtonNextAdd();
        $this->actionButtonPrecAdd();
        
        return true;
    }
    public function actionButtonItemToolsCrudAdd() {
        
        $this->actionButtonAddAdd();
        
        return true;
    }
    public function actionButtonItemToolsRemove() {
        
        $this->actionButtonAddRemove();
        $this->actionButtonItemToolspaginationRemove();
        
        return true;        
    }
    public function actionButtonItemToolspaginationRemove() {
        
        $this->actionButtonNextRemove();
        $this->actionButtonPrecRemove();
        
        return true;        
    }    
    public function actionButtonAddRemove() {
        
        $this->actionButtonAdd = false;
        
        return true;
    }
    
    public function actionButtonNextRemove() {
        
        $this->actionButtonNext = false;

        return true;
    }
    
    public function actionButtonPrecRemove() {
        

        $this->actionButtonPrec = false;

        return true;
    }  
    
    public function actionButtonAddAdd() {

        $this->actionButtonAdd = new ActionButtonAdd($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show);
        
        return true;
    }
    
    public function actionButtonNextAdd() {
        
        $this->actionButtonNext = new ActionButtonNext($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;       
    }
    
    public function actionButtonPrecAdd() {
        
        $this->actionButtonPrec = new ActionButtonPrec($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;
    }
}
class Semantic extends Field {
}
class SemanticList extends FieldList {
}
class Text extends SemanticList {
}
class ActionButton extends FieldList {

    public $show                   = 'showNone';
    public $confirm                = false;
    public $microserviceLabelName  = false;
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showNone';
    public $confirmButton          = false;
    public $value;

    public static function __construct($labelName, $show, $microserviceLabelName = false, $microserviceAccessMode = false, $microserviceShow = false) {

        if($microserviceLabelName !== false) {
            
            $this->microserviceLabelName = $microserviceLabelName;
        }        
        if($microserviceAccessMode !== false) {
            
            $this->microserviceAccessMode = $microserviceAccessMode;
        }        
        if($microserviceShow !== false) {
            
            $this->microserviceShow = $microserviceShow;
        }        
        $field = parent::__construct($labelName, 'read', $show, $this->value);

        if($this->confirm !== false) {
             
            $this->confirmUpdate($this->confirm);
        }
        $this->microserviceSet($this->microserviceLabelName, $this->microserviceAccessMode, $this->microserviceShow);
        
        return $field;
    }
    
    public function confirmUpdate($confirm) {
        
        $this->confirmButton = new ActionButtonConfirm(get_class($this), 'read', 'showNone', $confirm);
        
        return true;
    }
}
class ActionButtonConfirm extends ActionButton {
    
    public $confirm = false;
}
class ActionButtonItemTool extends ActionButton {
    
    public function __construct($labelName, $microserviceTemplate, $show = 'showVisible') {
    
        parent::__construct($labelName, $show);
    }
}
class ActionButtonItemToolCrud extends ActionButtonItemTool {
        
    public function filterSet($token) {
    
        $userNodeName = $token->getUserNodeName();
        $filter       = new Filter();

        $filter->set('microservice', $this->microservice);
        $filter->set('user', $userNodeName);
        $filter->set('attributList', array());
    
        return $filter;
    }
}

class ActionButtonAdd extends ActionButtonItemToolCrud {

    public $microserviceAccessMode = 'create';
}
class ActionButtonEdit extends ActionButtonItemToolCrud {

    public $microserviceAccessMode = 'update';
}
class ActionButtonDetail extends ActionButtonItemToolCrud {

    public $microserviceAccessMode = 'read';
}
class ActionButtonRemove extends ActionButtonItemToolCrud {

    public $microserviceAccessMode = 'delete';
}
class ActionButtonPagination extends ActionButtonItemTool {

    public $microservicelenghtShow = 10;
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';

    public function filterSet($token) {

        $userNodeName = $token->getUserNodeName();
        $filter       = new Filter();

        $filter->set('microservice', $this->microservice);
        $filter->set('user', $userNodeName);
        $filter->set('start', array());
        $filter->set('lenghtShow', $this->microservicelenghtShow);
        $filter->set('lenght', $this->microservicelenght);
        $filter->set('attributList', array());

        return $filter;
    }
}
class ActionButtonNext extends ActionButtonPagination {
    
    public $microservicelenght = 20;
}
class ActionButtonPrec extends ActionButtonPagination {
    
    public $microservicelenght = -20;
}
class ActionButtonMenuItem extends ActionButton {

    public $microserviceLabelName  = 'Profil';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';    
}
class Theme extends Text {
}
class ThemeList extends FieldList {
}
class VersionConf extends Field {
}
class VersionConfList extends FieldList {
}
class Domain extends Text {
}
class DomainList extends FieldList {
}
class SiteTitle extends Text {
}
class DescriptionShort extends Text {
}
class SiteDescriptionShort extends DescriptionShort {
}
class DescriptionLong extends Text {
}
class SiteDescriptionLong extends DescriptionLong {
}
class Keyword extends Text {
}
class KeywordList extends FieldList {

    public $keywordListToImport;
    
    public function keywordListToImport() {
        
        foreach($$this->keywordListToImport as $v) {
            
            $obj = new Keyword($this->nodeName, $this->accessMode, $this->show, $v);
            $this->add($obj);
        }
        return true;
    }
    public function keywordListToImportSet($value, $attributName = 'keywordListToImport') {
    
        return $this->attributSet($attributName, $value);
    }
}

class Lang extends Text {
}
class LangList extends FieldList {
}

class AccessMode extends Field {
}

class AccessModeList extends FieldList {
}

class Show extends Field {
}

class ShowList extends FieldList {
}

class MainDescription extends FieldList {
    
    public $showValueDefault        = 'showVisible';
    public $accessModeValueDefault  = 'read';
    public $langValueDefault        = 'fr';
    public $keywordListValue        = array('parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
    public $descriptionLongValue    = 'JE RECOMMANDE Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
    public $descriptionShortValue   = 'JE RECOMMANDE Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
    public $titleValue              = 'JE RECOMMANDE';
    public $domainValueDefault      = 'jerecommande.fr';
    public $semanticValueDefault    = 'fr';
    public $themeValueDefault       = 'default';
    public $versionConfValueDefault = 'v0.0';
    public $title;
    public $descriptionShort;
    public $descriptionLong;
    public $versionConf;    
    public $domainList;
    public $keywordList;
    public $lang;
    public $accessModeList;
    public $showList;
        
    public function __construct($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {
    
        parent::__construct($labelName, $accessMode, $show, $value);
        
        $this->title            = new SiteTitle($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->titleValue);
        $this->lang             = new Lang($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->langValueDefault);
        $this->descriptionShort = new SiteDescriptionShort($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->descriptionShortValue);
        $this->descriptionLong  = new SiteDescriptionLong($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->descriptionLongValue);
        $this->versionConf      = new VersionConfList($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->versionConfValueDefault);        
        $this->semanticList     = new SemanticList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $this->themeList        = new ThemeList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $this->domainList       = new DomainList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $this->keywordList      = new KeywordList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $this->langList         = new LangList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $this->accessModeList   = new AccessModeList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $this->showList         = new ShowList($this->nodeName, $this->accessModeDefault, $this->showDefault);
        $semantic               = New Semantic($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->semanticValueDefault);
        $theme                  = New Theme($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->themeValueDefault);
        $domain                 = New Domain($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->domainValueDefault);
        $accessMode             = New AccessMode($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->accessModeValueDefault);
        $show                   = New Domain($this->nodeName, $this->accessModeDefault, $this->showDefault, $this->showValueDefault);     
        
        $this->semanticList->add($semantic);
        $this->themeList->add($theme);
        $this->domainList->add($domain);
        $this->accessModeList->add($accessMode);
        $this->showList->add($show);        
        $this->keywordList->keywordListToImportSet($this->keywordListValue);
        $this->keywordList->keywordListToImport();
    }
}

class ActionButtonMenuItemProfilListMy extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Profil';
    public $microserviceAccessMode = 'update';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('user', $userNodeName);
        
        return $filter;
    }
}

class Notification extends FieldList {

}
class ActionButtonMenuItemNotificationList extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Notification';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('user', $userNodeName);
        $filter->set('oderFied', 'dateCreated');
        
        return $filter;
    }
}
class Contact extends Profil {
}
class ActionButtonMenuItemContactList extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Contact';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('user', $userNodeName);
        $filter->set('oderFied', 'dateCreated');
        
        return $filter;
    }
}

class PortFolio extends Field {
}
class ActionButtonMenuItemPortfolioListMy extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Portfolio';
    public $microserviceAccessMode = 'update';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('user', $userNodeName);
        $filter->set('oderFied', 'dateCreated');
        
        return $filter;
    }
}

class ActionButtonMenuItemRecommandationListMe extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'read';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('userRecommanded', $userNodeName);
        $filter->set('oderFied', 'dateCreated');
        
        return $filter;
    }
}

class Recommandation extends Field {
    
}

class ActionButtonMenuItemRecommandationListMy extends ActionButtonMenuItem {
    
    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'update';
    public $microserviceShow       = 'showVisible';
    
    public function filterSet($token) {
        
        $userNodeName = $token->getUserNodeName();        
        $filter       = new Filter();
        
        $filter->set('user', $userNodeName);
        $filter->set('oderFied', 'dateCreated');
        
        return $filter;
    }
}

class Category extends Text {
}

class ActionButtonMenuItemCategoryList extends ActionButtonMenuItem {
    
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
    public $defaultValue           = 'Ajouter un contact';
}
class ActionButtonAddRecommandation extends ActionButtonAdd {

    public $microserviceLabelName  = 'Recommandation';
    public $microserviceAccessMode = 'create';
    public $microserviceShow       = 'showVisible';
    public $defaultValue           = 'Recommander';
}

class MainMenu extends FieldList {
    
    public function __construct($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {
    
        parent::__construct($labelName, $accessMode, $show, $value);

        $actionButtonMenuItemProfilListMy         = new ActionButtonMenuItemProfilListMy($this->nodeName);        
        $actionButtonMenuItemNotificationList     = new ActionButtonMenuItemNotificationList($this->nodeName);
        $actionButtonMenuItemContactList          = new ActionButtonMenuItemContactList($this->nodeName);
        $actionButtonMenuItemPortfolioListMy      = new ActionButtonMenuItemPortfolioListMy($this->nodeName);        
        $actionButtonAddContact                   = new ActionButtonAddContact($this->nodeName);
        $actionButtonAddRecommandation            = new ActionButtonAddRecommandation($this->nodeName);        
        $actionButtonMenuItemRecommandationListMe = new ActionButtonMenuItemRecommandationListMe($this->nodeName);
        $actionButtonMenuItemRecommandationListMy = new ActionButtonMenuItemRecommandationListMy($this->nodeName);
        $actionButtonMenuItemCategoryList         = new ActionButtonMenuItemCategoryList($this->nodeName);
        $actionButtonMenuItemAvantageList         = new ActionButtonMenuItemAvantageList($this->nodeName);
        
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

    public function get($parent, $accessMode, $show, $url) {
        
        parent::__construct($parent.get_class($this), get_class($this), $accessMode, $show);        
        
        $this->url = $url;
        
        return $this;
    }
}

class ScriptUpload extends Field {

    public function get($parent, $accessMode, $show) {
    
        parent::get($parent, $accessMode, $show);
        
        $urlScript = 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/js/'.$parent.get_class($this).'.js';
        $this->url = $urlScript;
    
        return $this;
    }
}

class Image extends Field {
    
    public $urlId;
    public $scriptUploadId;
    
    public function get($parent, $accessMode, $show, $url) {
        
        parent::get($parent, $accessMode, $show);
        
        $url = new Url();
        
        $url->get(get_class($this), $accessMode, $show, $url);
        
        $scriptUpload = new ScriptUpload();
        
        $scriptUpload->get(get_class($this), 'read', 'showVisible');
        
        $this->urlId          = $field->fieldItemListAddObj($url);
        $this->scriptUploadId = $field->fieldItemListAddObj($scriptUpload);
        
        return $field;
    }
}

class Name extends Text {

}

class Surname extends Text {
    
}

class Title extends Text {
    
}

class Email extends Field {
    
}


class Mdp extends Field {

}


class MdpConfirm extends Field {

}

class RecommandationOnActionButton extends ActionButton {
    
}

class RecommandationOffActionButton extends ActionButton {
    
}

class ContactAddActionButton extends ActionButton {
    
}

class ContactRemoveActionButton extends ActionButton {
    
}

class RecommandationAcceptActionButton extends ActionButton {
    
}

class ContactAskAcceptActionButton extends ActionButton {
    
}

class SaveActionButton extends ActionButton {
    
}

class SeparateActionButton extends ActionButton {
    
}

class ProfilText extends Text {

}

class ProfilUrl extends Url {

}

class ProfilScriptUpload extends ScriptUpload {

}

class ProfilImage extends Image {

}

class ProfilName extends Name {

}

class ProfilSurname extends Surname {

}

class ProfilTitle extends Title {

}

class ProfilEmail extends Email {

}

class ProfilCategory extends Category {

}

class ProfilMdp extends Mdp {

}

class ProfilMdpConfirm extends MdpConfirm {

}

class ProfilActionButton extends ActionButton {

}

class ProfilActionButtonConfirm extends ActionButtonConfirm {

}

class ProfilRecommandationOnActionButton extends RecommandationOnActionButton {
    
    public $value = 'RECOMMANDER';
}

class ProfilRecommandationOffActionButton extends RecommandationOffActionButton {

    public $value   = 'DERECOMMANDER';
    public $confirm = 'CONFIRMER SUPPRESSION DE LA RECOMMANDATION';    
}

class ProfilContactAddActionButton extends ContactAddActionButton {

    public $value = 'AJOUTER AUX CONTACTS';
}

class ProfilContactRemoveActionButton extends ContactRemoveActionButton {

    public $value   = 'SUPPRIMER DES CONTACTS';
    public $confirm = 'CONFIRMER LA SUPPRESSION DU CONTACT';
}

class ProfilRecommandationAcceptActionButton extends RecommandationAcceptActionButton {

    public $value = 'ACCEPTER LA RECOMMANDATION';
}

class ProfilContactAskAcceptActionButton extends ContactAskAcceptActionButton {

    public $value = 'ACCEPTER LA MISE EN CONTACT';
}

class ProfilSaveActionButton extends SaveActionButton {

    public $value = 'CREER UN COMPTE';
}

class ProfilSeparateActionButton extends SeparateActionButton {
    
    public $value   = 'DISSOCIER LE COMPTE';
    public $confirm = 'CONFIRMER LA DISSOCIATION DU COMPTE';
}

class NotificationImage extends Image {
    
}

class NotificationTitle extends Title {
    
}

class NotificationIcon extends Image {

}

class NotificationText extends Text {

}


class NotificationRecommandationOnActionButton extends RecommandationOnActionButton {
    
}

class NotificationRecommandationNew extends Notification {
    
    public $title = 'Demande de recommandation';
    public $text  = 'Demande de recommandation';
    
    public static function get($parent, $accessMode, $show) {
        
        $urlIcon                                  = 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/media/'.get_class($this).'.png';
        $field                                    = parent::get($parent, 'read', $show);        
        $notificationTitle                        = NotificationTitle::get($parent, 'read', $show, $this->title);
        $notificationIcon                         = NotificationImage::get($parent, 'read', $show, $urlIcon);
        $notificationProfil                       = ProfilAvantagePersonnal::getFake($parent, 'read', $show, 1, false);
        $notificationTexte                        = NotificationText::get($parent, 'read', $show, $this->text);
        $notificationRecommandationOnActionButton = NotificationRecommandationOnActionButton::get($parent, $accessMode);
        
                
        return $field;
        
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

    public static function get($parent, $accessMode, $show) {
        
       $list                  = parent::get($parent, $accessMode, $show);       
       $notification1         = NotificationRecommandationNew::get(get_class($this), $accessMode, $show);
       $this->notification1Id = $list->fieldItemListAddObj($notification1);
       
       return $list;
    }
}

class ContactList extends FieldList {

    public static function get($parent, $accessMode, $show) {

        // list profils (3)
    }
}

class PortfolioListMy extends FieldList {

    public static function get($parent, $accessMode, $show) {


        $todo = '"portFolioList":{
            "create": {
            "nodeName": "create",
            "labelName": "portfolio",
            "accessMode": "create",
            "value":"CREER UN COMPTE",
            "show": "showVisible",
            "title":{
            "nodeName": "create",
            "labelName": "title",
            "accessMode": "create",
            "default": "Title",
            "value":"",
            "show": "showVisible",
        },
        "image":{
        "nodeName": "create",
        "labelName": "image",
        "accessMode": "create",
        "default": "",
        "title":"",
        "titleDefault":"",
        "urlDefault": "",
        "show": "showVisible",
        "url": "http://{domain}/media/portFolioCreate.png",
        "fieldList": {
        "nodeName": "create",
        "labelName": "image",
        "accessMode": "create",
        "default": "",
        "value":"",
        "show": "showNone"
        }
        },
        "description":{
        "nodeName": "create",
        "labelName": "description",
        "accessMode": "create",
        "default": "description",
        "value":"",
        "show": "showVisible"
        }
        },
        "sample1": {
        "nodeName": "sample1",
        "labelName": "portfolio",
        "accessMode": "create",
        "value":"CREER UN COMPTE",
        "show": "showVisible",
        "title":{
        "nodeName": "sample1",
        "labelName": "title",
        "accessMode": "create",
        "default": "Title",
        "value":"sample1",
        "show": "showVisible"
        },
        "image":{
        "nodeName": "sample1",
        "labelName": "image",
        "accessMode": "create",
        "show": "showVisible",
        "default": "",
        "title":"sample1",
        "titleDefault":"",
        "urlDefault": "",
        "url": "http://{domain}/media/portFolioSample1.png",
        "fieldList": {
        "nodeName": "sample1",
        "labelName": "image",
        "accessMode": "create",
        "default": "",
        "value":"",
        "show": "showNone"
        }
        },
        "description":{
        "nodeName": "sample1",
        "labelName": "description",
        "accessMode": "create",
        "default": "description",
        "value":"sample1",
        "show": "showVisible"
        }
        },
        "sample2": {
        "nodeName": "sample2",
        "labelName": "portfolio",
        "accessMode": "create",
        "value":"CREER UN COMPTE",
        "show": "showVisible",
        "title":{
        "nodeName": "sample2",
        "labelName": "title",
        "accessMode": "create",
        "default": "Title",
        "value":"sample2",
        "show": "showVisible"
        },
        "image":{
        "nodeName": "sample2",
        "labelName": "image",
        "accessMode": "create",,
        "show": "showVisible",
        "default": "",
        "title":"sample2",
        "titleDefault":"",
        "urlDefault": "",
        "url": "http://{domain}/media/portFolioSample2.png",
        "fieldList": {
        "nodeName": "sample2",
        "labelName": "image",
        "accessMode": "create",
        "default": "",
        "value":"",
        "show": "showNone"
        }
        },
        "description":{
        "nodeName": "sample2",
        "labelName": "description",
        "accessMode": "create",
        "default": "description",
        "value":"sample2",
        "show": "showVisible"
        }
        }"';
    }
}

class ContactAdd {

    public static function get($parent, $accessMode, $show) {

    }
}

class RecommandationAdd {

    public static function get($parent, $accessMode, $show) {

    }
}

class RecommandationListMe extends FieldList {

    public static function get($parent, $accessMode, $show) {

    }
}

class RecommandationListMy extends FieldList {

    public static function get($parent, $accessMode, $show) {

    }
}

class CategoryList extends FieldList {

    public static function get($parent, $accessMode, $show) {

    }
}

class AvantageList extends FieldList {

    public static function get($parent, $accessMode, $show) {

    }
}

class Profil extends FieldList  {
    
    public $saveActionButtonShow             = 'showNone';
    public $saveActionButtonValue            = 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE RESEAU SOCIAL';
    public $separateActionButtonShow         = 'showNone';
    public $separateActionButtonValue        = 'DISSOCIER LE COMPTE';
    public $separateActionButtonConfirmValue = 'CONFIRMER LA DISSOCIATION DU COMPTE';
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

    public static function get($parent, $accessMode, $show, $notificationList = true) {
         
        $profil                                   = parent::get($parent, $accessMode, $show);
        $urlAvatar                                = 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/media/'.get_class($this).'.png';
        $image                                    = ProfilImage::get(get_class($this), $accessMode, $show, $urlAvatar);
        $name                                     = ProfilName::get(get_class($this), $accessMode, $show);
        $surname                                  = ProfilSurname::get(get_class($this), $accessMode, $show);
        $title                                    = ProfilTitle::get(get_class($this), $accessMode, $show);
        $email                                    = ProfilEmail::get(get_class($this), $accessMode, $show);
        $mdp                                      = ProfilMdp::get(get_class($this), $accessMode, $show);
        $mdpConfirm                               = ProfilMdpConfirm::get(get_class($this), $accessMode, $show);
        $recommandationOnActionButton             = ProfilRecommandationOnActionButton::get(get_class($this));
        $recommandationOffActionButton            = ProfilRecommandationOffActionButton::get(get_class($this));
        $contactAddActionButton                   = ProfilContactAddActionButton::get(get_class($this));
        $contactRemoveActionButton                = ProfilContactRemoveActionButton::get(get_class($this));
        $recommandationAcceptActionButton         = ProfilRecommandationAcceptActionButton::get(get_class($this));
        $contactAskAcceptActionButton             = ProfilContactAskAcceptActionButton::get(get_class($this));
        $saveActionButton                         = ProfilSaveActionButton::get(get_class($this));
        $separateActionButton                     = ProfilSeparateActionButton::get(get_class($this));
        $category                                 = ProfilCategory::get(get_class($this), $accessMode, $show);
        $contactList                              = ContactList::get(get_class($this), $accessMode, $show);
        $portfolioListMy                          = PortfolioListMy::get(get_class($this), $accessMode, $show);
        $contactAdd                               = ContactAdd::get(get_class($this), $accessMode, $show);
        $recommandationAdd                        = RecommandationAdd::get(get_class($this), $accessMode, $show);
        $recommandationListMe                     = RecommandationListMe::get(get_class($this), $accessMode, $show);
        $recommandationListMy                     = RecommandationListMy::get(get_class($this), $accessMode, $show);
        $categoryList                             = CategoryList::get(get_class($this), $accessMode, $show);
        $avantageList                             = AvantageList::get(get_class($this), $accessMode, $show);        
        $this->imageId                            = $profil->fieldItemListAddObj($image);
        $this->nameId                             = $profil->fieldItemListAddObj($name);
        $this->surnameId                          = $profil->fieldItemListAddObj($surname);
        $this->titleId                            = $profil->fieldItemListAddObj($title);
        $this->emailId                            = $profil->fieldItemListAddObj($email);
        $this->mdpId                              = $profil->fieldItemListAddObj($mdp);
        $this->mdpConfirmId                       = $profil->fieldItemListAddObj($mdpConfirm);
        $this->categoryId                         = $profil->fieldItemListAddObj($category);
        $this->recommandationOnActionButtonId     = $profil->fieldItemListAddObj($recommandationOnActionButton);
        $this->recommandationOffActionButtonId    = $profil->fieldItemListAddObj($recommandationOffActionButton);
        $this->contactAddActionButtonId           = $profil->fieldItemListAddObj($contactAddActionButton);
        $this->contactRemoveActionButtonId        = $profil->fieldItemListAddObj($contactRemoveActionButton);
        $this->recommandationAcceptActionButtonId = $profil->fieldItemListAddObj($recommandationAcceptActionButton);
        $this->contactAskAcceptActionButtonId     = $profil->fieldItemListAddObj($contactAskAcceptActionButton);
        $this->saveActionButtonId                 = $profil->fieldItemListAddObj($saveActionButton);
        $this->separateActionButtonId             = $profil->fieldItemListAddObj($separateActionButton);
        $this->contactListId                      = $profil->fieldItemListAddObj($contactList);
        $this->portfolioListMyId                  = $profil->fieldItemListAddObj($portfolioListMy);
        $this->contactAddId                       = $profil->fieldItemListAddObj($contactAdd);
        $this->recommandationAddId                = $profil->fieldItemListAddObj($recommandationAdd);
        $this->recommandationListMeId             = $profil->fieldItemListAddObj($recommandationListMe);
        $this->recommandationListMyId             = $profil->fieldItemListAddObj($recommandationListMy);
        $this->categoryListId                     = $profil->fieldItemListAddObj($categoryList);
        $this->avantageListId                     = $profil->fieldItemListAddObj($avantageList);        
        $profil                                   = self::showSet($profil, $this->saveActionButtonId, $this->saveActionButtonShow);
        $profil                                   = self::valueSet($profil, $this->saveActionButtonId, $this->saveActionButtonValue);
        $profil                                   = self::showSet($profil, $this->separateActionButtonId, $this->separateActionButtonShow);
        $profil                                   = self::valueSet($profil, $this->separateActionButtonId, $this->separateActionButtonValue);
        
        $profil->fieldItemList[$this->separateActionButtonId] = ProfilSeparateActionButton::confirmSet($profil->fieldItemList[$this->separateActionButtonId], $this->separateActionButtonConfirmValue);
                
        if($notificationList === true) {

            $notificationList         = NotificationList::get(get_class($this), $accessMode, $show);
            $this->notificationListId = $profil->fieldItemListAddObj($notificationList);
        }
        return $profil;
    }
    
    public static function getFake($parent, $accessMode, $show, $id, $notificationList = true) {
    
        $id        = 'fake'.$id;
        $urlProfil = 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/media/'.$id.'.png';
        $profil    = self::get($parent, $accessMode, $show, $notificationList);        
        $profil    = self::valueSet($profil, $profil->imageId, $urlProfil);
        $profil    = self::valueSet($profil, $profil->nameId, $id.' name');
        $profil    = self::valueSet($profil, $profil->surnameId, $id.' surname');
        $profil    = self::valueSet($profil, $profil->titleId, $id.' title');
        $profil    = self::valueSet($profil, $profil->emailId, $id.'@instriit.com');
        
        return $profil;
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

class MainContent {
    
    public $profilListMyId;
    
    public static function get($parent, $accessMode, $show) {
        
        $fieldItem            = new ApiBackFieldItem($parent.get_class($this), get_class($this), $accessMode, $show);        
        $profilListMy         = ProfilListMy::get(get_class($this), $accessMode, $show);  
        $this->profilListMyId = $fieldItem->fieldItemListAddObj($profilListMy);
        
        return $fieldItem;
    }
}

class ApiBack extends ApiBackFieldItem {

    public $id;
    public $text;
    public $theme;
    public $dataIntegration;
    public $domain;
    public $siteName;
    public $descriptionLong;
    public $descriptionShort;
    public $keyWordList;
    public $cssContent;
    public $googleVerify;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    public $fieldList;
    public $menuList;
    
    public static $cloneDescription;
    
    public static function genStdSample($accessMode = 'read', $show = 'showVisible') {
        
        $ApiBack                = MainDescription::get(get_class($this), $accessMode, $show);        
        self::$cloneDescription = $ApiBack;        
        $ApiBack->menuList      = MainMenu::get(get_class($this), $accessMode, $show);        
        $ApiBack->fieldList     = MainContent::get(get_class($this), $accessMode, $show);
       
        
        echo json_encode($ApiBack);

$todo ="
},
'fieldList':{
'
'portfolioList': {
'url': 'index.php?menu=portfolioList',
'nodeName': 'portfolioList',
'labelName': 'link',
'accessMode': 'read',
'show': 'showNone',
'label': 'Portfolio'
},
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
    
    public function __construct($id, $text, $theme, $dataIntegration, $domain, $siteName, 
        $descriptionLong, $descriptionShort, $keyWordList, $googleVerify, $nodeName, $labelName, $accessMode, $show) {

        $this->id         = $labelName.'-'.$nodeName;
        $this->cssContent = new ApiBackClassList();
        
        
    }
}

?>