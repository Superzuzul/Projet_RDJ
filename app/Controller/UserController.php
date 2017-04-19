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
			$token = "";

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
							$tabUser = $objetUsersModel->findBy("id", $idUser);	// on cherche la correspondance entre la base de données et la variable $idUSer
							
							// JE VAIS MEMORISER CES INFOS DANS UNE SESSION
							$objetAuthentificationModel->logUserIn($tabUser);
							
							// on crée une variable qui indiquera si l'utilisateur se connecte pour la toute première fois
							$firstConnect =  $tabUser["premiereConnexion"];

						
						// si c'est bien la première connexion de l'utilisateur :
						if($firstConnect == 1){	// --> 0 = FALSE / 1 = TRUE
							// on réutilise l'objet créé précédemment afin de pouvoir utiliser cette fois la méthode "update"
								// MAJ de la BDD pour passer "premiereConnexion" de l'utilisateur à FAUX
							$objetUsersModel->update(["premiereConnexion" => $firstConnect==0], $idUser);
							
							//génération du token
							$token = md5($email); //génération d'une chaine cryptée en MD5()
							// MAJ de la BDD pour enregistrer le token de l'utilisateur
							$objetUsersModel->update(["token" => $token], $idUser);


							// on redirige le visiteur sur la page de modification du mot de passe (pour remplacer le MdP fourni par défaut par l'administrateur)
							$uri = $this->generateUrl("user_mdp_red");
							$urlToken = "?token=".$token;
    						$this->redirect($uri.$urlToken);
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
			$message = "";
			$token = "";

			// TRAITEMENT DU FORMULAIRE DE MOT DE PASSE PERDU

			// on vérifie qu'on a bien traité l'input "operation" (= le formulaire dans sa globalité a bien été soumis)
			if(isset($_REQUEST["operation"]) && ($_REQUEST["operation"] == "mdp-perdu")) //  et on vérifie la valeur de l'input "operation" (permet de savoir dans quelle partie du traitement nous sommes)
			{
				// on récupère les informations transmises par le formulaire
				$email = trim($_REQUEST["email"]);	// "trim" supprime les espaces avant et après l'élément auquel il se rapporte
			

				// UN PEU DE SECURITE
				//l'adresse mail est elle valide?
				if(filter_var(($email), FILTER_VALIDATE_EMAIL))
				{
					// on créé un nouvel objet afin de pouvoir utiliser la méthode "findBy"
					$objetUsersModel = new \Model\MembreModel;
		            
		                // ON RECUPERE TOUTE LA LIGNE SUR L'UTILISATEUR dans un tableau associatif
						$tabUser = $objetUsersModel->findBy("emailMembre", $email);	// on cherche la correspondance entre la base de données et la variable $email
						
						// on vérifie que la correspondance se vérifie et ne renvoie pas d'erreur
						if(!empty($tabUser)){
							// on crée une variable pour récupérer seulement le mail de l'utilisateur
							$mailUser =  $tabUser["emailMembre"];


							//génération du token
							$token = md5($email); //génération d'une chaine cryptée en MD5()

							//envoi du mail
							$mail = new PHPMailer(); //création d'un objet de type mail
							$mail->CharSet = 'UTF-8'; // codage du message pour prise en compte des accents et caractères spéciaux
							$mail->isSMTP(); //connexion directe au serveur SMTP
							$mail->SMTPDebug=0;
							$mail->isHTML(true); //utilisation du format HTML pour le message
							$mail->Host = "smtp.gmail.com"; //le serveur SMTP pour envoyer
							$mail->Port = 465; //le port obligatoire de google
							$mail->SMTPAuth = true; //on va fournir un login/password au serveur
							$mail->SMTPSecure = 'ssl'; //certificat SSL
							$mail->Username = 'sylvain.peysson@gmail.com';
							$mail->Password = 'sylvainPN@13800';
							// $mail->setFrom($mailUser);
					    	$mail->setFrom('sylvain.peysson@gmail.com'); // l'expéditeur
					    	$mail->FromName='contact@revesdejeux.com';
					    	// $mail->addAddress($mailUser);
					    	$mail->addAddress('sylvain.peysson@gmail.com'); // l'adresse mail de celui qui a perdu son mdp
							$mail->Subject = "Réinitialisation de votre mot de passe"; //objet du mail
							$link = '<a href="http://www.revesdejeux.com/espace-adherents/mdp-red.php?token='.$token.'">Réinitialiser mon mot de passe</a>'; //le lien à cliquer dans le mail
							$mail->Body = '<table>
											<tr>
												<td><b>Vous avez demandé une réinitialisation de votre mot de passe !</b></td>
											</tr>
											<br/>
											<tr>
												<td>Merci de cliquer sur le lien ci-dessous et de suivre les instructions afin de rétablir vos accès sur le site <b>revesdejeux.com</b> :</td>
											</tr>
											<br/>
											<tr>
												<td>Votre lien personnalisé : '.$link.'</td>
											</tr>
										</table>';					    	
					    	
					    	if(!$mail->send()){
					    		$message = "Email non-envoyé ! (erreur envoi ".$mail->ErrorInfo.")";
					    	}
					    	else{
								// on crée une variable pour récupérer seulement l'ID de l'utilisateur
								$idUser =  $tabUser["id"];

								// on réutilise l'objet créé précédemment afin de pouvoir utiliser cette fois la méthode "update"
									// MAJ de la BDD pour enregistrer le token de l'utilisateur
								$objetUsersModel->update(["token" => $token], $idUser);

					    		$message = "Merci de vérifier votre boite mail.<br/>Votre mot de passe pourra être réinitialisé grâce au lien qui vous a été adressé.";
					    	}
						}
						else
						{
							// KO
							$message = "Le mail que vous avez entré n'a pas de correspondance dans notre base de données.<br/>Merci de vérifier votre saisie.";
						}
	            }
	            else
	            {
	                $message = "Format du mail incorrect.<br/>Merci de vérifier votre saisie.";
	            }
			}
			//affichage de la page de renseignement du mail (conduit ensuite à la réinitialisation du MdP)
			$this->show('pages/espace-adherents/mdp-perdu', ["message" => $message]);
		}



		public function mdpRed()
		{
	    	$message = "";
	    	$token = "";
	    	$messageLien = "";

	    	//récupération du token dans l'url (+ nettoyage)
			$token = strip_tags($_GET['token']);

			// on créé un nouvel objet afin de pouvoir utiliser la méthode "findBy"
			$objetUsersModel = new \Model\MembreModel;
            
                // ON RECUPERE TOUTE LA LIGNE SUR L'UTILISATEUR dans un tableau associatif
				$tabUser = $objetUsersModel->findBy("token", $token);	// on cherche la correspondance entre la base de données et la variable $token
				

				// on vérifie que la correspondance se vérifie et ne renvoie pas d'erreur
				if(!empty($tabUser)){
					// on crée une variable pour récupérer seulement l'ID de l'utilisateur
					$idUser =  $tabUser["id"];


					// TRAITEMENT DU FORMULAIRE DE REDEFINITION DE MOT DE PASSE

					// on vérifie qu'on a bien traité l'input "operation" (= le formulaire dans sa globalité a bien été soumis)
					if(isset($_REQUEST["operation"]) && ($_REQUEST["operation"] == "mdp-redefinition")) //  et on vérifie la valeur de l'input "operation" (permet de savoir dans quelle partie du traitement nous sommes)
					{
						// on récupère les informations transmises par le formulaire
						$password 			= trim($_REQUEST["motdepasse"]);	// "trim" supprime les espaces avant et après l'élément auquel il se rapporte
						$confirm_password 	=  trim($_REQUEST["conf_motdepasse"]); // "trim" supprime les espaces avant et après l'élément auquel il se rapporte
					

						// UN PEU DE SECURITE
						//le mot de passe est-il valide?
						if(is_string($password) && (mb_strlen($password) > 5)	// mb (multi-byte) : va gérer les charsets sur plusieurs octets
																					//==> mb_strlen : va permettre de "compter" le nombre réel de caractères (et pas d'OCTETS)
							&& ($password == $confirm_password)
							)
						{
							$nouveauMdp = password_hash($password, PASSWORD_DEFAULT);

							// on réutilise l'objet créé précédemment afin de pouvoir utiliser cette fois la méthode "update"
								// MAJ de la BDD pour enregistrer le nouveau mot de passe de l'utilisateur
							$objetUsersModel->update(["mdpMembre" => $nouveauMdp], $idUser);

				    		$message = 'Votre mot de passe a été mis à jour.';

				    		$uri = $this->generateUrl("user_login_adherents");
    						header('Refresh: 2; '.$uri);	// on redirige le visiteur directement sur la page de login au bout de 2 secondes
				    	}
				    }
				}
				else{
					$message = "Token non-trouvé.";
				}
			
			//affichage de la page de réinitialisation du mot de passe
			$this->show('pages/espace-adherents/mdp-red', ["message" => $message, "messageLien" => $messageLien]);
		}
	}
?>