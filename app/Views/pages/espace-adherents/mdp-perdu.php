<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - Mot de passe perdu", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1 id="esp-pers" class="text-center">Espace personnel</h1>

<p class="text-center">Vous avez signalé votre mot de passe comme perdu.</p>
<p class="text-center">Merci de renseigner votre email ci-dessous, afin que nous puissions vous envoyer un lien vous permettant la réinitialisation de votre mot de passe.</p>

<section>
	<form method="post" id="form-mdp-perdu">
		<div class="form-group text-center" id="mdp-perdu-mail">
			<label for="email">Entrez votre email :</label>
			<input type="email" name="email" id="mdp-perdu-input_mail" class="form-control" placeholder="Saisissez votre mail" required />
		</div>

		<!-- INFO TECHNIQUE POUR PRECISER L'ACTION QUE LE VISITEUR VEUT REALISER -->
		<input type="hidden" name="operation" value="mdp-perdu" />

		<div class="form-group text-center">
			<button type="submit" name="btnSub" id="mdp-perdu-btn-submit">Envoyer</button>
		</div>
	</form>

</section>

<?php
$this->insert('partials/footer');
?>
