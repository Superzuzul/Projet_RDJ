<?php
$this->insert('partials/header',['titre'=>"Bar à Jeux à Thème - RevesdeJeux.com", 'description'=>"Rêves de Jeux vous propose d'adapter ses Bar à Jeux"]);
?>
<h1>Bar à Jeux à Thème</h1>
<section>
	<article>
		<p class="positionTexte">
			Nous pouvons vous organiser un Bar à Jeux à votre thème : sport, jeux de course, préhistoire, musique, films... 
		</p>
		<p class="positionTexte">
			Avec des jeux surdimensionnés, un conteur, un espace maquillage, des jeux informatiques en réseau... Nous pouvons aussi fournir du mobilier (chaises et tables) et une décoration dans l’ambiance de votre choix.
		</p>
	</article>
	<article>
		<figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_theme1.jpg") ?>" alt="une partie de droits perdus"></img>
            <figcaption>A la recherche des droits perdus</figcaption>
        </figure>
        <figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_theme2.jpg") ?>" alt="une partie du Seigneur des anneaux"></img>
            <figcaption>Sur le thème du seigneur des anneaux</figcaption>
        </figure>
        <figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_theme3.jpg") ?>" alt="Une partie des Chevaliers de la Table Ronde"></img>
            <figcaption>Jeu de coopération avec les Chevaliers de la Table Ronde</figcaption>
        </figure>
        <figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_bar_theme4.jpg") ?>" alt="Un theme écologique"></img>
            <figcaption>Ecologie urbaine</figcaption>
        </figure>
	</article>
</section>
<?php
$this->insert('partials/footer');
?>