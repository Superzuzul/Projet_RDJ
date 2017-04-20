
// Déclarationn des variables globales définissant l'etat courant du bouton
var g_bMenuFerme_sejours;
var g_bMenuFerme_association;
var g_bMenuFerme_aider;

$(document).ready(function(){
	// Initialisation de l'état courant
	g_bMenuFerme_sejours = true;
	g_bMenuFerme_association = true;
	g_bMenuFerme_aider = true;
});



// $("#menu-sejours").click(function(){
$(".sejours").click(function(){
	// Test de l'état courant
	if(g_bMenuFerme_sejours)
	{//-> le ssmenu est fermé
		// on redonne sa taille complète au sous-menu "nav-sejours"
		$("#nav-sejours").height("100%");
		// Mise à jour de l'état courant : "ouvert"
		g_bMenuFerme_sejours = false;

  		// au clic pour ouvrir, on allume la led verte
  		$("#led-sejours").attr("src", led+"ledg.png");	// la variable "led" est définie dans le footer
  															// juste avant l'appel du script "main.js"
	}
	else{
		//-> le menu est ouvert
			// on redonne sa taille complète au sous-menu "nav-sejours"
			$("#nav-sejours").height(0);
			// Mise à jour de l'état courant : "fermé"
			g_bMenuFerme_sejours = true;

  			// au clic pour fermer, on allume la led rouge
  			$("#led-sejours").attr("src", led+"ledr.png");	// la variable "led" est définie dans le footer
  															// juste avant l'appel du script "main.js"
	}
});



// $("#menu-association").click(function(){
$(".association").click(function(){	
	// Test de l'état courant
	if(g_bMenuFerme_association)
	{//-> le ssmenu est fermé
		// on redonne sa taille complète au sous-menu "nav-association"
		$("#nav-association").height("100%");
		// Mise à jour de l'état courant : "ouvert"
		g_bMenuFerme_association = false;

		// au clic pour ouvrir, on allume la led verte
		$("#led-association").attr("src", led+"ledg.png");	// la variable "led" est définie dans le footer
  															// juste avant l'appel du script "main.js"
	}
	else{
		//-> le menu est ouvert
			// on redonne sa taille complète au sous-menu "nav-association"
			$("#nav-association").height(0);
			// Mise à jour de l'état courant : "fermé"
			g_bMenuFerme_association = true;

  			// au clic pour fermer, on allume la led rouge
  			$("#led-association").attr("src", led+"ledr.png");	// la variable "led" est définie dans le footer
  															// juste avant l'appel du script "main.js"
	}
});



// $("#menu-aider").click(function(){
$(".aider").click(function(){
	// Test de l'état courant
	if(g_bMenuFerme_aider)
	{//-> le ssmenu est fermé
		// on redonne sa taille complète au sous-menu "nav-aider"
		$("#nav-aider").height("100%");
		// Mise à jour de l'état courant : "ouvert"
		g_bMenuFerme_aider = false;

  		// au clic pour ouvrir, on allume la led verte
  		$("#led-aider").attr("src", led+"ledg.png");	// la variable "led" est définie dans le footer
  															// juste avant l'appel du script "main.js"
	}
	else{
		//-> le menu est ouvert
			// on redonne sa taille complète au sous-menu "nav-aider"
			$("#nav-aider").height(0);
			// Mise à jour de l'état courant : "fermé"
			g_bMenuFerme_aider = true;

			// au clic pour fermer, on allume la led rouge
  			$("#led-aider").attr("src", led+"ledr.png");	// la variable "led" est définie dans le footer
  															// juste avant l'appel du script "main.js"
	}
});



$(".adherent").click(function(){
	// on définit une variable src qui définit l'image à afficher par défaut
	var src = ($("#led-adherent").attr('src') === led+"ledr.png")	// la variable "led" est définie dans le footer
																	// juste avant l'appel du script "main.js"
	// condition ternaire
		// à chaque clic, la valeur change :
	?  led+"ledg.png"	// SI l'on clique une fois, on passe la valeur de la variable src à "ledg.png"
	:  led+"ledr.png";	// SINON SI l'on clique une autre fois, on passe la valeur de la variable src à "ledr.png"
	
	$("#led-adherent").attr('src', src); // on indique l'image à afficher
										// grâce à la valeur "à l'instant T" de la variable src
});



/**************************************
*				Chat				  *
**************************************/

// dès que la page est prête
        $(document).ready(function(){
            // on charge les derniers messages
            loadChatLogs();
            // on fait en sorte que les derniers messages se rechargent automatiquement toutes les 3 secondes
            window.setInterval(loadChatLogs, 6000);
        });
        
        // si quelqu'un soumet le formulaire de chat
        $('#chat-form').submit(function(){
            // on récupère dans un objet qu'on appelle data les données du formulaire
            var donneesAEnvoyerAuPHP = {
              // author sera égal à la valeur de l'input qui a l'identifiant "author"
              author: $('#author').val(),
              // message sera égal à la valeur de l'input qui a l'identifiant "message"
              message: $('#message').val()
            };
            
            // j'appelle en méthode POST l'adresse de mon script PHP en précisant que la tâche à accomplir
            // sera postMessage
            $.post(routeAjax+'?task=postMessage', donneesAEnvoyerAuPHP).done(function(resultat){
                loadChatLogs();
                $('#message').val('');
                $('#message').focus();
            });
            
            // On return false, pour que le formulaire ne se soumette pas !
            return false;
        })
        
        /**
         * Cette fonction sert à afficher mes messages
         */
        function loadChatLogs(){
            // On appelle en JSON l'adresse chat.php
            $.getJSON(routeAjax, function(messages){
                // On vide la zone des messages (pour la rafraichir)
                $('#chat-logs').html('');
                // Pour chaque message reçu
                $(messages).each(function(i, message){
                    // On créé une div qui a la classe message
                    var div = '<div class="message">';
                    // a l'intérieur de la div, on créé un span qui a la classe time et qui contient l'heure, minute et seconde
                    div += '<span class="time">' + message.dateEnvoi/*.substring(10) */+ '</span> ';
                    // a l'intérieur de la div encore, on créé un span qui a la classe author et qui contient l'auteur du message
                    div += '<span class="author">' + message.auteur + ' : </span> ';
                    // a l'intérieur de la div enfin, on ajoute le contenu du message
                    div += message.contenu;
                    // on n'oublie pas de fermer la div
                    div += '</div>';
                    // on ajoute la div à l'intérieur de la grande div #chat-logs
                    $('#chat-logs').prepend(div);
                });
                
                // On oblige le scroll de la div #chat-logs a aller tout en bas
                $('#chat-logs').scrollTop($('#chat-logs').height());
            }).fail(function(erreur){
                console.error(erreur);
            })
        }	