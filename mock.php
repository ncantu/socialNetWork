<?php 

class ApiResultClassList {

    public $idList;
    public $classList;
    
    public function __construct(){

        $this->idList    = new stdClass();
        $this->classList = new stdClass();
    }
}

class ApiResultMenuItem {

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

class ApiResultMenuList {

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
        $this->menuItemList[$id] = new ApiResultMenuItem($url, $label, $nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }
}

class ApiResultFieldItem {

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

    public function __construct($nodeName, $labelName, $accessMode, $show) {

        $this->id          = $labelName.'-'.$nodeName;
        $this->nodeName    = $nodeName;
        $this->labelName   = $labelName;
        $this->accessMode  = $accessMode;
        $this->show        = $show;       
    }
    
    public function fieldListCreate($nodeName, $labelName, $accessMode, $show) {
    
        $this->fieldList = new ApiResultFieldList($nodeName, $labelName, $accessMode, $show);
        
        return true;
    }
    
    public function menuListCreate($nodeName, $labelName, $accessMode, $show) {
    
        $this->menuList = new ApiResultMenuList($nodeName, $labelName, $accessMode, $show);
        
        return true;
    }

    public function fieldItemListAdd($nodeName, $labelName, $accessMode, $show) {

        $id = $labelName.'-'.$nodeName;
        
        $this->fieldList->add($nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }

    public function menuItemListAdd($url, $label, $nodeName, $labelName, $accessMode, $show) {
         
        $id = $labelName.'-'.$nodeName;
        
        $this->menuList->add($url, $label, $nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }
}

class ApiResultFieldList {

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
        $this->fieldItemList[$id] = new ApiResultFieldItem($nodeName, $labelName, $accessMode, $show);
    
        return $id;
    }
}

class ApiResult {

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
    
    public static function genStdSample() {
        
        $apiResult = new ApiResult('fr', 'default', 'v0.0', 'jerecommande.fr', 'JE RECOMMANDE', 'JE RECOMMANDE Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.', 
'JE RECOMMANDE Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.',
array('parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage',
'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste',
'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter',
'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre',
'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller',
'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation',
'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre'), '', 'fr', 'index', 'read', 'showVisible');
        
        $apiResult->menuList = new ApiResultMenuList('siteMenu', 'menuList', 'read', 'showVisible');
        
        $apiResult->menuList->menuItemListAdd('index.php?menu=profilListMy', 'Profil', 'profilListMy', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=notificationList', 'Notification', 'notificationList', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=contactList', 'Mes contacts', 'contactList', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=portfolioListMy', 'Mon Portfolio', 'portfolioListMy', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=contactAdd', 'Ajouter un contact', 'contactAdd', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=recommandationAdd', 'Ajouter une recommandation', 'recommandationAdd', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=recommandationListMe', 'Personnes qui me recommandent', 'recommandationListMe', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=recommandationListMy', 'Mes recommandations', 'recommandationListMy', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=categoryList', 'Catérogies', 'categoryList', 'link', 'read', 'showVisible');
        $apiResult->menuList->menuItemListAdd('index.php?menu=avantageList', 'Avantages premium', 'avantageList', 'link', 'read', 'showVisible');
        
        $apiResult->fieldList = new ApiResultFieldList('contentField', 'listList', 'read', 'showVisible');
        
        $id = $apiResult->fieldList->fieldItemListAdd('profilListMy', 'profilList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemList[$id]->fieldListCreate('disconnected', 'fieldList', 'create', 'showVisible'); // disconnected
        
        $idItem = $apiResult->fieldList->fieldItemList[$id]->fieldItemListAdd('create', 'profil', 'create', 'showVisible'); // avatar field
        
        $apiResult->fieldList->fieldItemList[$id]->fieldItemList[$idItem]->url = 'http://'.$this->domain.'/'.$this->siteName.'/media/profilCreate.png';
        

        "default": "",
        "title":"",
        "titleDefault":"",
        "urlDefault": "",
        "url": "http://{domain}/media/profilCreate.png",
        "fieldList": {
        "image": {
        "nodeName": "create",
        "labelName": "avatar",
        "accessMode": "create",
        "default": "",
        "value":"",
        "show": "showNone"
        },
        "script": {
        "nodeName": "avatar",
        "labelName": "upload",
        "accessMode": "read",
        "show": "showVisible"
        }
        },
        
        $apiResult->fieldList->fieldItemList[$id]->fieldItemListAdd($nodeName, $labelName, $accessMode, $show);
        $apiResult->fieldList->fieldItemList[$id]->fieldItemListAdd($nodeName, $labelName, $accessMode, $show);
        $apiResult->fieldList->fieldItemList[$id]->fieldItemListAdd($nodeName, $labelName, $accessMode, $show);
        $apiResult->fieldList->fieldItemList[$id]->fieldItemListAdd($nodeName, $labelName, $accessMode, $show);
        
     $toto='"avatar":{
                    "nodeName": "create",
                    "labelName": "avatar",
                    "accessMode": "create",
                    "default": "",
                    "title":"",
                    "titleDefault":"",
                    "urlDefault": "",
                    "url": "http://{domain}/media/profilCreate.png",
                    "fieldList": {
                        "image": {
                            "nodeName": "create",
                            "labelName": "avatar",
                            "accessMode": "create",
                            "default": "",
                            "value":"",
                            "show": "showNone"
                        },
                        "script": {
                            "nodeName": "avatar",
                            "labelName": "upload",
                            "accessMode": "read",
                            "show": "showVisible"
                        }                      
                    },
                    "show": "showVisible"
                }, 
                "name":{
                    "nodeName": "create",
                    "labelName": "name",
                    "accessMode": "create",
                    "default": "Name",
                    "value":"",
                    "show": "showVisible"
                },   
                "surname":{
                    "nodeName": "create",
                    "labelName": "surname",
                    "accessMode": "create",
                    "default": "Surname",
                    "value":"",
                    "show": "showVisible"
                },   
                "title":{
                    "nodeName": "create",
                    "labelName": "title",
                    "accessMode": "create",
                    "default": "Title",
                    "value":"",
                    "show": "showVisible"
                },   
                "recommandationOnActionButton":{
                    "nodeName": "create",
                    "labelName": "recommandationOnActionButton",
                    "accessMode": "create",
                    "value":"RECOMMANDER",
                    "show": "showNone"
                },     
                "recommandationOffActionButton":{
                    "nodeName": "create",
                    "labelName": "recommandationOffActionButton",
                    "accessMode": "create",
                    "value":"DERECOMMANDER",
                    "show": "showNone",
                    "fieldList": {
                        "confirm":{
                            "nodeName": "create",
                            "labelName": "confirm",
                            "accessMode": "create",
                            "value":"CONFIRMER SUPPRESSION DE LA RECOMMANDATION",
                            "show": "showNone"
                        } 
                    }
                },
                "contactAddActionButton":{
                    "nodeName": "create",
                    "labelName": "contactAddActionButton",
                    "accessMode": "create",
                    "value":"AJOUTER AUX CONTACTS",
                    "show": "showNone"
                },
                "contactRemoveActionButton":{
                    "nodeName": "create",
                    "labelName": "contactRemoveActionButton",
                    "accessMode": "create",
                    "value":"SUPPRIMER DES CONTACTS",
                    "show": "showNone"
                },
                "contactRemoveActionButtonConfirm":{
                    "nodeName": "create",
                    "labelName": "contactRemoveActionButtonConfirm",
                    "accessMode": "create",
                    "value":"CONFIRMER LA SUPPRESSION DU CONTACT",
                    "show": "showNone",
                    "confirm":{
                        "nodeName": "create",
                        "labelName": "confirm",
                        "accessMode": "create",
                        "value":"ACCEPTER LA RECOMMANDATION",
                        "show": "showNone"
                    } 
                },
                "recommandationAcceptActionButton":{
                    "nodeName": "create",
                    "labelName": "recommandationAcceptActionButton",
                    "accessMode": "create",
                    "value":"ACCEPTER LA RECOMMANDATION",
                    "show": "showNone"
                },
                "contactAskAcceptActionButton":{
                    "nodeName": "create",
                    "labelName": "contactAskAcceptActionButton",
                    "accessMode": "create",
                    "value":"ACCEPTER LA MISE EN CONTACT",
                    "show": "showNone"
                },
                "saveActionButton":{
                    "nodeName": "create",
                    "labelName": "saveActionButton",
                    "accessMode": "create",
                    "value":"CREER UN COMPTE",
                    "show": "showVisible"
                }  ';
                
        $apiResult->fieldList->fieldItemListAdd('notificationList', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('contactList', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('portfolioListMy', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('contactAdd', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('recommandationAdd', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('recommandationListMe', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('recommandationListMy', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('categoryList', 'fieldList', 'read', 'showVisible');
        
        $apiResult->fieldList->fieldItemListAdd('avantageList', 'fieldList', 'read', 'showVisible');
        
        
        echo json_encode($apiResult);

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
        $this->cssContent = new ApiResultClassList();
        
        
    }
}

?>