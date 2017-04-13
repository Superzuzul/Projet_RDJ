<?php
$this->insert('partials/header',['titre'=>"Rêve de Nature - RevesdeJeux.com", 'description'=>"Rêves de Jeux vous propose un festival partant à la découverte des enjeux écologique concernant notre planete"]);
?>
<h1>Festival Rêve de Nature</h1>
<section>
	<article>
		<h2>Festival de jeux à la découverte des enjeux futurs écologiques</h2>
		<p>
			Rêve de nature est un festival né de la rencontre et du désir de deux personnes : Luc Blanckaert (Ecosystèmes à Lille) et Jean-Pierre Boillon, de Rêves De Jeux. Ils voulaient communiquer plus largement avec le public et sensibiliser plus spécifiquement les enfants aux enjeux de notre, leur, futur. Et ils l’ont fait !
		</p>
		<p>
			Luc, pour la partie environnementale, et Jean-Pierre, pour la partie ludique, ont conçu tous les outils adaptés pour cette nouvelle façon d’aborder l’écologie urbaine. Durant plusieurs jours, jeux de société, ateliers, pièces de théâtre interactives, jeux Grandeur Nature et activités sportives permettent à tous les visiteurs de découvrir et de comprendre les mécanismes naturels dans une ambiance unique où personne n’a l’impression d’être venu apprendre.
		</p>
	</article>
	<article>
		<figure>
            <img src="<?php echo $this->assetUrl("/img/autres-activites/e_reve_de_nature.jpg") ?>" alt="Le festival Rêve de Nature"></img>
            <figcaption>Un festival où la préocupation numéro une est de s'amuser écologiquement</figcaption>
        </figure>
        <p>
        	Les thèmes abordés concernent autant l’écologie que les préoccupations des collectivités locales et territoriales (gestion des déchets ménagers, transports et déplacements, espaces verts, qualité de l’eau et de l’air, nuisances sonores, urbanisme...).
        </p>
        <p>
        	Les notions de respect, solidarité et développement durable sont associées aux comportements quotidiens et à leur impact sur l’environnement. A l’issue de son parcours ludique, l’égocitoyen fait place à l’écocitoyen.
        </p>
	</article>
</section>
<?php
$this->insert('partials/footer');
?>