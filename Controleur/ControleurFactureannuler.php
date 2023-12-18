<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/facture.php';
require_once 'Modele/frs.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/user.php';

class ControleurFactureannuler extends Controleur {
  private $user;
  private $facture;
   private $frs;
     private $site_rec;
	 

  public function __construct() {
	$this->user         = new user();
	$this->facture = new facture();
	
	$this->frs = new frs();
		$this->site_rec = new site_rec();
  }

  public function index() {
	  
	     $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("User_Login")){ //
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
		$User_Site      = $this->requete->getSession()->getAttribut("User_Site");
		
          }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
          }
		  
//formulaire motif annulation *******************************
		if($this->requete->existeParametre("AnnulationTxt")){
           $AnnulationTxt   = $this->requete->getParametre("AnnulationTxt");
		   $IdFact          = $this->requete->getParametre("IdFact");
		   
		   $facts   = $this->facture->annulerfacture($AnnulationTxt, $IdFact);
		}
		  
//filtrer selon site reception
		if($this->requete->existeParametre("Site_Rec")){
           $Site_Rec   = $this->requete->getParametre("Site_Rec");
		
		$facts   = $this->facture->getFacturefiltrer($Site_Rec);
		    $nb_facts    = $facts->rowCount();
			$facts      = $facts->fetchAll();
			
}

	$factures   = $this->facture->getFacturesite($User_Site);
		   $nb_factures     = $factures->rowCount();
			$factures        = $factures->fetchAll();
			
//filtrer selon nom fournisseur
		if($this->requete->existeParametre("fournisseurs")){
           $fournisseurs   = $this->requete->getParametre("fournisseurs"); 
		   $factures   = $this->facture->getFacturesfiltrer($fournisseurs, "Nom_Frs");
		    $nb_factures     = $factures->rowCount();
			$factures        = $factures->fetchAll();
		}

			
		$frss   = $this->frs->getFrs();
		    $nb_frss     = $frss->rowCount();
			$frss        = $frss->fetchAll();
		
	$sites_rec   = $this->site_rec->getSite_Rec();
		    $nb_sites_rec     = $sites_rec->rowCount();
			$sites_rec        = $sites_rec->fetchAll();
			
//Recherche selon critere d'une colonne
	if($this->requete->existeParametre("search")){
       $search        = $this->requete->getParametre("search");
	   if($this->requete->existeParametre("SearchType"))
       $SearchType        = $this->requete->getParametre("SearchType");
	   if($this->requete->existeParametre("Column"))
       $Column        = $this->requete->getParametre("Column");
	   
	
			
		if ($Column == "Num_Enrg_F"){ 
		   	$factures  = $this->facture->getSearchfactureenrg($Column, $search, $SearchType);
			$factures    = $factures->fetchAll(); 

		   } 
		else  if($Column == "Num_Reg_F"){ 
		   	$factures  = $this->facture->getSearchfactureenrg($Column, $search, $SearchType);
			$factures    = $factures->fetchAll(); 

		   }   			
				else  if($Column == "Date_Saisie"){ 
		   	$factures  = $this->facture->getSearchfactureenrg($Column, $search, $SearchType);
			$factures    = $factures->fetchAll(); 

		   }   		
		   				else  if($Column == "Heure_Saisie"){ 
		   	$factures  = $this->facture->getSearchfactureenrg($Column, $search, $SearchType);
			$factures    = $factures->fetchAll(); 

		   }   			
	
   else  if($Column == "Date_Fac"){ 
		   	$factures  = $this->facture->getSearchfactureenrg($Column, $search, $SearchType);
			$factures    = $factures->fetchAll(); 

		   }   		
		   				else  if($Column == "Num_Fac"){ 
		   	$factures  = $this->facture->getSearchfactureenrg($Column, $search, $SearchType);
			$factures    = $factures->fetchAll(); 

		   }   		
		   	
else  if($Column == "Nom_Frs"){ 
		   			   $codefrs = $this->frs->getFrss($search, $SearchType);
			$codefrs        = $codefrs->fetchAll(); 
			$factures = array();
		  foreach($codefrs as $codefr): 
		  $factures1   = $this->facture->getSearchfactureenrg($Column, $codefr["Num_Frs"], "EqualTo"); 
		  $factures1        = $factures1->fetchAll();
		  $factures = array_merge ($factures, $factures1) ;
		   endforeach;
		   }			

else  if($Column == "Montant_TTC"){ 
		   			  
		  $factures   = $this->facture->getSearchfactureenrg($Column, $search, $SearchType); 
		  $factures        = $factures->fetchAll();
		   }			

else  if($Column == "Agent"){ 
		   			   $codeagents = $this->agent->getAgents($search, $SearchType);
			$codeagents        = $codeagents->fetchAll(); 
			$incidents = array();
		  foreach($codeagents as $codeagent): 
		  $incidents1   = $this->incident->getSearchincident($Column, $codeagent["Id"], "EqualTo"); 
		  $incidents1        = $incidents1->fetchAll();
		  $incidents = array_merge ($incidents, $incidents1) ;
		   endforeach;
		   }	
	}
    $this->genererVue(array('factures'=>$factures, 'frss'=>$frss,  'sites_rec'=>$sites_rec, 'login'=>$login, 'user'=>$user,   'user'=>$user, 'menuNum'=>6));
  }
	
/********************************************************************/
	                    //Actions Annuler facture
/********************************************************************/
	public function annulerfacture(){
		if($this->requete->existeParametre("id")){
		$Num_Fac = $this->requete->getParametre("id");
	    $annulerfactures   = $this->facture->annulerfacture($Num_Fac);
			}
		$this->rediriger("factureannuler");
		}
  
}