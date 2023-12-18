<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';
require_once 'Modele/courrier.php';
require_once 'Modele/facture.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/transfert.php';


class ControleurAccueil extends Controleur { 
   private $user;
   private $courriers;
   private  $factures;
   private  $site;
   private  $transferts;
   public function __construct() {
	 //instanciation des objets
     $this->courriers      = new courrier();
	 $this->factures       = new facture();
	 $this->user           = new user();
	 $this->site           = new site_rec();
	 $this->transferts     = new transfert();
    }
  
   public function index() {
		$login = ""; 
		$user  = array();
	    if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user     = $this->user->getUsers($IdUser);
	    $login    = $this->requete->getSession()->getAttribut("User_Login");
          }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
    }
    //récupération de courrier enregistrés
    $courrier_enrg   = $this->courriers->getCourrierEnrg($user['User_Site'], 1);
		    $nb_courrier_enrg     = $courrier_enrg->rowCount();

    $courrier_recu   = $this->courriers->getCourrierEnrg($user['User_Site'], 0);
		    $nb_courrier_recu     = $courrier_recu->rowCount();

    $courrier_Env   = $this->courriers->getCourrierEnv($user['User_Site'], 0);
		    $nb_courrier_Env     = $courrier_Env->rowCount();
		
    $Facture_Enrg   = $this->factures->getFactureEnrg($user['User_Site'], 1);
		    $nb_Facture_Enrg     = $Facture_Enrg->rowCount();
				  		
    //récupération de courrier reçu non validée
    $facture_recu   = $this->factures->getFactureEnrg($user['User_Site'], 0);
		    $nb_facture_recu     = $facture_recu->rowCount();

    //récupération de courrier reçu non validée
    $facture_Env   = $this->factures->getFactureEnv($user['User_Site'], 0);
		    $nb_facture_Env     = $facture_Env->rowCount();
			
    $site   = $this->site->getSite($user['User_Site']);
    $this->genererVue(array('login'=>$login, 'user'=>$user, 'nb_courrier_enrg'=>$nb_courrier_enrg, 'nb_courrier_recu'=>$nb_courrier_recu, 'nb_courrier_Env'=>$nb_courrier_Env, 'nb_Facture_Enrg'=>$nb_Facture_Enrg, 'nb_facture_recu'=>$nb_facture_recu, 'nb_facture_Env'=>$nb_facture_Env, 'site'=>$site));
  } //end function index
  
}//end class ControleurAccueil