
		<footer id="cont-footer">
			<div class="container-fluid">
			    <div class="row">    
				
					<div class="col-xs-3 text-left">
					<h4 class="text-left">Plan du site :</h4>
						<ul class="col-xs-12 text-left" id="footer-plan-ul">
							<li><a href="<?php echo $this->url("default_index") ?>">Accueil</a></li>
							<li><a href="<?php echo $this->url("default_rdj_classique") ?>">Séjours</a></li>
							<li><a href="<?php echo $this->url("default_presentation") ?>">Association</a></li>
							<li><a href="<?php echo $this->url("default_don") ?>">Aidez-nous</a></li>
							<li><a href="<?php echo $this->url("default_index_adherents") ?>">Adhérent</a></li>
						</ul>
					</div>
					<div class="col-xs-6 text-center">
						<h4 id="coord">Nos coordonnées :</h4>
							<a id="adresse" href="https://goo.gl/maps/2LfEG8tXsvp" title="Ouvrir la carte interactive..." target="_blank"><i class="fa fa-2x fa-map-marker"></i> Centre d'hébergement Le PierLou, Le Bourg <br/> 63980 ÉCHANDELYS</a>
							<br/>
							<div id="teleph"><i class="fa fa-1x fa-phone"></i> 06 80 26 05 74 </div>
					</div>
					<div class="col-xs-3 text-center">
						<h4 id="res-soc" class="text-center">Réseaux sociaux :</h4>
						<a id="soc-yt" href="https://www.youtube.com/user/RevesDeJeux1984/" target="_blank"><i class="fa fa-3x fa-youtube"></i></a>
						<a id="soc-fb" href="https://www.facebook.com/Revesdejeux" target="_blank"><i class="fa fa-3x fa-facebook-official" ></i></a>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div id="pied" class="row">
					<div class="col-xs-12 text-center">Copyright &copy; 2017 Rêves de Jeux | Tous droits réservés.</div>
					<div class="col-xs-12 text-center">- Mentions légales -</div>
				</div>	
			</div>
		</footer>
	
	<script type="text/javascript">
		var led = "<?php echo $this->assetUrl("/img/") ?>";
	</script>
	<script type="text/javascript" src="<?php echo $this->assetUrl("/js/main.js") ?>"></script>
   
	</body>
</html>