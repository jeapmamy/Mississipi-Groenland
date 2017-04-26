<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

  private $billet;
  private $nbCommentaires;
  private $commentaire;

  public function __construct() {
    $this->billet = new Billet();
	$this->nbCommentaires = new Commentaire();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un billet
  public function billet($idBillet) {
    $billet = $this->billet->getBillet($idBillet);
	$nbCommentaires = $this->commentaire->getNbCommentaires($idBillet);
    $commentaires = $this->commentaire->getCommentaires($idBillet);
    $vue = new Vue("Billet");
    $vue->generer(array('billet' => $billet, 'nbCommentaires' => $nbCommentaires, 'commentaires' => $commentaires));
  }
}
