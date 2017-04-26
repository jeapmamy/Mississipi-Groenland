<?php $this->titre = 'Connexion'; ?>

<div class="row">
	<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4 fondblanc">
		
		<legend id="titreConnexion">Connexion</legend>
		<p>Veuillez entrer votre pseudo et votre mot de passe pour vous connecter :</p>
		<form method="post" action="index.php?action=connexion">
			<p>
			<input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo" required /><br />
			<input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required /><br />
			<input class="btn btn-primary" type="submit" value="Valider" />
			</p>
		</form>
	</div>
</div>

