<?php

	namespace Controller;

	use \W\Controller\Controller;

	class UserController 
	        extends Controller
	{
		// METHODE ASSOCIEE A LA ROUTE /users/logout
		public function logout()
		{
			// SUPPRIMER LES INFOS DE SESSION
			$objetAuthentificationModel = new \W\Security\AuthentificationModel;
			$objetAuthentificationModel->logUserOut();
	        
	        // REDIRIGER VERS LA PAGE DE LOGIN
	        $this->redirectToRoute("user_login_adherents");
		}



		// METHODE ASSOCIEE A LA ROUTE /users/login
	    public function login ()
	    {
	    	$message = "";

			// TRAITEMENT DU FORMULAIRE DE LOGIN

			// on vérifie qu'on a bien traité l'input "operation" (= le formulaire dans sa globalité a bien été soumis)
			if(isset($_REQUEST["operation"]) && ($_REQUEST["operation"] == "login")) //  et on vérifie la valeur de l'input "operation" (permet de savoir dans quelle partie du traitement nous sommes)
			{
				// on récupère les informations transmises par le formulaire
				$email 		= trim($_REQUEST["email"]);	// "trim" supprime les espaces avant et après l'élément auquel il se rapporte
				$password 	=  trim($_REQUEST["mdp"]); // "trim" supprime les espaces avant et après l'élément auquel il se rapporte
			

				// UN PEU DE SECURITE
				//l'adresse mail est elle valide?
				if(filter_var(($email), FILTER_VALIDATE_EMAIL)
						&& is_string($password) && (mb_strlen($password) > 5)	// mb (multi-byte) : va gérer les charsets sur plusieurs octets
																					//==> mb_strlen : va permettre de "compter" le nombre réel de caractères (et pas d'OCTETS)
					)
				{
	                // ON VA VERIFIER SI LES INFOS CORRESPONDENT A UNE LIGNE DANS LA TABLE MYSQL
					$objetAuthentificationModel = new \W\Security\AuthentificationModel;
					
					$idUser = $objetAuthentificationModel->isValidLoginInfo($email, $password);
					// $idUser => 0 SI AUCUNE LIGNE NE CORRESPOND
					// $idUser => id DE LA LIGNE TROUVEE
					if($idUser > 0)
					{
							
						// on créé un nouvel objet afin de pouvoir utiliser la méthode "findBy"
						$objetUsersModel = new \Model\MembreModel;
	                    
		                    // ON RECUPERE TOUTE LA LIGNE SUR L'UTILISATEUR dans un tableau associatif
							$tabUser = $objetUsersModel->findBy("idMembre", $idUser);	// on cherche la correspondance entre la base de données et la variable $idUSer
							
							// JE VAIS MEMORISER CES INFOS DANS UNE SESSION
							$objetAuthentificationModel->logUserIn($tabUser);
							
							// on crée une variable qui indiquera si l'utilisateur se connecte pour la toute première fois
							$firstConnect =  $tabUser["premiereConnexion"];

						
						// si c'est bien la première connexion de l'utilisateur :
						if($firstConnect = 1){	// == $firstConnect = TRUE
							// on réutilise l'objet créé précédemment afin de pouvoir utiliser cette fois la méthode "update"
								// MAJ de la BDD pour passer "premiereConnexion" de l'utilisateur à FAUX
							$objetUsersModel->update(["premiereConnexion" => $firstConnect=0], $idUser);

							// on redirige le visiteur sur la page de modification du mot de passe (pour remplacer le MdP fourni par défaut par l'administrateur)
	                		$this->redirectToRoute("user_mdp_red");
						}
						
						else{	// si CE N'EST PAS la première connexion de l'utilisateur :
	                		$this->redirectToRoute("default_index_adherents");	// on redirige le visiteur directement sur la page index de la partie Adhérent
						}
					}
					else
					{
						// KO
						$message = "Le couple Identifiant/Mot de passe que vous avez utilisé est incorrect.<br/>Merci de ré-essayer !";
					}
	            }
	            else
	            {
	                $message = "Format des informations transmises incorrect.<br/>Merci de rentrer un identifiant et un mot de passe tous deux valides.";
	            }
			}
	        // on affiche la page de login agrémentée du message idoine
	        $this->show("pages/espace-adherents/login", ["message" => $message]);
		}



		// methode MDP PERDU
		public function mdpPerdu()
		{
			// TRAITEMENT DU FORMULAIRE DE MOT DE PASSE PERDU

			// // on vérifie qu'on a bien traité l'input "operation" (= le formulaire dans sa globalité a bien été soumis)
			// if(isset($_REQUEST["operation"]) && ($_REQUEST["operation"] == "mdp-perdu")) //  et on vérifie la valeur de l'input "operation" (permet de savoir dans quelle partie du traitement nous sommes)
			// {
			// 	// on récupère les informations transmises par le formulaire
			// 	$email = trim($_REQUEST["email"]);	// "trim" supprime les espaces avant et après l'élément auquel il se rapporte
			

			// 	// UN PEU DE SECURITE
			// 	//l'adresse mail est elle valide?
			// 	if(filter_var(($email), FILTER_VALIDATE_EMAIL))
			// 	{
			// 		// on créé un nouvel objet afin de pouvoir utiliser la méthode "findBy"
			// 		$objetUsersModel = new \Model\MembreModel;
		            
		 //                // ON RECUPERE TOUTE LA LIGNE SUR L'UTILISATEUR dans un tableau associatif
			// 			$tabUser = $objetUsersModel->findBy("emailMembre", $email);	// on cherche la correspondance entre la base de données et la variable $email
						
			// 			// on vérifie que la correspondance se vérifie et ne renvoie pas d'erreur
			// 			if(!empty($tabUser)){
			// 				// on crée une variable pour récupérer seulement le mail de l'utilisateur
			// 				$mailUser =  $tabUser["emailMembre"];

							
			// 				//ON DOIT ENVOYER L'E-MAIL ICI !!!!	

			// 				$mail = new \PHPMailer();
    	
			// 		    	$mail->isSMTP(); //connexion directe au serveur SMTP
			// 		    	$mail->SMTPDebug=0;
			// 		    	$mail->isHTML(true); //utilisation du format HTML pour le message

			// 		    	$mail->Host = 'smtp.gmail.com';
			// 		    	$mail->Port = 465;
			// 		    	$mail->SMTPAuth   = true;

			// 		    	$mail->SMTPSecure ="ssl";
			// 		    	$mail->Username = "darkzuzul@gmail.com";
			// 		    	$mail->Password = "guigui10";
			// 		    	$mail->setFrom($safe['email']);
			// 		    	$mail->FromName='contact@revesdejeux.com';
			// 		    	$mail->addAddress('darkzuzul@gmail.com');
			// 		    	$mail->Subject = 'Recrutement pour le sejour '.$safe['sejour'];
			// 		    	$mail->Body =$safe['message'];					    	
			// 		    	$mail->AddAttachment($adresseCv);
			// 				$mail->AddAttachment($adresseLettreMotivation);

					    	
					    	
					    	
			// 		    	if (!$mail->send()) {
			// 		    		$erreur['envoiEmail']="E-mail non envoyé !";
			// 		    	} else {
			// 		    		$erreur['envoiEmail']= "Message envoyé !";
			// 		    	}
			// 			}

			

		// code PHP ??

			/* exemple de code de Bruno

			//page d'envoi du token par mail
				if(isset($_POST['btnSub']))
				{
					//sécurisation de la valeur
					$email = strip_tags($_POST['email']);
					//connexion 
					$bdd = new PDO('mysql:host=localhost;dbname=revesdejeux;charset=utf8',
												 'root', '');
					//recherche de l'adresse mail
					$rqVerif ="SELECT idClient
										 FROM clients
										 WHERE email = :email";
					$stmtVerif = $bdd->prepare($rqVerif);
					$params = array(':email' => $email);
					$stmtVerif->execute($params);
					$idClient = $stmtVerif->fetchColumn(); //une seule info...
					//var_dump($idClient);
					if($idClient !== false)
					{
						//génération du token
						$token = md5($email); //génération d'une chaine cryptée en MD5()
						//echo $token;
						//envoi du mail
							include "includes/phpmailer/PHPMailerAutoload.php";
						$mail = new PHPMailer(); //création d'un objet de type mail
						$mail->isSMTP(); //connexion directe au serveur SMTP
						$mail->isHTML(true); //utilisation du format HTML pour le message
						$mail->Host = "smtp.gmail.com"; //le serveur SMTP pour envoyer
						$mail->Port = 465; //le port obligatoire de google
						$mail->SMTPAuth = true; //on va fournir un login/password au serveur
						$mail->SMTPSecure = 'ssl'; //certificat SSL
						$mail->Username = 'wf3marseille@gmail.com';
						$mail->Password = 'Azerty1234';
						$mail->setFrom('wf3marseille@gmail.com'); //l'expéditeur
						$mail->addAddress($email); //l'adresse mail de celui qui a perdu son mdp
						$mail->Subject = "WebForce3 - mot de passe perdu"; //objet du mail
						$link = '<a href="http://localhost/coursPHP/newPass.php?token='.$token.'">Reinitialiser mon mot de passe</a>'; //le lien à cliquer dans le mail
						$mail->Body = '<html>
													 <head>
													 <style> h1{color: green;} </style>
													 </head>
													 <body>
													 <h1>Mot de passe perdu</h1>
													 <p>Vous avez signalé votre mot de passe comme perdu...</p>
													 '.$link.'
													 </body>
													 </html>';
						if(!$mail->send()) //si problème pendant l'envoi
						{
							echo 'erreur envoi '.$mail->ErrorInfo;
						}
						else
						{	
							//mise à jour table clients
							$rqToken = "UPDATE clients
													SET token = ?
													WHERE idClient = ?";
							$stmtToken = $bdd->prepare($rqToken);
							$paramToken = array($token, $idClient);
							$stmtToken->execute($paramToken);
							echo 'Vérifiez votre boite mail...';	
						}
					}	
				}
			*/
			/* fichiers de Bruno à utiliser : newPAss.php / updatePass.php */

			//affichage de la page de renseignement du mail (conduit ensuite à la réinitialisation du MdP)
			$this->show('pages/espace-adherents/mdp-perdu');

		}

		public function mdpRed(){
			
			//affichage de la page de réinitialisation du mot de passe
			$this->show('pages/espace-adherents/mdp-red');
		}

	}
?>