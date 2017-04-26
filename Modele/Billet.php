<?php

require_once 'Modele/Modele.php';

class Billet extends Modele {
	
	
	// Renvoie le nombre de pages totales, comprenant 5 billets/chapitres par page
	public function getNombreDePages() {
		
		$billetsParPage = 3; // Pour afficher 5 messages par page.
		
		$sql = 'SELECT COUNT(*) AS total FROM T_BILLET';
		
		$req = $this->executerRequete($sql);
		
		$donnees_total = $req->fetch(); 
		$total = $donnees_total['total']; 

		$nombreDePages=ceil($total/$billetsParPage);
			
		return $nombreDePages;

	}	


	// Renvoie le numero de la page actuelle
	public function getPageActuelle($nombreDePages) {
		if(isset($_GET['page'])) {
			$pageActuelle = intval($_GET['page']);
			if($pageActuelle>$nombreDePages OR $pageActuelle<0) {
				throw new Exception('Cette page n\'existe pas !');
			}
		}
		else {
			 $pageActuelle = 1; 
		}
		
		return $pageActuelle;
		
	}	
	
	
	// Renvoie la liste des billets/chapitres du blog, 5 par page
	public function getBilletsParPage($pageActuelle) {

		$billetsParPage=3; // Pour afficher 5 messages par page.
		
		$premiereEntree=($pageActuelle-1)*$billetsParPage; // On calcul la première entrée à lire
		 
		// La requête sql pour récupérer les messages de la page actuelle.
		$sql = 'SELECT BIL_ID as id, DATE_FORMAT(BIL_DATE, "%d/%m/%Y à %H:%i:%s") as dateFr, BIL_TITRE as titre, BIL_CONTENU as contenu 
			FROM T_BILLET
			ORDER BY BIL_ID DESC
			LIMIT '.$premiereEntree.', '.$billetsParPage.'';
			
		$billets = $this->executerRequete($sql);
			
		return $billets;

	}	
	

	// Renvoie la liste des billets/chapitres du blog
	public function getBillets() {
		
		$sql = 'SELECT BIL_ID as id, DATE_FORMAT(BIL_DATE, "%d/%m/%Y à %H:%i:%s") as dateFr, BIL_TITRE as titre, BIL_CONTENU as contenu 
			FROM T_BILLET
			ORDER BY BIL_ID';
			
		$billets = $this->executerRequete($sql);
		
		return $billets;

	}	


	// Renvoie les informations sur un billet/chapitre donné
	public function getBillet($idBillet) {
		
		$sql = 'SELECT BIL_ID as id, DATE_FORMAT(BIL_DATE, "%d/%m/%Y à %H:%i:%s") as dateFr, BIL_TITRE as titre, BIL_CONTENU as contenu 
			FROM T_BILLET
			WHERE BIL_ID = ?';
			
		$billet = $this->executerRequete($sql, array($idBillet));
		
		if ($billet->rowCount() == 1)
		{	
			$billet = $billet->fetch();
		
			return $billet;
		}
		else
		{	
			throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
		}
		
	}
		
	
	// Ajoute un Billet dans la table T_BILLET
	public function addBillet($date, $titre, $contenu) {

		$sql = ('INSERT INTO T_BILLET (BIL_DATE, BIL_TITRE, BIL_CONTENU)
			VALUES (?, ?, ?)
			');
		
		$req = $this->executerRequete($sql, array($date, $titre, $contenu));
		
	}

	
	// Modifie un Billet de la table T_BILLET
	public function updateBillet($date, $titre, $contenu, $idBillet) {

		$sql = 'UPDATE T_BILLET 
			SET BIL_DATE = ?, BIL_TITRE = ?, BIL_CONTENU = ?
			WHERE BIL_ID = ?';

		$req = $this->executerRequete($sql, array($date, $titre, $contenu, $idBillet));
					
	}

	
	// Supprime un Billet de la table T_BILLET
	public function deleteBillet($idBillet) {		

		$sql = 'DELETE FROM T_BILLET 
			WHERE BIL_ID = ?';

		$req = $this->executerRequete($sql, array($idBillet));
		
	}
		
}

