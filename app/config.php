<?php 

$w_config = [
   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
    'db_pass' => '',								//mot de passe de la bdd
    'db_name' => 'revesdejeux',						//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'membre',					//nom de la table contenant les infos des utilisateurs
	'security_id_property' => 'idMembre',				//nom de la colonne pour la clef primaire
	'security_username_property' => 'prenomMembre',		//nom de la colonne pour le prénom
	'security_email_property' => 'emailMembre',			//nom de la colonne pour l'"email"
	'security_password_property' => 'mdpMembre',		//nom de la colonne pour le "mot de passe"
	'security_role_property' => 'roleMembre',			//nom de la colonne pour le "role"

	'security_login_route_name' => 'login',				//nom de la route affichant le formulaire de connexion

	// configuration globale
	'site_name'	=> 'Reves de Jeux',						// contiendra le nom du site
];

require('routes.php');

