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

Token::$context->keywordListValue      = array('MES', 'BONS', 'TUYAUX', 'parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
Token::$context->descriptionLongValue  = 'MES BONS TUYAUX Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
Token::$context->descriptionShortValue = 'MES BONS TUYAUX Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
Token::$context->titleValue            = 'MES BONS TUYAUX';
Token::$context->lang                  = 'fr';
Token::$context->version               = 'v0.0';
Token::$context->domain                = 'homeMesBonsTuyaux.fr';

new Filter(true);
new Conf(true);

$page                       = new Node(false, Conf::$main);
$confProfilButton           = Conf::$main;
$confProfilButton->nodeName = 'profil';
$confProfilButton->title    = 'Nicolas Cantu';

$page->listMicroserviceAdd($confProfilButton, Filter::$me);

$confNotificationButton           = Conf::$main;
$confNotificationButton->nodeName = 'notification';
$confNotificationButton->title    = 'Notifications';

$page->listMicroserviceAdd($confNotificationButton, Filter::$me);

$confContactButton           = Conf::$main;
$confContactButton->nodeName = 'contact';
$confContactButton->title    = 'Contacts';

$page->listMicroserviceAdd($confContactButton, Filter::$share);

$confRecommandationButton           = Conf::$main;
$confRecommandationButton->nodeName = 'recommandation';
$confRecommandationButton->title    = 'Recommandations';

$page->listMicroserviceAdd($confRecommandationButton, Filter::$share);

$confCategoryButton           = Conf::$main;
$confCategoryButton->nodeName = 'category';
$confCategoryButton->title    = 'Categories';

$page->listMicroserviceAdd($confCategoryButton, Filter::$share);

$confLegalButton           = Conf::$main;
$confLegalButton->nodeName = 'legal';
$confLegalButton->title    = 'Legal';

$page->listMicroserviceAdd($confLegalButton, Filter::$share);

$confGeneralConditionButton           = Conf::$main;
$confGeneralConditionButton->nodeName = 'generalConditions';
$confLegalButton->title               = 'General conditions';

$page->listMicroserviceAdd($confLegalButton, Filter::$share);

// @todo list profils
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