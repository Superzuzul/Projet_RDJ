<?php
$this->insert('partials/header',['titre'=>"En Quête d'Aventures, colonie de vacance pour les 6-10 ans, séjour pour vivre des aventures dans des univers hauts en couleurs ! L'expertise de Rêves de Jeux adaptée aux plus jeunes !", 'description'=>"Ce séjour de vacances accueille des enfants de 6 à 10 ans pour vivre des aventures inoubliables au coeur d'univers variés et passionants ! Laissez-les explorer le monde en toute sécurité avec nos équipes aguerries dans l’encadrement des plus jeunes, comme des plus grands"]);
?>
<h1>Séjour "En-quête  d’aventures" pour les 6-10 ans (14 places)</h1>
<section>
	<article>
		<h2>Description du séjour</h2>
		<p>
			Si tu désires devenir un trappeur, chercher des paillettes d'or dans le lit de la rivière du Pierlou ou trouver des ossements et des pierres anciennes, si tu veux t'occuper des animaux de ta petite ferme et du potager, ou découvrir la forêt mystérieuse avec ton clan d'aventurier(e)s et votre chien "Pisteur" (avec pique-nique), si tu veux construire un pont ou une petite maison dans les bois, faire de l'artisanat de tes propres mains, et, selon la météo, partir en Ballade Crépusculaire Animée Légendaire, faire des veillées autour du feu de camp et dormir une nuit dehors sous tente, ce séjour est fait pour toi ! 
		</p>
		<p>
            Mais, si tu rêves aussi d'aventures fantastiques, de retrouver des choses qui disparaissent, de faire repartir des choses qui apparaissent, il te faudra partir à la découverte des mystères du Pierlou, là où vivent petits et grands êtres. Ces derniers préoccupés par différents problèmes, vous confieront des missions par le biais de messages et de signes laissés de-ci, de-là. Enfin, tu pourras avoir un vrai goûter de "la Mammée" avec de bons gâteaux faits maisons à l'heure du réconfort et des initiations à la dégustations de jus de fruit du PierLou.
		</p>
		<p>
            Tout en favorisant l’épanouissement personnel, l’autonomie et l’apprentissage de la vie en collectivité, le séjour est fait pour permettre aux enfants de s’amuser pendant une semaine en vivant des aventures de baroudeur. Construction, joutes, jeux, recherches, et action, voilà le monde dans lequel évolueront les petits aventuriers de 6 à 11 ans, monde où la frontière entre réalité et imaginaire se déplace dans le temps.
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
$tabResult=$objetSejourModel->search(['nomSejour'=>"en-quete-aventures"]); //la methode search est défini dans la classe\W\Model\Model

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