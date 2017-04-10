<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $description ?>" />
		<title><?php echo $titre; ?></title>
		
		<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<?php include "toolbox.php"; ?>
	
	<body>
    	<header>
            <section id="cont-logo">
                <img src="img/logo.jpg" id="logo">
            </section>
            
    	    <section id="cont-menu">
                <ul id="menu-ul-global">
                	<li><a href="#">Les séjours</a>
                		<ul id="ssmenu-ul1">
                			<li><a href="rdjClassique.php">Rêves de Jeux Classique</a></li>
                            <li><a href="gamerVideo.php">Gamer Vidéo</a></li>
                            <li><a href="enQueteAventures.php">En-quête d'aventure</a></li>
                            <li><a href="revesAventures.php">Rêves d'aventure</a></li>
                            <li><a href="revesdeJeuxDecouverte.php">Rêves de Jeux Découvertes</a></li>
                            <li><a href="bandeAJtrouvetout.php">La bande à J'Trouvetou</a></li>
                            <li><a href="recrutement.php">Recrutement</a></li>
                		</ul>
                	</li>
                	<li><a href="#">L'association</a>
                		<ul id="ssmenu-ul2">
                			<li><a href="historique.php">Historique</a></li>
                            <li><a href="projetEducatif.php">Projet Educatif</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="salonsEtFestivals.php">Salons et Festivals</a></li>
                            <li><a href="#">Nos autres activités</a></li>
                            <li><a href="formulaireContact.php">Contactez-nous</a></li>
                		</ul>
                	</li>
                	<li><a href="#">Aider Rêves de Jeux</a>
                		<ul id="ssmenu-ul3">
                			<li><a href="#">Faire un don</a></li>
                            <li><a href="#">Devenir membre</a></li>
                            <li><a href="#">Les bonnes affaires</a></li>
                            <li><a href="#">Outils de communication</a></li>
                		</ul>
                	</li>
                	<li><a href="formAdherent.php">Espace adhérent</a></li>
                </ul>
            </section>
        </header>

        <section id="nav-mobile">
            <h1><a href="#">Rêves de Jeux</a></h1>
            <div class="txt-menu"><img id="led-sejours" class="menu-led" src="img/ledr.png"><a id="menu-sejours" href="#">Séjours</a></div>
                <!-- sous-menu SEJOURS -->
                <div id="nav-sejours">
                    <div class="txt-ssmenu"><a href="rdjClassique.php">Rêves de Jeux Classique</a></div>
                    <div class="txt-ssmenu"><a href="gamerVideo.php">Gamer Vidéo</a></div>
                    <div class="txt-ssmenu"><a href="enQueteAventures.php">En-quête d'aventure</a></div>
                    <div class="txt-ssmenu"><a href="revesAventures.php">Rêves d'aventure</a></div>
                    <div class="txt-ssmenu"><a href="revesdeJeuxDecouverte.php">Rêves de Jeux Découvertes</a></div>
                    <div class="txt-ssmenu"><a href="bandeAJtrouvetout.php">La bande à J'Trouvetou</a></div>
                    <div class="txt-ssmenu"><a href="recrutement.php">Recrutement</a></div>
                </div>
                <!-- FIN sous-menu SEJOURS -->

            <div class="txt-menu"><img id="led-association" class="menu-led" src="img/ledr.png"><a id="menu-association" href="#">Association</a></div>
                <!-- sous-menu ASSOCIATION -->
                <div id="nav-association">
                    <div class="txt-ssmenu"><a href="historique.php">Historique</a></div>
                    <div class="txt-ssmenu"><a href="projetEducatif.php">Projet Educatif</a></div>
                    <div class="txt-ssmenu"><a href="faq.php">FAQ</a></div>
                    <div class="txt-ssmenu"><a href="salonsEtFestivals.php">Salons et Festivals</a></div>
                    <div class="txt-ssmenu"><a href="#">Nos autres activités</a></div>
                    <div class="txt-ssmenu"><a href="formulaireContact.php">Contactez-nous</a></div>
                </div>
                <!-- FIN sous-menu ASSOCIATION -->

            <div class="txt-menu"><img id="led-aider" class="menu-led" src="img/ledr.png"><a id="menu-aider" href="#">Aider Rêves de Jeux</a></div>
                <!-- sous-menu AIDER -->
                <div id="nav-aider">
                    <div class="txt-ssmenu"><a href="#">Faire un don</a></div>
                    <div class="txt-ssmenu"><a href="#">Devenir membre</a></div>
                    <div class="txt-ssmenu"><a href="#">Les bonnes affaires</a></div>
                    <div class="txt-ssmenu"><a href="#">Outils de communication</a></div>
                </div>
                <!-- FIN sous-menu AIDER -->

            <div class="txt-menu"><img id="led-adherent" class="menu-led" src="img/ledr.png"><a id="menu-adherent" href="#">Espace adhérent</a></div>
        </section>
        
        <main>