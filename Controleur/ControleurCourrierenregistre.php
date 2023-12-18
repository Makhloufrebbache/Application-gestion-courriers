<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/courrier.php';
require_once 'Modele/source.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/user.php';

class ControleurCourrierenregistre extends Controleur {
  private $user;
  private $courrier;
  private $source;
  private $site_rec;
  //Instanciation d'objets
  public function __construct() {
	$this->user         = new user();
	$this->courrier = new courrier();
	$this->source = new source();
	$this->site_rec = new site_rec();
  }

  public function index() {
	  
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser     =  $this->requete->getSession()->getAttribut("User_Id");
	    $user       = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
		$User_Site = $this->requete->getSession()->getAttribut("User_Site");
        }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
       }
		$courriers   = $this->courrier->getCourriers();
		    $nb_courriers     = $courriers->rowCount();
			$courriers        = $courriers->fetchAll();
			
		//filtrer selon date reception
		if($this->requete->existeParametre("Date_Rec")){
           $Date_Rec   = $this->requete->getParametre("Date_Rec");
		   $courriers   = $this->courrier->getCourrierfiltrer($Date_Rec, "Date_Arriv");
		   $nb_courriers     = $courriers->rowCount();
		   $courriers        = $courriers->fetchAll();
		}
			
		//filtrer selon site reception
		if($this->requete->existeParametre("Site_Rec")){
           $Site_Rec     = $this->requete->getParametre("Site_Rec");
		   $courriers    = $this->courrier->getCourrierfiltrer($Site_Rec, "Site_Dest");
		   $nb_courriers = $courriers->rowCount();
		   $courriers    = $courriers->fetchAll();
		}
		
		$sources   = $this->source->getSource();
		    $nb_sources     = $sources->rowCount();
			$sources        = $sources->fetchAll();
		
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
	   
			
		if ($Column == "Num_Enrg_C"){ 
		   	$courriers  = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType);
			$courriers    = $courriers->fetchAll(); 

		   } 
		else  if($Column == "Num_Reg_C"){ 
		   	$courriers  = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType);
			$courriers    = $courriers->fetchAll(); 

		   }   			
		else  if($Column == "Date_Saisie"){ 
		   	$courriers  = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType);
			$courriers    = $courriers->fetchAll(); 

		   }   		
		else  if($Column == "Heure_Saisie"){ 
		   	$courriers  = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType);
			$courriers    = $courriers->fetchAll(); 

		   }   			
	
        else  if($Column == "Date_Arriv"){ 
		   	$courriers  = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType);
			$courriers    = $courriers->fetchAll(); 

		   }   		
		else  if($Column == "Exp"){ 
		   	$courriers  = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType);
			$courriers    = $courriers->fetchAll(); 

		   }   		
		   	
        else  if($Column == "Src"){ 
		   	$codesrcs = $this->source->getSources($search, $SearchType);
			$codesrcs        = $codesrcs->fetchAll(); 
			$courriers = array();
		  foreach($codesrcs as $codesrc): 
		    $courriers1   = $this->courrier->getSearchcourrierenrg($Column, $codesrc["Id"], "EqualTo"); 
		    $courriers1        = $courriers1->fetchAll();
		    $courriers = array_merge ($courriers, $courriers1) ;
		   endforeach;
		   }			

        else  if($Column == "Objet"){ 
		   			  
		  $courriers   = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType); 
		  $courriers        = $courriers->fetchAll();
           }
        else  if($Column == "Observation"){ 
		   			  
		  $courriers   = $this->courrier->getSearchcourrierenrg($Column, $search, $SearchType); 
		  $courriers        = $courriers->fetchAll();
		   }	
        else  if($Column == "Agent"){ 
		  $codeagents = $this->agent->getAgents($search, $SearchType);
		  $codeagents        = $codeagents->fetchAll(); 
		  $incidents = array();
		  foreach($codeagents as $codeagent): 
		  $incidents1   = $this->incident->getSearchincident($Column, $codeagent["Id"], "EqualTo"); 
		  $incidents1   = $incidents1->fetchAll();
		  $incidents    = array_merge ($incidents, $incidents1) ;
		   endforeach;
		   }			   
		   
		   }
     $this->genererVue(array('courriers'=>$courriers, 'sources'=>$sources,  'sites_rec'=>$sites_rec, 'login'=>$login, 'user'=>$user, 'menuNum'=>3));
  }
	  
}