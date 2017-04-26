<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele {
	
	
	// Renvoie la liste des commentaires associés à un billet/chapitre donné
	public function getCommentaires($idBillet) {
		
		$sql = 'SELECT COM_ID as id, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %H:%i:%s") as dateFr, COM_AUTEUR as auteur, COM_CONTENU as contenu, COM_PARENT as parent, COM_NIVEAU as niveau
			FROM T_COMMENTAIRE
			WHERE BIL_ID = ?
			GROUP BY COM_PARENT, COM_DATE, COM_NIVEAU';
				
		$commentaires = $this->executerRequete($sql,array($idBillet));
			
		return $commentaires;

	}

	
	// Renvoie la liste les informations sur un commentaire donné
	public function getCommentaire($idCommentaire) {

		$sql = 'SELECT COM_ID, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %H:%i:%s") AS dateFr, COM_AUTEUR, COM_CONTENU, BIL_ID, COM_PARENT, COM_NIVEAU, COM_SIGNAL
			FROM T_COMMENTAIRE
			WHERE COM_ID = ?';		
		
		$commentaire = $this->executerRequete($sql, array($idCommentaire));
			
		$commentaire = $commentaire->fetch();
		
		return $commentaire;
		
	}
	
	
	// Renvoie le nombre de commentaires pour un billet/chapitre donné
	public function getNbCommentaires($idBillet) {
				
		$sql = 'SELECT COUNT(*) AS nbCommentaires 
			FROM T_COMMENTAIRE
			WHERE BIL_ID = ?';
			
		$nbCommentaires = $this->executerRequete($sql, array($idBillet));
		
		$nbCommentaires = $nbCommentaires->fetch();
		
		return $nbCommentaires;
		
	}

	
	// Insert un commentaire dans la table T_COMMENTAIRE ( parent +1, niveau 0, signal 0)
	public function ajouterCommentaire($date, $auteur, $contenu, $id, $parent, $niveau, $signal) {
		
		$auteur = htmlspecialchars($auteur);
		$contenu = htmlspecialchars($contenu);
			
		$sql = 'INSERT INTO T_COMMENTAIRE (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, COM_PARENT, COM_NIVEAU, COM_SIGNAL)
			VALUES (?, ?, ?, ?, ?, ?, ?)';
		
		$req = $this->executerRequete($sql, array($date, $auteur, $contenu, $id, $parent, $niveau, $signal));
			
	}

	
	// Insert un commentaire/réponse dans la table T_COMMENTAIRE ( parent inchangé, niveau +1, signal 0)
	public function repondreCommentaire($date, $auteur, $contenu, $id, $parent, $niveau, $signal) {
		
		$auteur = htmlspecialchars($auteur);
		$contenu = htmlspecialchars($contenu);

		$sql = 'INSERT INTO T_COMMENTAIRE (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, COM_PARENT, COM_NIVEAU, COM_SIGNAL)
			VALUES (?, ?, ?, ?, ?, ?, ?)';
		
		$req = $this->executerRequete($sql, array($date, $auteur, $contenu, $id, $parent, $niveau, $signal));

	}

	
	// Signaler un commentaire - Modifie un commentaire en incrémentant la variable COM_SIGNAL
	public function ajouterSignal($signal, $idCommentaire) {
		
		$sql = 'UPDATE T_COMMENTAIRE 
			SET COM_SIGNAL = ?
			WHERE COM_ID = ?';
		
		$req = $this->executerRequete($sql, array($signal, $idCommentaire));
			
	}

	
	// Supprime un commentaire qui a été signalé - Remplace le COM_CONTENU par un texte du Modérateur
	public function supprimerSignal($contenu, $signal, $idCommentaire) {
		
		$sql = 'UPDATE T_COMMENTAIRE 
			SET COM_CONTENU = ?, COM_SIGNAL = ?
			WHERE COM_ID = ?';
		
		$req = $this->executerRequete($sql, array($contenu, $signal, $idCommentaire));
			
	}
	
	
	// Renvoie les commentaires qui ont 5 signalements ou plus 
	public function getSignal() {
		
		$sql = 'SELECT *
			FROM T_COMMENTAIRE
			HAVING COM_SIGNAL >= 5';
		
		$commentaires = $this->executerRequete($sql);
			
		return $commentaires;
		
	}

}

