<?php
$this->insert('partials/header',['titre'=>"Rêves d'Aventures, colonie de vacance pour les 6-11 ans, séjour pour vivre des aventures médiévales ! L'expertise de Rêves de Jeux adaptée aux plus jeunes !", 'description'=>'Ce séjour de vacances accueille uniquement des enfants de 6 à 11 ans. Ils vont vivre des aventures "Grandeur Nature" inoubliables et sauver le monde connu ! Laissez-les se transformer en héros en toute sécurité avec nos équipes aguerries dans l’encadrement des plus jeunes, comme des plus grands']);
?>
<h1>Séjour « Rêves d'Aventures» pour les 6-11 ans (24 places)</h1>
<section>
	<article>
		<h2>Description du séjour</h2>
		<p>
			Notre séjour « Rêves d’Aventures » permet à votre enfant de se plonger dans une histoire interactive moyenâgeuse et fantastique. Le projet pédagogique, relayé par nos équipes professionnelles, offre un cadre préparé et sécurisant aux enfants de 6 à 11 ans qui vivront l’aventure avec nous pendant ces 8 jours. 
		</p>
		<p>
		    Trois objectifs pour ce séjour : favoriser l’épanouissement, encourager l’autonomie et la créativité, et faire découvrir la collectivité et l’apprentissage des règles du groupe à l’enfant. Pour y parvenir : création, travaux manuels, fair-play, développement de l’imaginaire, connaissance de l’histoire, approche de la nature et animaux de la basse cour, escrime et archerie "douce", joutes et jeux en tous genres dans un univers médiéval fantastique unique sont au programme.
            L’intrigue à laquelle les enfants sont conviés leur permettra d’incarner des personnages et d’interagir avec le monde, à tel point que c’est grâce à eux que l’histoire évoluera. Ils pourront ainsi exploiter leurs dons personnels et laisser libre cours à leur soif de connaître et de rêver dans un cadre parfaitement balisé et préparé par nos soins.
		</p>
		<p>
		    Laissez-les fermer les yeux et nous rejoindre pour un séjour inoubliable !
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
$tabResult=$objetSejourModel->search(['nomSejour'=>"reves-aventures"]); //la methode search est défini dans la classe\W\Model\Model

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