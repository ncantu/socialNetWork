<?php 

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

    public function setUp(){

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
    public static function userLoginPrivateGet(){
         
        $filter                        = new Filter();
        $filter->userLoginPublicFilter = Token::$userLoginPublic;
        $request                       = new GraphUserLoginPrivateGet();
        $res                           = $request->graphRequest($filter);

        return $res;
    }
    public function configure($res) {

        self::$avantageMax      = new AvantageMax();
        self::$userLoginPublic  = new UserLoginPublic();
        self::$title            = new SiteTitle();
        self::$lang             = new Lang();
        self::$descriptionShort = new SiteDescriptionShort();
        self::$descriptionLong  = new SiteDescriptionLong();
        self::$versionConf      = new VersionConfList();
        self::$semanticList     = new SemanticList();
        self::$themeList        = new ThemeList();
        self::$domainList       = new DomainList();
        self::$keywordList      = new KeywordList();
        self::$langList         = new LangList();
        self::$accessModeList   = new AccessModeList();
        self::$showList         = new ShowList();
        $semantic               = New Semantic();
        $theme                  = New Theme();
        $domain                 = New Domain();
        $accessMode             = New AccessMode();
        $show                   = New Domain();

        self::$avantageMax->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->avantageMax);
        self::$userLoginPublic->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->userLoginPublic);
        self::$title->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->titleValue);
        self::$lang->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->langValueDefault);
        self::$descriptionShort->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->descriptionShortValue);
        self::$descriptionLong->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->descriptionLongValue);
        self::$versionConf->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->versionConfValueDefault);
        self::$semanticList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$themeList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$domainList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$keywordList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$langList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$accessModeList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        self::$showList->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault);
        $semantic->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->semanticValueDefault);
        $theme->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->themeValueDefault);
        $domain->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->domainValueDefault);
        $accessMode->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->accessModeValueDefault);
        $show->setUp($res->nodeName, $res->accessModeDefault, $res->showDefault, $res->showValueDefault);

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

?>