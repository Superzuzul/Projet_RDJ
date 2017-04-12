<?php
$this->insert('partials/header',['titre'=>"Salons et Festivals - Revesdejeux.com - Sur quels salons ou festival nous trouver", 'description'=>"L'association participe régulièrement à des salons ainsi qu'à des festivals. N'hésitez pas à regarder si nous passons près de chez vous !"]);
?>

<section>
    <h1>Salons et Festivals</h1>
    <article>
        <p>
            Rêves De Jeux participe régulièrement à des salons ainsi qu'à des festivals durant l'année. C'est l'occasion pour nous de rencontrer nos adhérents et fidèles ainsi que d'élargir notre public !
            <p>
                Vous trouverez sur cette page la liste des salons et festivals auquels nous allons participer ! N'hésitez pas à venir nous voir sur place !
            </p>
            <p>
                Vous êtes un organisateur et souhaitez notre présence à votre événement ? N'hésitez pas à <a href="formulaireContact.php">nous contacter</a> afin de discuter ensemble de cette participation !
            </p>
        </p>
    </article>
    <?php
		//Ouverture de la BDD
		$bdd=new PDO("mysql:host=localhost;dbname=revesdejeux;charset=utf8","guillaumeazoulay","");
		//Requete
		$rqt= "SELECT idType, nomEvenement, dateEvenement, lieuEvenement, descriptionEvenement,image, siteInternet FROM evenement WHERE dateEvenement >= NOW() AND idType=2";
		$stmt=$bdd->prepare($rqt);
		$stmt->execute();
		$evenements=$stmt->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($evenements);
		
		
		if(count($evenements)!=0){
    		foreach ($evenements as $key => $evenement) {
    		echo '<article class="evenement">
    		        <h2>'.$evenement[nomEvenement].'</h2>
    		        <img src="../img/'.$evenement[image].'" alt="Illustration de '.$evenement[nomEvenement].'">
    		        <p>Date : '.dateFr($evenement[dateEvenement])."</p>
    		        <p>Lieu : ".$evenement[lieuEvenement]."</p>
    		        <p>".$evenement[descriptionEvenement]."</p>
    		        <p>Site : ".$evenement[siteInternet]."</p>
    		      </article>";	
    		 }//fin foreach
    		
		}//fin du if $evenement!=0
		else echo "<h2>Aucun événement n'est prévu !</h2>
		           <p>Aucun salon ou festival n'est prévu prochainement, mais ne vous inquietez pas, vous pouvez toujours participer aux <a".' href="../sejours/rdjClassique.php"> que nous organisons !</a>
		           <p>
		           <img src="../img/dragon.png" alt="Dragon bleu pour dire que nous reviendrons !">';
    ?>
</section>

<?php
$this->insert('partials/footer');
?>