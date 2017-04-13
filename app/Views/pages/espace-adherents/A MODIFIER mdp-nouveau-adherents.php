<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - Modification de votre mot de passe", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1>Espace personnel</h1>
<section>

	<form action="sendToken.php" method="post">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" 
						 class="form-control" required />
		</div>
		<div class="form-group text-center">
			<input type="submit" name="btnSub" value="Envoyer"
						 class="btn btn-success" />
		</div>
	</form>
	
<!-- code pris dans "newPass.php" -->
	<?php

		//récupération du token dans l'url (+ nettoyage)
		$token = strip_tags($_GET['token']);
		//connexion bdd
		$bdd = new PDO('mysql:host=localhost;dbname=bioforce3;charset=utf8','root', '');
		//recherche de l'idClient correspondant au token
		$rqClient = "SELECT idClient
								 FROM clients
								 WHERE token = ?";
		$stmtClient = $bdd->prepare($rqClient);
		$params = array($token);
		$stmtClient->execute($params);
		$idClient = $stmtClient->fetchColumn();
		//si le client n'est pas absent de la table
		if($idClient !== false)
		{
			//affichage du formulaire
	?>
			<form method="post" action="updatePass.php" id="form-adherent">
				<!-- < ? = est équivalent à < ? php echo -->
				<input type="hidden" name="idClient" value="<?= $idClient; ?>" />
				<div class="form-group text-center" id="adherent-mdp-nouveau">
					<label for="mdp-nouveau">Nouveau mot de Passe :</label>
					<input type="password" name="password" class="form-control" />
					<input type="password" name="mdp-nouveau" id="mdp-nouveau" class="form-control" placeholder="Entrez votre nouveau mot de passe" required />
				</div>
				<div class="form-group text-center">
					<input type="submit" name="btnSub" value="Modifier"
								 class="btn btn-success" />
				</div>
			</form>
	<?php
		}
		else echo 'token non trouvé';
	?>

</section>

<?php
$this->insert('partials/footer');
?>