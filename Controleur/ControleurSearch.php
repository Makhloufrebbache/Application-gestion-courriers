<?php
require_once 'Framework/Controleur.php';
require_once 'Framework/Search.php';
require_once 'Modele/searchs.php';
require_once 'Modele/user.php';
require_once 'Modele/courrier.php';
require_once 'Modele/facture.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/transfert.php';
require_once 'Modele/frs.php';

class ControleurSearch extends Controleur {
   private $site_rec;
   private $result_search;
   private $user;
   private $courriers;
   private  $factures;
   private  $transferts;
   private $frs;

   public function __construct() {
	$this->site_rec       = new site_rec();
	$this->result_search  = new searchs();
    $this->courriers      = new courrier();
	$this->factures       = new facture();
	$this->user           = new user();
	$this->transferts     = new transfert();
    $this->frs            = new frs();
  }

   public function index() {
	//Vérifier l'authentification 
	    $login = ""; 
		$user  = array();
		$historiquemvts = array();
		$nb_historiquemvts = 0;
	  if($this->requete->getSession()->existAttribut("User_Login")){ //
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
          }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
         }

	    if($this->requete->existeParametre("search") && $this->requete->existeParametre("choix")){
	         $search   = $this->requete->getParametre("search");
			 $choix   = $this->requete->getParametre("choix"); 
		}else{
		$this->rediriger("accueil");	
		exit();	
			}
		$sites = $this->site_rec->getSite_Rec();
		$sites = $sites->fetchAll();
		
		$recherche = trim($search);
		$recherche1 = explode("/", $recherche);
		$rechercheImp = implode("-", $recherche1);
		$msg1="Aucun résultat";  //initialisation de la variable
		if($choix==0){ // choix de courriers
		//Historique des mouvements d'un courrier
		   $historiquemvts = $this->transferts->getCourriermvt($recherche, $choix);
	   	   $nb_historiquemvts   = $historiquemvts->rowCount();
		   $historiquemvts = $historiquemvts->fetchAll();
		   
           $resultats   =  $this->courriers->getCourriersearch($recherche);	
	   	   $nb_result   = $resultats->rowCount();
		   $resultats = $resultats->fetch();
		   $Site_Dest=$this->site_rec->getSite($resultats['Site_Dest']);
		   $Site_Actuel=$this->site_rec->getSite($resultats['Site_Actuel']);
		   if($nb_result != 0){// choix de courrier
		   if($resultats['Etat_Dossier']==1)
		   $msg1="Le courrier se trouve au niveau de site : ".$Site_Dest['Site'];
		   else $msg1="Le courrier est en cours d'envoi vers le site : ".$Site_Dest['Site'];
		   }
		   $msg= "le courrier N°: ".$recherche;		
			}elseif($choix==1){ // choix de factures
		//Historique des mouvements d'une facture
		   $historiquemvts = $this->transferts->getCourriermvt($recherche, $choix);
	   	   $nb_historiquemvts   = $historiquemvts->rowCount();
		   $historiquemvts = $historiquemvts->fetchAll();
           $resultats   =  $this->factures->getFacturesearch($recherche);	
	   	   $nb_result   = $resultats->rowCount();
		   $resultats = $resultats->fetch();
		   $Site_Dest=$this->site_rec->getSite($resultats['Site_Dest']);
		   $Site_Actuel=$this->site_rec->getSite($resultats['Site_Actuel']);
		   if($nb_result != 0){
		   if($resultats['Etat_Dossier']==1)
		   $msg1="La facture se trouve au niveau de site : ".$Site_Dest['Site'];
		   elseif ($resultats['Etat_Dossier']==2)  $msg1="La facture est annulée ";
		   else $msg1="La facture est en cours d'envoi vers le site : ".$Site_Dest['Site'];
		   }
		   $msg= "la facture N°: ".$recherche;		
			}elseif($choix==2){ // choix de bordereaux
           $resultats   =  $this->transferts->getTransfertsearch($recherche);	
	   	   $nb_result   = $resultats->rowCount();
		   $resultats = $resultats->fetchAll();
		   if($nb_result != 0){
		   $Site_Dest=$this->site_rec->getSite($resultats[0]['Site_Dist']);
		   $Site_Actuel=$this->site_rec->getSite($resultats[0]['Site_Actuel']);
		   
		   $msg1="Le bordereau est envoyé vers le site de  ".$Site_Dest['Site']." en date de: ".$resultats[0]['Date_Envoi'];
		   }
		   $msg= "le bordereau d'envoi N°: ".$recherche;		
			}
		
    $this->genererVue(array('sites'=>$sites, 'historiquemvts'=>$historiquemvts, 'nb_historiquemvts'=>$nb_historiquemvts, 'resultats'=>$resultats, 'nb_result'=>$nb_result, 'recherche'=>$recherche, 'login'=>$login, 'user'=>$user, 'menuNum'=>6, 'msg'=>$msg, 'msg1'=>$msg1, 'choix'=>$choix, 'rechercheImp'=>$rechercheImp));
  }
  
  public function imprimer() {
	//Vérifier l'authentification 
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
        }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
     }
	   $Num        = $this->requete->getParametre("id");
	   $recherche1 = explode("-", $Num);
	   $Num        = implode("/", $recherche1);
	   
       $resultats   =  $this->transferts->getTransfertsearch($Num); 
	   $nb_result   = $resultats->rowCount();
	   $resultats = $resultats->fetchAll();
	   if($nb_result != 0){
		   $Site_Dest=$this->site_rec->getSite($resultats[0]['Site_Dist']);
		   $Site_Actuel=$this->site_rec->getSite($resultats[0]['Site_Actuel']);
		   $Date_Envoi =  $resultats[0]['Date_Envoi'];
		   $Trans= $resultats[0]['Trans'];
	   }
		   
	//Récuperer les courriers (Expediteurs) et factures (Fournisseurs)
		$courriers   = $this->courriers->getCourriers();
		$courriers   = $courriers->fetchAll();
	    $factures    = $this->factures->getFactures();
  		$factures    = $factures->fetchAll();
		$frss   = $this->frs->getFrs();
		$frss        = $frss->fetchAll();
		

  	$this->genererVue(array('resultats'=>$resultats, 'login'=>$login, 'user'=>$user, 'Num'=>$Num, 'menuNum'=>6, 'Site_Dest'=>$Site_Dest['Site'], 'Site_Actuel'=>$Site_Actuel['Site'], 'Date_Envoi'=>$Date_Envoi, 'Trans'=>$Trans, 'courriers'=>$courriers, 'factures'=>$factures, 'frss'=>$frss), $template="Vue/gabaritImp.php");
  	}
  
}