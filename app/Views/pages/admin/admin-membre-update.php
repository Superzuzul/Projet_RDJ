<?php
$this->insert('partials/header-admin',['titre'=>"Admin membre update - RêvesdeJeux.com", 'description'=>"Modification d'un membre"]);

//On va chercher les infos du sejour dans la table MYSQL
//Approche par délégation

$objetMembreModel=new\Model\MembreModel;
$tabMembre=$objetMembreModel->find($id);

if(!empty($tabMembre)){

    //Récupération de chaque colonne

    $nomMembre=$tabMembre['nomMembre'];
    $prenomMembre=$tabMembre['prenomMembre'];
    $dateNaissanceMembre=$tabMembre['dateNaissanceMembre'];
    $emailMembre=$tabMembre['emailMembre'];
    $nbAvertissementMembre=$tabMembre['nbAvertissementMembre'];

?>
<h1>Ajout de membre</h1>
<section>
	<article>
		<h2>Modifier un Adherent</h2>
		<form action="" method="post">
			<label for="nomMembre">Nom du membre</label><br>
			<input type="text" name="nomMembre" id="nomMembre" placeholder="Nom du membre" required value="<?=$nomMembre;?>"><br>

			<label for="prenomMembre">Prenom du membre</label><br>
			<input type="text" name="prenomMembre" id="prenomMembre" placeholder="Prenom du membre" required value="<?=$prenomMembre;?>"><br>

			<label for="dateNaissanceMembre">Date de Naissance au format jj/mm/aaaa(non obligatoire)</label><br>
			<input type="text" name="dateNaissanceMembre" id="dateNaissanceMembre" placeholder="06/08/1993" required value="<?=$dateNaissanceMembre;?>"><br>

			<label for="emailMembre">Adresse e-mail</label><br>
			<input type="email" name="emailMembre" id="emailMembre" placeholder="votre@email.com" value="<?=$emailMembre;?>" required><br>

			<label for="emailMembre">Avertissement</label><br>
			<input type="number" name="nbAvertissementMembre" id="nbAvertissementMembre" placeholder="Nombre d'Avertissement" value="<?=$nbAvertissementMembre;?>" required><br>


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
		<h2>Aucun Membre trouvé</h2>
	</article>
	<?php 
	}//fin du else 
	?>
	<article>
		<p><a href="<?php echo $this->url('admin_membre');?>">Retour à la liste des membres</a></p>
	</article>
</section>

<?php
$this->insert('partials/footer');
?>