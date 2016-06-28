<?php 

require_once 'lib/Request.php';
require_once 'lib/Token.php';
require_once 'lib/Attribut.php';
require_once 'lib/Relationship.php';
require_once 'lib/Node.php';

$_REQUEST[Token::TAG_DOMAIN]            = 'mesbonstuyaux';
$_REQUEST[Token::TAG_LANG]              = 'fr';
$_REQUEST[Token::TAG_VERSION]           = 'v0.0';
$token                                  = new Token();

$token->setUp();

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
$conf->pdfActionIdState       = false;
$conf->printActionIdState     = false;
$conf->showDefault            = 'showVisible';
$conf->accessModeDefault      = 'read';
$conf->versionConfDefault     = 'all';
$conf->themeDefault           = 'all';
$conf->semanticDefault        = 'all';
$conf->domainDefault          = 'all';
$conf->avantageConfDefault    = 'all';
$page                         = new Node(false, $conf);
$conf                         = new stdClass();
$conf->value                  = true;
$state                        = new Node(false, $conf);

$this->stateListAdd($state);

$conf                         = new stdClass();
// @todo list profils
// @todo list menu
$child                        = new Node(false, $conf);

$this->childListAdd($child);

foreach($token::$context->keywordListValue as $kw) {

    $conf             = new stdClass();
    $conf->auditState = false;
    $conf->value      = $kw;
    $keyword          = new Node(false, $conf);
    
    $this->keywordListAdd($keyword);
}

?>