<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
//require_once 'Controleur/ControleurAuteur.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Controleur/ControleurGestion.php';
require_once 'Controleur/ControleurCommentaire.php';

require_once 'Vue/Vue.php';

class Routeur {

	private $ctrlAccueil;
	private $ctrlBillet;
	//private $ctrlAuteur;
	private $ctrlAdmin;
	private $ctrlGestion;
	private $ctrlCommentaire;

	public function __construct() {
		$this->ctrlAccueil = new ControleurAccueil();
		$this->ctrlBillet = new ControleurBillet();
		//$this->ctrlAuteur = new ControleurAuteur();
		$this->ctrlAdmin = new ControleurAdmin();
		$this->ctrlGestion = new ControleurGestion();
		$this->ctrlCommentaire = new ControleurCommentaire();
	}

	// Traite une requête entrante
	public function routerRequete() {
		try {
			if (isset($_GET['action'])) {
				
				switch ($_GET['action']) {
		
					case 'billet':
						if (isset($_GET['id'])) {
							$idBillet = intval($_GET['id']);
							if ($idBillet != 0) {
								$this->ctrlBillet->billet($idBillet);
							}
							else {
								throw new Exception("Identifiant de billet non valide");
							}
						}
						else {
							throw new Exception("Identifiant de billet non défini");
						}
						break;
					
					case 'auteur' :
                        $this->ctrlAccueil->auteur();
                        break;                    
					
					case 'admin' :
                        $this->ctrlAdmin->admin();
                        break;
					
					
					case 'connexion':
						if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
							$pseudo = $_POST['pseudo'];
							$password = $_POST['password'];
							$this->ctrlAdmin->connexion($pseudo, $password);
						}
						else {
							throw new Exception('Pseudo et/ou mot de passe manquant(s) !');
						}
						break;
					
					
					case 'deconnexion':
						$this->ctrlAdmin->deconnexion();
						break;
					
					
					case 'gestion':
						$this->ctrlGestion->gestion();
						break;
					
					
					case 'ajouterBillet':
						$this->ctrlGestion->ajouterBillet();
						break;
				
				
					case 'modifierBillet':
						if (isset($_GET['id'])) {
							$idBillet = intval($_GET['id']);
							if ($idBillet != 0) {
								$this->ctrlGestion->modifierBillet($idBillet);
							}
							else {
								throw new Exception("Identifiant de billet non valide");
							}
						}
						else {
							throw new Exception("Identifiant de billet non défini");
						}
						break;
					
					
					case 'supprimerBillet':
						if (isset($_GET['id'])) {
							$idBillet = intval($_GET['id']);
							if ($idBillet != 0) {
								$this->ctrlGestion->supprimerBillet($idBillet);
							}
							else {
								throw new Exception("Identifiant de billet non valide");
							}
						}
						else {
							throw new Exception("Identifiant de billet non défini");
						}
						break;
					
					
					case 'commenter':
						$date = date('Y-m-d H:i:s');
						$auteur = $_POST['auteur'];
						$contenu = $_POST['contenu'];
						$id = $_POST['id'];
						$parent = $_POST['parent'] + 1;
						$niveau = 0;
						$signal = 0;
						$this->ctrlCommentaire->commenter($date, $auteur, $contenu, $id, $parent, $niveau, $signal);			
						break;
					
					
					case 'repondre':
						$date = date('Y-m-d H:i:s');
						$auteur = $_POST['auteur'];
						$contenu = $_POST['contenu'];
						$id = $_POST['id'];
						$parent = 0;
						$niveau = 0;
						$signal = 0;
						$this->ctrlCommentaire->repondre($date, $auteur, $contenu, $id, $parent, $niveau, $signal);
						break;
					
					
					case 'signalerCommentaire':
						$this->ctrlCommentaire->signalerCommentaire();	
						break;
					
					
					case 'validAjoutBillet':
						$date = date('Y-m-d H:i:s');
						$titre = $_POST['titre'];
						$contenu = stripcslashes($_POST['contenu']); 
						$this->ctrlGestion->validAjoutBillet($date, $titre, $contenu);
						break;
					
					
					case 'validModifBillet':
						$idBillet = intval($_GET['id']);
						$date = date('Y-m-d H:i:s');
						$titre = $_POST['titre'];
						$contenu = stripcslashes($_POST['contenu']); 
						$this->ctrlGestion->validModifBillet($date, $titre, $contenu, $idBillet);
						break;
					
					
					case 'validSuppBillet':
						$idBillet = intval($_GET['id']);
						$this->ctrlGestion->validSuppBillet($idBillet);
						break;
					
					
					case 'validAcceptCommentaire':
						$signal = 0;
						$idCommentaire = $_GET['id'];
						$this->ctrlGestion->validAcceptCommentaire($signal, $idCommentaire);
						break;
					
					
					case 'validSuppCommentaire':
						$contenu = 'Le Modérateur a supprimé ce commentaire'; 
						$signal = 0;
						$idCommentaire = $_GET['id'];
						$this->ctrlGestion->validSuppCommentaire($contenu, $signal, $idCommentaire);
						break;		
				
						
					default:
						throw new Exception("Action non valide");
				}
			}
			else {
				if (isset($_GET['page'])) {
					$page = intval($_GET['page']);
					
					if ($page != 0) {
						$this->ctrlAccueil->accueil(); // action par défaut
					}
					else {
						throw new Exception('Page non valide');
					}
				}
				
				else {
					$this->ctrlAccueil->accueil(); // action par défaut
				}
			}
		}
		catch (Exception $e) {
			$this->erreur($e->getMessage());
		}
	}
	
	// Affiche une erreur
	private function erreur($msgErreur) {
	$vue = new Vue("Erreur");
	$vue->generer(array('msgErreur' => $msgErreur));
	}
	
}