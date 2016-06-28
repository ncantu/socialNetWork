<?php 

class Token {

    CONST TAG                   = 'PM_token';
    CONST TAG_DOMAIN            = 'PM_token_domain';
    CONST TAG_LANG              = 'PM_token_lang';
    CONST TAG_VERSION           = 'PM_token_versionConf';
    
    public static $token        = false;
    public static $userPublicId = false;
    public static $profil;
    public static $context;

    public function setUp(){

        $res = $this->get();

        if($res === false) {

            $res = $this->getContext();

            if($res === false) {
                 
                return false;
            }
            $this->configure($res);
        }
        return $this->configure($res);
    }
    public function configure($res) {

        self::$profil       = $res->profil;
        self::$userPublicId = $res->userPublicId;
        self::$context      = $res->context;
        self::$token        = $res->token;

        return true;
    }
    public function getContext(){

        $domain = Request::requestVal(self::TAG_DOMAIN);

        if($domain === false) {
             
            return false;
        }
        $lang = Request::requestVal(self::TAG_LANG);

        if($lang === false) {
             
            return false;
        }
        $versionConf = Request::requestVal(self::TAG_VERSION);

        if($versionConf === false) {
             
            return false;
        }
        $res = $this->graphRequestContext($domain, $lang, $versionConf);

        return $res;
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