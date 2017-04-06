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


	public function sejourDetail($url)

	//Le framework W va extraire de l'url l'information qui correspond à [:url] Et va le passer en paramettre de la fonction
	{
		//On transmet des infos depuis le controlleur vers la vue grâce à un tableau associatif
		//La cle => va devenir une variable dans la vue et la valeur va devenir la valeur de la variable
		$this->show('pages/sejours/sejour-detail',["url"=>$url]);
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

		//affichage de la page faire un don

		$this->show('pages/aider_rdj/devenir_membre');

	}




}