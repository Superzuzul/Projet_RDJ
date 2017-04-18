<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $description ?>" />
		<title><?php echo $titre; ?></title>

		<script type="text/javascript" src="<?php echo $this->assetUrl("/js/jquery-3.1.1.js") ?>"></script>
		<script type="text/javascript" src="<?php echo $this->assetUrl("/js/bootstrap.min.js") ?>"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetUrl("/css/font-awesome.min.css") ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetUrl("/css/bootstrap.min.css") ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetUrl("/css/bootstrap-theme.min.css") ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo $this->assetUrl("/css/global.css") ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->assetUrl("/css/entete.css") ?>">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>	
	<body>
        <?php echo $this -> insert("partials/entete") ?>
        <br/>
    	<header>
            
            
    	    <section id="cont-menu">
                <ul id="menu-ul-global">
                	<li><a href="<?php echo $this->url("default_rdj_classique") ?>">Les séjours</a>
                		<ul id="ssmenu-ul1">
                			<li><a href="<?php echo $this->url("default_rdj_classique") ?>">Rêves de Jeux Classique</a></li>
                            <li><a href="gamerVideo.php">Gamer Vidéo</a></li>
                            <li><a href="enQueteAventures.php">En-quête d'aventures</a></li>
                            <li><a href="revesAventures.php">Rêves d'aventures</a></li>
                            <li><a href="revesdeJeuxDecouverte.php">Rêves de Jeux Découvertes</a></li>
                            <li><a href="bandeAJtrouvetout.php">La bande à J'Trouvetou</a></li>
                            <li><a href="<?php echo $this->url("default_recrutement") ?>">Recrutement</a></li>
                		</ul>
                	</li>
                	<li><a href="<?php echo $this->url("default_presentation") ?>">L'association</a>
                		<ul id="ssmenu-ul2">
                			<li><a href="<?php echo $this->url("default_presentation") ?>">Historique</a></li>
                            <li><a href="<?php echo $this->url("default_projet_educatif") ?>">Projet Educatif</a></li>
                            <li><a href="<?php echo $this->url("default_faq") ?>">FAQ</a></li>
                            <li><a href="<?php echo $this->url("default_salons_et_festivals") ?>">Salons et Festivals</a></li>
                            <li><a href="<?php echo $this->url("default_autres_activites") ?>">Nos autres activités</a></li>
                            <li><a href="<?php echo $this->url("default_contact") ?>">Contactez-nous</a></li>
                		</ul>
                	</li>
                	<li><a href="<?php echo $this->url("default_don") ?>">Aider Rêves de Jeux</a>
                		<ul id="ssmenu-ul3">
                			<li><a href="<?php echo $this->url("default_don") ?>">Faire un don</a></li>
                            <li><a href="<?php echo $this->url("default_devenir_membre") ?>">Devenir membre</a></li>
                            <li><a href="<?php echo $this->url("default_les_bonnes_affaires") ?>">Les bonnes affaires</a></li>
                            <li><a href="<?php echo $this->url("default_outils_communication") ?>">Outils de communication</a></li>
                		</ul>
                	</li>
                	<li><a href="<?php echo $this->url("default_index_adherents") ?>">Espace adhérent</a>
                	</li>
                </ul>
            </section>
        </header>

        <section id="nav-mobile">
            <h1><a href="<?php echo $this->url("default_index") ?>">Rêves de Jeux</a></h1>
            <div class="txt-menu sejours" id="menu-sejours"><img id="led-sejours" class="menu-led" src="<?php echo $this->assetUrl("/img/ledr.png") ?>">Séjours</div>
                <!-- sous-menu SEJOURS -->
                <div id="nav-sejours">
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_rdj_classique") ?>">Rêves de Jeux Classique</a></div>
                    <div class="txt-ssmenu"><a href="gamerVideo.php">Gamer Vidéo</a></div>
                    <div class="txt-ssmenu"><a href="enQueteAventures.php">En-quête d'aventure</a></div>
                    <div class="txt-ssmenu"><a href="revesAventures.php">Rêves d'aventure</a></div>
                    <div class="txt-ssmenu"><a href="revesdeJeuxDecouverte.php">Rêves de Jeux Découvertes</a></div>
                    <div class="txt-ssmenu"><a href="bandeAJtrouvetout.php">La bande à J'Trouvetou</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_recrutement") ?>">Recrutement</a></div>
                </div>
                <!-- FIN sous-menu SEJOURS -->

            <div class="txt-menu association" id="menu-association"><img id="led-association" class="menu-led" src="<?php echo $this->assetUrl("/img/ledr.png") ?>">Association</div>
                <!-- sous-menu ASSOCIATION -->
                <div id="nav-association">
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_presentation") ?>">Historique</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_projet_educatif") ?>">Projet Educatif</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_faq") ?>">FAQ</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_salons_et_festivals") ?>">Salons et Festivals</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_autres_activites") ?>">Nos autres activités</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_contact") ?>">Contactez-nous</a></div>
                </div>
                <!-- FIN sous-menu ASSOCIATION -->

            <div class="txt-menu aider" id="menu-aider"><img id="led-aider" class="menu-led" src="<?php echo $this->assetUrl("/img/ledr.png") ?>">Aider Rêves de Jeux</div>
                <!-- sous-menu AIDER -->
                <div id="nav-aider">
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_don") ?>">Faire un don</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_devenir_membre") ?>">Devenir membre</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_les_bonnes_affaires") ?>">Les bonnes affaires</a></div>
                    <div class="txt-ssmenu"><a href="<?php echo $this->url("default_outils_communication") ?>">Outils de communication</a></div>
                </div>
                <!-- FIN sous-menu AIDER -->

            <div class="txt-menu adherent" id="menu-adherent"><img id="led-adherent" class="menu-led" src="<?php echo $this->assetUrl("/img/ledr.png") ?>">Espace adhérent</div>
        </section>
        
        <main>