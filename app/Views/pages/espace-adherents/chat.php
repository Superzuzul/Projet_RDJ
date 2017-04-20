<?php
$this->insert('partials/header',['titre'=>"Chat - Rêves de Jeux", 'description'=>"(DESCRIPTION page Chat à modifier)"]);
?>


<section>
<h1>Chat Rêves de Jeux</h1>
	<article>
		<div id="chat-logs">
        </div>
        <div id="chat-controls">
            <form action="#" id="chat-form">
            <?php

            	//Récupération du nom et prenom de la personne connectée

            $pseudo=$w_user['prenomMembre'].' '.$w_user['nomMembre'];

            ?>
                <input type="text" id="author" value="<?php echo $pseudo; ?>" disabled />
                <input type="text" id="message" placeholder="Votre message ?"/>
                <button type="submit">Envoyer</button>    
            </form>
        </div>
	</article>
</section>

<?php
$this->insert('partials/footer');
?>