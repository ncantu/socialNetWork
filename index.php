<?php 

$notificationLive = '';

if (isset($_FILES['uploaded_file'])) {
    // Example:
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], "media/" . $_FILES['uploaded_file']['name'])){
        $notificationLive = $_FILES['uploaded_file']['name']. " uploaded ...";
    } else {
        $notificationLive = $_FILES['uploaded_file']['name']. " NOT uploaded ...";
    }
}

?>
<!doctype html>
<html class="no-js" lang="fr">
<head>
<meta charset="UTF-8">
<title>{name}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/knacss.css" media="all">
<link rel="stylesheet" href="css/styles.css" media="all">
<link rel="stylesheet" href="css/default.css" media="all">
</head>
<body>

	<header id="header" role="banner" class="line pam"><img id="logo" > {title}</header>
	<div class="flex-container">
		<aside class="w20 mrs pam aside">
			<nav id="navigation" role="navigation">
				<ul class="pam unstyled">
					{menuList}
				</ul>
			</nav>
		</aside>
		<div id="main" role="main" class="flex-item-fluid pam">
			<div class="list profil my">
				<div class="item profil my">
					{profilList::deconnectedItem}
         		</div>
				<div class="item profil my">
					{profilList::connectedItem}
					<div class="detail profil my">
						<p class="field avatar my edit">Avatar</p>
						<p class="field name my edit">Nom</p>
						<p class="field surname my edit">Prénom</p>
						<p class="field email my edit">Email</p>
						<p class="field telMobile my edit">Tel mobile</p>
						<p class="field title my edit">Titre du profil</p>
						<p class="field avantage my edit">Avantage Particulier</p>
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

						<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field recommandation my hidden">Nombre de
							recommdation à recevoir</p>
						<nav id="navigation" role="navigation">
							<ul class="pam unstyled">
								<li class="pam button listButton avantage">Recevez des
									recommandations</li>
								<li class="pam button listButton portfolio my hidden">Portfolio</li>
								<div class="list portfolio my hidden">
									<div class="item portfolio my hidden">
										<p class="field image my edit hidden">
											<img src="urlImage" title="Title">
										</p>
										<p class="field title edit hidden">title</p>
										<p class="field description edit hidden">description</p>
									</div>
									<div class="item portfolio my edit hidden">
										<p class="field image my edit hidden">
											<img src="urlImage" title="Title">
										</p>
										<p class="field title edit hidden">title</p>
										<p class="field description edit hidden">description</p>
									</div>
								</div>
								<li class="pam button listButton notification">Notifications</li>
								<div class="list notification">
									<div class="item notification my">
										<p class="field type recommandationNew my">Nouvelle
											recommandation</p>
										<p class="field avatar my">Avatar</p>
										<p class="field name">Nom</p>
										<p class="field surname my">Prénom</p>
										<p class="field title my">Titre du profil</p>
										<p class="field notificationContent my">Demande de
											recommandation</p>
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
								</div>
					</div>
					<div class="item notification">
						<p class="field type contactAsk my">Demande de contact</p>
						<p class="field avatar my">Avatar</p>
						<p class="field name">Nom</p>
						<p class="field surname my">Prénom</p>
						<p class="field title my">Titre du profil</p>
						<p class="field notificationContent my">Demande de contact</p>
						<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
						<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

						
						<div
							class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
							vous sur de vouloir dérecommander le profil?</div>
						</p>
						<p class="field contactAddActionButton my edit">AJOUTER AUX
							CONTACTS</p>
						<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
							DES CONTACTS
						<div
							class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
							vous sur de vouloir supprimer le profil?</div>
						</p>

						<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
						<div class="detail profil"></div>
					</div>
					<div class="item notification">
						<p class="field type contactAskAccepted my">Demande de contact
							acceptée</p>
						<p class="field avatar my">Avatar</p>
						<p class="field name">Nom</p>
						<p class="field surname my">Prénom</p>
						<p class="field title my">Titre du profil</p>
						<p class="field notificationContent my">Demande de contact
							acceptée</p>
						<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
						<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

						
						<div
							class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
							vous sur de vouloir dérecommander le profil?</div>
						</p>
						<p class="field contactAddActionButton my edit">AJOUTER AUX
							CONTACTS</p>
						<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
							DES CONTACTS
						<div
							class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
							vous sur de vouloir supprimer le profil?</div>
						</p>

						<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
						<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
						<div class="detail profil"></div>
					</div>
				</div>

				<li class="pam button listButton profil hidden">Personnes qui
					me recommandent
					<div class="list profil"></div>
				</li>
				<li class="pam button listButton recommandation my">Mes
					recommandations
					<div class="list profil"></div>
				</li>
				<li class="pam button listButton param">paramètres
					<div class="list param">
						<div class="item param">
							<p
								class="field notification emailing recommandationNewContact edit">Revevoir
								les alertes mail sur les nouvelles recommandations de mes
								contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing recommandationNew edit">Revevoir
								les alertes mail sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p
								class="field notification emailing recommandationAccepted edit">Revevoir
								les alertes mail sur les acceptations de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification emailing recommandationRenew edit">Etre
								relacné par mail sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p
								class="field notification emailing contactAskAcceptedContact edit">Revevoir
								les alertes mail sur les nouveaux contacts de mes contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing contactAsk edit">Revevoir
								les alertes mail sur les demandes de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing contactAskAccepted edit">Revevoir
								les alertes mail sur les acceptations de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification emailing contactAskRenew edit">Etre
								relancé par mail sur les demandes de contacts</p>
						</div>

						<div class="item param">
							<p class="field notification sms recommandationNewContact edit">Revevoir
								les alertes sms sur les nouvelles recommandations de mes
								contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms recommandationNew edit">Revevoir
								les alertes sms sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification sms recommandationAccepted edit">Revevoir
								les alertes sms sur les acceptations de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification sms recommandationRenew edit">Etre
								relancé par sms sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAskAcceptedContact edit">Revevoir
								les alertes sms sur les nouveaux contacts de mes contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAsk edit">Revevoir
								les alertes sms sur les demandes de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAskAccepted edit">Revevoir
								les alertes sms sur les acceptations de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification sms contactAskRenew edit">Etre
								relancé par sms sur les demandes de contacts</p>
						</div>

						<div class="item param">
							<p
								class="field notification device recommandationNewContact edit">Revevoir
								les alertes device sur les nouvelles recommandations de mes
								contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device recommandationNew edit">Revevoir
								les alertes device sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification device recommandationAccepted edit">Revevoir
								les alertes device sur les acceptations de recommandation</p>
						</div>
						<div class="item param">
							<p class="field notification device recommandationRenew edit">Etre
								relancé par device sur les demandes de recommandation</p>
						</div>
						<div class="item param">
							<p
								class="field notification device contactAskAcceptedContact edit">Revevoir
								les alertes device sur les nouveaux contacts de mes contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device contactAsk edit">Revevoir
								les alertes device sur les demandes de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device contactAskAccepted edit">Revevoir
								les alertes device sur les acceptations de contacts</p>
						</div>
						<div class="item param">
							<p class="field notification device contactAskRenew edit">Etre
								relancé par device sur les demandes de contacts</p>
						</div>

						<div class="item param">
							<p class="field profil gscAcceptActionButton edit">Accepter
								les conditions générales</p>
						</div>
						<div class="item param">
							<p class="field profil profilDeleteActionButton edit">Supprimer
								le profil
							<div
								class="field confirmation profilDeleteActionButtonConfirm hidden">Etes
								vous sur de vouloir surprimer le profil?</div>
							</p>
						</div>
					</div>


				</li>

				</ul>
				</nav>
				<p class="field description my edit">Description du profil</p>
			</div>
		</div>
		<div class="item profil my">
			<p class="field avatar my">Avatar</p>
			<p class="field name">Nom</p>
			<p class="field surname my">Prénom</p>
			<p class="field title my">Titre du profil</p>
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

			<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
			<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
			<div class="detail profil my">
				<p class="field avatar my edit">Avatar</p>
				<p class="field name my edit">Nom</p>
				<p class="field surname my edit">Prénom</p>
				<p class="field email my edit">Email</p>
				<p class="field telMobile my edit">Tel mobile</p>
				<p class="field title" my edit>Titre du profil</p>
				<p class="field avantage my edit">Avantage Professionnel</p>
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

				<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field recommandationNumber my">Nombre de recommdation
					à recevoir</p>
				<nav id="navigation" role="navigation">
					<ul class="pam unstyled">
						<li class="pam button listButton avantage">Recevez des
							recommandations</li>
						<li class="pam button listButton portfolio my">Portfolio</li>
						<div class="list portfolio my">
							<div class="item portfolio my hidden">
								<p class="field image my edit hidden">
									<img src="urlImage" title="Title">
								</p>
								<p class="field title edit hidden">title</p>
								<p class="field description edit hidden">description</p>
							</div>
							<div class="item portfolio my edit hidden">
								<p class="field image my edit hidden">
									<img src="urlImage" title="Title">
								</p>
								<p class="field title edit hidden">title</p>
								<p class="field description edit hidden">description</p>
							</div>
						</div>
						<li class="pam button listButton notification">Notifications</li>
						<div class="list notification">
							<div class="item notification my">
								<p class="field type recommandationNew my">Nouvelle
									recommandation</p>
								<p class="field avatar my">Avatar</p>
								<p class="field name">Nom</p>
								<p class="field surname my">Prénom</p>
								<p class="field title my">Titre du profil</p>
								<p class="field notificationContent my">Demande de
									recommandation</p>
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

							<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
							<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
							<div class="detail profil"></div>
						</div>
			</div>
			<div class="item notification">
				<p class="field type contactAsk my">Demande de contact</p>
				<p class="field avatar my">Avatar</p>
				<p class="field name">Nom</p>
				<p class="field surname my">Prénom</p>
				<p class="field title my">Titre du profil</p>
				<p class="field notificationContent my">Demande de contact</p>
				<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
				<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

				
				<div
					class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
					vous sur de vouloir dérecommander le profil?</div>
				</p>
				<p class="field contactAddActionButton my edit">AJOUTER AUX
					CONTACTS</p>
				<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
					DES CONTACTS
				<div
					class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
					vous sur de vouloir supprimer le profil?</div>
				</p>

				<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
			</div>
			<div class="item notification">
				<p class="field type contactAskAccepted my">Demande de contact
					acceptée</p>
				<p class="field avatar my">Avatar</p>
				<p class="field name">Nom</p>
				<p class="field surname my">Prénom</p>
				<p class="field title my">Titre du profil</p>
				<p class="field notificationContent my">Demande de contact
					acceptée</p>
				<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
				<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

				
				<div
					class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
					vous sur de vouloir dérecommander le profil?</div>
				</p>
				<p class="field contactAddActionButton my edit">AJOUTER AUX
					CONTACTS</p>
				<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
					DES CONTACTS
				<div
					class="field confirmation contactRemoveActionButtonConfirm hidden">Etes
					vous sur de vouloir supprimer le profil?</div>
				</p>
				<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
				<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
				<div class="detail profil"></div>
			</div>
		</div>

		<li class="pam button listButton profil hidden">Personnes qui me
			recommandent
			<div class="list profil"></div>
		</li>
		<li class="pam button listButton recommandation my">Mes
			recommandations
			<div class="list profil"></div>
		</li>
		<li class="pam button listButton param">paramètres</li>
		</ul>
		</nav>
		<p class="field description my edit">Description du profil</p>
	</div>
	</div>
	<div class="item profil my facebook">
		<p class="button social socialConnected facebook my">Compte
			Facebook - Connecté</p>
		<p class="button social socialDisconnectButton facebook my">Dissocier</p>
	</div>
	<div class="item profil my google">
		<p class="button social socialToConnectButton google my">SE
			CONNECTER AVEC SON COMPTE GOOGLE+</p>
	</div>
	</div>
	<div class="list contact my">
		<div class="item contact my">
			<div class="item profil"></div>
		</div>
		<div class="item contact my">
			<div class="item profil"></div>
		</div>
	</div>

	<div class="list portfolio my">
		<div class="item portfolio my hidden">
			<p class="field image my edit hidden">
				<img src="urlImage" title="Title">
			</p>
			<p class="field title edit hidden">title</p>
			<p class="field description edit hidden">description</p>
		</div>
		<div class="item portfolio my edit hidden">
			<p class="field image my edit hidden">
				<img src="urlImage" title="Title">
			</p>
			<p class="field title edit hidden">title</p>
			<p class="field description edit hidden">description</p>
		</div>
	</div>
	<div class="list notification">
		<div class="item notification my">
			<p class="field type recommandationNew my">Nouvelle
				recommandation</p>
			<p class="field avatar my">Avatar</p>
			<p class="field name">Nom</p>
			<p class="field surname my">Prénom</p>
			<p class="field title my">Titre du profil</p>
			<p class="field notificationContent my">Demande de recommandation</p>
			<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER

			
			<div
				class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
				vous sur de vouloir dérecommander le profil?</div>
			</p>
			<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER</p>
			<p class="field contactAddActionButton my edit hidden">AJOUTER
				AUX CONTACTS</p>
			<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
				DES CONTACTS</p>
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
		<p class="field contactAddActionButton my edit hidden">AJOUTER AUX
			CONTACTS</p>
		<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
			DES CONTACTS</p>
		<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
		<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
		<div class="detail profil"></div>
	</div>
	</div>
	<div class="item notification">
		<p class="field type contactAsk my">Demande de contact</p>
		<p class="field avatar my">Avatar</p>
		<p class="field name">Nom</p>
		<p class="field surname my">Prénom</p>
		<p class="field title my">Titre du profil</p>
		<p class="field notificationContent my">Demande de contact</p>
		<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
		<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

		
		<div
			class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
			vous sur de vouloir dérecommander le profil?</div>
		</p>
		<p class="field contactAddActionButton my edit">AJOUTER AUX
			CONTACTS</p>
		<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
			DES CONTACTS</p>
		<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
		<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
	</div>
	<div class="item notification">
		<p class="field type contactAskAccepted my">Demande de contact
			acceptée</p>
		<p class="field avatar my">Avatar</p>
		<p class="field name">Nom</p>
		<p class="field surname my">Prénom</p>
		<p class="field title my">Titre du profil</p>
		<p class="field notificationContent my">Demande de contact
			acceptée</p>
		<p class="field recommandationOnActionButton my edit hidden">RECOMMANDER</p>
		<p class="field recommandationOffActionButton my edit hidden">DERECOMMANDER

		
		<div
			class="field confirmation recommandationOffActionButtonConfirm hidden">Etes
			vous sur de vouloir dérecommander le profil?</div>
		</p>
		<p class="field contactAddActionButton my edit">AJOUTER AUX
			CONTACTS</p>
		<p class="field contactRemoveActionButton my edit hidden">SUPPRIMER
			DES CONTACTS</p>
		<p class="field recommandationAcceptActionButton my edit hidden">ACCEPTER</p>
		<p class="field contactAskAcceptActionButton my edit hidden">ACCEPTER</p>
		<div class="detail profil"></div>
	</div>
	</div>
	<div class="add contact">
		<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
			apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît. Voss
			? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit un
			picon !</p>
	</div>
	<div class="add contact">
		<p class="">Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ?
			Yeuh non, merci vielmols mais che dois partir à la Coopé de
			Truchtersheim acheter des mänele et des rossbolla pour les gamins.
			Hopla tchao bissame ! Consectetur adipiscing elit</p>
	</div>
	<div class="list recommandation">
		<div class="item recommandation">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item recommandation">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>
	<div class="list recommandation my">
		<div class="item recommandation my">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item recommandation my">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>
	<div class="list category">
		<div class="item category">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item category">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>
	<div class="list avantage">
		<div class="item avantage">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
		<div class="item avantage">
			<p class="">Lorem Salu bissame ! Wie geht's les samis ? Hans
				apporte moi une Wurschtsalad avec un picon bitte, s'il te plaît.
				Voss ? Une Carola et du Melfor ? Yo dû, espèce de Knäckes, ch'ai dit
				un picon !</p>
		</div>
	</div>

	</div>
	</div>
	<footer id="footer" role="contentinfo" class="line pam txtcenter">
		<div class="notificationLive"><?php echo $notificationLive ?></div>
		<div class="detail gsc">
			<p class="">Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ?
				Yeuh non, merci vielmols mais che dois partir à la Coopé de
				Truchtersheim acheter des mänele et des rossbolla pour les gamins.
				Hopla tchao bissame ! Consectetur adipiscing elit</p>
		</div>
		<div class="detail legal">
			<p class="">Tu restes pour le lotto-owe ce soir, y'a baeckeoffe ?
				Yeuh non, merci vielmols mais che dois partir à la Coopé de
				Truchtersheim acheter des mänele et des rossbolla pour les gamins.
				Hopla tchao bissame ! Consectetur adipiscing elit</p>
		</div>
		<div class="list social">
			<div class="item social facebook">
				<p class="button social socialConnected facebook">Compte
					Facebook</p>
			</div>
			<div class="item social google">
				<p class="button social socialConnected google">Compte Google</p>
			</div>
		</div>
	</footer>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-76275111-3', 'XXXXXXXXXXX.TLD');
		ga('send', 'pageview');

		</script>
</body>
</html>