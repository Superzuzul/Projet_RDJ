<?php
$this->insert('partials/header',['titre'=>"Rêves de Jeux découverte, colonie de vacance pour les 9-12 ans, séjour consacré au jeu sous toutes ses formes ! Le petit frère de Rêves de Jeux Classique !", 'description'=>'Rêves de Jeux Découverte est un séjour de vacance pour les 9-12 ans se déroulant pendant RDJ Classique ! Les petits font les mêmes activités que les grands mais adaptées à leurs capacités.']);
?>
<h1>Séjour « Rêves de Jeux Découvertes » pour les 9-12 ans (20 places)</h1>
<section>
	<article>
		<h2>Description du séjour</h2>
		<p>
			Toutes les composantes du jeu sont abordées dans ce séjour qui envisage le jeu comme un outil facétieux au service de l'apprentissage des règles sociales et du  développement des capacités. De société, d'aventure, de rôles, de simulation, en réseau, vidéo, etc. Le jeu se décline sous toutes ses formes pour enseigner aux jeunes l’importance du travail d’équipe et de la communication. Car il leur faudra ruser, rivaliser d’hardiesse (de corps et d’esprit !), faire preuve d’imagination et  échafauder des plans pour dénouer les intrigues fantastiques et venir à bout des énigmes médiévales des jeux de rôle « grandeur nature ». En parallèle, et pour rester dans la thématique, les jeunes s’adonnent à l’escrime et à l’archerie médiévale. Ce séjour, petit frère de "<a href="rdjClassique.php">RÊVES DE JEUX Classic"</a> (en été) a été créé pour pouvoir "gouter" au grand frère sur une plus petite période. 

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
$tabResult=$objetSejourModel->search(['nomSejour'=>"rdj-decouvertes"]); //la methode search est défini dans la classe\W\Model\Model

//on boucle à chaque case pour eviter la repetition

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
	<article>
		<h2>Réservation</h2>
		<p>
		Inscriptions à faire auprès de DJURINGA Juniors au 04 78 23 23 46 ou directement ici :
			<a href="https://www.djuringa-juniors.fr/reves-de-jeux-decouverte-2837.html"><button>S'inscrire à un séjour</button></a>
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