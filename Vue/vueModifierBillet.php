<?php $this->titre = 'Modifier'; ?>		

<!-- Saisie des modifications sur le chapitre
	=========================================== -->			

<article class="row">
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
		<hr />
		<form method="post" action="<?= "index.php?action=validModifBillet&id=" . $billet['id']; ?>">
			<!--<legend id="titreChapitre">Saisir un nouveau chapitre</legend>-->
			<label>Titre du chapitre : </label>
			<textarea id="titre" name="titre" type="text" rows="1" class="form-control">
			<?= $billet['titre'] ; ?></textarea><br />
			<label>Texte du chapitre :</label>
			<textarea id="texteBillet" name="contenu" rows="10" class="form-control">
			<?= $billet['contenu'] ; ?></textarea><br />
			<!--<input type="hidden" name="id" value=" $billet['id'] ?>" />-->
			<input class="btn btn-primary" type="submit" value="Enregistrer" />
			<a href="<?= 'index.php?action=gestion' ; ?>" class="btn btn-success" role="button">Retour</a>
		</form>
		<hr />
	</div>
</article>
<hr />
