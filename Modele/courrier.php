<?php
require_once 'Framework/Modele.php';

class courrier extends Modele{

	//Création d'un numéro de courrier selon la souche qui lui convient dans la table numérotation 
	public  function CourrierSouche($date){
		$sql='SELECT * FROM numerotation WHERE Date_Debut<=? and Date_Fin >=? ';
		$Souche = $this->executerRequete($sql, array($date, $date));
		return $Souche;     
	}
	//Mise à jours de la colonne Numéro courrier de la table numérotation par le nouveau numéro de courrier générer   
	public function MCourrier($Num_C1, $Id){
	    $sql = "update numerotation set  Num_C=? WHERE Id = ?" ;
        $this->executerRequete($sql, array($Num_C1, $Id));
	}		   
	//Récuprer les courriers par l'ordre decoissant de l'id	   		   
	public function getCourriers1(){
		$sql='SELECT * FROM couriers  ORDER BY Id DESC ';
		$couriers = $this->executerRequete($sql);
		return $couriers;
	}
   //Mise à jours de numéro d'enregistrement d'un courrier de l'id en question
	public function Magcourrier($Num_Courrier, $Id){
		$sql = "update couriers set Num_Enrg=? where  Id=? ";
        $this->executerRequete($sql, array($Num_Courrier, $Id));
	}
	//Controler l'insertion double pour un méme numéro de courrier dans méme année.	   
    public  function verifierexiste($Num_Reg_C, $MmAa, $Site_Rec){
		$existe=false; 
		$sql='SELECT * FROM couriers WHERE Num_Reg_C=?  and MmAa=? and Site_Rec=?';
		$courier = $this->executerRequete($sql, array($Num_Reg_C, $MmAa, $Site_Rec));
		if ($courier->rowCount()==1)
		   $existe=true;
		return $existe;     
	}		   
	//Récupérer le courrier du dernier id.
	public function getCourrier($lastid){
		$sql='SELECT * FROM couriers WHERE Num_Enrg=? ';
		$courier = $this->executerRequete($sql, array($lastid));
		$courier = $courier->fetch();
		return $courier;
		}
	//récupérer les les courrier un site
	public function getCourriersite($Site_Rec){
		$sql = "SELECT * FROM couriers WHERE Site_Dest=? and Etat_Dossier=? ";
		$Site_Rec = $this->executerRequete($sql, array($Site_Rec, 1));
		return $Site_Rec;
		}
	//Rechercher les courriers d'un site en utilisant des filtres, sur les déffirentes colonnes.	
	public function getCourrierfiltrer($Site_Rec, $colone){
		if($Site_Rec != "tous")
		$sql = "SELECT * FROM couriers WHERE ".$colone." =? ";
		else $sql = "SELECT * FROM couriers ";
		$Site_Rec = $this->executerRequete($sql, array($Site_Rec));
		return $Site_Rec;
	}
	// Récupérer le plus grand Numéro d'enregistrement d'un courrier dans la table couriers de l'année passéen paramètre.
	public function getNumenrg1($year){
		$sql='SELECT  MAX(Num_Enrg) FROM couriers where YEAR(Date_Saisie)=? ';
		$num_enrg = $this->executerRequete($sql, array($year));
		return $num_enrg;
	}
	//Récupérer le dernière ligne de la table courriers pour le mois et l'année passé en paramètres
    public function getNumenrg($month, $year){
		$sql='SELECT *  FROM couriers WHERE MONTH(Date_Saisie)=? AND YEAR(Date_Saisie)=? ORDER BY Id  DESC LIMIT 1';
		$num_enrg = $this->executerRequete($sql, array($month, $year));
		return $num_enrg;
	}	
	//Récupérer les courriers enregistrés d'un site selon leurs état(En cours d'envoi,récéptionner..).	
	public function getCourrierEnrg($User_Site, $Etat_Dossier){
		$sql = "SELECT * FROM couriers WHERE Site_Dest=? AND Etat_Dossier=? ";
		$User_Site = $this->executerRequete($sql, array($User_Site, $Etat_Dossier));
		return $User_Site;
	}
	//Récupérer les les courriers en attente de réception.	
	public function getCourriernonvalide($User_Site){
		$sql = "SELECT * FROM couriers INNER JOIN site_reception ON couriers.Site_Rec=site_reception.Id WHERE couriers.Site_Dest=? AND couriers.Etat_Dossier=0 ";
		$User_Site = $this->executerRequete($sql, array($User_Site));
		return $User_Site;
	}
	////Récupérer les courriers envoyé d'un site selon leurs état(En cours d'envoi,récéptionner..).	
	public function getCourrierEnv($User_Site, $Etat_Dossier){
		$sql = "SELECT * FROM couriers WHERE Site_Actuel=? AND Etat_Dossier=? ";
		$User_Site = $this->executerRequete($sql, array($User_Site, $Etat_Dossier));
		return $User_Site;
	}
		
	public function getCourriersiteTrans($Sit){
		$sql = "SELECT * FROM couriers WHERE Site_Dest=? AND Etat_Dossier=?";
		$Sit = $this->executerRequete($sql, array($Sit, 1));
		return $Sit;
	}
	//Récuprer la liste des courriers par ordre décroissant de numéro d'enregistrement et de l'année	
	public function getCourriers(){
		$sql='SELECT * FROM couriers ORDER BY Anne_C DESC, Num_Enrg DESC ;';
		$courriers = $this->executerRequete($sql);
		return $courriers;
	}
		
    //Ajouter un courrier
	public function addCourrier($Num_enrg, $Anne_C, $Num_enrg_C, $Num_Reg_C,$MmAa, $IdUser, $Date_Saisie, $Heure_Saisie, $Date_Arriv, $Exp, $Src, $Objet, $Observation,  $Site_Actuel, $Site_Rec){
       $sql = "INSERT INTO couriers (Num_Enrg, Anne_C, Num_Enrg_C, Num_Reg_C,MmAa, Id_User, Date_Saisie, Heure_Saisie, Date_Arriv, Exp, Src,  Site_Rec, Objet, Observation, Site_Actuel,  Site_Dest) values(? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       $this->executerRequete($sql, array($Num_enrg, $Anne_C, $Num_enrg_C, $Num_Reg_C,$MmAa, $IdUser, $Date_Saisie, $Heure_Saisie, $Date_Arriv, $Exp, $Src, $Site_Rec, $Objet, $Observation, $Site_Actuel, $Site_Rec));
    }
	//Mise à jours d'un courrier	
    public function updateCourrier($Site_Actuel, $Site_Dest, $Etat_Dossier, $Num_Enrg){
      $sql = "update couriers  set  Site_Actuel=?, Site_Dest=?, Etat_Dossier=?
			  where  Num_Enrg_C=? ";
      $this->executerRequete($sql, array($Site_Actuel, $Site_Dest, $Etat_Dossier, $Num_Enrg));
    }
	// valider un courrier 
    public function validercourrier($Num_Enrg){
      $sql = "update couriers set   Etat_Dossier=?  where  Num_Enrg=? ";
      $this->executerRequete($sql, array(1, $Num_Enrg));
    }
	//Rechercher un courrier par son numéro(numéro générer automatiquement par l'application)
    public function getCourriersearch($Num_Enrg_C){
	  $sql = "SELECT * FROM couriers WHERE Num_Enrg_C=? ";
	  $Num_Enrg = $this->executerRequete($sql, array($Num_Enrg_C));
      return $Num_Enrg;
    }
	//Rechercher des courriers par colonne et le type 
    public function getSearchcourrierenrg($Column, $search, $SearchType){
      if($SearchType == "EqualTo")
		      $SearchType = "=?";
	  elseif($SearchType == "StartW")
		      $SearchType = " LIKE ?\"%\"";
	  elseif($SearchType == "EndW")
		      $SearchType = " LIKE \"%\"?";
	  elseif($SearchType == "Content")
		      $SearchType = " LIKE \"%\"?\"%\"";
	  elseif($SearchType == "UperTo")
		      $SearchType = ">?";
	  elseif($SearchType == "LowerTo")
		      $SearchType = "<?";
	  $sql='SELECT * FROM couriers WHERE '.$Column.$SearchType;
	  $courriers = $this->executerRequete($sql, array($search));
	return $courriers; 
}		

}
