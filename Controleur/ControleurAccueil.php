<?php

require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

	private $billet;

	public function __construct() {
		$this->billet = new Billet();
	}

	// Affiche la liste de tous les billets du blog
	public function accueil() {
		$nombreDePages = $this->billet->getNombreDePages();
		$pageActuelle = $this->billet->getPageActuelle($nombreDePages);
		$billets = $this->billet->getBilletsParPage($pageActuelle);
		//var_dump($nombreDePages, $pageActuelle, $billets);
		$vue = new Vue("Accueil");
		$vue->generer(array('nombreDePages' => $nombreDePages, 'pageActuelle' => $pageActuelle, 'billets' => $billets));
	}
}

