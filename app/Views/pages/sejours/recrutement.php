<?php
$this->insert('partials/header',['titre'=>"Rêves de Jeux - Recrutement - Vous souhaitez travaillez avec nous ? Vous êtes au bon endroit !", 'description'=>"Vous souhaitez participer à l'un des séjours de Rêves de Jeux en tant qu'animateur ou directeur adjoint ? Alors envoyez-nous CV et lettre de motivation !"]);
?>

<section>
<h1>Recrutement</h1>
    <article>
        <h2>Postuler pour participer à l'un de nos séjours</h2>
        <p>Il est bon d’injecter du "sang nouveau" et des "idées nouvelles" dans une équipe !</p> 
        <p>De temps en temps Rêves de Jeux s’ouvre à la collaboration avec des personnes n’étant pas du sérail. Effectivement, la plupart de nos animateurs viennent des séjours eux-mêmes. On les a accompagné pendant quelques années en tant que "stagicipant" chez nous et on a décidé qu’ils passeraient de l’autre côté car on a repéré chez eux des aptitudes à devenir un bon animateur.</p>
        <p>Mais il est toujours intéressant de s’ouvrir à des personnes extérieures qui auront une vue différente de la nôtre sur les séjours. Et la différence est source d’échanges et d’améliorations !</p>
        <p>Faire partie d’une équipe Rêves de Jeux demande du temps avant le séjour, une bonne santé pendant le séjour, mais ce n’est pas grand-chose en regard de l’expérience unique que vous allez partager avec nous !</p>
    </article>
    <article>
        <h2>Informations sur le poste</h2>
        <h3>ANIMATEUR/ANIMATRICE DE CENTRE DE VACANCES</h3>
        <p>Encadrement d'enfants ou d'adolescents dans un centre de vacances "spécial".</p>
        <p>PROFIL : Aptitude à l'encadrement d'enfants et d'adolescents allant de 6 à 17 ans, SENS DES RESPONSABILITÉS, TRAVAIL EN ÉQUIPE.</p>
        <p>LIEU DE TRAVAIL : Commune d' Echandelys (63980).</p>
        <p>DATES : Selon séjour.</p>
        <p>Engagement "Bénévole pris en charge" pour la première année. Autre statut à discuter.</p>
        <p>EXPERIENCE SOUHAITEE :  Encadrement de deux séjours Adolescents/enfants en centre de vacances</p>
        <p>FORMATION ET CONNAISSANCES : BAFA obtenu ou en cours, BAFD.</p>
        <p>AUTRES CONNAISSANCES : Bonne connaissance des publics adolescents/enfants, bonne culture générale (cinéma, musique, lecture, etc), bonne connaissance des jeux de société, jeux d’aventures et de rôles. Connaître les jeux de rôle Grandeur Nature, Murder et Killer est un plus très apprécié.</p>
    </article>
    <article>
        <h2>Comment postuler</h2>
        <p>Si la possibilité de faire ce "travail/expérience" vous tente, veuillez nous faire parvenir par ce formulaire, un CV et une lettre de motivation :
        </p>
        
            
        
        <form method="post" action="" id="formulaireRecrutement" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-3 col-xs-8">
                    <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" placeholder="Votre nom" required/>
                </div>
                <div class="form-group col-md-3 col-xs-8">
                   <label for="prenom">Prénom : </label>
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required/> 
                </div>           
                <div class="form-group col-md-3 col-xs-8">
                    <label for="email">E-mail : </label>
                    <input type="email" name="email" id="email" placeholder="Votre@email.com" required/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-12">
                   <label for="sujet">Séjour : </label>
                    <select name="sejour" required>
                        <option value="rdjClassique" selected>Rêves de Jeux Classique</option>
                        <option value="gamerVideo">Gamer Vidéo</option>
                        <option value="rdjDecouverte">Rêves de Jeux Découvertes</option>
                        <option value="revesAventures">Rêves d'Aventures</option>
                        <option value="enQueteAventures">En quête d'aventures</option>
                        <option value="bandeJtrouvetou">La bande à J'Trouvetou</option>
                    </select> 
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-12">                
                    <label for="cv">Votre CV (format PDF/doc/docx/odt/JPG , taille max : 2 MO) : </label>
                    <input type="file" id="cv" name="cv" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-12">        
                    <label for="lettreMotivation">Lettre de motivation (format PDF/doc/docx/odt/JPG, taille max : 2 MO) : </label>
                    <input type="file" id="lettreMotivation" name="lettreMotivation" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-12">    
                    <label for="message">Votre message : </label>
                    <textarea name="message" id="message" required placeholder="Votre message ici" rows="5" cols="50"></textarea>
                </div>    
                <!-- RECAPTCHA -->
                <!--<button class="g-recaptcha" data-sitekey="6Lc2FhkUAAAAAHworrrl4S-5ofmbE_-7f2erkG53" data-callback="YourOnSubmitFn">TEST CAPTCHA</button>-->
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-12">    
                    <div id="form-recaptcha">
                        <p id="recaptcha_txtcontrol">Merci de procéder au contrôle de sécurité ci-dessous :</p>
                        <div class="g-recaptcha" name="recaptcha" data-sitekey="6LdWsBYTAAAAABuJBTypj_6yghL6Qz7Ctp6am749"></div>
                    </div>
                    
                </div>    
            </div>
            <input class="btn btn-success" type="submit" name="btnSub" value="Envoyer" id="btnSub"/>               
        </form>
        <?php if(!empty($erreur)){

            echo '<div class="alert alert-danger">
            <ul>';
             
            foreach ($erreur as $key => $value) {
                echo "<li>".$value."</li>";
            }

             
            echo '</ul> 
        </div>';

        }
        ?>
    </article>
</section>
<?php
$this->insert('partials/footer');
?>