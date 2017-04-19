<?php
$this->insert('partials/header',['titre'=>"Admin séjour update - RêvesdeJeux.com", 'description'=>"Modification d'un séjour"]);


//On va chercher les infos du sejour dans la table MYSQL
//Approche par délégation

$objetSejourModel=new\Model\SejourModel;
$tabSejour=$objetSejourModel->find($id);

if(!empty($tabSejour)){

    //Récupération de chaque colonne

    $nomSejour=$tabSejour['nomSejour'];
    $lieu=$tabSejour['lieu'];
    $dateDepart=$tabSejour['dateDepart'];
    $dateRetour=$tabSejour['dateRetour'];
    $duree=$tabSejour['duree'];
    $tarif=$tabSejour['tarif'];

?>

<h1>Modification des séjours</h1>
<section>
	<article>
		<h2>Création d'un séjour</h2>
		<form action="" method="post">

			<label for="nomSejour">Nom du séjour</label><br>
			<input type="text" name="nomSejour" id="nomSejour" placeholder="Nom du séjour" required value="<?= $nomSejour;?>"><br>

			<label for="lieu">Lieu (non obligatoire, échandelys se met par défaut)</label><br>
			<input type="text" name="lieu" id="lieu" placeholder="lieu du séjour" value="<?= $lieu;?>"/><br>

			<label for="dateDepart">date de départ du séjour au format aaaa-mm-jj</label><br>
			<input type="text" name="dateDepart" id="dateDepart" placeholder="dateDepart du séjour" value="<?= $dateDepart;?>"/><br>

			<label for="dateRetour">date de retour du séjour au format aaaa-mm-jj</label><br>
			<input type="text" name="dateRetour" id="dateRetour" placeholder="dateRetour du séjour" value="<?= $dateRetour;?>"/><br>

			<label for="duree">Durée du séjour en jour (juste le nombre de jour)</label><br>
			<input type="text" name="duree" id="duree" placeholder="15" value="<?= $duree;?>"/><br>

			<label for="tarif">tarif du séjour en euro (juste le nombre, exemple : 975,25 )</label><br>
			<input type="number" step="any" name="tarif" id="tarif" placeholder="tarif du séjour" value="<?= $tarif;?>"/><br>

	        <input type="hidden" name="operation" value="modifier"/>
	        <input type="submit" name="btnSub" id="btnSub" value="Modifier"/><br>

	        <div class="message">
	            <?php 
	            if(isset($message))echo $message;
	            ?>
	        </div>
		</form>	
	</article>
	<?php 
	}//fin du if
	else{ 
	?>
	<article>
		<h2>Aucun séjour trouvé</h2>
	</article>
	<?php 
	}//fin du else 
	?>
	<article>
		<p><a href="<?php echo $this->url('admin_sejour');?>">Retour à la liste des sejours</a></p>
	</article>
</section>
<?php
$this->insert('partials/footer');
?>