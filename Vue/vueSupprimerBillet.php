<?php $this->titre = 'Supprimer'; ?>

<!-- Affichage du chapitre selectionné -->
<article class="row">
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">	
		<hr />
		<legend class="titreBillet"><?= $billet['titre'] ?></legend>
		<span class="glyphicon glyphicon-calendar"></span> Le : <time><?= $billet['dateFr'] ?></time> 
		<hr/>
		<a href="<?= "index.php?action=validSuppBillet&id=" . $billet['id']; ?>" class="btn btn-danger" role="button">Suppression définitive</a>
		<a href="<?= 'index.php?action=gestion' ; ?>" class="btn btn-success" role="button">Retour</a>
		<hr />	
		<div class="formatage">
			<p><?= $billet['contenu'] ?></p>
		</div>
		<hr />
		
	</div>
</article>

