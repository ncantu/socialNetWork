<?php
class Token {

    CONST TAG = 'PM_token';

    CONST TAG_DOMAIN = 'PM_token_domain';

    CONST TAG_LANG = 'PM_token_lang';

    CONST TAG_VERSION = 'PM_token_versionConf';

    public static $token = false;

    public static $userPublicId = false;

    public static $profil = false;

    public static $context = false;

    public function __construct($setUp = false) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $setUp);
        
        if ($setUp === true) {
            
            $this->setUp();
        }
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function setUp() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $res = $this->get();
        
        if ($res === false) {
            
            $res = $this->getContext();
            
            if ($res === false) {
                
                return false;
            }
            $this->configure($res);
        }
        $res = $this->configure($res);
        
        return Trace::endValue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    public function configure($res) {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        Trace::startParam(__LINE__, __METHOD__, __CLASS__, $res);
        
        if (isset($res->profil) === true) {
            
            self::$profil = $res->profil;
        }
        if (isset($res->profil) === true) {
            
            self::$userPublicId = $res->userPublicId;
        }
        if (isset($res->profil) === true) {
            
            self::$context = $res->context;
        }
        if (isset($res->profil) === true) {
            
            self::$token = $res->token;
        }
        
        return Trace::endOk(__LINE__, __METHOD__, __CLASS__);
    }

    public function getContext() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $domain = Request::requestVal(self::TAG_DOMAIN);
        
        if ($domain === false) {
            
            return false;
        }
        $lang = Request::requestVal(self::TAG_LANG);
        
        if ($lang === false) {
            
            return false;
        }
        $versionConf = Request::requestVal(self::TAG_VERSION);
        
        if ($versionConf === false) {
            
            return false;
        }
        // @todo $res = $this->graphRequestContext($domain, $lang, $versionConf);
        $res = true;
        
        return Trace::endvalue(__LINE__, __METHOD__, __CLASS__, $res);
    }

    public function get() {

        Trace::start(__LINE__, __METHOD__, __CLASS__);
        
        $res = Request::requestVal(self::TAG);
        // $res = $this->graphRequestGet();
        
        if ($res === false) {
            
            return false;
        }
        return Trace::endvalue(__LINE__, __METHOD__, __CLASS__, $res);
    }
}

?>