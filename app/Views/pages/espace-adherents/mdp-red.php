<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - Modification de votre mot de passe", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1 id="esp-pers" class="text-center">Espace personnel</h1>

<p class="text-center">Merci de renseigner un nouveau mot de passe dans l'emplacement dédié ci-dessous, et le confirmer ensuite.</p>


<section>
	<form method="post" id="form-mdp-red">
		<div class="form-group text-center" id="mdp-red-motdepasse">
			<label for="motdepasse">Votre nouveau mot de Passe :</label>
			<input type="password" name="motdepasse" id="motdepasse" class="form-control" placeholder="Saisissez votre nouveau mot de passe" required />
		</div>
		<div class="form-group text-center" id="mdp-red-conf_motdepasse">
			<label for="conf_motdepasse">Confirmez votre nouveau mot de Passe :</label>
			<input type="password" name="conf_motdepasse" id="conf_motdepasse" class="form-control" placeholder="Confirmez votre nouveau mot de passe" required />
		</div>

		<!-- INFO TECHNIQUE POUR PRECISER L'ACTION QUE LE VISITEUR VEUT REALISER -->
		<input type="hidden" name="operation" value="mdp-redefinition" />

		<div class="form-group text-center">
			<button type="submit" name="btnSub" id="mdp-red-btn-submit">Envoyer</button>
		</div>

		<br/>
		<p class="text-center" id="suite-mdp-red">Par la suite, pour vous connecter à votre espace, <br/>retenez simplement votre identifiant et ce nouveau mot de passe.</p>
	</form>

</section>

<?php
$this->insert('partials/footer');
?>