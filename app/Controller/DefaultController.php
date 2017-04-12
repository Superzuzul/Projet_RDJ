<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	//surcharge de la methode show pour ajouter des fonctions et eviter la toolbox

	public function show($file, array $data = array())
	{
		//incluant le chemin vers nos vues
		$engine = new \League\Plates\Engine(self::PATH_VIEWS);

		//charge nos extensions (nos fonctions personnalisées)
		$engine->loadExtension(new \W\View\Plates\PlatesExtensions());

		// le flash message
		$flash_message = (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) ? (object) $_SESSION['flash'] : null;

		// 
		$app = getApp();		

		// Rend certaines données disponibles à tous les vues
		// accessible avec $w_user & $w_current_route dans les fichiers de vue
		$engine->addData(
			[
				'w_user' 		  => $this->getUser(),
				'w_current_route' => $app->getCurrentRoute(),
				'w_site_name'	  => $app->getConfig('site_name'),
				'w_flash_message' => $flash_message,
			]
		);

		// Retire l'éventuelle extension .php
		$file = str_replace('.php', '', $file);


		$engine->registerFunction('dateFr', function ($date) {
           	 //on transforme la chaine en tableau
				$tabDate = explode('-', $date);
				//return $tabDate[2].'/'.$tabDate[1].'/'.$tabDate[0];
				return implode('/', array_reverse($tabDate));
        });


		// Affiche le template
		echo $engine->render($file, $data);
		die();
	}



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
	//affichage des sous-pages de Nos autres activités
	public function autresActivitesGalipettes(){
		//affichage de la sous-page Nos autres activités/espace-galipettes
		$this->show('pages/association/autres_activites/espace_galipettes');
	}
	public function autresActivitesMedieval(){
		//affichage de la sous-page Nos autres activités/espace-medieval
		$this->show('pages/association/autres_activites/espace_medieval');
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

		$this->show('pages/espace-adherents/index-adherents');

	}



	public function photosSejour(){

		//affichage de la page comprenant la liste des séjours pour aller prendre les photos

		$this->show('pages/espace-adherents/photos-sejour');

	}


	public function listePhotos(){

		//affichage de la page dynamique affichant les photos des séjours

		$this->show('pages/espace-adherents/liste-photos');

	}

	public function calendrier(){

		//affichage de la page du calendrier interactif

		$this->show('pages/espace-adherents/calendrier');

	}




}