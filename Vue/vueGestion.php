<?php $this->titre = 'Gestion'; ?>

<!-- Affiche la liste des chapitres
================================== -->

<article class="row">	
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
		<hr />
		<legend class="titreGestion">Administrer les chapitres</legend>
		<p>
			<a href="<?= 'index.php?action=ajouterBillet'; ?>" class="btn btn-success" role="button">Ajouter</a>
		</p>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<td style="width: 10%;">ID</td>
					<td style="width: 55%;">Titre</td>
					<td style="width: 35%;">Actions</td>
				</tr>
			</thead>
			<tbody>
				<?php
				
				foreach ($billets as $billet):
				?>
				<tr>
					<td><?= $billet['id'] ?></td>
					<td><?= $billet['titre'] ?></td>
					<td>
						<a href="<?= 'index.php?action=modifierBillet&id=' . $billet['id'] ; ?>" class="btn btn-primary" role="button">Modifier</a>
						<a href="<?= 'index.php?action=supprimerBillet&id=' . $billet['id'] ; ?>" class="btn btn-danger" role="button">Supprimer</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<hr />
	</div>
</article>
<hr />	

<!-- Affiche la liste des messages avec 5 drapeaux ou plus
============================================================ -->
<article class="row">
	<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
		<hr />
		<legend class="titreGestion">Administrer les commentaires signalés</legend>
		<table class="table table-hover">
			<thead>
				<tr>
					<td style="width: 10%;">Drapeaux</td>									
					<td style="width: 10%;">Auteur</td>
					<td style="width: 55%;">Message</td>
					<td style="width: 25%;">Actions</td>
				</tr>
			</thead>
			<tbody>
				<?php
				
				foreach ($commentaires as $commentaire):
				?>
				<tr>
					<td><?= $commentaire['COM_SIGNAL'] ?></td>
					<td><?= $commentaire['COM_AUTEUR'] ?></td>
					<td><?= $commentaire['COM_CONTENU'] ?></td>
					<td>
						<a href="<?= 'index.php?action=validAcceptCommentaire&id=' . $commentaire['COM_ID'] ; ?>" class="btn btn-primary btn-sm">Accepter</a>
						<a href="<?= 'index.php?action=validSuppCommentaire&id=' . $commentaire['COM_ID'] ; ?>" class="btn btn-danger btn-sm" role="button">Supprimer</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</article>
