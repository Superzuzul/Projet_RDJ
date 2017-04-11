
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
  		$("#led-sejours").attr("src","../img/ledg.png");
	}
	else{
		//-> le menu est ouvert
			// on redonne sa taille complète au sous-menu "nav-sejours"
			$("#nav-sejours").height(0);
			// Mise à jour de l'état courant : "fermé"
			g_bMenuFerme_sejours = true;

  			// au clic pour fermer, on allume la led rouge
  			$("#led-sejours").attr("src","../img/ledr.png");
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
  		$("#led-association").attr("src","../img/ledg.png");
	}
	else{
		//-> le menu est ouvert
			// on redonne sa taille complète au sous-menu "nav-association"
			$("#nav-association").height(0);
			// Mise à jour de l'état courant : "fermé"
			g_bMenuFerme_association = true;

  			// au clic pour fermer, on allume la led rouge
  			$("#led-association").attr("src","../img/ledr.png");
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
  		$("#led-aider").attr("src","../img/ledg.png");
	}
	else{
		//-> le menu est ouvert
			// on redonne sa taille complète au sous-menu "nav-aider"
			$("#nav-aider").height(0);
			// Mise à jour de l'état courant : "fermé"
			g_bMenuFerme_aider = true;

			// au clic pour fermer, on allume la led rouge
  			$("#led-aider").attr("src","../img/ledr.png");
	}
});



$(".adherent").click(function(){
	
	var src = ($("#led-adherent").attr('src') === "../img/ledr.png")
	? "../img/ledg.png"
	: "../img/ledr.png";
	$("#led-adherent").attr('src', src);
});