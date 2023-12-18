<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/facture.php';
require_once 'Modele/transfert.php';
require_once 'Modele/user.php';
require_once 'Modele/frs.php';

class ControleurFacturenonvalide extends Controleur {
  private $user;
  private $facturenonvalide;
  private $transfertvalide;
  private $frs;
//Instancier des objets
  public function __construct() {
	$this->user         = new user();
	$this->facturenonvalide = new facture();
	$this->transfertvalide = new transfert();
	$this->frs = new frs();
  }

  public function index() {
	  
    $login = ""; 
	$user  = array();
	if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
		$User_Site      = $this->requete->getSession()->getAttribut("User_Site");
    }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
  }
//Récupérer les factures en attente de récéption
	$facture_nonvalide  = $this->facturenonvalide->getFacturenonvalide($user['User_Site']);
		$nb_facture_nonvalide     = $facture_nonvalide->rowCount();
		$facture_nonvalides        = $facture_nonvalide->fetchAll(); 
		$frss   = $this->frs->getFrs();
		$nb_frss     = $frss->rowCount();
		$frss        = $frss->fetchAll();

    $this->genererVue(array('facture_nonvalides'=>$facture_nonvalides, 'login'=>$login, 'user'=>$user, 'frss'=>$frss, 
                                'User_Site'=>$User_Site	));
    }
//Actions sur la validation
 public function validerfacture(){
		if($this->requete->existeParametre("id")){
		$Num_Enrg = $this->requete->getParametre("id");
		$this->facturenonvalide->validerfacture($Num_Enrg);
	    $Id_User_Rec   =  $this->requete->getSession()->getAttribut("User_Id");
	    $Date_Rec =date("Y-m-d", time());
		$this->transfertvalide->Validertransfert($Date_Rec, $Id_User_Rec, $Num_Enrg);
			
	}
	 $this->rediriger("facturenonvalide");	
}
	  
}