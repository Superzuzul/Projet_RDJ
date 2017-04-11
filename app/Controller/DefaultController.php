<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/*******************************
	 * Page d'accueil + sans session
	 *******************************/

	public function index()
	{

		//affichage de la page d'accueil
		$this->show('pages/index');
	}


	public function lieu(){

		//affichage de la page lieu

		$this->show('pages/lieu');

	}


	/************************************************
					Partie séjour
	************************************************/


	public function rdjClassique()

	{
		//affichage de la page rdj Classique
		$this->show('pages/sejours/rdj-classique');
	}



	public function gamerVideo()
	
	{
		//affichage de la page gamer video
		$this->show('pages/sejours/gamer-video');
	}


	public function enQueteAventures()
	
	{
		//affichage de la page en quete d'aventures
		$this->show('pages/sejours/en-quete-aventures');
	}


	public function revesAventures()
	
	{
		//affichage de la page Reves d'aventures
		$this->show('pages/sejours/reves-aventures');
	}


	public function rdjDecouvertes()
	
	{
		//affichage de la page rdj Découvertes
		$this->show('pages/sejours/rdj-decouvertes');
	}


	public function bandeJtrouvetou()
	
	{
		//affichage de la page Bande à J"trouvetou
		$this->show('pages/sejours/bande-jtrouvetou');
	}


	public function recrutement(){

		//affichage de la page recrutement

		$this->show('pages/sejours/recrutement');

	}



	/************************************************
					Partie association
	************************************************/	

	public function presentation(){

		//affichage de la page lieu

		$this->show('pages/association/presentation');

	}

	public function projetEducatif(){

		//affichage du projet educatif

		$this->show('pages/association/projet_educatif');

	}

	public function faq(){

		//affichage de la FAQ

		$this->show('pages/association/faq');

	}


	public function salonsEtFestivals(){

		//affichage de la page salons et Festival

		$this->show('pages/association/salons_et_festivals');

	}


	public function autresActivites(){

		//affichage de la page Nos autres activités

		$this->show('pages/association/autres_activites');

	}


	public function contact(){

		//affichage de la page contact

		$this->show('pages/association/contact');

	}
	

	/************************************************
					Partie aider rdj
	************************************************/


	public function don(){

		//affichage de la page faire un don

		$this->show('pages/aider_rdj/don');

	}

	public function devenirMembre(){

		//affichage de la page devenir membre

		$this->show('pages/aider_rdj/devenir_membre');

	}


	public function lesBonnesAffaires(){

		//affichage de la page les bonnes affaires

		$this->show('pages/aider_rdj/les_bonnes_affaires');

	}



	public function outilsCommunication(){

		//affichage de la page outils de communication

		$this->show('pages/aider_rdj/outils_communication');

	}



	/************************************************
					Partie aider rdj
	************************************************/

	public function indexAdherents(){

		//affichage de la page d'index de l'espace adhérent (pour la navigation interne)

		$this->show('pages/espace_adherents/index_adherents');

	}



	public function photosSejour(){

		//affichage de la page comprenant la liste des séjours pour aller prendre les photos

		$this->show('pages/espace_adherents/photos_sejour');

	}


	public function listePhotos(){

		//affichage de la page dynamique affichant les photos des séjours

		$this->show('pages/espace_adherents/liste_photos');

	}

	public function calendrier(){

		//affichage de la page du calendrier interactif

		$this->show('pages/espace_adherents/calendrier');

	}




}