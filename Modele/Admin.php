<?php

require_once 'Modele/Modele.php';

class Admin extends Modele {
	
	
	// Comparaison du Mot de Passe saisi
	public function getMdp($pseudo, $password) {
		
		$pseudo = htmlspecialchars($pseudo);
		$password = sha1(htmlspecialchars($password));
		
		$sql = 'SELECT * FROM t_admin WHERE pseudo = ? AND password = ?';
		
		$req = $this->executerRequete($sql, array($pseudo, $password));

		$mdp = $req->fetch();

		return $mdp;
		
	}

}

