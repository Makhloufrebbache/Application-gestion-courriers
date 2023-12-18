<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/facture.php';
require_once 'Modele/frs.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/user.php';

class ControleurFacture extends Controleur {
  private $frs;
  private $site_rec;
  private $user;
  private $factures;
//instancier les objets
private $facture;
  public function __construct() {
    $this->frs   = new frs();
	$this->site_rec     = new site_rec();
	$this->user           = new user();
	$this->factures           = new facture();
  }

  public function index() {
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("User_Login")){ //
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
		$login      = $this->requete->getSession()->getAttribut("User_Login");

          }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
          }

		$frss   = $this->frs->getFrs();
		    $nb_frss     = $frss->rowCount();
			$frss        = $frss->fetchAll();
		
	    $sites_rec   = $this->site_rec->getSite_Rec();
		    $nb_sites_rec     = $sites_rec->rowCount();
			$sites_rec        = $sites_rec->fetchAll();
		
			
//Ajout d'une facture
		$msg                   ="";
		$Id                    ="";
		$Date_Saisie           = "";
		$Heure_Saisie          = "";
		$Num_Enrg              = "";
		$Num_Reg_F              = "";
		$Date_Fac              = "";
		$Date_Arriv            = "";
		$Site_Rec                = $user["User_Site"];
	    $Num_Fac               = "";
		$Nom_Frs               = ""; //date("Y", time()).'-'.date("m", time()).'-'.date("d", time());
		$Montant_TTC           = "";
		$nbr = 0;
		$red_only              = ""; 
	   if($this->requete->existeParametre("id")){//Modification  d'un bon de transfert
		$Id          =  $this->requete->getParametre("id");
		$facture    = $this->factures->getFacture($Id);
		$facture    = $facture->fetch();
	if 	($facture['Date_Arriv']!= NULL)
		$red_only ="readonly" ; 
		}
		else{		
		
	$facture     = array( 'Date_Arriv'=>date("Y-m-d", time()), 'Date_Fac'=>"", 'Num_Reg_F'=>"", 'Num_Fac'=>"", 'Nom_Frs'=>"", 'Site_Rec'=>"", 'Montant_TTC'=>"");}
		
	if($this->requete->existeParametre("Nom_Frs")){ //Recupération de Forms Data
	  
	    if($this->requete->existeParametre("Date_Arriv")) 
	            $Date_Arriv        = $this->requete->getParametre("Date_Arriv");
					
	             if($this->requete->existeParametre("Date_Fac")) 
	                $Date_Fac        = $this->requete->getParametre("Date_Fac");
					
    // récupération de dernier numéro facture ou courreir			
		$Num_F = $this->factures->FactureSouche($Date_Arriv);
		$nbr=$Num_F->rowCount();
				
	  if($this->requete->existeParametre("Num_Reg_F")) 
	    $Num_Reg_F        = $this->requete->getParametre("Num_Reg_F");

	  	   if($this->requete->existeParametre("Nom_Frs"))
       $Nom_Frs   = $this->requete->getParametre("Nom_Frs");
	  	        if($this->requete->existeParametre("Num_Fac"))
              $Num_Fac       = str_replace(' ', '', $this->requete->getParametre("Num_Fac"));
	        
			  	        if($this->requete->existeParametre("Montant_TTC"))
              $Montant_TTC   = $this->requete->getParametre("Montant_TTC");
	          $Date_Saisie  = date("Y-m-d", time());
			  $Heure_Saisie = date("H:i:s", time());

	   if($Id == NULL){ // Ajout d'une facture
	if (!$this->factures->verifierexiste($Nom_Frs, $Num_Fac)){		   
	   if ($nbr==1){
		$Num_F        = $Num_F->fetch();
		$Num_F1 = $Num_F[4]+1;
		$Idn = $Num_F[0];
	//génaration de numéro de facture 
		$Date = explode("-", $Date_Arriv);$year= $Date[0];
	  $Num_Enrg_F = $year."/".$Num_F1;
	  $Anne_F= $year;	
	  $Num_enrg=$Num_F1;
	 $this->factures-> Mfacture($Num_F1, $Idn);
	   
	   $this->factures->addFactures($Num_enrg,$Anne_F, $Num_Enrg_F, $Num_Reg_F, $Date_Saisie, $Heure_Saisie,$Date_Arriv, $Date_Fac, $Num_Fac, $Nom_Frs, $Montant_TTC, $Site_Rec,$Site_Rec, $Site_Rec); 
		    

	   $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
  <strong>Success!</strong> Facture enregistré.'.$Num_Enrg_F.'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}
else {   $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="opacity: 1;">
  <strong>Alert!</strong> La date n\'apprtient pas à la plage autorisée .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
     }
	   }else{ 
	    $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="opacity: 1;">
  <strong>Alert!</strong> Facture déja enregistré.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	   }
	}else{
	  
 // Modification d'une facture
	  $this->factures->factureUpdate($Num_Reg_F, $Date_Fac, $Date_Arriv, $Num_Fac, $Nom_Frs, $Montant_TTC, $Id );
	   
	$this->rediriger("factureannuler");
		
		}

	}
//Fin d'ajout d'une facture
			
		
    $this->genererVue(array('frss'=>$frss, 'msg'=>$msg,   'login'=>$login, 'user'=>$user, 'menuNum'=>2, 'facture'=>$facture, 'red_only'=>$red_only ));
  }
	  
}