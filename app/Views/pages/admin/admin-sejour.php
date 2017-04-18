<?php
$this->insert('partials/header',['titre'=>"Admin séjour - RêvesdeJeux.com", 'description'=>"Modification de la table séjour dans la base de données"]);
?>

<h1>Modification des séjours</h1>
<section>
	<article>
		<h2>Création d'un séjour</h2>
		<form action="" method="post">

			<label for="nomSejour">Nom du séjour</label><br>
			<input type="text" name="nomSejour" id="nomSejour" placeholder="Nom du séjour" required><br>

			<label for="lieu">Lieu (non obligatoire, échandelys se met par défaut</label><br>
			<input type="text" name="lieu" id="lieu" placeholder="lieu du séjour"/><br>

			<label for="dateDepart">date de départ du séjour au format aaaa-mm-jj</label><br>
			<input type="text" name="dateDepart" id="dateDepart" placeholder="dateDepart du séjour"/><br>

			<label for="dateRetour">date de retour du séjour au format aaaa-mm-jj</label><br>
			<input type="text" name="dateRetour" id="dateRetour" placeholder="dateRetour du séjour"/><br>

			<label for="duree">Durée du séjour en jour (juste le nombre de jour)</label><br>
			<input type="text" name="duree" id="duree" placeholder="15"/><br>

			<label for="tarif">tarif du séjour en euro (juste le nombre, exemple : 975.25 )</label><br>
			<input type="number" step="any" name="tarif" id="tarif" placeholder="tarif du séjour"/><br>

	        <input type="hidden" name="operation" value="creer"/>
	        <input type="submit" name="btnSub" id="btnSub" value="Ajouter"/><br>

	        <div class="message">
	            <?php 
	            if(isset($message))echo $message;
	            ?>
	        </div>
		</form>	
	</article>
	<article>
		<h2>Modifier / Supprimer un séjour</h2>
		<table>
	        <thead>
	            <?php
	            //Si je veux acceder à la table sejour, il faut utiliser la classe Model\SejourModel
	            $objetSejourModel=new \Model\SejourModel;
	            $tabResult=$objetSejourModel->findall("id","ASC",1);
	            
	            //boucle pour parcourir chaque ligne trouvée
	            foreach ($tabResult as $tabLigne) {
	                
	                echo"<tr>";
	                
	                //boucle pour parcourir chaque colonne
	                foreach ($tabLigne as $nomColonne=>$valeurColonne) {
	                    // affichage de la colonne
	                    
	                 echo "<th>$nomColonne</th>" ;   
	                    
	                }//fin du deuxieme foreach
	                
	                //ajour de deux colonne, une pour modifier, l'autre pour supprimer
	                echo "<th>Modifier</th>";
	                echo "<th>Supprimer</th>";
	                
	                echo "</tr>";
	            }//fin du premier foreach
	            
	            ?>
	        </thead>
	        <tbody>
	            
	            <?php
	            //Si je veux acceder à la table Sejour, il faut utiliser la classe Model\SejourModel
	            $objetSejourModel=new \Model\SejourModel;
	            $tabResult=$objetSejourModel->findall("id","ASC");
	            
	            //boucle pour parcourir chaque ligne trouvée
	            foreach ($tabResult as $tabLigne) {
	                
	                echo"<tr>";
	                
	                //boucle pour parcourir chaque colonne
	                foreach ($tabLigne as $nomColonne=>$valeurColonne) {
	                    // affichage de la colonne
	                    
	                 echo "<td>$valeurColonne</td>" ;   
	                    
	                }//fin du deuxieme foreach
	                
	                $id=$tabLigne['id'];
	                
	                $hrefModifier=$this->url("admin_sejour_update",['id'=>$id]);
	                $hrefSupprimer="?id=$id&operation=supprimer";
	                
	echo                
<<<CODEHTML
<td><a href="$hrefModifier">Modifier</a></td>
<td><a href="$hrefSupprimer">Supprimer</a></td>
</tr>
CODEHTML;
	            }//fin du premier foreach
	            
	            ?>
	        </tbody>
	    </table>
		</article>
	</section>

<?php
$this->insert('partials/footer');
?>