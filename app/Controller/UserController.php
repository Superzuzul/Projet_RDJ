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
			// on va utiliser un objet de la classe \W\Security\AuthentificationModel
			$objetAuthentificationModel = new \W\Security\AuthentificationModel;
			$objetAuthentificationModel->logUserOut();
	        
	        // REDIRIGER VERS LA PAGE DE LOGIN
	        $this->redirectToRoute("default_index_adherents");
		}

		// METHODE ASSOCIEE A LA ROUTE /users/login
	    public function login ()
	    {
	    	$message = "";

			// TRAITER LE FORMULAIRE DE LOGIN
			if(isset($_REQUEST["operation"]) && ($_REQUEST["operation"] == "login"))
			{
				// RECUPERER LES INFOS
				$login 		= trim($_REQUEST["login"]);
				$password 	=  trim($_REQUEST["password"]);

				// UN PEU DE SECURITE
				if(is_string($login) && (mb_strlen($login) > 4)
						&& is_string($password) && (mb_strlen($password) > 4)	// mb (multi-byte) : va gérer les charsets sur plusieurs octets
					)
				{
	                // ON VA VERIFIER SI LES INFOS CORRESPONDENT A UNE LIGNE DANS LA TABLE MYSQL
	                // ON VA UTILISER LA CLASSE \W\Security\AuthentificationModel
					$objetAuthentificationModel = new \W\Security\AuthentificationModel;
					// $idUser => 0 SI AUCUNE LIGNE NE CORRESPOND
					// $idUser => id DE LA LIGNE TROUVEE
					$idUser = $objetAuthentificationModel->isValidLoginInfo($login, $password);
					if($idUser > 0)
					{
						// OK
						$message = "BIENVENUE $idUser";
						$objetUsersModel = new \W\Model\UsersModel;
	                    
	                    // ON RECUPERE TOUTE LA LIGNE SUR L'UTILISATEUR
						$tabUser = $objetUsersModel->find($idUser);

						// JE VAIS MEMORISER CES INFOS DANS UNE SESSION
						$objetAuthentificationModel->logUserIn($tabUser);
                    
	                    // ON PEUT FAIRE UNE REDIRECTION VERS UNE PAGE PROTEGEE
	                    // ...
					}
					else
					{
						// KO
						$message = "IDENTIFIANTS INCORRECTS";
					}
	            }
	            else
	            {
	                $message = "INFO INCORRECTE";
	            }
			}
	        // VIEW
	        $this->show("pages/espace-adherents/login", ["message" => $message]);
		}

		// methode MDP PERDU
		public function mdpPerdu(){

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