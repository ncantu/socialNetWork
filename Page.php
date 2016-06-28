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

// @todo delete
$token::$context->keywordListValue      = array('MES', 'BONS', 'TUYAUX', 'parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
$token::$context->descriptionLongValue  = 'MES BONS TUYAUX Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
$token::$context->descriptionShortValue = 'MES BONS TUYAUX Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
$token::$context->titleValue            = 'MES BONS TUYAUX';
$token::$context->lang                  = 'fr';
$token::$context->version               = 'v0.0';

$conf                         = new stdClass();
$conf->nodeName               = 'homeMesBonsTuyaux';
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
$page                         = new Node(false, $conf);
$conf                         = new stdClass();
$versionConf                  = new Node(false, $conf);
$conf                         = new stdClass();
$accessMode                   = new Node(false, $conf);
$conf                         = new stdClass();
$show                         = new Node(false, $conf);
$conf                         = new stdClass();
$theme                        = new Node(false, $conf);
$conf                         = new stdClass();
$semantic                     = new Node(false, $conf);
$conf                         = new stdClass();
$domain                       = new Node(false, $conf);
$conf                         = new stdClass();
$score                        = new Node(false, $conf);
$conf                         = new stdClass();
$avantage                     = new Node(false, $conf);
$conf                         = new stdClass();
$right                        = new Node(false, $conf);
$conf                         = new stdClass();
$filter                       = new Node(false, $conf);
$conf                         = new stdClass();
$state                        = new Node(false, $conf);
$conf                         = new stdClass();
$child                        = new Node(false, $conf);
$conf                         = new stdClass();
$emotion                      = new Node(false, $conf);
$conf                         = new stdClass();
$action                       = new Node(false, $conf);

$this->versionConfListAdd($versionConf);
$this->accessModeListAdd($accessMode);
$this->showListAdd($show);
$this->themeListAdd($theme);
$this->semanticListAdd($semantic);
$this->domainListAdd($domain);
$this->scoreListAdd($score);
$this->avantageListAdd($avantage);
$this->rightListAdd($right);
$this->filterListAdd($filter);
$this->stateListAdd($state);
$this->childListAdd($child);
$this->emotionListAdd($emotion);
$this->actionListAdd($action);

foreach($token::$context->keywordListValue as $kw) {

    $conf             = new stdClass();
    $conf->auditState = false;
    $conf->value      = $kw;
    $keyword          = new Node(false, $conf);
    
    $this->keywordListAdd($keyword);
}

?>