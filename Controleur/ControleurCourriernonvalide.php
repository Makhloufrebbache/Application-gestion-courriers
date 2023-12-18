<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/courrier.php';
require_once 'Modele/transfert.php';
require_once 'Modele/user.php';

class ControleurCourriernonvalide extends Controleur {
  private $user;
  private $courriernonvalide;
  private $transfertvalide;
  //Inctancier les objets
  public function __construct() {
	$this->user         = new user();
	$this->courriernonvalide = new courrier();
	$this->transfertvalide = new transfert();
	
}

public function index() {
	  
	$login = ""; 
	$user  = array();
	if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser     =  $this->requete->getSession()->getAttribut("User_Id");
	    $user       = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
		$User_Site  = $this->requete->getSession()->getAttribut("User_Site");
        }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
        }
        //Récupérer les courrier en attente de récéption
		$courrier_nonvalide  = $this->courriernonvalide->getCourriernonvalide($user['User_Site']);
		$nb_courrier_nonvalide     = $courrier_nonvalide->rowCount();
		$courrier_nonvalides        = $courrier_nonvalide->fetchAll();
		//Envoi à la vue	
        $this->genererVue(array('courrier_nonvalides'=>$courrier_nonvalides, 'login'=>$login, 'user'=>$user,'User_Site'=>$User_Site	));
  }
/********************************************************************/
	                    //Actions valider courrier
/********************************************************************/
public function validercourrier(){
		if($this->requete->existeParametre("id")){
		$Num_Enrg = $this->requete->getParametre("id");
		$this->courriernonvalide->validercourrier($Num_Enrg);
	    $Id_User_Rec   =  $this->requete->getSession()->getAttribut("User_Id");
	    $Date_Rec =date("Y-m-d", time());
		$this->transfertvalide->Validertransfertc($Date_Rec, $Id_User_Rec, $Num_Enrg);
			
 }
$this->rediriger("courriernonvalide");	
}
	  
}