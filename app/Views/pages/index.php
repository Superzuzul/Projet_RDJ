<?php

$this->insert('partials/header',['title'=>"Accueil"]);

?>

<section class="articles">
	<article id="sejourEte">
		<h2>Séjours d'été</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis fuga harum obcaecati laudantium quidem, molestiae ducimus dicta repudiandae ad laboriosam.</p>
		<p class="lienArticle"><a href="#">En savoir plus</a></p>
	</article>
	<article id="evenements">
		<h2>Evenements à venir</h2>
		<div>
			<!-- UTILISER LE CONTROLLER POUR AFFICHER DYNAMIQUEMENT LA LISTE DES EVENEMENTS A VENIR
			foreach ($evenements as $key => $evenement) {
				echo "<div> Le ".dateFr($evenement["dateEvenement"])." : ".$evenement["nomEvenement"]." à ".$evenement['lieuEvenement']."</div>";
			}
			?> -->
		</div>
	</article>
	<article id="projetAssociatif">
		<h2>Notre projet associatif</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis fuga harum obcaecati laudantium quidem, molestiae ducimus dicta repudiandae ad laboriosam.</p>
		<p class="lienArticle"><a href="#">En savoir plus</a></p>
	</article>
</section>




<?php/*

$this->insert('partials/footer');

*/?>