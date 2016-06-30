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
    
    public function __construct($setUp = false) {
    
        if($setUp === true) {
             
            $this->setUp();
        }
    }
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
        // @todo $res = $this->graphRequestContext($domain, $lang, $versionConf);
        $res                                 = new stdClass();
        $res->context                        = new stdClass();
        $res->context->keywordListValue      = array('MES', 'BONS', 'TUYAUX', 'parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
        $res->context->descriptionLongValue  = 'MES BONS TUYAUX Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
        $res->context->descriptionShortValue = 'MES BONS TUYAUX Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
        $res->context->titleValue            = 'MES BONS TUYAUX';
        $res->context->lang                  = 'fr';
        $res->context->version               = 'v0.0';
        $res->context->domain                = 'homeMesBonsTuyaux.fr';

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