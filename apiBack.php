<?php 

trait TraitFake {

    public $fake = true;

    public function fakeGetId($prefix = 'fake') {

        return $prefix.$this->fakeId;
    }
}
class ResSiteFake {

    use TraitFake;
    
    public $id;
    public $userLoginPublic;
    public $avantageMax;
    public $show;
    public $accessMode;
    public $langValueDefault;
    public $keywordListValue;
    public $descriptionLongValue;
    public $descriptionShortValue;
    public $titleValue;
    public $domainValueDefault;
    public $semanticValueDefault;
    public $themeValueDefault;
    public $versionConfValueDefault;
    
    public static function __construct() {
        
        $id                            = $this->fakeGetId();    
        $this->userLoginPublic         = 'ncantu@instriit.com';
        $this->avantageMax             = 'AvantageBusiness';
        $this->show                    = 'showVisible';
        $this->accessMode              = 'read';
        $this->langValueDefault        = 'fr';
        $this->keywordListValue        = array('parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
        $this->descriptionLongValue    = 'JE RECOMMANDE Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
        $this->descriptionShortValue   = 'JE RECOMMANDE Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
        $this->titleValue              = $id;
        $this->domainValueDefault      = 'jerecommande.fr';
        $this->semanticValueDefault    = 'fr';
        $this->themeValueDefault       = 'default';
        $this->versionConfValueDefault = 'v0.0';
    }
}
class ResSiteFake1 extends ResSiteFake {
    
    public $fakeId = 1;
}
class ResSiteFake2 extends ResSiteFake {
    
    public $fakeId = 2;
}
class ResSiteFake3 extends ResSiteFake {
    
    public $fakeId = 3;
}
class ResSiteFake4 extends ResSiteFake {
    
    public $fakeId = 4;
}

class PortFolioFake extends PortFolio {
    
    use TraitFake;

    public static function __construct($labelName, $accessMode, $show, $title) {
    
        parent::__construct($labelName, $accessMode, $show, $title);
    
        $id    = $this->fakeGetId();
        $title = $id.' title';
        
        $this->itemTitleSet($title);
        $this->itemImageSet($title, $this->url);
    }
}
class PortFolioFake1 extends PortFolioFake {
    
    public $fakeId = 1;
}
class PortFolioFake2 extends PortFolioFake {
    
    public $fakeId = 2;
}
class PortFolioFake3 extends PortFolioFake {
    
    public $fakeId = 3;
}
class PortFolioFake4 extends PortFolioFake {
    
    public $fakeId = 4;
}
class ResToken {

    use TraitFake;
    
    public $token;
    
    public static function __construct() {
    
        $this->token = 'sdlmfsmdfs,sd,lfm,s';
    }
}
class ResToken1 extends ResToken {
    
    public $fakeId = 1;
}
class ResToken2 extends ResToken {
    
    public $fakeId = 2;
}
class ResToken3 extends ResToken {
    
    public $fakeId = 3;
}
class ResToken4 extends ResToken {
    
    public $fakeId = 4;
}
class ResContextFake {

    use TraitFake;
    
    public $keywordListValue;
    public $descriptionLongValue;
    public $descriptionShortValue;
    public $titleValue;

    public static function __construct($labelName, $accessMode, $show, $title) {

        $id = $this->fakeGetId();
        
        $this->keywordListValue      = array('parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
        $this->descriptionLongValue  = 'JE RECOMMANDE Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
        $this->descriptionShortValue = 'JE RECOMMANDE Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
        $this->titleValue            = $id;
    }
}
class ResContextFake1 extends ResContextFake {

    public $fakeId = 1;
}
class ResContextFake2 extends ResContextFake {

    public $fakeId = 2;
}
class ResContextFake3 extends ResContextFake {

    public $fakeId = 3;
}
class ResContextFake4 extends ResContextFake {

    public $fakeId = 4;
}
class RecommandationFake extends Recommandation {

    use TraitFake;
    
    public static function __construct($labelName, $accessMode, $show, $title) {
    
        parent::__construct($labelName, $accessMode, $show, $title);
    
        $id    = $this->fakeGetId();
        $title = $id.' title';
        
        $this->itemTitleSet($title);
    }
}
class RecommandationFake1 extends RecommandationFake {

    public $fakeId = 1;
}
class RecommandationFake2 extends RecommandationFake {

    public $fakeId = 2;
}
class RecommandationFake3 extends RecommandationFake {

    public $fakeId = 3;
}
class RecommandationFake4 extends RecommandationFake {

    public $fakeId = 4;
}
class ProfilFake extends Profil {
    
    use TraitFake;

    public static function __construct($labelName, $accessMode, $show, $notificationList = true) {
    
        parent::__construct($labelName, $accessMode, $show, $notificationList);
    
        $id = $this->fakeGetId();
        
        $this->itemNameSet($id.' name');
        $this->itemSurnameSet($id.' surname');
        $this->itemTitleSet($id.' title');
        $this->itemEmailSet($id.'@instriit.com');
    }
}
class ProfilFake1 extends ProfilFake {
    
    public $fakeId = 1;
}
class ProfilFake2 extends ProfilFake {
    
    public $fakeId = 2;
}
class ProfilFake3 extends ProfilFake {
    
    public $fakeId = 3;
}
class ProfilFake4 extends ProfilFake {
    
    public $fakeId = 4;
}
class TokenFake extends Token {

    use TraitFake;
    
    public static function __construct($labelName, $accessMode, $show, $notificationList = true) {
    
        parent::__construct($labelName, $accessMode, $show, $notificationList);
    
        $id = $this->fakeGetId();
    
        $this->itemNameSet($id.' name');
        $this->itemSurnameSet($id.' surname');
        $this->itemTitleSet($id.' title');
        $this->itemEmailSet($id.'@instriit.com');
    }
}

Trait TraitGraph {
    
    private $graphRequestTagToken                  = '{token}';
    private $graphRequestTagAvantageMax            = '{avantageMax}';
    private $graphRequestTagUserLoginPublic        = '{userLoginPublic}';
    private $graphRequestTagShowValueDefault       = '{showValueDefault}';
    private $graphRequestTagAccessModeValueDefault = '{accessModeValueDefault}';
    private $graphRequestTagThemeValueDefault      = '{themeValueDefault}';
    private $graphRequestTagSemanticValueDefault   = '{semanticValueDefault}';
    private $graphRequestTagDomainValueDefault     = '{domainValueDefault}';
    private $graphRequestTagLangValueDefault       = '{langValueDefaul}';
    private $graphRequestTagNodeName               = '{nodeName}';   
    private $graphRequestTagAttributName           = '{attributName}';  
    private $graphRequestTagAvantageMaxFilter      = '{avantageMaxFilter}';
    private $graphRequestTagUserLoginPublicFilter  = '{userLoginPublicFilter}';
    private $graphRequestTagSemanticListFiltere    = '{qemanticListFiltere}';
    private $graphRequestTagThemeListFilter        = '{themeListFilter}';
    private $graphRequestTagDomainListFilter       = '{domainListFilter}';
    private $graphRequestTagLangListFilter         = '{langListFilter}';
    private $graphRequestTagAccessModeListFilter   = '{accessModeListFilter}';
    private $graphRequestGet                       = ''; // @todo
    private $graphRequestContext                   = ''; // @todo
    private $graphRequestTokenCreate               = ''; // @todo
    private $graphRequestTokenVerif                = ''; // @todo
    private $graphRequestTokenRenew                = ''; // @todo
    private $graphRequestTextGet                   = ''; // @todo
    
    private function graphRequestGet() { 
        
        // @todo
        $verif = $this->graphRequestTokenVerif($this->graphTokenVerif);
        
        if(empty($verif) === true) {
         
            return false;
        }
        // @todo
        $fake        = new stdClass();
        $fake->token = $this->graphRequestTokenRenew();
        
        $res = $this->graphRequest($this->graphRequestGet);
        
        // @todo
        $res = new ResSiteFake1();
                
        return $res;
    } 
    private function graphRequestTokenVerif() {

        $res = $this->graphRequest($this->graphTokenVerif);
        
        // @todo
        $res = new ResToken1();
        
        return $res;
    }
    private function graphRequestTokenRenew() {

        $res = $this->graphRequest($this->graphTokenRenew);
        
        // @todo
        $res = new ResToken1();
        
        return $res;
    } 
    private function graphRequestTokenCreate() {
        
        $res = $this->graphRequest($this->graphTokenCreate);
        
        // @todo
        $res = new ResToken1();
        
        return $res;
    }    
    private function graphRequestContext() {
        
        // @todo
        $fake        = new stdClass();
        $fake->token = $this->graphRequestTokenCreate();
        
        $res = $this->graphRequest($this->graphRequestContext);
        
        // @todo        
        $res = new ResContextFake1();
        
        return $fake;
    } 
    private function graphTextGet() {
                
        // @todo
        $res = $this->graphRequest($this->graphRequestTextGet);
        
        // @todo
        $fake = $this->value;
        
        
        return $fake;
    }    
    private function graphRequest($request) {
        
        $request = $this->graphRequestTemplace($request);
        
        // @todo
        $res = true;
        
        return $res;
    }    
    private function graphRequestTemplace($request) {
        
        $request = str_replace($this->graphRequestTagToken, Token::$token, $request);
        $request = str_replace($this->graphRequestTagAvantageMax, Token::$avantageMax, $request);
        $request = str_replace($this->graphRequestTagUserLoginPublic, Token::$userLoginPublic, $request);
        $request = str_replace($this->graphRequestTagShowValueDefault, Token::$showValueDefault, $request);
        $request = str_replace($this->graphRequestTagAccessModeValueDefault, Token::$accessModeValueDefault, $request);
        $request = str_replace($this->graphRequestTagThemeValueDefault, Token::$themeValueDefault, $request);
        $request = str_replace($this->graphRequestTagSemanticValueDefault, Token::$semanticValueDefault, $request);
        $request = str_replace($this->graphRequestTagDomainValueDefault, Token::$domainValueDefault, $request);
        $request = str_replace($this->graphRequestTagLangValueDefault, Token::$langValueDefault, $request);
        $request = str_replace($this->graphRequestTagAvantageMaxFilter, $this->filter->avantageMaxFilter, $request);
        $request = str_replace($this->graphRequestTagUserLoginPublicFilter, $this->filter->userLoginPublicFilter, $request);
        $request = str_replace($this->graphRequestTagSemanticListFiltere, $this->filter->semanticListFilter, $request);
        $request = str_replace($this->graphRequestTagThemeListFilter, $this->filter->themeListFilter, $request);
        $request = str_replace($this->graphRequestTagDomainListFilter, $this->filter->domainListFilter, $request);
        $request = str_replace($this->graphRequestTagLangListFilter, $this->filter->langListFilter, $request);
        $request = str_replace($this->graphRequestTagAccessModeListFilter, $this->filter->accessModeListFilter, $request);
        
        return $request;
    }
}
class Request {
    
    static function requestVal($tag) {
    
        if(isset($_REQUEST[$tag]) === true && empty($_REQUEST[$tag]) === false && $_REQUEST[$tag] !== false ) {
    
            $val = $_REQUEST[$tag];
            $val = filter_var($val, FILTER_UNSAFE_RAW, FILTER_FLAG_ENCODE_HIGH);
            	
            return $val;
        }
        return false;
    }
}
class Filter {
 
    public $attributList              = array();
    public $avantageMaxFilter         = 'all';
    public $userLoginPublicFilter     = 'all'; 
    public $semanticListFilter        = 'all';
    public $themeListFilter           = 'all';
    public $domainListFilter          = 'all';
    public $langListFilter            = 'all';
    public $accessModeListFilter      = 'all';
    
    public function set($attributName, $attributValue) {
        
        $this->attributList[$attributName] = $attributValue;
    }
}
class AvantageMax extends Field {
}
class UserLoginPublic extends Field {
}
class Token extends Field {
        
    CONST TAG                               = 'PM_token';
    
    public static $token                    = false;    
    public static $avantageMax              = false;
    public static $userLoginPublic          = 'anonymous';
    public static $showValueDefault         = 'showNone';
    public static $accessModeValueDefault   = 'read';
    public static $themeValueDefault        = 'default';
    public static $semanticValueDefault     = 'default';
    public static $domainValueDefault;
    public static $langValueDefault;
    public static $keywordListValue;
    public static $descriptionLongValue;
    public static $descriptionShortValue;
    public static $titleValue;
    public static $versionConfValueDefault;
    public static $title;
    public static $descriptionShort;
    public static $descriptionLong;
    public static $versionConf;
    public static $domainList;
    public static $keywordList;
    public static $lang;
    public static $accessModeList;
    public static $showList;
    
    public function __construct(){

        $res = $this->get();
        
        if($res === false) {
            
            $res = $this->getContext();
        
            if($res === false) {
             
                return false;
            }        
            $this->configure($res);
        }
        $this->configure($res);
    }
    public function configure($res) {
        
        self::$avantageMax      = new AvantageMax($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->avantageMax);
        self::$userLoginPublic  = new UserLoginPublic($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->userLoginPublic);
        self::$title            = new SiteTitle($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->titleValue);
        self::$lang             = new Lang($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->langValueDefault);
        self::$descriptionShort = new SiteDescriptionShort($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->descriptionShortValue);
        self::$descriptionLong  = new SiteDescriptionLong($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->descriptionLongValue);
        self::$versionConf      = new VersionConfList($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->versionConfValueDefault);
        self::$semanticList     = new SemanticList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$themeList        = new ThemeList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$domainList       = new DomainList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$keywordList      = new KeywordList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$langList         = new LangList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$accessModeList   = new AccessModeList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$showList         = new ShowList($res->nodeName, $res->accessModeDefault, $res->showDefault);
        $semantic               = New Semantic($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->semanticValueDefault);
        $theme                  = New Theme($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->themeValueDefault);
        $domain                 = New Domain($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->domainValueDefault);
        $accessMode             = New AccessMode($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->accessModeValueDefault);
        $show                   = New Domain($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->showValueDefault);
        
        self::$semanticList->add($semantic);
        self::$themeList->add($theme);
        self::$domainList->add($domain);
        self::$accessModeList->add($accessMode);
        self::$showList->add($show);
        self::$keywordList->keywordListToImportSet($res->keywordListValue);
        self::$keywordList->keywordListToImport();
        
        self::$token = $res->token;
        
        return true;
    }    
    public function getContext(){
        
        $this->domainValueDefault = Request::requestVal(Domain::TAG);            
        
        if($this->domainValueDefault === false) {
             
                return false;
        }     
        $this->langValueDefault = Request::requestVal(LANG::TAG);           
        
        if($this->langValueDefault === false) {
             
                return false;
        }     
        $this->versionConfValueDefault = Request::requestVal(VersionConf::TAG);           
        
        if($this->versionConfValueDefault === false) {
             
                return false;
        }
        $res                         = $this->graphRequestContext();
        $this->keywordListValue      = $res->keywordListValue;
        $this->descriptionLongValue  = $res->descriptionLongValue;
        $this->descriptionShortValue = $res->descriptionShortValue;
        $this->titleValue            = $res->titleValue;        
        self::$token                 = $res->token;
        
        return $this;        
    }
    public function get(){
        
        $res = Request::requestVal(self::TAG);
        $res = $this->graphRequestGet();        
        
        if($res === false) {
             
            return false;
        }        
        return $res;   
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
    
    use TraitGraph;

    public $id;
    public $value;
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
    public $filter;
    public $actionButtonRemove        = false;
    public $actionButtonEdit          = false;
    public $actionButtonDetail        = false;
    public $ctionButtonUpdate         = false;
    public $fake                      = false;    
    public $actionButtonItemTools     = false;
    public $actionButtonItemToolsEdit = false;
    
    public function __construct($labelName, $accessMode = 'read', $show = 'showVisible', $value = false) {

        $nodeName           = get_class($this);
        $this->id           = $labelName.'-'.$nodeName;
        $this->nodeName     = $nodeName;
        $this->labelName    = $labelName;
        $this->accessMode   = $accessMode;
        $this->show         = $show;
        
        $this->filterSet();

        if($value !== false) {
            
            $this->valueSet($value);
        }
        $this->actionButtonItemToolsRemove();
        $this->actionButtonItemToolsEditRemove();
        
        if($this->actionButtonItemTools  === true) {
            
            $this->actionButtonItemToolsAdd();
        }
        if($this->actionButtonItemToolsEdit  === true) {
            
            $this->actionButtonItemToolsEditAdd();
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
    public function actionButtonItemToolsAdd() {
        
        $this->actionButtonRemoveAdd();
        $this->actionButtonEditAdd();
        $this->actionButtonDetailAdd();
        
        return true;
    }  
    public function actionButtonItemToolsEditAdd() {
        
        $this->actionButtonUpdateAdd();
        $this->actionButtonDetailAdd();
        
        return true;
    } 
    public function actionButtonItemToolsEditRemove() {
        
        $this->actionButtonUpdateRemove();
        $this->actionButtonDetailRemove();
        
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
    public function actionButtonUpdateRemove() {

        $this->actionButtonUpdate = false;
        
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
        
        $this->actionButtonDetail = new ActionButtonDetail($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;       
    }
    public function actionButtonUpdateAdd() {
        
        $this->actionButtonUpdate = new ActionButtonUpdate($this->microserviceTemplate->labelName, $this->microserviceTemplate, $this->show); 
        
        return true;       
    }
    public function microserviceSet($microserviceLabelName, $microserviceAccessMode, $microserviceShow) {
        
        $token              = new Token();
        $filter             = $this->filterSet($token);        
        $this->microservice = new Microservice($microserviceLabelName, $microserviceAccessMode, $microserviceShow, $filter, $token);
        
        return true;
    }   
    public function filterSet() {
        
        $this->filter = new Filter();
        
        return true;
    }
}
class FieldList extends Field {

    public $itemList                        = array();    
    public $actionButtonAdd                 = false;
    public $actionButtonNext                = false;
    public $actionButtonPrec                = false;
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
        
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
        $this->actionButtonItemToolsCrudRemove();
        $this->actionButtonItemToolspaginationRemove();
        
        if($this->actionButtonItemToolsCrud  === true) {
            
            $this->actionButtonItemToolsCrudAdd();
        }
        if($this->actionButtonItemToolsPagination  === true) {
            
            $this->actionButtonItemToolsPaginationAdd();
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
    public function actionButtonItemToolsCrudRemove() {
        
        $this->actionButtonAddRemove();
        
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
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class TextList extends FieldList {

    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class Text extends Field {
    
    public $valueListState        = false;

    public function __construct($labelName, $accessMode, $show, $value) {
        
        parent::__construct($labelName, $accessMode, $show, $value);
        
        if(get_class($this) !== __CLASS__) {
            
            $textList = new TextList($this->nodeName, $accessMode, $show);
            $text     = new Text($this->nodeName, $accessMode, $show, $value);
            
            $text->translate();
            $textList->add($text, $this);                    
            $this->valueSet($textList);
            
            $this->valueListState = true;
        }
    }  
    public function translate() {
                
        $value = $this->graphTextGet();
        
        if($value === false) {
        
            return false;
        }
        $this->valueSet($value);
                
        return true;
    }
}
class ActionButton extends FieldList {

    public $show                            = 'showNone';
    public $confirm                         = false;
    public $microserviceLabelName           = false;
    public $microserviceAccessMode          = 'read';
    public $microserviceShow                = 'showNone';
    public $confirmButton                   = false;
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
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
    
    public $value   = 'CONFIRMER';
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
    
    public $value                  = 'AJOUTER';
    public $microserviceAccessMode = 'create';
}
class ActionButtonEdit extends ActionButtonItemToolCrud {

    public $value                  = 'METTRE A JOUR';
    public $microserviceAccessMode = 'update';
}
class ActionButtonUpdate extends ActionButtonEdit {
    
    public $value                  = 'METTRE A JOUR';
}
class ActionButtonDetail extends ActionButtonItemToolCrud {
    
    public $value                  = 'LIRE';
    public $microserviceAccessMode = 'read';
}
class ActionButtonRemove extends ActionButtonItemToolCrud {

    public $value                  = 'REFUSER';
    public $microserviceAccessMode = 'stateFalse';
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
    
    public $value              = 'SUIVANT';
    public $microservicelenght = 20;
}
class ActionButtonPrec extends ActionButtonPagination {
    
    public $value              = 'PRECEDENT';
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
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class VersionConf extends Field {
    
    CONST TAG = 'PM_versionConf';
}
class VersionConfList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class Domain extends Text {
    
    CONST TAG = 'PM_domain';
}
class DomainList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
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
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    
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
    
    CONST TAG = 'PM_lang';
}
class LangList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class AccessMode extends Field {
}
class AccessModeList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
}
class Show extends Field {
}
class ShowList extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
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

    public $title                           = '';
    public $text                            = '';
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;
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
class ActionButtonMenuItemPortfolioListMy extends ActionButtonMenuItem {

    public $value                  = 'VOIR LE PORTFOLIO';
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
    
    public $value                  = 'VOIR LES RECOMMANDATIONS';
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
class ActionButtonMenuItemRecommandationListMy extends ActionButtonMenuItem {
    
    public $value                  = 'VOIR MES RECOMMANDATIONS';
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

    public function __construct($labelName, $show, $url) {
        
        parent::__construct($labelName, 'read', $show);        
        
        $this->url = $url;
    }
}
trait TraitMedia {
    
    public function mediaJsUrlGet (){
        
        return 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/js/'.$this->nodeName.'.js';
    }
    public function mediaImageUrlGet (){
        
        return 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/image/'.$this->nodeName.'.png';
    }
    public function mediaCssUrlGet (){
        
        return 'http://'.ApiBack::$cloneDescription->domain.'/'.ApiBack::$cloneDescription->siteName.'/css/'.$this->nodeName.'.png';
    }
}
class ScriptUpload extends Field {
    
    use TraitMedia;

    public function __construct($labelName, $show) {
    
        parent::__construct($labelName, 'read', $show);
        
        $this->url = $this->mediaJsUrlGet();
    }
}
class Image extends Field {
    
    public $url;
    public $scriptUpload;
    
    public function __construct($labelName, $accessMode, $show, $url) {
        
        parent::__construct($labelName, $accessMode, $show);
        
        $this->url          = new Url($this->nodeName, $show, $url);        
        $this->scriptUpload = new ScriptUpload($this->nodeName, 'showVisible');
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
    
    public static function __construct($labelName, $accessMode, $show, $title) {

        parent::__construct($labelName, $accessMode, $show);
        
        $url           = $this->mediaImageUrlGet();
        $title         = new PortFolioTitle($this->nodeName, $this->accessMode, $this->show, $title);        
        $this->titleId = $title->id;
        $image         = new PortFolioImage($this->nodeName, $this->accessMode, $this->show, $url);
        $this->imageId = $image->id;
        
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

    public static function __construct($labelName, $accessMode, $show) {
    
        parent::__construct($labelName, $accessMode, $show);
        
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
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = true;

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

    public static function __construct($labelName, $accessMode, $show, $notificationList = true) {
         
        $profil                                   = parent::__construct($labelName, $accessMode, $show);
        $urlAvatar                                = $this->mediaCssUrlGet();
        $image                                    = new ProfilImage($this->nodeName, $accessMode, $show, $urlAvatar);
        $this->imageId                            = $image->id;
        $name                                     = new ProfilName($this->nodeName, $accessMode, $show);
        $this->nameId                             = $name->id;
        $surname                                  = new ProfilSurname($this->nodeName, $accessMode, $show);
        $this->accessModeId                       = $surname->id;
        $title                                    = new ProfilTitle($this->nodeName, $accessMode, $show);
        $this->titleId                            = $title->id;
        $email                                    = new ProfilEmail($this->nodeName, $accessMode, $show);
        $this->emailId                            = $email->id;
        $mdp                                      = new ProfilMdp($this->nodeName, $accessMode, $show);
        $this->mdpId                              = $mdp->id;
        $mdpConfirm                               = new ProfilMdpConfirm($this->nodeName, $accessMode, $show);
        $this->mdpConfirmId                       = $mdpConfirm->id;
        $recommandationOnActionButton             = new ActionButtonAddRecommandation($this->nodeName);
        $this->recommandationOnActionButtonId     = $recommandationOnActionButton->id;
        $recommandationOffActionButton            = new ActionButtonRemoveRecommandation($this->nodeName);
        $this->recommandationOffActionButtonId    = $recommandationOffActionButton->id;
        $contactAddActionButton                   = new ActionButtonAddContact($this->nodeName);
        $this->nameId                             = $contactAddActionButton->id;
        $contactRemoveActionButton                = new ActionButtonRemoveContact($this->nodeName);
        $this->contactRemoveActionButtonId        = $contactRemoveActionButton->id;
        $recommandationAcceptActionButton         = new ActionButtonAcceptRecommandation($this->nodeName);
        $this->recommandationAcceptActionButtonId = $recommandationAcceptActionButton->id;
        $recommandationRefuseActionButton         = new ActionButtonRefuseRecommandation($this->nodeName);
        $this->recommandationRefuseActionButtonId = $recommandationRefuseActionButton->id;
        $contactAskAcceptActionButton             = new ActionButtonAcceptContact($this->nodeName);
        $this->contactAskAcceptActionButtonId     = $contactAskAcceptActionButton->id;
        $contactAskRefuseActionButton             = new ActionButtonRefuseContact($this->nodeName);
        $this->contactAskRefuseActionButtonId     = $contactAskRefuseActionButton->id;
        $saveActionButton                         = new ProfilSaveActionButton($this->nodeName);
        
        $saveActionButton->valueSet($this->saveActionButtonValue);
        $saveActionButton->showSet($this->saveActionButtonValue);
        
        $this->saveActionButtonId = $saveActionButton->id;
        $separateActionButton     = new ProfilSeparateActionButton($this->nodeName);
        
        $separateActionButton->valueSet($this->separateActionButtonValue);
        $separateActionButton->showSet($this->separateActionButtonShow);
        $separateActionButton->confirmButton->valueSet($this->separateActionButtonConfirmValue);
        
        $this->separateActionButtonId = $separateActionButton->id;
        $category                     = new ProfilCategory($this->nodeName, $accessMode, $show);
        $this->categoryId             = $category->id;
        $contactAdd                   = new ActionButtonAddContact($this->nodeName, $accessMode, $show);
        $this->contactAddId           = $contactAdd->id;
        $recommandationAdd            = new ActionButtonAddRecommandation($this->nodeName, $accessMode, $show);
        $this->recommandationAddId    = $recommandationAdd->id;
        $recommandationListMy         = new RecommandationListMy($this->nodeName, $accessMode, $show);
        $this->recommandationListMyId = $recommandationListMy->id;
        $categoryList                 = new CategoryList($this->nodeName, $accessMode, $show);
        $this->categoryListId         = $categoryList->id;
        $avantageList                 = new AvantageList($this->nodeName, $accessMode, $show);
        $this->avantageListId         = $avantageList->id;
        
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

            $notificationList = new NotificationList($this->nodeName, $accessMode, $show);
            
            $this->add($notificationList);
        }
        return $profil;
    }
    public function contactListGet() {
        
        $list = new ContactList($this->nodeName, $this->accessMode, $this->show);
        
        $list->actionButtonItemToolsPaginationAdd();
        $list->actionButtonItemToolsAdd();
        
        $fake1 = new ProfilFake1($this->nodeName, $this->accessMode, $this->show, false);
        $fake2 = new ProfilFake2($this->nodeName, $this->accessMode, $this->show, false);
        $fake3 = new ProfilFake3($this->nodeName, $this->accessMode, $this->show, false);
        $fake4 = new ProfilFake4($this->nodeName, $this->accessMode, $this->show, false);
        
        $list->add($fake1);
        $list->add($fake2);
        $list->add($fake3);
        $list->add($fake4);
        
        $this->contactListId = $list->id;
        
        $this->add($list);
        
        return true;
    }
    public function portfolioListGet() {

        $list = new PortfolioListMy($this->nodeName, $this->accessMode, $this->show);
        
        $list->actionButtonItemToolsPaginationAdd();
        $list->actionButtonItemToolsAdd();
        
        $fake1 = new PortFolioFake1($this->nodeName, $this->accessMode, $this->show);
        $fake2 = new PortFolioFake2($this->nodeName, $this->accessMode, $this->show);
        $fake3 = new PortFolioFake3($this->nodeName, $this->accessMode, $this->show);
        $fake4 = new PortFolioFake4($this->nodeName, $this->accessMode, $this->show);
        
        $list->add($fake1);
        $list->add($fake2);
        $list->add($fake3);
        $list->add($fake4);
        
        $this->portfolioListMyId = $list->id;

        $this->add($list);
        
        return true;
    }
    public function recommandationListMeGet() {
        
        $list  = new RecommandationListMe($this->nodeName, $this->accessMode, $this->show);

        $fake1 = new RecommandationFake1($this->nodeName, $this->accessMode, $this->show);
        $fake2 = new RecommandationFake2($this->nodeName, $this->accessMode, $this->show);
        $fake3 = new RecommandationFake3($this->nodeName, $this->accessMode, $this->show);
        $fake4 = new RecommandationFake4($this->nodeName, $this->accessMode, $this->show);
        
        $list->add($fake1);
        $list->add($fake2);
        $list->add($fake3);
        $list->add($fake4);        
        
        $this->recommandationListMeId = $list->id;
        
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

class NotificationRecommandationNew extends Notification {
    
    use TraitMedia;
    
    public $title = 'Demande de recommandation';
    public $text  = 'Demande de recommandation';
    
    public function __construct($labelName, $accessMode, $show) {
        
        parent::__construct($labelName, $accessMode, $show);
        
        $urlIcon                                  = $this->mediaImageUrlGet();        
        $notificationTitle                        = new NotificationTitle($this->nodeName, 'read', $show, $this->title);
        $notificationIcon                         = new NotificationImage($this->nodeName, 'read', $show, $urlIcon);
        $notificationProfil                       = new ProfilAvantagePersonnal($this->nodeName, 'read', $show, 1, false); // fake
        $notificationTexte                        = new NotificationText($this->nodeName, 'read', $show, $this->text);
        $notificationRecommandationOnActionButton = new NotificationRecommandationOnActionButton($this->nodeName, $accessMode);
        
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

    public function __construct($labelName, $accessMode, $show) {
    
        parent::__construct($labelName, $accessMode, $show);
        
       $list                  = parent::get($parent, $accessMode, $show);       
       $notification1         = NotificationRecommandationNew::get(get_class($this), $accessMode, $show);
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

    public function __construct($labelName, $accessMode, $show) {
    
        parent::__construct($labelName, $accessMode, $show);
              
        $profilListMy         = new ProfilListMy($this->nodeName, $accessMode, $show);  
        $this->profilListMyId = $profilListMy->id;
        
        $this->add($profilListMy);
    }
}

class Page extends FieldList {
    
    public $actionButtonItemToolsCrud       = false;
    public $actionButtonItemToolsPagination = false;
    
    public function __construct($labelName, $accessMode, $show) {
        
        parent::__construct($labelName, $accessMode, $show);     
        
        $token = new Token();
        
        if($token->value === false) {
            
            return  false;
        }  
        $mainMenu    = new MainMenu($this->nodeName, $accessMode, $show);
        $mainContent = new MainContent($this->nodeName, $accessMode, $show);
        
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
    
    public function __construct($id, $text, $theme, $dataIntegration, $domain, $siteName, 
        $descriptionLong, $descriptionShort, $keyWordList, $googleVerify, $nodeName, $labelName, $accessMode, $show) {

        $this->id         = $labelName.'-'.$nodeName;
        $this->cssContent = new ApiBackClassList();
        
        
    }
}

?>