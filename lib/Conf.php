<?php

class Conf {
    
    public static $main;

    public function __construct($setUp = false) {
    
        if($setUp === true) {
             
            $this->setUp();
        }
    }
    public function setUp() {
    
        self::$main = self::mainGet();
    }    
    public static function mainGet() {

        $conf                         = new stdClass();
        $conf->nodeName               = $token::$context->domain;
        $conf->labelName              = 'page';
        $conf->title                  = $token::$context->titleValue;
        $conf->fake                   = false;
        $conf->lang                   = $token::$context->lang;
        $conf->descriptionLong        = $token::$context->descriptionLongValue;
        $conf->descriptionShort       = $token::$context->descriptionShortValue;
        $conf->auditState             = true;
        $conf->editableState          = false;
        $conf->detailState            = false;
        $conf->childPaginationState   = false;
        $conf->childEditableState     = false;
        $conf->childDetailState       = false;
        $conf->favoriteActionState    = false;
        $conf->loveActionState        = false;
        $conf->followActionState      = false;
        $conf->shareActionState       = false;
        $conf->shareInternActionState = false;
        $conf->pdfActionState         = false;
        $conf->printActionState       = false;
        $conf->listActionState        = false;
        $conf->showDefault            = 'showVisible';
        $conf->accessModeDefault      = 'read';
        $conf->versionConfDefault     = 'all';
        $conf->themeDefault           = 'all';
        $conf->semanticDefault        = 'all';
        $conf->domainDefault          = 'all';
        $conf->avantageConfDefault    = 'all';
        
        return $conf;
    }
}

?>