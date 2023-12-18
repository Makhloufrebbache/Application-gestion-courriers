<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/site_rec.php';
require_once 'Modele/user.php';
require_once 'Modele/courrier.php';
require_once 'Modele/facture.php';
require_once 'Modele/transfert.php';

class ControleurCourriertransfert extends Controleur {
  private $site_rec;
  private $user;
  private $courrier; 
  private $facture; 
  private $transfert ;
  
  public function __construct() {
	$this->site_rec     = new site_rec();
	$this->user         = new user();
    $this->courrier     = new courrier();
    $this->facture      = new facture();
	$this->transfert    = new transfert();
  }

  public function index() {
	    $login = ""; 
		$user  = array();
	  if($this->requete->getSession()->existAttribut("User_Login")){ 
	    $IdUser   =  $this->requete->getSession()->getAttribut("User_Id");
	    $user      = $this->user->getUsers($IdUser);
	    $login      = $this->requete->getSession()->getAttribut("User_Login");
	    $Sit      = $this->requete->getSession()->getAttribut("User_Site");

          }else{//Si l'utilisateur n'est pas connecter il sera vers la page connexion
		$this->rediriger("connexion");	
		exit();	
          }
	//Ajout d'un transfert
		$msg                   = "";
		$Id_User_Trans         = "";
		$Num_Envoi             = "";
		$Num_Enrg              = "";
		$Site_Actuel           = "";
	    $Site_Dist             = "";
		$Etat_Dossier          = ""; //date("Y", time()).'-'.date("m", time()).'-'.date("d", time());
		$Date_Envoi            = "";
		$Date_Rec              = "";
		$Id_User_Rec           = "";
		$nb_courrier           = 0;
		$nb_facture            = 0;
		$Trans                 = "";
			
	if($this->requete->existeParametre("Num_Enrg") || $this->requete->existeParametre("Num_Fac")){ //Recupération de Forms Data

	  
			$month=date("n", time());
			$year=date("Y", time());
			
			$num_envoi   = $this->transfert->getNumenvoi($month, $year); 
		    $nb_num_envoi    = $num_envoi->rowCount();   
			$num_envoi        = $num_envoi->fetch();      

			if($num_envoi == false) $Num_Envoi=1; 
			else {
				$Num_Envoi1 = explode("/", $num_envoi[2]); 
				$Num_Envoi=$Num_Envoi1[0]+1; 
			}
	//Récupérer les paramètres		
	  	   if($this->requete->existeParametre("Num_Enrg")){
              $Num_Enrg   = $this->requete->getParametre("Num_Enrg"); 
	          $nb_courrier=count($Num_Enrg); }
	   
	  	   if($this->requete->existeParametre("Num_Fac")){
              $Num_Fac    = $this->requete->getParametre("Num_Fac"); 
	          $nb_facture =count($Num_Fac); }
	   
	  	        if($this->requete->existeParametre("Site_Dist"))
              $Site_Dist       = $this->requete->getParametre("Site_Dist");
			 
	  	        if($this->requete->existeParametre("Trans"))
              $Trans       = $this->requete->getParametre("Trans"); 
			   
	       $Id_User_Trans     = $IdUser;
		   $Site_Actuel        = $Sit; 
		   $Date_Envoi  = date("Y-m-d", time());
		   $date = explode("-", $Date_Envoi);
		   $Num_EnvoiImp = $Num_Envoi;
		   $Num_Envoi = $Num_Envoi."/".$date[1]."/".$date[0];
		   $Num_EnvoiImp = $Num_EnvoiImp."-".$date[1]."-".$date[0];

	   if($nb_courrier != 0 || $nb_facture != 0){ // Ajout d'un tranferst
	 for($i=0;$i< $nb_courrier;$i++ ){  // Transfert courriers
	  $lastid= $this->transfert->addTransfert($Id_User_Trans, $Num_Envoi, $Num_Enrg[$i],0, $Site_Actuel, $Site_Dist, $Date_Envoi, $Trans);
	 $this->courrier->updateCourrier($Site_Actuel, $Site_Dist, 0, $Num_Enrg[$i]);
	 }
	 
	 for($i=0;$i< $nb_facture;$i++ ){ // Transfert factures
	  $lastid= $this->transfert->addTransfert($Id_User_Trans, $Num_Envoi, 0, $Num_Fac[$i], $Site_Actuel, $Site_Dist, $Date_Envoi, $Trans);
	 $this->facture->updateFacture($Site_Actuel, $Site_Dist, 0, $Num_Fac[$i]);
	 } 
	 
	//Récupération et Formatage du numéro d'envoi
	   
	   $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="opacity: 1;">
  <strong>Success!</strong> Transfert inséré sous le numéro: '.$Num_Envoi.'.
<button type="button" value="" onclick="imprimer(\''.$Num_EnvoiImp.'\');" style="height: 26px; width: 195px;
">Imprimer le boredereau</button>  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	   }   
	} 
    //Fin d'ajout d'un transfert
	
		  $courriers     =$this->courrier->getCourriersiteTrans($Sit);
          $courriers     = $courriers->fetchAll();
		 
		  $factures      =$this->facture->getfacturesiteTrans($Sit);
          $factures      = $factures->fetchAll();

		  $sites_rec   = $this->site_rec->getSite_Rec();
		    $nb_sites_rec     = $sites_rec->rowCount();
			$sites_rec        = $sites_rec->fetchAll();
		
		
    $this->genererVue(array( 'sites_rec'=>$sites_rec, 'courriers'=>$courriers, 'factures'=>$factures,'Trans'=>$Trans, 'msg'=>$msg,   'login'=>$login, 'user'=>$user,'Sit'=>$Sit,'menuNum'=>5));
  }
	  
}