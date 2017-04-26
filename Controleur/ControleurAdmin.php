<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Admin.php';

require_once 'Vue/Vue.php';

class ControleurAdmin {

    private $admin;
	private $mdp;


    public function __construct() {
        $this->admin = new Admin();
		$this->mdp = new Admin();
    }


    public function admin() {
		session_start(); // On prolonge la session		
		if(!empty($_SESSION['login'])) { // On teste si la variable de session existe et contient une valeur
			header('Location: index.php?action=gestion');
		}
		// Si inexistante ou nulle, on redirige vers le formulaire de login
        $vue = new Vue('Admin');
		$vue->generer(array());
    }
	
		
	public function connexion($pseudo, $password) {
		
		$mdp = $this->mdp->getMdp($pseudo, $password);
		
		if (!$mdp) {
				throw new Exception('Mauvais pseudo ou mot de passe !');
			}
			else {
				session_start(); // On ouvre la session
				$_SESSION['login'] = $pseudo; // On enregistre le login en session
				header('Location: index.php?action=gestion');
			}
		
	}
	
	public function deconnexion() {
		// Démarrage ou restauration de la session
		session_start();
		// Réinitialisation du tableau de session
		// On le vide intégralement
		$_SESSION = array();
		// Destruction de la session
		session_destroy();
		// Destruction du tableau de session
		unset($_SESSION);
		
		header('Location: index.php');
		}


}

