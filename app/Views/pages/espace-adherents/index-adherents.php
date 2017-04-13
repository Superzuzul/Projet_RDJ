<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - identification", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1 id="esp-pers" class="text-center">Espace personnel</h1>

<section>

	<form action="loginUtilisateur.php" method="post" id="form-adherent">
		<div class="form-group text-center" id="adherent-mail">
			<label for="email">Email :</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Saisissez votre mail" required />
		</div>
		<div class="form-group text-center" id="adherent-mdp">
			<label for="mdp">Mot de Passe :</label>
			<input type="password" name="mdp" id="mdp" class="form-control" placeholder="Entrez votre mot de passe" required />
		</div>
		<div class="form-group text-center">
			<button type="submit" name="btnSub" id="adherent-btn-submit">Entrez sur votre espace</button>
		</div>
		
		
		<div class="form-group text-center" id="adherent-mdp-perdu">
			<p>Mot de passe perdu ?
				<!-- <br/><a href="perdu.php">cliquez ici</a>  pour retrouver l'accès à votre espace ! -->
				<br/><a href=<?php echo $this->url("user_mdp_adherents") ?>>cliquez ici</a>  pour retrouver l'accès à votre espace !
			</p>
		</div>
	</form>
</section>

<?php
$this->insert('partials/footer');
?>