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

new Token(true);

Token::$context->keywordListValue         = array('MES', 'BONS', 'TUYAUX', 'parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
Token::$context->descriptionLongValue     = 'MES BONS TUYAUX Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
Token::$context->descriptionShortValue    = 'MES BONS TUYAUX Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
Token::$context->titleValue               = 'MES BONS TUYAUX';
Token::$context->lang                     = 'fr';
Token::$context->version                  = 'v0.0';
Token::$context->domain                   = 'homeMesBonsTuyaux.fr';
Token::$profil->nameFull                  = 'Nicolas Cantu';
Token::$profil->title                     = 'Expert des bons tuyaux';
Token::$profil->publicId                  = 'sdfkjsdgn';
Token::$profil->name                      = 'Cantu';
Token::$profil->surname                   = 'Nicolas';
Token::$profil->email                     = 'nicolas.cantu@instriit.com';
Token::$profil->nodeName                  = Token::$profil->publicId;
Token::$profil->avaltageList              = array();
Token::$profil->avaltageList[0]->category = 'plombier';

new Filter(true);
new Conf(true);

$page                       = new Node(false, Conf::$main);
$confProfilButton           = Conf::$main;
$confProfilButton->nodeName = 'profil';
$confProfilButtonTitle      = 'SE CONNECTER';

if(isset(Token::$profil->nameFull) === true) {
    
    $confProfilButton->title = Token::$profil->nameFull;    
}
$page->profilMicroserviceList($confProfilButton, Filter::$me);

$confNotificationButton           = Conf::$main;
$confNotificationButton->nodeName = 'notification';
$confNotificationButton->title    = 'Notifications';

$page->notificationMicroserviceList($confNotificationButton, Filter::$me);

$confContactButton           = Conf::$main;
$confContactButton->nodeName = 'contact';
$confContactButton->title    = 'Contacts';

$page->contactMicroserviceList($confContactButton, Filter::$share);

$confRecommandationButton           = Conf::$main;
$confRecommandationButton->nodeName = 'recommandation';
$confRecommandationButton->title    = 'Recommandations';

$page->recommandationMicroserviceList($confRecommandationButton, Filter::$share);

$confCategoryButton           = Conf::$main;
$confCategoryButton->nodeName = 'category';
$confCategoryButton->title    = 'Categories';

$page->categoryMicroserviceList($confCategoryButton, Filter::$share);

$confLegalButton           = Conf::$main;
$confLegalButton->nodeName = 'legal';
$confLegalButton->title    = 'Legal';

$page->legalMicroserviceList($confLegalButton, Filter::$share);

$confGeneralConditionButton           = Conf::$main;
$confGeneralConditionButton->nodeName = 'generalCondition';
$confLegalButton->title               = 'General conditions';

$page->generalConditionMicroserviceList($confLegalButton, Filter::$share);

// @todo list profils
$confProfil                         = Conf::$main;
$confProfil->title                  = 'SE CONNECTER';
$confProfil->name                   = '';
$confProfil->surname                = '';
$confProfil->title                  = '';
$confProfil->email                  = '';
$confProfil->mdp                    = '';
$confProfil->mdpConfirm             = '';
$confProfil->category               = false;
$confProfil->nodeName               = 'DISCONNECTED';
$confProfil->labelName              = 'Profil';
$confProfil->lang                   = $token::$context->lang;
$confProfil->descriptionLong        = false;
$confProfil->descriptionShort       = false;
$confProfil->auditState             = true;
$confProfil->editableState          = false;
$confProfil->detailState            = false;
$confProfil->childPaginationState   = false;
$confProfil->childEditableState     = false;
$confProfil->childDetailState       = true;
$confProfil->favoriteActionState    = true;
$confProfil->loveActionState        = true;
$confProfil->followActionState      = true;
$confProfil->shareActionState       = true;
$confProfil->shareInternActionState = true;
$confProfil->pdfActionState         = true;
$confProfil->printActionState       = true;
$confProfil->listActionState        = false;
$confProfil->showDefault            = 'showVisible';
$confProfil->accessModeDefault      = 'read';
$confProfil->versionConfDefault     = 'all';
$confProfil->themeDefault           = 'all';
$confProfil->semanticDefault        = 'all';
$confProfil->domainDefault          = 'all';
$confProfil->avantageConfDefault    = 'all';
$confProfil->keywordListValue       = array();

if(Token::$profil === false) {

    $confProfilDisconnected                         = $confProfil;
    $confProfilDisconnected->title                  = 'SE CONNECTER';
    $confProfilDisconnected->nodeName               = 'DISCONNECTED';
    $confProfilDisconnected->accessModeDefault      = 'create';
    $confProfilDisconnected->editableState          = true;
    $confProfilDisconnected->childEditableState     = true;
    $confProfilDisconnected->childDetailState       = true;
    $confProfilDisconnected->favoriteActionState    = false;
    $confProfilDisconnected->loveActionState        = false;
    $confProfilDisconnected->followActionState      = false;
    $confProfilDisconnected->shareActionState       = false;
    $confProfilDisconnected->shareInternActionState = false;
    $confProfilDisconnected->pdfActionState         = false;
    $confProfilDisconnected->printActionState       = false;
    
    $page->childListAdd(null, $confProfilDisconnected);
}
else {

    $confProfilConnected                         = array_merge($confProfil, Token::$profil);
    $confProfilConnected->accessModeDefault      = 'update';
    $confProfilConnected->editableState          = true;
    $confProfilConnected->childEditableState     = true;
    $confProfilConnected->childDetailState       = true;
    $confProfilConnected->shareActionState       = true;
    $confProfilConnected->shareInternActionState = true;
    $confProfilConnected->pdfActionState         = true;
    $confProfilConnected->printActionState       = true;
           
    $childId = $page->childListAdd(null, $confProfilConnected);    
    $child   = $page->childListGet($childId);
    
    $child->notificationMicroserviceList($confNotificationButton, Filter::$me);
    $child->contactMicroserviceList($confContactButton, Filter::$me);
    $child->recommandationMicroserviceList($confRecommandationButton, Filter::$me);   
}
foreach(Token::$profil->avantageList as $avantage) {
    
    $child->listAvantageAdd($avantage);
    
    $child->listCategoryAdd($avantage->category);
    
    $confProfilAvantage = $confProfilConnected;
     
    $childId = $page->childListAdd(null, $confProfilAvantage);
    $child   = $page->childListGet($childId);
    
    $child->notificationMicroserviceList($confNotificationButton, Filter::$me);
    $child->contactMicroserviceList($confContactButton, Filter::$me);
    $child->recommandationMicroserviceList($confRecommandationButton, Filter::$me);
}


/* $avantage1                                  = Conf::$main;
 * 
 * 
    $portfolio1                                 = Conf::$main;
 */
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
 /*

// @todo ProfilDisconnected
// @todo ProfilConnected
// @todo ProfilAvantagePersonnal
// @todo ProfilAvantagePersonna2
// @todo ProfilAvantageBusiness1
// @todo ProfilAvantageBusiness2
// @todo ProfilSocial
// @todo ProfilSocialGoogle
// @todo ProfilSocialFacebook
// @todo ProfilSocialLinkedIn
// @todo ProfilSocialTwitter
// @todo ProfilSocialPinterest
// @todo ProfilSocialInstagram
// @todo ProfilSocialViadeo

?>