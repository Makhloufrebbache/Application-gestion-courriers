<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/courrier.php';
require_once 'Modele/source.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/user.php';

class ControleurCourrier extends Controleur {
  private $source;
  private $site_rec;
  private $user;
  private $courriers;
  private $num_enrg;
  private $cour;
//instanciation d'objets
  public function __construct() {
    $this->source    = new source();
	$this->site_rec  = new site_rec();
	$this->user      = new user();
	$this->courriers = new courrier();
	$this->cour      = new courrier();	
	
  }

  public function index() {
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser =  $this->requete->getSession()->getAttribut("User_Id");
	    $user   = $this->user->getUsers($IdUser);
	    $login  = $this->requete->getSession()->getAttribut("User_Login");

        }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
        }
        //Récupérer la source d'envoi
		$sources   = $this->source->getSource();
		    $nb_sources     = $sources->rowCount();
			$sources        = $sources->fetchAll();
		//Récupérer le site
	    $sites_rec   = $this->site_rec->getSite_Rec();
		    $nb_sites_rec     = $sites_rec->rowCount();
			$sites_rec        = $sites_rec->fetchAll();
			
		//Ajout d'un courrier
		$msg                   ="";
		$Date_Saisie             = "";
		$Heure_Saisie             = "";
		$Num_Enrg                = "";
		$Anne_C                  = "";   
		$Num_Reg_C               = "";
		$MmAa                     = " ";
		$Date_Arriv              = "";
	    $Exp                     = "";
		$Src                     = ""; //date("Y", time()).'-'.date("m", time()).'-'.date("d", time());
		$Site_Rec                = $user["User_Site"];
		$Objet                   = "";
		$Site_Actuel             = "";
		$Site_Dest             = "";
		$Observation             = "";
		$nbr = 0;
		$courrier     = array(  'Date_Arriv'=>"", 'Num_Reg_C'=>"", 'Exp'=>"", 'Src'=>"", 'Site_Rec'=>"", 'Objet'=>"", 'Observation'=>"", 'Site_Actuel'=>"");
	
	if($this->requete->existeParametre("Exp")){ //Recupération de Forms Data

	  	   if($this->requete->existeParametre("Date_Arriv"))
	    $Date_Arriv        = $this->requete->getParametre("Date_Arriv");
		
        //récupération de dernier numéro facture ou courreir			
		$Num_C = $this->courriers->CourrierSouche($Date_Arriv);
		$nbr=$Num_C->rowCount();
		$Date = explode("-", $Date_Arriv); 
	    $MmAa = $month=$Date[1]."/".$Date[0];
	    //récupération des paramètres
	  	if($this->requete->existeParametre("Exp"))
        $Exp = $this->requete->getParametre("Exp");
	   
	   	if($this->requete->existeParametre("Num_Reg_C"))
        $Num_Reg_C = $this->requete->getParametre("Num_Reg_C");

	    if($this->requete->existeParametre("Src"))
        $Src = $this->requete->getParametre("Src");    
              
		if($this->requete->existeParametre("Objet"))
        $Objet   = $this->requete->getParametre("Objet");
			  
		if($this->requete->existeParametre("Observation"))
        $Observation   = $this->requete->getParametre("Observation");
			  
		$Date_Saisie  = date("Y-m-d", time());
		$Heure_Saisie = date("H:i:s", time());
		//Vérifier l'existance du courrier
	if(!$this->courriers->verifierexiste($Num_Reg_C, $MmAa, $Site_Rec)){		   
	   if($Num_Enrg == NULL){ 
	   
	   if ($nbr==1){
		$Num_C        = $Num_C->fetch(); 
		$Num_C1 = $Num_C[3]+1; 
		$Id = $Num_C[0];
	    $year= $Date[0];
	    $Num_enrg_C = $year."/".$Num_C1;	
	    $Num_enrg=$Num_C1;
	    $Anne_C =$year ;
	    $this->courriers-> MCourrier($Num_C1, $Id);
	    //Insertion du courrier
	    $lastid= $this->courriers->addCourrier($Num_enrg , $Anne_C, $Num_enrg_C, $Num_Reg_C,$MmAa, $IdUser, $Date_Saisie, $Heure_Saisie, $Date_Arriv, $Exp, $Src, $Objet, $Observation,  $Site_Rec, $Site_Rec);
        //Renvoi d'un message de succés ou d'échec d'insertion à la vue
	   $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
              <strong>Success!</strong> courrier enregistré sous le numéro '.$Num_enrg_C.'.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
             </div>';}
    else {   $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="opacity: 1;">
            <strong>Success!</strong> La date n\'apprtient pas à la plage autorisée .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'; 
    }	   
	}else {
	   $this->reclamation->updatereclamation("$Id_Rubrique", "$Id_Sous_Rubrique", $title, "$s_desc", $content, "$reclamationFile", "$Auteur", "$Source", $reclamationId, "$Sur_Titre_fr", $date, $Last_Update);
	   
	}
	}else{
	   $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="opacity: 1;">
              <strong>Alert!</strong> Courrier déja enregistré.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>';
		}	   
	}
    //Fin d'ajout d'un courrier
		
    $this->genererVue(array('sources'=>$sources,  'sites_rec'=>$sites_rec, 'msg'=>$msg,   'login'=>$login, 'user'=>$user, 'menuNum'=>1));
	}
	  
}//end ContreolCourrier
