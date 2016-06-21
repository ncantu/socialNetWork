<?php 

class ApiBackClassList {

    public $idList;
    public $classList;
    
    public function __construct(){

        $this->idList    = new stdClass();
        $this->classList = new stdClass();
    }
}

class ApiBackMenuItem {

    public $id;
    public $url;
    public $label;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    
    public function __construct($url, $label, $nodeName, $labelName, $accessMode, $show) {

        $this->id          = $labelName.'-'.$nodeName;
        $this->url        = $url;
        $this->label      = $label;
        $this->nodeName   = $nodeName;
        $this->labelName  = $labelName;
        $this->accessMode = $accessMode;
        $this->show       = $show;
    }
}

class ApiBackMenuList {

    public $id;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    public $menuItemList = array();
    
    public function __construct($nodeName, $labelName, $accessMode, $show) {

        $this->id          = $labelName.'-'.$nodeName;
        $this->nodeName    = $nodeName;
        $this->labelName   = $labelName;
        $this->accessMode  = $accessMode;
        $this->show = $show;
    }

    public function menuItemListAdd($url, $label, $nodeName, $labelName, $accessMode, $show) {
         
        $id                      = $labelName.'-'.$nodeName;
        $this->menuItemList[$id] = new ApiBackMenuItem($url, $label, $nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }

    public function menuItemListAddObj($obj) {
        
        $id                       = $obj->labelName.'-'.$obj->nodeName;
        $this->fieldItemList[$id] = $obj;
        
        return $id;
    }
}

class ApiBackFieldItem {

    CONST FIELD_LIST_PREFIX = 'fieldList_';
    CONST MENU_LIST_PREFIX  = 'menuList_';
    
    public $id;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    public $default;
    public $title;
    public $titleDefault;
    public $urlDefault;
    public $url;
    public $fieldList;
    public $menuList;
     public $ptQuantity;

    public function __construct($nodeName, $labelName, $accessMode, $show) {

        $this->id         = $labelName.'-'.$nodeName;
        $this->nodeName   = $nodeName;
        $this->labelName  = $labelName;
        $this->accessMode = $accessMode;
        $this->show       = $show;
        $this->default    = $labelName;
        
        $this->fieldListCreate(self::FIELD_LIST_PREFIX.$nodeName, self::FIELD_LIST_PREFIX.$labelName, $accessMode, $show);
        $this->menuListCreate(self::MENU_LIST_PREFIX.$nodeName, self::MENU_LIST_PREFIX.$labelName, $accessMode, $show);
    }
    
    public function fieldListCreate($nodeName, $labelName, $accessMode, $show) {
    
        $this->fieldList = new ApiBackFieldList($nodeName, $labelName, $accessMode, $show);
        
        return true;
    }
    
    public function menuListCreate($nodeName, $labelName, $accessMode, $show) {
    
        $this->menuList = new ApiBackMenuList($nodeName, $labelName, $accessMode, $show);
        
        return true;
    }

    public function fieldItemListAdd($nodeName, $labelName, $accessMode, $show) {
        
        $id = $this->fieldList->add($nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }

    public function fieldItemListAddObj($obj) {
        
        $id = $this->fieldList->fieldItemListAddObj($obj);
    
        return $id;
    }

    public function menuItemListAdd($url, $label, $nodeName, $labelName, $accessMode, $show) {
                 
        $id = $this->menuList->add($url, $label, $nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }

    public function menuItemListAddObj($obj) {
        
        $id = $this->menuList->menuListAddObj($obj);
    
        return $id;
    }
}

class ApiBackFieldList {

    public $id;
    public $nodeName;
    public $labelName;
    public $accessMode;
    public $show;
    public $fieldItemList = array();
    
    public function __construct($nodeName, $labelName, $accessMode, $show) {
        
        $this->id          = $labelName.'-'.$nodeName;
        $this->nodeName    = $nodeName;
        $this->labelName   = $labelName;
        $this->accessMode  = $accessMode;
        $this->show        = $show;
    }

    public function fieldItemListAdd($nodeName, $labelName, $accessMode, $show) {
        
        $id                       = $labelName.'-'.$nodeName;
        $this->fieldItemList[$id] = new ApiBackFieldItem($nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }

    public function fieldItemListAddObj($obj) {
        
        $id                       = $obj->labelName.'-'.$obj->nodeName;
        $this->fieldItemList[$id] = $obj;
    
        return $id;
    }
}

class MainDescription {

    public static function get() {
    
        $ApiBack = new ApiBack('fr', 'default', 'v0.0', 'jerecommande.fr', 'JE RECOMMANDE', 'JE RECOMMANDE Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.',
'JE RECOMMANDE Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.',
array('parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage',
'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste',
'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter',
'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre',
'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller',
'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation',
'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre'), '', 'fr', 'index', 'read', 'showVisible');

        return $ApiBack;
    }
}

class MainMenu {
    
    public static function get() {
    
        $menuList = new ApiBackMenuList('siteMenu', 'menuList', 'read', 'showVisible');
        
        $menuList->menuItemListAdd('index.php?menu=profilListMy', 'Profil', 'profilListMy', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=notificationList', 'Notification', 'notificationList', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=contactList', 'Mes contacts', 'contactList', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=portfolioListMy', 'Mon Portfolio', 'portfolioListMy', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=contactAdd', 'Ajouter un contact', 'contactAdd', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=recommandationAdd', 'Ajouter une recommandation', 'recommandationAdd', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=recommandationListMe', 'Personnes qui me recommandent', 'recommandationListMe', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=recommandationListMy', 'Mes recommandations', 'recommandationListMy', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=categoryList', 'Catérogies', 'categoryList', 'link', 'read', 'showVisible');
        $menuList->menuItemListAdd('index.php?menu=avantageList', 'Avantages premium', 'avantageList', 'link', 'read', 'showVisible');
        
        return $menuList;
    }
}

class Field {

    public static function get($parent, $accessMode, $show, $value = false) {
    
        $field = new ApiBackFieldItem($parent.get_class($this), get_class($this), $accessMode, $show);
        
        if($value !== false) {
            
            $field->value = $value;
        }
        return $field;
    }
    public static function remove($obj, $id) {
        
        unset($obj->fieldList->fieldItemList[$id]);
        
        return $obj;
    }
}

class Url extends Field {

    public static function get($parent, $accessMode, $show, $url) {
        
        $field      = new ApiBackFieldItem($parent.get_class($this), get_class($this), $accessMode, $show);        
        $field->url = $url;
        
        return $field;
    }
}

class ScriptUpload extends Field {

    public static function get($parent, $accessMode, $show) {
    
        $field      = parent::get($parent, $accessMode, $show);
        $urlScript  = 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/js/'.$parent.get_class($this).'.js';
        $field->url = $urlScript;
    
        return $field;
    }
}

class Image extends Field {
    
    public $urlId;
    public $scriptUploadId;
    
    public static function get($parent, $accessMode, $show, $url) {
        
        $field                = parent::get($parent, $accessMode, $show);
        $url                  = Url::get(get_class($this), $accessMode, $show, $url);
        $scriptUpload         = ScriptUpload::get(get_class($this), 'read', 'showVisible');                              
        $this->urlId          = $field->fieldItemListAddObj($url);
        $this->scriptUploadId = $field->fieldItemListAddObj($scriptUpload);
        
        return $field;
    }
}

class Name extends Field {

}

class Surname extends Field {
    
}

class Title extends Field {
    
}

class Email extends Field {
    
}

class Category extends Field {
    
}

class Mdp extends Field {

}


class MdpConfirm extends Field {

}

class ActionButton extends Field {
    
    public $actionButtonConfirmId;
    
    public static function get($parent, $accessMode, $show, $value, $confirm = false) {
    
        $field = parent::get($parent, $accessMode, $show, $value);
        
        if($confirm !== false) {
         
            $actionButtonConfirm         = ActionButtonConfirm::get(get_class($this), $accessMode, 'showNone', $confirm);            
            $this->actionButtonConfirmId = $field->fieldItemListAddObj($actionButtonConfirm);
        }        
        return $field;
    }
}

class ActionButtonConfirm extends ActionButton {

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

class FieldList {
    
    public static function get($parent, $accessMode, $show) {
         
        $list = new ApiBackFieldList($parent.get_class($this), get_class($this), $accessMode, $show);
        
        return $list;
    }
    public static function remove($obj, $id) {
        
        unset($obj->fieldItemList[$id]);
        
        return $obj;
    }
    public static function valueSet($obj, $id, $value) {
        
        $obj->fieldItemList[$id]->value = $value;
        
        return $obj;
    }
    public static function addTo($obj, $id, $objToAdd) {
        
        $obj->fieldItemList[$id]->fieldItemListAddObj($objToAdd);
        
        return $obj;
    }
}

class NotificationList {

    public static function get($parent, $accessMode, $show) {

       $todo = '<div class="list notification">
                                    <div class="item notification my">
                                        <p class="field type recommandationNew my">Nouvelle
                                            recommandation</p>
                                        <p class="field avatar my">Avatar</p>
                                        <p class="field name">Nom</p>
                                        <p class="field surname my">Prénom</p>
                                        <p class="field title my">Titre du profil</p>
                                        <p class="field notificationContent my">Demande de
                                            recommandation</p>
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

class ContactList {

    public static function get($parent, $accessMode, $show) {

        // list profils (3)
    }
}

class PortfolioListMy {

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

class RecommandationListMe {

    public static function get($parent, $accessMode, $show) {

    }
}

class RecommandationListMy {

    public static function get($parent, $accessMode, $show) {

    }
}

class CategoryList {

    public static function get($parent, $accessMode, $show) {

    }
}

class AvantageList {

    public static function get($parent, $accessMode, $show) {

    }
}

class Profil extends FieldList {
    
    public $recommandationOnActionButtonParamList     = array('showNone', 'RECOMMANDER');
    public $recommandationOffActionButtonParamList    = array('showNone', 'DERECOMMANDER', 'CONFIRMER SUPPRESSION DE LA RECOMMANDATION');
    public $contactAddActionButtonParamList           = array('showNone', 'AJOUTER AUX CONTACTS');
    public $contactRemoveActionButtonParamList        = array('showNone', 'SUPPRIMER DES CONTACTS', 'CONFIRMER LA SUPPRESSION DU CONTACT');
    public $recommandationAcceptActionButtonParamList = array('showNone', 'ACCEPTER LA RECOMMANDATION');
    public $contactAskAcceptActionButtonParamList     = array('showNone', 'ACCEPTER LA MISE EN CONTACT');
    public $saveActionButtonParamList                 = array('showVisible', 'CREER UN COMPTE');
    public $separateActionButtonParamList             = array('showNone', 'DISSOCIER LE COMPTE', 'CONFIRMER LA DISSOCIATION DU COMPTE');    
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

    public static function get($parent, $accessMode, $show) {
         
        $profil                                   = parent::get($parent, $accessMode, $show);
        $urlAvatar                                = 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/media/'.get_class($this).'.png';
        $image                                    = Image::get(get_class($this), $accessMode, $show, $urlAvatar);
        $name                                     = Name::get(get_class($this), $accessMode, $show);
        $surname                                  = Surname::get(get_class($this), $accessMode, $show);
        $title                                    = Title::get(get_class($this), $accessMode, $show);
        $email                                    = Email::get(get_class($this), $accessMode, $show);
        $mdp                                      = Mdp::get(get_class($this), $accessMode, $show);
        $mdpConfirm                               = MdpConfirm::get(get_class($this), $accessMode, $show);
        $recommandationOnActionButton             = RecommandationOnActionButton::get(get_class($this), $accessMode, $this->recommandationOnActionButtonParamList[0], $this->recommandationOnActionButtonParamList[1]);
        $recommandationOffActionButton            = RecommandationOffActionButton::get(get_class($this), $accessMode, $this->recommandationOffActionButtonParamList[0], $this->recommandationOffActionButtonParamList[1], $this->recommandationOffActionButtonParamList[2]);
        $contactAddActionButton                   = ContactAddActionButton::get(get_class($this), $accessMode, $this->contactAddActionButtonParamList[0], $this->contactAddActionButtonParamList[1]);
        $contactRemoveActionButton                = ContactRemoveActionButton::get(get_class($this), $accessMode, $this->contactRemoveActionButtonParamList[0], $this->contactRemoveActionButtonParamList[1], $this->contactRemoveActionButtonParamList[2]);
        $recommandationAcceptActionButton         = RecommandationAcceptActionButton::get(get_class($this), $accessMode, $this->recommandationAcceptActionButtonParamList[0], $this->recommandationAcceptActionButtonParamList[1]);
        $contactAskAcceptActionButton             = ContactAskAcceptActionButton::get(get_class($this), $accessMode, $this->contactAskAcceptActionButtonParamList[0], $this->contactAskAcceptActionButtonParamList[1]);
        $saveActionButton                         = SaveActionButton::get(get_class($this), $accessMode, $this->saveActionButtonParamList[0], $this->saveActionButtonParamList[1]);
        $separateActionButton                     = SeparateActionButton::get(get_class($this), $accessMode, $this->separateActionButtonParamList[0], $this->separateActionButtonParamList[1], $this->separateActionButtonParamList[2]);
        $category                                 = Category::get(get_class($this), $accessMode, $show);
        $notificationList                         = NotificationList::get(get_class($this), $accessMode, $show);
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
        $this->notificationListId                 = $profil->fieldItemListAddObj($notificationList);
        $this->contactListId                      = $profil->fieldItemListAddObj($contactList);
        $this->portfolioListMyId                  = $profil->fieldItemListAddObj($portfolioListMy);
        $this->contactAddId                       = $profil->fieldItemListAddObj($contactAdd);
        $this->recommandationAddId                = $profil->fieldItemListAddObj($recommandationAdd);
        $this->recommandationListMeId             = $profil->fieldItemListAddObj($recommandationListMe);
        $this->recommandationListMyId             = $profil->fieldItemListAddObj($recommandationListMy);
        $this->categoryListId                     = $profil->fieldItemListAddObj($categoryList);
        $this->avantageListId                     = $profil->fieldItemListAddObj($avantageList);

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

}

class ProfilConnected extends ProfilIntern {
    
    public $saveActionButtonParamList = array('showVisible', 'METTRE A JOUR LE COMPTE UN COMPTE');
    
    public static function get($parent, $accessMode, $show) {
           
        $field = parent::get($parent, $accessMode, $show);
        $field = self::valueSet($field, $this->nameId, 'Nicolas');
        $field = self::valueSet($field, $this->surnameId, 'Cantu');
        $field = self::valueSet($field, $this->titleId, 'Particulier à la recherche d\'un peintre');
        $field = self::valueSet($field, $this->emailId, 'nicolas.cantu@instriit.com');
    
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

class ProfilGoogle extends Profil {

    public $saveActionButtonParamList     = array('showNone', 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE GOOGLE+');
    public $separateActionButtonParamList = array('showVisible', 'DISSOCIER LE COMPTE GOOGLE+', 'CONFIRMER LA DISSOCIATION DU COMPTE GOOGLE+');
}

class ProfilFacebook extends Profil {

    public $saveActionButtonParamList     = array('showVisible', 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE FACEBOOK');
    public $separateActionButtonParamList = array('showNone', 'DISSOCIER LE COMPTE FACEBOOK', 'CONFIRMER LA DISSOCIATION DU COMPTE FACEBOOK');
}

class ProfilLinledIn extends Profil {

    public $saveActionButtonParamList     = array('showVisible', 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE LINKEDIN');
    public $separateActionButtonParamList = array('showNone', 'DISSOCIER LE COMPTE LINKEDIN', 'CONFIRMER LA DISSOCIATION DU COMPTE LINKEDIN');
}

class ProfilTwitter extends Profil {

    public $saveActionButtonParamList     = array('showVisible', 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE TWITTER');
    public $separateActionButtonParamList = array('showNone', 'DISSOCIER LE COMPTE TWITTER', 'CONFIRMER LA DISSOCIATION DU COMPTE TWITTER');
}

class ProfilPinterest extends Profil {

    public $saveActionButtonParamList     = array('showVisible', 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE PINTEREST');
    public $separateActionButtonParamList = array('showNone', 'DISSOCIER LE COMPTE PINTEREST', 'CONFIRMER LA DISSOCIATION DU COMPTE PINTEREST');
}

class ProfilInstagram extends Profil {

    public $saveActionButtonParamList     = array('showVisible', 'VOUS CONNECTER SANS FORMULAIRE VIA VOTRE COMPTE INSTAGRAM');
    public $separateActionButtonParamList = array('showNone', 'DISSOCIER LE COMPTE INSTAGRAM', 'CONFIRMER LA DISSOCIATION DU COMPTE INSTAGRAM');
}

class ProfilListMy {
    
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

        $fieldItem                 = new ApiBackFieldItem($parent.get_class($this), get_class($this), $accessMode, $show);    
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