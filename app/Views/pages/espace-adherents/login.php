<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent - identification | RêvesdeJeux.com", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<h1 id="esp-pers" class="text-center">Espace personnel</h1>

<section>

	<?php
		// $mdpass = "123456";
		// $mdpass_hash = password_hash($mdpass, PASSWORD_DEFAULT);
		// echo $mdpass_hash;
		if(!empty($message)){
			echo '<div class="message text-center">'. $message. '</div>';
		}
	?>

	<form action="" method="post" id="form-login">
		<div class="form-group text-center" id="login-mail">
			<label for="email">Email :</label>
			<input type="email" name="email" id="email" class="form-control" placeholder="Saisissez votre mail" required />
		</div>
		<div class="form-group text-center" id="login-mdp">
			<label for="mdp">Mot de Passe :</label>
			<input type="password" name="mdp" id="mdp" class="form-control" placeholder="Entrez votre mot de passe" required />
		</div>

		<!-- INFO TECHNIQUE POUR PRECISER L'ACTION QUE LE VISITEUR VEUT REALISER -->
		<input type="hidden" name="operation" value="login" />

		<div class="form-group text-center">
			<button type="submit" name="btnSub" id="login-btn-submit">Entrez sur votre espace</button>
		</div>
		
		
		<div class="form-group text-center" id="login-mdp-perdu">
			<p>Mot de passe perdu ?
				<br/><a href=<?php echo $this->url("user_mdp_perdu") ?>>cliquez ici</a> pour retrouver l'accès à votre espace !
			</p>
		</div>
	</form>
	
</section>

<?php
$this->insert('partials/footer');
?>