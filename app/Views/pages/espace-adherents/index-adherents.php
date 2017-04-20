<?php
$this->insert('partials/header',['titre'=>"Espace Adhérent | RêvesdeJeux.com", 'description'=>"L'espace adhérent de Rêves de Jeux vous permet d'accéder à des contenus exclusifs : photos, chat entre membres,..."]);
?>

<section>

<h1 id="esp-pers" class="text-center">Espace personnel</h1>

	<!-- <?php debug($w_user); ?> -->

	<div class="message text-center" id="bienvenue">
		<?php
			// on crée une variable qui contiendra uniquement le login de l'utilisateur
			$login = $w_user["prenomMembre"];
			$message = "BIENVENUE $login !";
			echo $message;
		?>
	</div>

	<div id="sections-adherent">
		<div class="images text-center">
    		<figure>
    			<a href="<?= $this->url('default_photos_sejour')?>"><img src="<?php echo $this->assetUrl("/img/section_photos.jpg") ?>" alt="section Photos"></img></a>
    			<figcaption><em>Section Photos</em></figcaption>
    		</figure>
    		<figure>
    			<a href="<?= $this->url('default_chat')?>"><img src="<?php echo $this->assetUrl("/img/section_chat.jpg") ?>" alt="section Chat"></img></a>
    			<figcaption><em>Section Chat</em></figcaption>
    		</figure>
    	</div>
	</div>
</section>


<?php
$this->insert('partials/footer');
?>
