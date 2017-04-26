<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Vue/Vue.php';


class ControleurCommentaire {

    private $billet;
    private $commentaire;


    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

	function commenter($date, $auteur, $contenu, $id, $parent, $niveau, $signal) {
		$this->commentaire->ajouterCommentaire($date, $auteur, $contenu, $id, $parent, $niveau, $signal);
		header('Location: index.php?action=billet&id=' . $id);
	}
	
	
	function repondre($date, $auteur, $contenu, $id, $parent, $niveau, $signal) {
		$idCommentaire = intval($_GET['id']);
		$commentaire = $this->commentaire->getCommentaire($idCommentaire);
		//$parent = $commentaire['parent'];
		//$niveau = $commentaire['niveau'] + 1;
		$this->commentaire->repondreCommentaire($date, $auteur, $contenu, $id, $commentaire['COM_PARENT'], $commentaire['COM_NIVEAU'] +1, $signal);
		header('Location: index.php?action=billet&id=' . $id);
	}

	function signalerCommentaire() {
		$idCommentaire = intval($_GET['id']);
		$commentaire = $this->commentaire->getCommentaire($idCommentaire);
		$signal = $commentaire['COM_SIGNAL']+1;
		$this->commentaire->ajouterSignal($signal, $idCommentaire);
		$id = $commentaire['BIL_ID'];
		header('Location: index.php?action=billet&id=' . $id);
	
	}
	
	
}