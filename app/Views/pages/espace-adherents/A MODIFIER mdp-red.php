<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - Modification de votre mot de passe", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1 id="esp-pers" class="text-center">Espace personnel</h1>

<p class="text-center">Vous avez signalé votre mot de passe comme perdu.</p>
<p class="text-center">Merci de renseigner votre email ci-dessous, afin que nous puissions vous envoyer un lien vous permettant la réinitialisation de votre mot de passe.</p>

<section>

	<!-- code pris du fichier de Bruno "sendToken.php" -->

	<form method="post" id="form-mdp-adherents">
		<div class="form-group text-center" id="mdp-adherents-mail">
			<label for="email">Entrez votre email :</label>
			<input type="email" name="email" id="mdp-adherents-input_mail" class="form-control" placeholder="Saisissez votre mail" required />
		</div>
		<div class="form-group text-center">
			<button type="submit" name="btnSub" id="mdp-adherents-btn-submit">Envoyer</button>
		</div>
	</form>

</section>

<?php
$this->insert('partials/footer');
?>