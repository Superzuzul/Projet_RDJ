<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - Modification de votre mot de passe", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1>Espace personnel</h1>
<section>

	<!-- code pris du fichier de Bruno "sendToken.php" -->

	<form method="post" id="form-mdp-adherents">
		<div class="form-group text-center" id="mdp-adherents-mail">
			<label for="email">Email :</label>
			<input type="email" name="email" id="mdp-adherents-input_mail" class="form-control" placeholder="Saisissez votre mail" required />
		</div>
		<div class="form-group text-center">
			<button type="submit" name="btnSub" class="btn btn-success" id="adherent-btn-submit">Envoyer</button>
		</div>
	</form>

</section>

<?php
$this->insert('partials/footer');
?>