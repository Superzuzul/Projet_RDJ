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

		$erreur=array();

		$safe=array_map('strip_tags', $_REQUEST);

		if(isset($safe['btnSub'])){

			

			//verification des champs

			if(empty(trim($safe['nom']))){
				$erreur['nom']='Le champ "Nom" doit être rempli !';
			}

			if(empty(trim($safe['prenom']))){
				$erreur['prenom']='Le champ "Prenom" doit être rempli !';
			}

			if(!filter_var($safe['email'], FILTER_VALIDATE_EMAIL)){
				$erreur['email']='Le champ "E-mail" doit être correctement rempli !';
			}

			if(empty($safe['sejour'])){
				$erreur['prenom']='Veuillez sélectionner un séjour !';
			}

			if(empty($_FILES['cv']) OR empty($_FILES['lettreMotivation'])){
				$erreur['fichiers']="Merci de bien télécharger votre CV ainsi que votre lettre de motivation";
			}

			if(empty(trim($safe['message'])) && strlen($safe['message']) <10){
				$erreur['message']='Merci de bien vouloir remplir le message (minimum 10 caractères) !';
			}

			//Capcha à mettre lorsqu'on aura les bons liens

			/*		// verification recaptcha
			if(isset($_POST['g-recaptcha-response'])){
	          $captcha=$_POST['g-recaptcha-response'];
	        }

	        if(!$captcha){
			  $erreur['recaptcha'] = "Vous n'avez pas procédé à la vérification anti-spam !";
	        }
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdWsBYTAAAAAH9YPGTwFA1vvOIl8O42KLLPkftF&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

	        if($response.success==false)
	        {
	          echo '<h2>La vérification indique que vous êtes un spammer ! Veuillez ne pas insister et quitter ce site immédiatement...</h2>';
	        }*/


			if(count($erreur)==0){

				//vérification de l'extension des fichiers

				$cv=$_FILES['cv']['name']; //le nom d'origine sur mon pc

				$lettreMotivation=$_FILES['lettreMotivation']['name']; //le nom d'origine sur mon pc

				$extCv=new \SplFileInfo($cv);

				$extCvMin=strtolower($extCv->getExtension());

				
				if(!in_array($extCvMin, ['pdf','doc','docx','jpg'])){

					$erreur['extCv']="L'extension de votre CV n'est pas reconnue. $extCvMin";

				}//fin de verif extCv

				$extLettreMotivation=new \SplFileInfo($lettreMotivation);

				$extLettreMotivationMin=strtolower($extLettreMotivation->getExtension());

				if(!in_array($extLettreMotivationMin, ['pdf','doc','docx','jpg'])){

					$erreur['extLettreMotivation']="L'extension de votre lettre de motivation n'est pas reconnue. $extLettreMotivationMin";

				}//fin verif extLettreMotivation

				if(count($erreur)==0){

					//verrification de la taille des fichiers

					if($_FILES['cv']["size"]>2000000){
						$erreur['tailleCv']="La taille de votre CV est supérieur à 2 MO !";
					}

					if($_FILES['lettreMotivation']["size"]>2000000){
						$erreur['tailleCv']="La taille de votre lettre de motivation est supérieur à 2 MO !";
					}


					if(count($erreur)==0){

						//Si tout est bon, on peut passer à l'upload pour l'envoi de l'e-mail

						$repertoire=__DIR__.'/../cv_lettre_motivation'; //le répertoire destination du fichier

						$cvTemp=$_FILES['cv']['tmp_name']; //le nom temporaire
						$cv=$_FILES['cv']['name']; //le nom d'origine sur mon pc

						$lettreMotivationTemp=$_FILES['lettreMotivation']['tmp_name']; //le nom temporaire
						

						$adresseCv="$repertoire/cv-".$safe['email'].".$extCvMin";

						$adresseLettreMotivation="$repertoire/lettre-motivation-".$safe['email'].".$extLettreMotivationMin";


						//copie du fichier
						if(move_uploaded_file($cvTemp,$adresseCv) && move_uploaded_file($lettreMotivationTemp,$adresseLettreMotivation)){
						
							//ON DOIT ENVOYER L'E-MAIL ICI !!!!	

							$mail = new \PHPMailer();
    	
					    	$mail->isSMTP(); //connexion directe au serveur SMTP
					    	$mail->Charset='UTF-8';
					    	$mail->SMTPDebug=0;
					    	$mail->isHTML(true); //utilisation du format HTML pour le message

					    	$mail->Host = 'smtp.gmail.com';
					    	$mail->Port = 465;
					    	$mail->SMTPAuth   = true;

					    	$mail->SMTPSecure ="ssl";
					    	$mail->Username = "darkzuzul@gmail.com";
					    	$mail->Password = "guigui10";
					    	$mail->setFrom($safe['email']);
					    	$mail->FromName='contact@revesdejeux.com';
					    	$mail->addAddress('darkzuzul@gmail.com');
					    	$mail->Subject = 'Recrutement pour le sejour '.$safe['sejour'];
					    	$mail->Body ='
							<table>
								<tr>
									<td><b>Emetteur du message:</b></td>
								</tr>
								<tr>
									<td>'. $safe['nom'].' '.$safe['prenom'].' '.$safe['email'] . '</td>
								</tr>
								<tr>
									<td><b>Contenu du message:</b></td>
								</tr>
								<tr>
									<td>'. $safe['message'] . '</td>
								</tr>
							</table>
						';



					    						    	
					    	$mail->AddAttachment($adresseCv);
							$mail->AddAttachment($adresseLettreMotivation);

					    	
					    	
					    	
					    	if (!$mail->send()) {
					    		$erreur['envoiEmail']="E-mail non envoyé !";
					    	} else {
					    		$erreur['envoiEmail']= "Message envoyé !";
					    	}
							

						}//fin de l'upload
						else{
							$erreur['upload']="Erreur lors du telechargement de votre ou vos fichier(s).";
						}


					}//fin du troisieme count($erreur)



				}//fin du deuxième count($erreur)


			}//fin du count($erreur) numéro 1




		}//fin du isset





		//affichage de la page recrutement

		$this->show('pages/sejours/recrutement',['erreur'=>$erreur]);

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


	/************    affichage des sous-pages de Nos autres activités     ***********/


	public function autresActivitesGalipettes(){

		//affichage de la sous-page Nos autres activités/espace-galipettes

		$this->show('pages/association/autres_activites/espace-galipettes');
	}


	public function autresActivitesMedieval(){

		//affichage de la sous-page Nos autres activités/espace-medieval

		$this->show('pages/association/autres_activites/espace-medieval');
	}


	public function autresActivitesBarAJeux(){

		//affichage de la sous-page Nos autres activités/bar-a-jeux

		$this->show('pages/association/autres_activites/bar-a-jeux');
	}


	public function autresActivitesBarATheme(){

		//affichage de la sous-page Nos autres activités/bar-a-theme

		$this->show('pages/association/autres_activites/bar-a-theme');
	}


	public function autresActivitesGrandQuiz(){

		//affichage de la sous-page Nos autres activités/grand-quiz

		$this->show('pages/association/autres_activites/grand-quiz');
	}


	public function autresActivitesVipDeJouer(){

		//affichage de la sous-page Nos autres activités/vip-de-jouer

		$this->show('pages/association/autres_activites/vip-de-jouer');
	}


	public function autresActivitesReveDeNature(){

		//affichage de la sous-page Nos autres activités/reve-de-nature

		$this->show('pages/association/autres_activites/reve-de-nature');
	}


	public function autresActivitesBarANature(){

		//affichage de la sous-page Nos autres activités/bar-a-nature

		$this->show('pages/association/autres_activites/bar-a-nature');
	}


	public function autresActivitesSeminaireCreation(){

		//affichage de la sous-page Nos autres activités/seminaire-creation

		$this->show('pages/association/autres_activites/seminaire-creation');
	}


	public function autresActivitesFormation(){

		//affichage de la sous-page Nos autres activités/formation

		$this->show('pages/association/autres_activites/formation');
	}


	public function autresActivitesAtelierPrevention(){

		//affichage de la sous-page Nos autres activités/atelier-prevention

		$this->show('pages/association/autres_activites/atelier-prevention');
	}

	/***********		 fin des sous-pages  		**********/


	public function contact(){


		$erreur=array();

		$safe=array_map('strip_tags', $_REQUEST);

		if(isset($safe['btnSub'])){

			
			//verification des champs

			if(empty(trim($safe['nom']))){
				$erreur['nom']='Le champ "Nom" doit être rempli !';
			}

			if(!filter_var($safe['email'], FILTER_VALIDATE_EMAIL)){
				$erreur['email']='Le champ "E-mail" doit être correctement rempli !';
			}

			if(empty(trim($safe['sujet'])) && strlen($safe['sujet']) <5){
				$erreur['nom']='Le champ "sujet" doit être rempli et faire minimum 5 caractères !';
			}

			if(empty(trim($safe['message'])) && strlen($safe['message']) <10){
				$erreur['message']='Merci de bien vouloir remplir le message (minimum 10 caractères) !';
			}

			//Capcha à mettre lorsqu'on aura les bons liens

			/*		// verification recaptcha
			if(isset($_POST['g-recaptcha-response'])){
	          $captcha=$_POST['g-recaptcha-response'];
	        }

	        if(!$captcha){
			  $erreur['recaptcha'] = "Vous n'avez pas procédé à la vérification anti-spam !";
	        }
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdWsBYTAAAAAH9YPGTwFA1vvOIl8O42KLLPkftF&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

	        if($response.success==false)
	        {
	          echo '<h2>La vérification indique que vous êtes un spammer ! Veuillez ne pas insister et quitter ce site immédiatement...</h2>';
	        }*/


			if(count($erreur)==0){


					
				//ON DOIT ENVOYER L'E-MAIL ICI !!!!	

				$mail = new \PHPMailer();

		    	$mail->isSMTP(); //connexion directe au serveur SMTP
		    	$mail->Charset='UTF-8';
		    	$mail->SMTPDebug=0;
		    	$mail->isHTML(true); //utilisation du format HTML pour le message

		    	$mail->Host = 'smtp.gmail.com';
		    	$mail->Port = 465;
		    	$mail->SMTPAuth   = true;

		    	$mail->SMTPSecure ="ssl";
		    	$mail->Username = "darkzuzul@gmail.com";
		    	$mail->Password = "guigui10";
		    	$mail->setFrom($safe['email']);
		    	$mail->FromName='contact@revesdejeux.com';
		    	$mail->addAddress('darkzuzul@gmail.com');
		    	$mail->Subject = 'Question de  '.$safe['email'];
		    	$mail->Body =
		    	'<table>
								<tr>
									<td><b>Emetteur du message:</b></td>
								</tr>
								<tr>
									<td>'. $safe['email'] . '</td>
								</tr>
								<tr>
									<td><b>Sujet du message:</b></td>
								</tr>
								<tr>
									<td>'. $safe['sujet'] . '</td>
								</tr>
								<tr>
									<td><b>Contenu du message:</b></td>
								</tr>
								<tr>
									<td>'. $safe['message'] . '</td>
								</tr>
							</table>'
						;					    	

	    	if (!$mail->send()) {
		    		$erreur['envoiEmail']="E-mail non envoyé !";
		    	} else {
		    		$erreur['envoiEmail']= "Message envoyé !";
		    	}
							

			}//fin du count($erreur) numéro 1


		}//fin du isset


		//affichage de la page contact

		$this->show('pages/association/contact',['erreur'=>$erreur]);

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
					Partie espace adherent
	************************************************/

	public function indexAdherents(){

		// on utilise la méthode getUSer() afin de prendre connaissance des données de l'utilisateur connecté
		$utilisateurConnect = $this->getUser();
		debug($utilisateurConnect);

		// SI...
			// ... les données sont vides, alors on dirigera l'utilisateur vers la page de login
			// $this->show('pages/espace-adherents/login');
		if($utilisateurConnect == null)
		{
        	$this->redirectToRoute("user_login_adherents");
		}
		else
		{
			// SINON,...
			//... affichage de la page d'index de l'espace adhérent (pour la navigation interne)

		// EST-CE QUE C'EST LA PREMIERE CONNEXION DE L'UTILISATEUR ?
			// on crée une variable qui contiendra uniquement le booléen "premiereConnexion" de l'utilisateur
			$firstConnect =  $utilisateurConnect["premiereConnexion"];

			if($firstConnect == 1){	// --> 0 = FALSE / 1 = TRUE
				// SI C'EST BIEN SA TOUTE PREMIERE CONNEXION, ON DIRIGE L'UTILISATEUR VERS LA PAGE DE REDEFINITION DU MOT DE PASSE
				// (pour changer le mot de passe par défaut donné par l'administrateur)
	        	$this->redirectToRoute("user_mdp_red");
			}
			else
			$this->show('pages/espace-adherents/index-adherents');
		}
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