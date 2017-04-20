<?php
$this->insert('partials/header',['titre'=>"Rêve de Nature Bar à Jeux - RevesdeJeux.com", 'description'=>"Rêves de Jeux vous propose un bar à jeux spécial pour le festival Rêve de Nature"]);
?>
<h1>Bar à Jeux Rêve de Nature</h1>
<section>
	<article>
		<p>
			C’est un espace où sont mis à disposition toutes sortes de jeux sur le thème de l’écocitoyenneté, l’environnement, la nature et l’écologie urbaine :
		</p>
	</article>
	<article>
		<figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_a_nature1.jpg") ?>" alt="Un après midi sur le theme de la nature"></img>
            <figcaption>Dehors s'il fait beau</figcaption>
        </figure>
        <figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_a_nature2.jpg") ?>" alt="Des enfants jouant en sur un mobilier adapté"></img>
            <figcaption>Sur un mobilier adapté pour les plus petits...</figcaption>
        </figure>
        <figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_a_nature3.jpg") ?>" alt="Des enfants sur un jeu de coopération"></img>
            <figcaption>Jeux de coopération aussi...</figcaption>
        </figure>
        <figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_a_nature4.jpg") ?>" alt="Une partie du jeu Gaïa, un jeu géant pour plusieurs joueurs"></img>
            <figcaption>Gaïa, un jeu géant pour appréhender le futur de la Terre à travers divers scénarios.</figcaption>
        </figure>
	</article>
</section>

<?php
$this->insert('partials/footer');
?>