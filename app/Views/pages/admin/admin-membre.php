<?php
$this->insert('partials/header',['titre'=>"Admin ajout de membre - RêvesdeJeux.com", 'description'=>"Modification de la table membre dans la base de données"]);
?>
<h1>Ajout de membre</h1>
<section>
	<article>
		<h2>Instructions</h2>
		<p>
			Cette page concerne l'ajout de membre à la base de données. Les membres ajoutés ici seront les personnes ayants payées leur cotisation.
		</p>
		<p>
			Pour ajouter un nouvel administrateur, créer le membre ici et modifier son rôle directement dans la base de données (Pour plus de sécurité).
		</p>
	</article>
	<article>
		<h2>Ajouter un Adherent</h2>
		<form action="" method="post">
			<label for="nomMembre">Nom du membre</label><br>
			<input type="text" name="nomMembre" id="nomMembre" placeholder="Nom du membre" required><br>

			<label for="prenomMembre">Prenom du membre</label><br>
			<input type="text" name="prenomMembre" id="prenomMembre" placeholder="Prenom du membre" required><br>

			<label for="dateNaissanceMembre">Date de Naissance au format jj/mm/aaaa(non obligatoire)</label><br>
			<input type="text" name="dateNaissanceMembre" id="dateNaissanceMembre" placeholder="06/08/1993" required><br>

			<label for="emailMembre">Adresse e-mail</label><br>
			<input type="email" name="emailMembre" id="emailMembre" placeholder="votre@email.com" required><br>

			<label for="mdpMembre">Mot de passe</label><br>
			<input type="password" name="mdpMembre" id="mdpMembre" placeholder="mot de passe" required><br>

			<input type="hidden" name="operation" value="signup"/>
	        <input type="submit" name="btnSub" id="btnSub" value="Ajouter"/><br>

	        <div class="message">
	            <?php 
	            if(isset($message))echo $message;
	            ?>
	        </div>
		</form>
	</article>
	<article>
		<h2>Modifier / Supprimer un membre</h2>
		<table>
	        <thead>
	            <?php
	            //Si je veux acceder à la table Membre, il faut utiliser la classe Model\MembreModel
	            $objetMembreModel=new \Model\MembreModel;
	            $tabResult=$objetMembreModel->findall("id","ASC",1);
	            
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
	            //Si je veux acceder à la table Membre, il faut utiliser la classe Model\MembreModel
	            $objetMembreModel=new \Model\MembreModel;
	            $tabResult=$objetMembreModel->findall("id","ASC");
	            
	            //boucle pour parcourir chaque ligne trouvée
	            foreach ($tabResult as $tabLigne) {
	                
	                echo"<tr>";
	                
	                //boucle pour parcourir chaque colonne
	                foreach ($tabLigne as $nomColonne=>$valeurColonne) {
	                    // affichage de la colonne
	                    
	                 echo "<td>$valeurColonne</td>" ;   
	                    
	                }//fin du deuxieme foreach
	                
	                $id=$tabLigne['id'];
	                
	                $hrefModifier=$this->url("admin_membre_update",['id'=>$id]);
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