<?php
$this->insert('partials/header',['titre'=>"Rêves de Jeux Classique, colonie de vacance pour les 12/17 ans, acitivités Jeux de Rôles, Jeux de Sociétés, Jeux vidéos...", 'description'=>"Rêves de Jeux propose des colonies de vacances pour les 12/17 ans pendant l'été, spécialisés le jeu sous toutes ses formes (Jeux de sociétés, Jeux de rôles, Jeux vidéos, Grandeur Natures, activités extérieurs)"]);
?>
<section>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <a href="<?= $this->url('default_rdj_classique')?>"><img src="<?php echo $this->assetUrl("/img/slider/slider1.jpg") ?>" alt="Les séjours d'été de Rêves de Jeux"></a>
	      <div class="carousel-caption">
	        Cette été, partez à l'aventure dans une colonie unique au monde !
	      </div>
	    </div>
	    <div class="item">
	      <a href="<?= $this->url('default_presentation')?>"><img src="<?php echo $this->assetUrl("/img/slider/slider2.jpg") ?>" alt="Présentation de Rêves de Jeux"></a>
	      <div class="carousel-caption">
	        Qu'est-ce Rêves De Jeux ? Découvrez notre histoire !
	      </div>
	    </div>
	    <div class="item">
	      <a href="<?= $this->url('default_faq')?>"><img src="<?php echo $this->assetUrl("/img/slider/slider3.jpg") ?>" alt="Foire aux Questions de Rêves de Jeux"></a>
	      <div class="carousel-caption">
	        Foire aux Questions
	      </div>
	    </div>
	    ...
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</section>
<section class="articles">
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<h2>Séjours d'été</h2>
			<p>
				Nos "Geek-Anim" très spécialisés vous proposent l'immersion dans le monde des jeux sous toute ses facettes : de société, d'aventure, de rôle, de simulation, de coopération, avec du Grandeur Nature, des jeux en réseaux, des événementiels thémathisés...
			</p>
			<p>
				<a href="<?= $this->url('default_rdj_classique') ?>">En savoir plus...</a>
			</p>
		</div>
		<div class="col-xs-12 col-md-4">
			<h2>Notre projet éducatif</h2>
			<p>
				Les responsables de nos différentes activités et les équipes d’encadrement de tous nos séjours se réfèrent, dans toutes leurs actions, à un projet pédagogique qui est l’application logique et directe du projet éducatif de l’association « RÊVES DE JEUX », basé sur l’objet de ses statuts : Cette association a pour but la rencontre et la communication des personnes (enfants, adolescents, adultes)...
			</p>
			<p>
				<a href="<?= $this->url('default_projet_educatif') ?>">En savoir plus...</a>
			</p>
		</div>
		<div class="col-xs-12 col-md-4">
			<h2>Evenements à venir</h2>
			<p>
				<?php
				$objetEvenementModel=new \Model\EvenementModel;
				$evenements=$objetEvenementModel->find5();
				foreach ($evenements as $key => $evenement) {
					echo "<div> Le ".$this->dateFr($evenement["dateEvenement"])." : ".$evenement["nomEvenement"]." à ".$evenement['lieuEvenement']."</div>";
				}


				?>
			</p>
		</div>
	</div>
</section>

<?php
$this->insert('partials/footer');
?>