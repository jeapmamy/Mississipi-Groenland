<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Vue/Vue.php';


class ControleurGestion {

    private $billet;
    private $commentaire;


    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }
	
		function gestion() {
			session_start(); // On prolonge la session
			if (empty($_SESSION['login'])) { // On teste si la variable de session existe et contient une valeur
				throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); // Si inexistante ou nulle, on affiche un message
			}
			$billets = $this->billet->getBillets();
			$commentaires = $this->commentaire->getSignal();
			$vue = new Vue('Gestion');
			$vue->generer(array('billets' => $billets, 'commentaires' => $commentaires));
	}	


	function ajouterBillet() {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$vue = new Vue('AjouterBillet');
        $vue->generer(array());
	}

	function modifierBillet($idBillet) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$billet = $this->billet->getBillet($idBillet);
		$vue = new Vue('ModifierBillet');
		$vue->generer(array('billet' => $billet));
	}	
	
	
	function supprimerBillet($idBillet) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$billet = $this->billet->getBillet($idBillet);
		$vue = new Vue('SupprimerBillet');
		$vue->generer(array('billet' => $billet));
	}

	function validAjoutBillet($date, $titre, $contenu) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$this->billet->addBillet($date, $titre, $contenu);
		header('Location: index.php?action=gestion');
	}

	function validModifBillet($date, $titre, $contenu, $idBillet) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$this->billet->updateBillet($date, $titre, $contenu, $idBillet);
		header('Location: index.php?action=gestion');
	}

	function validSuppBillet($idBillet) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$this->billet->deleteBillet($idBillet);
		header('Location: index.php?action=gestion');
	}

	function validAcceptCommentaire($signal, $idCommentaire) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$this->commentaire->ajouterSignal($signal, $idCommentaire);
		header('Location: index.php?action=gestion');
	}

	function validSuppCommentaire($contenu, $signal, $idCommentaire) {
		session_start(); 
		if (empty($_SESSION['login'])) { 
			throw new Exception("Vous n'êtes pas autorisé(e) à accéder à cette page."); 
		}
		$this->commentaire->supprimerSignal($contenu, $signal, $idCommentaire);
		header('Location: index.php?action=gestion');
	}
		
	
}