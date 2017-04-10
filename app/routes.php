
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


		//Page dynamique pour les séjours
		['GET|POST',	'/sejours/[:url]', 	'Default#sejourDetail', 'default_sejour_detail'],

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
						Aider rêves de jeux
		************************************************/

		//Page faire un don
		['GET|POST', '/aider-rdj/don', 'Default#don', 'default_don'],


		//Page devenir membre
		['GET|POST', '/aider-rdj/devenir-membre', 'Default#devenirMembre', 'default_devenir_membre'],


		//Page devenir membre
		['GET|POST', '/aider-rdj/les-bonnes-affaires', 'Default#lesBonnesAffaires', 'default_les_bonnes_affaires'],


		//Page outils de communication
		['GET|POST', '/aider-rdj/outils-communication', 'Default#outilsCommunication', 'default_outils_communication'],


		/************************************************
						Espace Adhérent
		************************************************/


		//Page index de navigation pour les adhérents
		['GET|POST', '/espace_adherents/', 'Default#indexAdherents', 'default_index_adherents'],


		//Page liste des séjours pour afficher les photos selon le sejour
		['GET|POST', '/espace_adherents/photos-sejour', 'Default#photosSejour', 'default_photos_sejour'],	


		//page dynamique avec la liste des photos
		['GET|POST', '/espace_adherents/photos-sejour/[:url]', 'Default#listePhotos', 'default_liste_photos'],	


		//Page calendrier interactif (à voir si on le fait)
		['GET|POST', '/espace_adherents/calendrier', 'Default#calendrier', 'default_calendrier'],


		/************************************************
						Espace Administrateur
		************************************************/


		


	);