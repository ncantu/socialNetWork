<?php 

class TokenFake extends Token {

    use TraitFake;

    public static function setUp($labelName, $accessMode, $show, $title) {

        parent::setUp($labelName, $accessMode, $show, $title);

        $id                            = $this->fakeGetId();
        $this->userLoginPublic         = 'ncantu@instriit.com';
        $this->avantageMax             = 'AvantageBusiness';
        $this->show                    = 'showVisible';
        $this->accessMode              = 'read';
        $this->langValueDefault        = 'fr';
        $this->keywordListValue        = array('parrainage', 'recommandation', 'professionnel', 'confiance', 'réseaux', 'proches', 'amis', 'entourage', 'artisans', 'services', 'entretien', 'dépannage', 'travaux', 'maison', 'santé', 'bricolage', 'jardinage', 'plomberie', 'électricité', 'chauffage', 'serrure', 'voiture', 'mécanique', 'conseiller financier', 'juridique', 'avocat', 'droit', 'Santé', 'médecin', 'kiné', 'ostéopathe', 'gastro-entérologue', 'dentiste', 'ophtalmologiste', 'pédiatre', 'podologue', 'diététicien', 'psychiatre', 'psychologue', 'gynécologue', 'acupuncteur', 'ORL', 'Bien-être', 'Esthéticienne', 'Coiffeur', 'Prof de fitness', 'yoga', 'Enfants', 'Pédiatre', 'baby-sitter', 'aide scolaire', 'Animaux', 'Vétérinaire', 'éleveur', 'toilettiste', 'pet-sitter', 'Dépannage', 'plombier', 'serrurier', 'électricien', 'mécanicien', 'chauffagiste', 'garagiste', 'Maisons', 'architecte', 'maçon', 'carreleur', 'peintre', 'plombier', 'serrurier', 'électricien', 'décorateur', 'ramoneur', 'jardinier', 'pépiniériste', 'fenêtres', 'toiture', 'piscine(s)', 'parquets', 'cuisiniste', 'charpentier', 'ébéniste', 'Juridique', 'Notaire', 'avocat', 'conseiller', 'juridique', 'syndic', 'obsèques', 'Finance', 'Agent d’assurance', 'Conseiller en Gestion de Patrimoine', 'Agent immobilier', 'Expert-comptable', 'Expert fiscal', 'Evènements', 'Wedding planner', 'traiteur', 'DJ', 'sonorisation', 'éclairage', 'photographe', 'fleuriste', 'musicien', 'orchestre');
        $this->descriptionLongValue    = 'JE RECOMMANDE Référencement et moteur de recherches de prestataires basé sur les recommandations de votre entourage.';
        $this->descriptionShortValue   = 'JE RECOMMANDE Plateforme de référencement et moteur de recherches de prestataires dans le domaine des services basé sur les recommandations de votre entourage. Vos proches peuvent ainsi sélectionner les professionnels que vous parrainez et vice versa.';
        $this->titleValue              = $id;
        $this->domainValueDefault      = 'jerecommande.fr';
        $this->semanticValueDefault    = 'fr';
        $this->themeValueDefault       = 'default';
        $this->versionConfValueDefault = 'v0.0';
    }
}

?>