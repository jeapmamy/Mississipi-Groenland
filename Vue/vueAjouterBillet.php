<?php $this->titre = 'Ajouter'; ?>

<!-- Corps - Formulaire de saisi d'un Billet
================================================== -->		

<article class="row">
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
		<hr />
		<form method="post" action="<?= 'index.php?action=validAjoutBillet'; ?>">
			<legend id="titreChapitre">Saisir un nouveau chapitre</legend>
			<input id="titre" name="titre" type="text" class="form-control" 
				placeholder="Titre du chapitre" 
				required /><br />
			<textarea id="texteBillet" name="contenu" rows="10" class="form-control"></textarea><br />
			<!--<input type="hidden" name="id" value=" $billet['id'] ?>" />-->
			<input class="btn btn-primary" type="submit" value="Enregistrer" />
			<a href="<?= 'index.php?action=gestion' ; ?>" class="btn btn-success" role="button">Retour</a>
		</form>
		<hr />
	</div>
</article>


