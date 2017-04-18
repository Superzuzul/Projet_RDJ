<?php
$this->insert('partials/header',['titre'=>"Formulaire de contact - RêvesdeJeux.com", 'description'=>"Vous avez une question et souhaitez entrer directement en contact avec nous ? Une interrogation sur l'un de nos séjours ? Vous souhaitez en savoir plus sur l'association ? Vous êtes au bon endroit !"]);
?>

<h1>Contactez-nous !</h1>
<section>
	<article>
		<p>
			Vous avez une question et souhaitez entrer directement en contact avec nous ? Vous avez une interrogation concernant l'un de nos séjours, ou bien souhaitez en savoir plus sur l'association ? Vous êtes au bon endroit !
		</p>
		<form action="" method="post" id="form-contact">
			<div class="form-group col-md-6 col-xs-12" id="formnom">
				<label for="cat">Nom :</label>
				<input type="text" name="nom" id="nom" class="form-control" placeholder="Saisissez votre nom" required />
			</div>
			<div class="form-group col-md-6 col-xs-12" id="formmail">
				<label for="cat">Email :</label>
				<input type="mail" name="email" id="email" class="form-control" placeholder="Saisissez votre mail" required />
			</div>
			<div class="form-group col-xs-12" id="formmail">
				<label for="cat">Sujet :</label>
				<input type="text" name="sujet" id="sujet" class="form-control" placeholder="Saisissez le sujet de votre e-mail" required />
			</div>
			<div class="form-group col-xs-12" id="formnessage">
				<label for="cat">Message :</label>
				<!--<input type="text" name="mess" id="mess" class="form-control" placeholder="Saisissez votre message" required />-->
				<textarea name="message" id="message" class="form-control" maxlength="300" placeholder="Saisissez votre message" required></textarea>
			</div>
			
			<!-- RECAPTCHA -->
			<!--<button class="g-recaptcha" data-sitekey="6Lc2FhkUAAAAAHworrrl4S-5ofmbE_-7f2erkG53" data-callback="YourOnSubmitFn">TEST CAPTCHA</button>-->
			<div class="form-group col-xs-12" id="form-recaptcha">
			    <p id="recaptcha_txtcontrol">Merci de procéder au contrôle de sécurité ci-dessous :</p>
			    <div class="g-recaptcha" name="recaptcha" data-sitekey="6LdWsBYTAAAAABuJBTypj_6yghL6Qz7Ctp6am749"></div>
			</div>
			
			<div class="form-group text-center">
				<!--<button type="submit" name="btnSub" class="btn btn-success" id="btn-submit">Envoyez votre Message</button>-->
				<button type="submit" name="btnSub" id="form-contact-btn-submit">Envoyez votre Message</button>	<!--redéfinition du bouton pour personnaliser ses couleurs, padding, etc-->
			</div>
		
		    <div class="col-lg-12 text-center" id="result-env">
		        <?php if(array_key_exists('success',$_SESSION)): ?>
		            <div class="alert alert-success" id="result-success">
		                <p id="messtransmis">Votre message nous a bien été transmis !</p>
		            </div>
		
		        <?php elseif(array_key_exists('erreurs',$_SESSION)): ?>
		            <div class="alert alert-danger" id="result-erreur">
		                <?= implode('<br>', $_SESSION['erreurs']); ?>
		            </div>
		        <?php endif; ?>
		    </div>
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
