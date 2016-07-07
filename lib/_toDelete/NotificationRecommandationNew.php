<?php

class NotificationRecommandationNew extends Notification {
    
    use TraitMedia;
    
    public $title = 'Demande de recommandation';
    public $text  = 'Demande de recommandation';
    
    public function setUp($labelName, $accessMode, $show) {
        
        parent::setUp($labelName, $accessMode, $show);
        
        $urlIcon                                  = $this->mediaImageUrlGet();        
        $notificationTitle                        = new NotificationTitle();
        $notificationIcon                         = new NotificationImage();
        $notificationProfil                       = new ProfilAvantagePersonnal(); // fake
        $notificationTexte                        = new NotificationText();
        $notificationRecommandationOnActionButton = new RecommandationOnActionButton();
        
        $notificationTitle->setUp($this->nodeName, 'read', $show, $this->title);
        $notificationIcon->setUp($this->nodeName, 'read', $show, $urlIcon);
        $notificationProfil->setUp($this->nodeName, 'read', $show, 1, false); // fake
        $notificationTexte->setUp($this->nodeName, 'read', $show, $this->text);
        $notificationRecommandationOnActionButton->setUp($this->nodeName, $accessMode);
        
        $toto = '<div class="item notification my">
        <p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
        <p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER
        
        
        <div
        class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
        vous sur de vouloir dérecommander le profil?</div>
        </p>
        <p class="field contactAddActionButton my edit hidden">AJOUTER
        AUX CONTACTS</p>
        <p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
        DES CONTACTS
        <div
        class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
        vous sur de vouloir supprimer le profil?</div>
        </p>
        
        <p class="field recommandationAcceptActionButton my edit">ACCEPTER</p>
        <p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
        <div class="detail profil"></div>
        </div>
        </div>
        <div class="item notification hidden">
        <p class="field type recommandationAccepted my hidden">Recommandation
        acceptée</p>
        <p class="field avatar my hidden">Avatar</p>
        <p class="field name hidden">Nom</p>
        <p class="field surname my hidden">Prénom</p>
        <p class="field title my hidden">Titre du profil</p>
        <p class="field notificationContent my hidden">Recommandation
        acceptée</p>
        <p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
        <p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER
        
        
        <div
        class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
        vous sur de vouloir dérecommander le profil?</div>
        </p>
        <p class="field contactAddActionButton my edit hidden">AJOUTER
        AUX CONTACTS</p>
        <p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
        DES CONTACTS
        <div
        class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
        vous sur de vouloir supprimer le profil?</div>
        </p>
        
        <p
        class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
        <p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
        <div class="detail profil"></div>
        </div>';
    }
}

?>