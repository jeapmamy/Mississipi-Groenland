<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
		
        <link rel="stylesheet" href="Contenu/style.css" />
		
		<script type="text/javascript" src="Contenu/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({ 
				selector:'textarea',
				//mode: 'exact',
				//elements: 'texteBillet', /* En mode 'exact', id des classes textarea */
				menubar : false, /* Retire la barre de menu */
				entity_encoding: 'raw',
				language: 'fr_FR'
			});
		</script>
		
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar">
        <div id="global" >
			
            <header>
				<!-- Navigation
				================================================== -->
				  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
					  <div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">Blog de Jean Forteroche</a>
					  </div>
					  <div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
						  <li class="hidden"><a href="index.php"></a></li>
						  <li><a href="index.php">Les Chapitres</a></li>
						  <li><a href="index.php?action=auteur">L'Auteur</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						  <li><a href="index.php?action=admin"><span class="glyphicon glyphicon-cog"></span>Administration</a></li>
						</ul>
					  </div>
					</div>
				  </div>
				
                <h1 id="titreBlog">Billet simple pour l'Alaska</h1>    
            </header>
			
			
			<!-- Corps
			================================================== -->
			
			<div id="contenu" class="container">
				<?= $contenu ?>   <!-- Élément spécifique -->
            </div> <!-- #contenu -->
	
			
			
			<!-- Pied de Page
			================================================== -->
            <footer id="piedBlog">
			  
				<div>
					Jean Forteroche 2017. | 
					<a href="index.php?action=deconnexion"> Deconnexion</a>
				</div>
			  
            </footer>
			
        </div> <!-- #global -->
		
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!-- Javascript de Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		
    </body>
</html>

