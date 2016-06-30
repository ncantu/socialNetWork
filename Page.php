<?php 

require_once 'lib/Request.php';
require_once 'lib/Token.php';
require_once 'lib/Filter.php';
require_once 'lib/Conf.php';
require_once 'lib/Attribut.php';
require_once 'lib/Relationship.php';
require_once 'lib/Node.php';

$_REQUEST[Token::TAG_DOMAIN]  = 'mesbonstuyaux';
$_REQUEST[Token::TAG_LANG]    = 'fr';
$_REQUEST[Token::TAG_VERSION] = 'v0.0';
$token                        = new Token(true);
$filter                       = new Filter(true);
$conf                         = new Conf(true);
$page                         = new Node(false, Conf::$main);
$confProfilButton             = $conf;
$confProfilButton->nodeName   = 'profil';
$confProfilButton->title      = 'Nicolas Cantu';

$page->listMicroserviceAdd($confProfilButton, Filter::$me);

$filterConf->accessModeListAdd('stateUpdate');

$confNotificationButton           = $conf;
$confNotificationButton->nodeName = 'notification';
$confNotificationButton->title    = 'Notifications';

$page->listMicroserviceAdd($confNotificationButton, Filter::$me);

$confContactButton           = $conf;
$confContactButton->nodeName = 'contact';
$confContactButton->title    = 'Contacts';

$page->listMicroserviceAdd($confContactButton, Filter::$share);

$confRecommandationButton           = $conf;
$confRecommandationButton->nodeName = 'recommandation';
$confRecommandationButton->title    = 'Recommandations';

$page->listMicroserviceAdd($confRecommandationButton, Filter::$share);

$confCategoryButton           = $conf;
$confCategoryButton->nodeName = 'category';
$confCategoryButton->title    = 'Categories';

$page->listMicroserviceAdd($confCategoryButton, Filter::$share);

$confLegalButton           = $conf;
$confLegalButton->nodeName = 'legal';
$confLegalButton->title    = 'Legal';

$page->listMicroserviceAdd($confLegalButton, Filter::$share);

$confGeneralConditionButton           = $conf;
$confGeneralConditionButton->nodeName = 'generalConditions';
$confLegalButton->title               = 'General conditions';

$page->listMicroserviceAdd($confLegalButton, Filter::$share);


// @todo list profils
ProfilDisconnected
ProfilConnected
ProfilAvantagePersonnal
ProfilAvantagePersonna2
ProfilAvantageBusiness1
ProfilAvantageBusiness2
ProfilSocial
ProfilSocialGoogle
ProfilSocialFacebook
ProfilSocialLinkedIn
ProfilSocialTwitter
ProfilSocialPinterest
ProfilSocialInstagram
ProfilSocialViadeo



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