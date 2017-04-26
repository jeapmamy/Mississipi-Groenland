<?php $this->titre = $billet['titre']; ?>
           

<!-- Affiche le chapitre selectionné 
	======================================-->

<article class="row">
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
		<hr />
		<legend class="titreBillet"><?= $billet['titre'] ?></legend>
		<span class="glyphicon glyphicon-calendar"></span> Publié/Modifié le : <time><?= $billet['dateFr'] ?></time> |  
		<span class="glyphicon glyphicon-comment"></span>  <?= $nbCommentaires['nbCommentaires'] ?> commentaire(s)<br /><br />	
		<div class="formatage">
			<p><?= $billet['contenu'] ?></p>
		</div>
		<hr />
	</div>
</article>

<hr />




<!-- Afficher la Liste des commentaires 
	====================================-->
<article class="row">
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
		<hr />
		<legend id="titreReponses">Commentaires sur : <?= $billet['titre'] ?></legend>
		<div class="bandeau">
			<span class="glyphicon glyphicon-comment"></span>  <?= $nbCommentaires['nbCommentaires'] ?> commentaire(s)<br />
			<a href="#commenter"><h3>Ajouter le votre</h3></a>
		</div>
		<hr />
		
		<?php
		$niv =0;
		$par = 0;
		
		foreach ($commentaires as $commentaire): 
		
		$niv = $commentaire['niveau'];
		$par = $commentaire['parent'];
		
		switch($niv)
		{
			case 0: ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fondblanc">
					<span class="glyphicon glyphicon-calendar"></span> Publié le : <time><?= $commentaire['dateFr'] ?></time> |  
						<span class="glyphicon glyphicon-user"></span> Par : <?= $commentaire['auteur'] ?><br /><br />
					
						<p><?= $commentaire['contenu'] ?></p><br />
						<form method="post" action="index.php?action=repondre&id=<?= $commentaire['id'] ?>"> 
							<input id="auteur" name="auteur" type="text" class="form-control" value="" 
							placeholder="Votre pseudo" required /><br />
							<textarea id="txtCommentaire" name="contenu" rows="2" class="form-control" value="" 
							placeholder="Votre commentaire" required></textarea><br />
							
							<input type="hidden" name="id" value="<?= $billet['id'] ?>" />
							<input type="hidden" name="idCommentaire" value="<?= $commentaire['id'] ?>" />
							<input class="btn btn-primary btn-xs"type="submit" value="Répondre" />
							<a href="<?= 'index.php?action=signalerCommentaire&id=' . $commentaire['id'] ; ?>" class="btn btn-warning btn-xs" role="button">Signaler</a>
						</form>	
						<hr />
					</div>
				</div>
				
					
			<?php
				break;
			
			case 1: ?>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10 col-sm-offset-2 col-sm-10 col-md-offset-1 col-md-11 col-lg-offset-1 col-lg-11 fondblanc">
					<span class="glyphicon glyphicon-calendar"></span> Publié le : <time><?= $commentaire['dateFr'] ?></time> |  
						<span class="glyphicon glyphicon-user"></span> Par : <?= $commentaire['auteur'] ?><br /><br />
					
						<p><?= $commentaire['contenu'] ?></p><br />
						<form method="post" action="index.php?action=repondre&id=<?= $commentaire['id'] ?>"> 
							<input id="auteur" name="auteur" type="text" class="form-control" value="" 
							placeholder="Votre pseudo" required /><br />
							<textarea id="txtCommentaire" name="contenu" rows="2" class="form-control" value="" 
							placeholder="Votre commentaire" required></textarea><br />
							
							<input type="hidden" name="id" value="<?= $billet['id'] ?>" />
							<input type="hidden" name="idCommentaire" value="<?= $commentaire['id'] ?>" />
							<input class="btn btn-primary btn-xs"type="submit" value="Répondre" />
							<a href="<?= 'index.php?action=signalerCommentaire&id=' . $commentaire['id'] ; ?>" class="btn btn-warning btn-xs" role="button">Signaler</a>
						</form>
						<hr />
					</div>
				</div>
					
			<?php
				break;
			
			case 2: ?>
				<div class="row">
					<div class="col-xs-offset-4 col-xs-8 col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-10 col-lg-offset-2 col-lg-10 fondblanc">
					<span class="glyphicon glyphicon-calendar"></span> Publié le : <time><?= $commentaire['dateFr'] ?></time> |  
						<span class="glyphicon glyphicon-user"></span> Par : <?= $commentaire['auteur'] ?><br /><br />
					
						<p><?= $commentaire['contenu'] ?></p><br />
						
						<a href="<?= 'index.php?action=signalerCommentaire&id=' . $commentaire['id'] ; ?>" class="btn btn-warning btn-xs" role="button">Signaler</a>
						<hr />
					</div>
				</div>
					
			<?php
				break;
		}
		?>
					
		
		<?php endforeach; ?>
		
	
	</div>
</article>
<hr />

<!-- Formulaire de saisi d'un commentaire 
	=======================================-->
<section id="commenter">
	<article class="row">
		<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
			<hr />
			<form method="post" action="index.php?action=commenter&id=<?= $billet['id'] ?>"> 
				<legend id="titreFormulaire">Laisser un commentaire</legend>
				<input id="auteur" name="auteur" type="text" class="form-control" value="" placeholder="Votre pseudo" 
					   required /><br />
				<textarea id="txtCommentaire" name="contenu" rows="4" class="form-control"
						  value="" placeholder="Votre commentaire" required></textarea><br />
				
				<input type="hidden" name="id" value="<?= $billet['id'] ?>" />
				<input type="hidden" name="parent" value="<?= $par ?>" />
				<input type="hidden" name="niveau" value="<?= $niv ?>" />
				<input class="btn btn-primary"type="submit" value="Commenter" />
			</form>
			<hr />
		</div>
	</article>
</section>
<hr />
