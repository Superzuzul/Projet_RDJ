<?php
$this->insert('partials/header',['titre'=>"Rêves de Jeux Classique, colonie de vacance pour les 12/17 ans, acitivités Jeux de Rôles, Jeux de Sociétés, Jeux vidéos...", 'description'=>"Rêves de Jeux propose des colonies de vacances pour les 12/17 ans pendant l'été, spécialisés le jeu sous toutes ses formes (Jeux de sociétés, Jeux de rôles, Jeux vidéos, Grandeur Natures, activités extérieurs)"]);
?>


<section>
<h1>Séjour « RDJ Classic" » pour les 12-17 ans (60 places)</h1>
	<article>
		<h2>Description du séjour</h2>
		<figure>
	        <img src="<?php echo $this->assetUrl("/img/rdj-classique/classique1.jpg") ?>" alt="Un peuple lors de l'événementiel GN prenant la pose."></img>
	        <figcaption>Plongez-vous dans un monde d'aventure !</figcaption>
	    </figure>
		<p class="positionTexte">
			Dans cette colonie de vacances créée en 1984, toujours unique en France et désormais culte, nos "Geek-Anim" très spécialisés vous proposent l'immersion dans le monde des jeux sous toute ses facettes : de société, d'aventure, de rôle, de simulation, de coopération, avec du Grandeur Nature organisé autour d’un thème médiéval fantastique (Seigneur des Anneaux, Games of Thrones, Excalibur…), des jeux en réseau, des événementiels thématisés (Star Wars, Matrix, Dune, etc.) et tant d'autres activités : tir à l'arc GN, escrime médiévale douce, Blast Zone, nuit du jeu, vidéo, murder, barbecues, feu de camp et guitares, …).
		</p>
		<p class="positionTexte">
			Équipés comme des pros (matériel, costumes, accessoires, décors, jeux, etc.), vous n'allez pas en croire vos yeux ! Toutes les composantes du jeu sont abordées dans ce séjour qui envisage le jeu comme un outil facétieux au service de l'apprentissage des règles sociales et du  développement des capacités. Être soi oui, mais sans oublier l’importance du travail d’équipe et de la communication. Ici, le joueur s'amuse et passe de très bonnes vacances tout en apprenant à gagner, à perdre et aussi à apprendre en perdant.
		</p>
	</article>
	<article class="row" id="bloc_pierlou">
		<div class="col-xs-12 col-md-4">
			<h2>Le lieu</h2>
			<figure>
		        <img id="img_pierlou" src="<?php echo $this->assetUrl("/img/lieu/lieu4.jpg") ?>" alt="Photo du Pierlou vu de l'extérieur"></img>
		        <figcaption id="figcaption_pierlou">Une belle journée au Pierlou</figcaption>
		    </figure>
		</div>
		<p class="positionTexte">
			Dans le Parc Naturel Régional du Livradois-Forez. Le centre d' hébergement " Le PierLou " est situé à 900 mètres d'altitude sur la commune d' Echandelys (63980) en plein coeur du " Haut Livradois"...
			<p><a href="#">Pour en savoir plus...</a></p>
		</p>		
	</article>



	<article>
<?php 

//Je crée un nouvel objet de la classe SejourModel (en rapport avec la table sejour de la BDD)
$objetSejourModel=new \Model\SejourModel;
$tabResult=$objetSejourModel->search(['nomSejour'=>"rdj-classique"]); //la methode search est défini dans la classe\W\Model\Model

//on boucle à chaque case pour eviter la repetition

?>
		<h2>Dates et Tarifs</h2>
		<div class="row">
			<div class="col-xs-12 col-md-3" id="dateDepart">
				<h3>Date de départ</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$this->dateFr($value['dateDepart']).'</p>'; 

				}
				?>	

			</div>
			<div class="col-xs-12 col-md-3" id="dateRetour">
				<h3>Date de retour</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$this->dateFr($value['dateRetour']).'</p>'; 

				}
				?>	
			</div>
			<div class="col-xs-12 col-md-3" id="duree">
				<h3>Durée</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$value['duree'].' jours</p>'; 

				}
				?>	
			</div>
			<div class="col-xs-12 col-md-3" id="tarif">
				<h3>Tarif</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$value['tarif'].' €</p>'; 

				}
				?>	
			</div>
		</div>
	</article>
	<article>
		<h2>Réservation</h2>
		<p class="positionTexte">
		Inscriptions à faire auprès de DJURINGA Juniors au 04 78 23 23 46 ou directement ici :
			<a href="https://www.djuringa-juniors.fr/reves-de-jeux-2264.html"><button>S'inscrire à un séjour</button></a>
		</p>
		<figure>
	        <img src="<?php echo $this->assetUrl("/img/rdj-classique/classique2.jpg") ?>" alt="Des enfants jouants au jeu LINK avec un animateur"></img>
	        <figcaption>Profitez des temps calmes pour découvrir de nouveaux jeux</figcaption>
	    </figure>	
	</article>
	<article>
		<h2>Une question ?</h2>
		<p class="positionTexte">Vous souhaitez obtenir plus d'information sur les séjours ? N'hésitez pas <a href="<?= $this->url('default_contact'); ?>">à nous contacter</a> et nous répondrons à toutes vos interrogations !</p>
	</article>
</section>
<?php
$this->insert('partials/footer');
?>