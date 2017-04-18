
<?php
	
	//Une route pour un projet, le premier paramètre est GET, c'est la methode utilisée pour définir l'url (pour mettre les deux, on fait "GET|POST")
	//Le deuxième est la partie après public,c'est l'url
	//La route va mettre en relation l'url avec notre code php.
	//Troisieme c'est la methode (CLASSE#METHODE), référence au controleur
	//Le 4eme c'est l'identifiant unique de la route (pour faire des liens internes)

	$w_routes = array(
		['GET|POST', '/', 'Default#index', 'default_index'],



		/************************************************
							Partie séjour
		************************************************/						


		//Page pour les séjours classiques
		['GET|POST',	'/sejours/rdj-classique', 	'Default#rdjClassique', 'default_rdj_classique'],


		//Page pour les séjours gamer vidéo
		['GET|POST',	'/sejours/gamer-video', 	'Default#gamerVideo', 'default_gamer_video'],


		//Page pour les séjours En quete d'aventures
		['GET|POST',	'/sejours/en-quete-aventures', 	'Default#enQueteAventures', 'default_en_quete_aventures'],


		//Page pour les séjours Rêves d'Aventures
		['GET|POST',	'/sejours/reves-aventures', 	'Default#revesAventures', 'default_reves_aventures'],


		//Page pour les séjours Reves de Jeux Découvertes
		['GET|POST',	'/sejours/rdj-decouvertes', 	'Default#rdjDecouvertes', 'default_rdj_decouvertes'],


		//Page pour les bandes à Jtrouvetou
		['GET|POST',	'/sejours/bande-jtrouvetou', 	'Default#bandeJtrouvetou', 'default_bande_jtrouvetou'],


		//Page pour le recrutement
		['GET|POST', '/sejours/recrutement', 'Default#recrutement', 'default_recrutement'],

		//Page pour le lieu
		['GET|POST', '/lieu', 'Default#lieu', 'default_lieu'],



		/************************************************
						Partie association
		************************************************/


		//Page pour la présentation de l'association
		['GET|POST', '/association/presentation', 'Default#presentation', 'default_presentation'],

		//Page pour le projet educatif
		['GET|POST', '/association/projet-educatif', 'Default#projetEducatif', 'default_projet_educatif'],

		//Page pour la FAQ
		['GET|POST', '/association/faq', 'Default#faq', 'default_faq'],

		//Page pour Salon et Festival
		['GET|POST', '/association/salons-et-festivals', 'Default#salonsEtFestivals', 'default_salons_et_festivals'],

		//Page pour nos autres activités
		['GET|POST', '/association/autres-activites', 'Default#autresActivites', 'default_autres_activites'],

		//Page contact
		['GET|POST', '/association/contact', 'Default#contact', 'default_contact'],



		/************************************************
				Sous-pages pour nos autres activités 
		************************************************/


		//Page espace galipette
		['GET|POST', '/association/autres-activites/espace-galipettes', 'Default#autresActivitesGalipettes', 'default_autres_activites_galipettes'],

		//page espace medieval	

		['GET|POST', '/association/autres-activites/espace-medieval', 'Default#autresActivitesMedieval', 'default_autres_activites_medieval'],

		//page bar à jeux	

		['GET|POST', '/association/autres-activites/bar-a-jeux', 'Default#autresActivitesBarAJeux', 'default_autres_activites_bar_a_jeux'],

		//page bar à jeux à thème	

		['GET|POST', '/association/autres-activites/bar-a-theme', 'Default#autresActivitesBarATheme', 'default_autres_activites_bar_a_theme'],

		//page Le grand Quiz	

		['GET|POST', '/association/autres-activites/grand-quiz', 'Default#autresActivitesGrandQuiz', 'default_autres_activites_grand_quiz'],

		//page VIP de Jouer	

		['GET|POST', '/association/autres-activites/vip-de-jouer', 'Default#autresActivitesVipDeJouer', 'default_autres_activites_vip_de_jouer'],

		//page Festival Rêve de Nature	

		['GET|POST', '/association/autres-activites/reve-de-nature', 'Default#autresActivitesReveDeNature', 'default_autres_activites_reve_de_nature'],

		//page Festival Rêve de Nature Bar à jeux	

		['GET|POST', '/association/autres-activites/bar-a-nature', 'Default#autresActivitesBarANature', 'default_autres_activites_bar_a_nature'],


		//page Sémiraire Création de Jeux	

		['GET|POST', '/association/autres-activites/seminaire-creation', 'Default#autresActivitesSeminaireCreation', 'default_autres_activites_seminaire_creation'],

		//page formation	

		['GET|POST', '/association/autres-activites/formation', 'Default#autresActivitesFormation', 'default_autres_activites_formation'],	


		//page Atelier Prévention "jeux tu il"	

		['GET|POST', '/association/autres-activites/atelier-prevention', 'Default#autresActivitesAtelierPrevention', 'default_autres_activites_atelier_prevention'],


		/************************************************
						Aider rêves de jeux
		************************************************/

		//Page faire un don
		['GET|POST', '/aider-rdj/don', 'Default#don', 'default_don'],


		//Page devenir membre
		['GET|POST', '/aider-rdj/devenir-membre', 'Default#devenirMembre', 'default_devenir_membre'],


		//Page les bonnes affaires
		['GET|POST', '/aider-rdj/les-bonnes-affaires', 'Default#lesBonnesAffaires', 'default_les_bonnes_affaires'],


		//Page outils de communication
		['GET|POST', '/aider-rdj/outils-communication', 'Default#outilsCommunication', 'default_outils_communication'],


		/************************************************
						Espace Adhérent
		************************************************/

		//Page index de navigation pour les adhérents
		['GET|POST', '/espace-adherents', 'Default#indexAdherents', 'default_index_adherents'],

		//Page login pour les adhérents
		['GET|POST', '/espace-adherents/login', 'User#login', 'user_login_adherents'],

		//Page mot de passe perdu
		['GET|POST', '/espace-adherents/mdp-perdu', 'User#mdpPerdu', 'user_mdp_perdu'],

		//Page redéfinition du mot de passe
		['GET|POST', '/espace-adherents/mdp-red', 'User#mdpRed', 'user_mdp_red'],


		//Page liste des séjours pour afficher les photos selon le sejour
		['GET|POST', '/espace-adherents/photos-sejour', 'Default#photosSejour', 'default_photos_sejour'],	


		//page dynamique avec la liste des photos
		['GET|POST', '/espace-adherents/photos-sejour/[:url]', 'Default#listePhotos', 'default_liste_photos'],


		//Page calendrier interactif (à voir si on le fait)
		['GET|POST', '/espace-adherents/calendrier', 'Default#calendrier', 'default_calendrier'],


		/************************************************
						Espace Administrateur
		************************************************/


		


	);