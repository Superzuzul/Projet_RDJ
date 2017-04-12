<?php
$this->insert('partials/header',['titre'=>"Gamer Vidéo, colonie de vacance pour les 10/15 ans, séjour exclusivement consacré aux Jeux Vidéos, Nouvelles et Ancienne génération, Lan PC et rétro gaming, présenté par Rêves de Jeux...", 'description'=>"Gamer Vidéo est un séjour proposé par Rêves de Jeux spécialisé dans les Jeux Vidéos. Au programme, jeux en LAN, rétro-gaming, coopération et versus sur des consoles de toutes générations !"]);
?>
<h1>Séjour « Gamer Vidéo » pour les 13-17 ans (15 places) </h1>
<section>
	<article>
		<h2>Description du séjour</h2>
		<p>
			Tu es littéralement mordu de jeux vidéo ? Tu peux faire travailler tes méninges pendant des heures à la recherche des solutions qui te mèneront au niveau supérieur et à la victoire ? Tu t’es fait beaucoup de contacts à travers la pratique de jeux multi-joueurs ? Ou bien, tu aimes tout simplement y jouer de temps en temps et découvrir des tas de jeux différents pour essayer des jeux différents ? C’est sûr, tu as le profil ! Rejoins d’autres aficionados le temps d’un séjour unique en France, encadré par les professionnels de l’association Rêves de Jeux. Ces passionnés ont concocté pour vous un programme "Récréa-Éducatif" autour du jeu vidéo.
		</p>
		<p>
			Pratique intelligente du jeu sur PC en réseau et sur consoles : Wii, Wii U, PS4 et Xbox One, avec un petit détour du côté des anciennes consoles pour le délire "rétrogaming" (PS one et 2 et 3, Xbox 360, Game Cube, Nintendo 64, Méga Drive, etc.).   Et voici nos jeunes gamers plongé dans un univers convivial où l’imaginaire est sollicité sans relâche et les règles comprises, acquises et respectées. La préférence est donnée aux modes coopératifs et aux jeux multi-joueurs : une manière amicale de s'amuser et d’apprendre à jouer intelligemment, en toute solidarité.
		</p>
		<p>
			A raison de trois après-midi par semaine, des plages horaires sont aménagées pour ménager des pauses avec le monde du jeu vidéo. Ces instants sont consacrés à la pratique d’activités détente proposées sur le site, en intérieur ou extérieur. 
		</p>
	</article>
	<article>
		<h2>Le lieu</h2>
<?php 

//Je crée un nouvel objet de la classe SejourModel (en rapport avec la table sejour de la BDD)
$objetSejourModel=new \Model\SejourModel;
$tabResult=$objetSejourModel->search(['nomSejour'=>"gamer-video"]); //la methode search est défini dans la classe\W\Model\Model

$boucle1=false;

//on boucle à chaque case pour eviter la repetition
foreach ($tabResult as $key => $value) {

	if($boucle1==false){

		if(empty($value['lieu'])){
		echo '
		<p>
			Dans le Parc Naturel Régional du Livradois-Forez. Le centre d\'hébergement " Le PierLou "est situé à 900 mètres d\'altitude sur la commune d\' Echandelys (63980) en plein coeur du " Haut Livradois"...
			<p><a href="#">Pour en savoir plus...</a></p>
		</p>';
		} else echo '<p>'.$this->dateFr($value['lieu']).'</p>';

		$boucle1=true;
	}//fin du if false

	

}//fin du foreach

?>
		
	</article>
	<article>
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

				echo '<p>'.$this->dateFr($value['duree']).'</p>'; 

				}
				?>	
			</div>
			<div class="col-xs-3" id="tarif">
				<h3>Tarif</h3>
				<?php 
				foreach ($tabResult as $key => $value) {

				echo '<p>'.$this->dateFr($value['tarif']).'</p>'; 

				}
				?>	
			</div>
		</div>
	</article>
	<article>
		<h2>Réservation</h2>
		<p>
		Inscriptions à faire auprès de DJURINGA Juniors au 04 78 23 23 46 ou directement ici :
			<a href="https://www.djuringa-juniors.fr/gamer-video-2266.html"><button>S'inscrire à un séjour</button></a>
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