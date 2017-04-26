<?php $this->titre = 'Accueil'; ?>	
			    
<?php
foreach ($billets as $billet) :
?>
	<article class="row">
		<div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10 fondblanc">
			<hr />
			<a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
				<legend class="titreBillet"><?= $billet['titre'] ?></legend>
			</a>
			<time><?= $billet['dateFr'] ?></time><br /><br />
		
			<?php
				$contenu = strip_tags($billet['contenu'], '<strong>');
				echo'<p>' . substr($contenu, 0, 500) . '...</p>'; 
			?>
			
			<p><a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>" class="btn btn-info" role="button">Lire la suite  
			<span class="glyphicon glyphicon-chevron-right"></span></a></p>
			<hr />
		</div>
	</article>
	<hr />	
<?php endforeach; ?>

<!-- Pagination ( 5 extraits de chapitre par page)
	=================================================-->

<div class="container">
	<nav class="text-center">
		<ul class="pagination">
		<?php
		for($i=1; $i<=$nombreDePages; $i++)
		{
		?>
			<li><a href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
		<?php	 
		}
		?>
		</ul>
	</nav>
</div>

	
