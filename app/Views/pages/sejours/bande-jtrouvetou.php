<?php
$this->insert('partials/header',['titre'=>"La bande à J’Trouvetou, colonie de vacance pour les 7-11 ans, séjour pour donner aux enfants les moyens de s'épanouir ! L'expertise de Rêves de Jeux adaptée aux plus jeunes !", 'description'=>"Ce séjour de vacances, qui accueille des enfants de 7 à 11 ans, donne aux enfants l'opportunité de s'épanouir, d'agir et de développer leur curiosité vis-à-vis du milieu dans lequel ils évoluent, tout en laissant libre cours à leur créativité et imagination"]);
?>
<h1>Séjour « La bande à J’Trouvetou » pour les 7-11 ans (14 places) </h1>

<section>
	<article>
		<h2>Description du séjour</h2>
		<p>
			« La bande à J’Trouvetou » est un séjour qui donne aux enfants l'opportunité de s'épanouir, d'agir et de développer leur curiosité vis-à-vis du milieu dans lequel ils évoluent, tout en laissant libre cours à leur créativité et imagination.  
		</p>
		<p>
           Ce séjour entraînera les enfants dans une série de péripéties insolites au fil d’une histoire mise en scène dans le décor naturel du Centre. Heureusement, la bande à J’Trouvetou est là pour les aider à passer ces épreuves ! Celles-ci, tout en étant ludiques, sont l’occasion de redécouvrir la magie et la beauté de la nature ainsi que son importance et aussi de favoriser l’expression de la créativité des enfants en leur faisant découvrir d’autres matériaux, d’autres outils pour s’exprimer, laisser une bonne empreinte de leur passage. Les enfants seront guidés dans leur quête par les animateurs du Pierlou, grands spécialistes de mystères en tous genres. 
		</p>
		<p>
            Pendant ce séjour, un éventail d’activités au choix favorisera la motricité, l’éveil, et l’expression : jeu de piste et activités sensorielles de découverte de la nature, randonnée au fil de l’eau, promenade nocturne à la recherche des énigmes de la forêt, fabrication d’hôtels à insectes, pyrogravure sur bois, création du talisman et peinture sur tissu du blason de la bande à J’Trouvetou, initiation slackline et escalade au sol, etc.
		</p>
	</article>
	<article>
		<h2>Le lieu</h2>
		<p>
			Dans le Parc Naturel Régional du Livradois-Forez. Le centre d' hébergement " Le PierLou " est situé à 900 mètres d'altitude sur la commune d' Echandelys (63980) en plein coeur du " Haut Livradois"...
			<p><a href="#">Pour en savoir plus...</a></p>
		</p>
	</article>
	<article>
	<?php 

//Je crée un nouvel objet de la classe SejourModel (en rapport avec la table sejour de la BDD)
$objetSejourModel=new \Model\SejourModel;
$tabResult=$objetSejourModel->search(['nomSejour'=>"bande-jtrouvetou"]); //la methode search est défini dans la classe\W\Model\Model

//on boucle à chaque case pour eviter la repetition

//S'il n'y a aucun séjour annoncés, on affiche juste un html banal
if(empty($tabResult)){
	echo
	'
		<h2>Dates et Tarifs</h2>
		<div class="row">
			<div class="col-xs-3" id="dateDepart">
				<h3>Date de départ</h3>
                <p>A venir...</p>
			</div>
			<div class="col-xs-3" id="dateRetour">
				<h3>Date de retour</h3>
                <p>A venir...</p>
			</div>
			<div class="col-xs-3" id="duree">
				<h3>Durée</h3>
                <p>A venir...</p>
			</div>
			<div class="col-xs-3" id="tarif">
				<h3>Tarif</h3>
                <p>A venir...</p>
			</div>
		</div>
	</article>
	
	';
}else{

?>
		<h2>Dates et Tarifs</h2>
		<div class="row">
			<div class="col-xs-3" id="dateDepart">
				<h3>Date de départ</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$this->dateFr($value['dateDepart']).'</p>'; 

				}
				?>	

			</div>
			<div class="col-xs-3" id="dateRetour">
				<h3>Date de retour</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$this->dateFr($value['dateRetour']).'</p>'; 

				}
				?>	
			</div>
			<div class="col-xs-3" id="duree">
				<h3>Durée</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$value['duree'].' jours</p>'; 

				}
				?>	
			</div>
			<div class="col-xs-3" id="tarif">
				<h3>Tarif</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$value['tarif'].' €</p>'; 

				}
				?>	
			</div>
		</div>
	</article>
<?php 
} //fin du else empty($tabResult)
?>	
	<article>
		<h2>Réservation</h2>
		<p>
            A venir...
		</p>
	</article>
	<article>
		<h2>Une question ?</h2>
		<p>Vous souhaitez obtenir plus d'information sur les séjours ? N'hésitez pas <a href="contact.php">à nous contacter</a> et nous répondrons à toutes vos interrogations !</p>
	</article>
</section>

<?php
$this->insert('partials/footer');
?>