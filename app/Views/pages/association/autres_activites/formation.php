<?php
$this->insert('partials/header',['titre'=>"Formation - RevesdeJeux.com", 'description'=>"Rêves de Jeux vous propose des formations pour en apprendre plus concernant l'aspect pédagogique des jeux"]);
?>
<h1>Des formations</h1>
<section>
	<article>
		<h2>Présentation</h2>
		<p>
			Jeux de société et Jeux de Rôles : que peut on faire en animation avec un jeu ? Faire jouer, certes... mais il y a tellement d’autres choses à mettre en place... il peut être un outil de sensibilisation, d’apprentissage de la vie en société, du respect... il est indispensable d’avoir une formation technique et pédagogique pour l’utilisation de cet outil et éviter les dérives !
		</p>
		<figure>
	        <img src="<?php echo $this->assetUrl("/img/autres-activites/e_formation1.jpg") ?>" alt="Un grand nombre de jeux"></img>
	        <figcaption>Quasiment tous les jeux de société sont pédagogiques, mais qui le sait ?</figcaption>
	    </figure>
		<figure>
	        <img src="<?php echo $this->assetUrl("/img/autres-activites/e_formation2.jpg") ?>" alt="Une conférence autour des jeux"></img>
	        <figcaption>Des généralités...</figcaption>
	    </figure>
	    <figure>
	        <img src="<?php echo $this->assetUrl("/img/autres-activites/e_formation3.jpg") ?>" alt="Une partie de jeu pour apprendre"></img>
	        <figcaption>Mais aussi des petits ateliers pour apprendre</figcaption>
	    </figure>
	    <figure>
	        <img src="<?php echo $this->assetUrl("/img/autres-activites/e_formation4.jpg") ?>" alt="Une partie de jeu de rôles"></img>
	        <figcaption>Une petite partie d’initiation Jeu de Rôle pour bien savoir de quoi on parle</figcaption>
	    </figure>        
	</article>
</section>	
<?php
$this->insert('partials/footer');
?>