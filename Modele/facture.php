<?php
require_once 'Framework/Modele.php';

class facture extends Modele{
    //Vérifier l'existance de du numéro de facture pour un mémé fournisseur dans la table facture.
	public  function verifierexiste($frs, $fact){
		$existe=false; 
		$sql='SELECT * FROM factures WHERE Nom_Frs=? and Num_Fac=? and Etat_Dossier !=2 ';
		$facture = $this->executerRequete($sql, array($frs, $fact));
		if ($facture->rowCount()==1)
		$existe=true;
		return $existe;     
	}
    //Création d'un numéro de facture selon la souche qui lui convient dans la table numérotation 
	public  function FactureSouche($date){
		$sql='SELECT * FROM numerotation WHERE Date_Debut<=? and Date_Fin >=? ';
		$Souche = $this->executerRequete($sql, array($date, $date));
		return $Souche;     
	}
	//Mise à jours de la colonne Numéro facture de la table numérotation par le nouveau numéro de courrier générer 	   
	public function Mfacture($Num_F1, $Id){
		$sql = "update numerotation
	            set Num_F=?  WHERE Id = ?" ;
       $this->executerRequete($sql, array($Num_F1, $Id));
			
	}		   
	//Récupérer les factures selon le nom de la colonne passé en paramètre	   
	public function getFacturesfiltrer($Frs, $colone){
		if($Frs != "tous")
		$sql = "SELECT * FROM factures WHERE ".$colone." =? ";
		else $sql = "SELECT * FROM factures ";
		$Frs = $this->executerRequete($sql, array($Frs));
		return $Frs;
	}
	
	public function getFacturesite($Site_Rec){
		$sql='SELECT * FROM factures WHERE Site_Dest=? and Etat_Dossier=? ';
		$Site_Rec = $this->executerRequete($sql, array($Site_Rec, 1));
		return $Site_Rec;
	}
	//Récupérer les factures dans le site distination correspond au site passé en paramètres.
	public function getFacturefiltrer($Site_Rec){
		$sql = "SELECT * FROM factures WHERE Site_Dest=? ";
		$Site_Rec = $this->executerRequete($sql, array($Site_Rec));
		return $Site_Rec;
	}
	//Récupérer les factures enregistrés d'un site selon leurs état(En cours d'envoi,récéptionner..).		
	public function getFactureEnrg($User_Site, $Etat_Dossier){
		$sql = "SELECT * FROM factures WHERE Site_Dest=? AND Etat_Dossier=?";
		$User_Site = $this->executerRequete($sql, array($User_Site, $Etat_Dossier));
		return $User_Site;
	}
	//Récupérer les les factures en attente de réception.	
	public function getFacturenonvalide($User_Site){
		$sql = "SELECT * FROM factures INNER JOIN site_reception ON factures.Site_Rec=site_reception.Id WHERE factures.Site_Dest=? AND factures.Etat_Dossier=0 ";
		$User_Site = $this->executerRequete($sql, array($User_Site));
	    return $User_Site;
	}
    //Récupérer les factures envoyé d'un site selon leurs état(En cours d'envoi,récéptionner..).	
	public function getFactureEnv($User_Site, $Etat_Dossier){
		$sql = "SELECT * FROM factures WHERE Site_Actuel=? AND Etat_Dossier=? ";
		$User_Site = $this->executerRequete($sql, array($User_Site, $Etat_Dossier));
	    return $User_Site;
	}
			
	public function getFacturesiteTrans($Sit){
		$sql = "SELECT * FROM factures WHERE Site_Dest=? AND Etat_Dossier=?";
		$Sit = $this->executerRequete($sql, array($Sit, 1));
	    return $Sit;
	}
	//récupérer toutes les factures	
	public function getFactures(){
		$sql='SELECT * FROM factures  ORDER BY  Anne_F DESC, Num_Enrg DESC ';
		$factures = $this->executerRequete($sql);
		return $factures;
	}
	//récupérer les factures par ordre décroissant	
	public function getFactures1(){
		$sql='SELECT * FROM factures  ORDER BY Id DESC ';
		$factures = $this->executerRequete($sql);
		return $factures;
	}
	// récupérer une facture par id passé en paramètre	
    public function getFacture($Id){
		$sql='SELECT * FROM factures  WHERE Id = ? ';
		$facture = $this->executerRequete($sql, array($Id));
		return $facture;
		}		
	//Modifier le numéro  de facture de l'id concérné passé en paramètre 	
	public function Magfacture($Num_Fact, $Id){
		$sql = "update factures set Num_Enrg=? where  Id=? ";
        $this->executerRequete($sql, array($Num_Fact, $Id));
	}
	//Récupérer le dernière ligne de la table factures pour le mois et l'année passé en paramètres	
    public function getNumenrg($month, $year){
		$sql='SELECT *  FROM factures WHERE MONTH(Date_Saisie)=? AND YEAR(Date_Saisie)=? ORDER BY Id  DESC LIMIT 1';
		$num_enrg = $this->executerRequete($sql, array($month, $year));
		return $num_enrg;
	}
	//Annulation d'une facture
	public function annulerfacture($motif, $Id_Fact){ 
		$sql = "update factures  set   Etat_Dossier=?, Motif =? where  Id=? ";
        $this->executerRequete($sql, array( 2, $motif, $Id_Fact));
			
	}
						
	//Ajouter une facture
	public function addFactures($Num_Enrg,$Anne_F, $Num_Enrg_F, $Num_Reg_F, $Date_Saisie, $Heure_Saisie, $Date_Arriv, $Date_Fac, $Num_Fac, $Nom_Frs, $Montant_TTC, $Site_Rec,$Site_Actuel,$Site_Dest){
      $sql = "INSERT INTO factures (Num_Enrg, Anne_F, Num_Enrg_F, Num_Reg_F, Date_Saisie, Heure_Saisie, Date_Arriv, Date_Fac, Num_Fac, Nom_Frs,  Montant_TTC, Site_Rec,Site_Actuel,  Site_Dest) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $this->executerRequete($sql, array($Num_Enrg, $Anne_F, $Num_Enrg_F, $Num_Reg_F, $Date_Saisie, $Heure_Saisie,$Date_Arriv, $Date_Fac, $Num_Fac, $Nom_Frs, $Montant_TTC,$Site_Rec,$Site_Actuel,$Site_Dest));
	}
	//Mise à jours une factrure	
	public function updateFacture($Site_Actuel, $Site_Dest, $Etat_Dossier, $Num_Fac){
      $sql = "update factures
	          set    Site_Actuel=?, Site_Dest=?, Etat_Dossier=?
			  where  Num_Enrg_F=? ";
      $this->executerRequete($sql, array($Site_Actuel, $Site_Dest, $Etat_Dossier, $Num_Fac));
	}
	//Mise à jour d'une facture	
	public function factureUpdate($Num_Reg_F, $Date_Fac, $Date_Arriv, $Num_Fac, $Nom_Frs, $Montant_TTC, $Id ){
      $sql = "update factures
	          set    Num_Reg_F=?, Date_Fac=?, Date_Arriv=?, Num_Fac=?, Nom_Frs=?, Montant_TTC=?
			  where  Id=? ";
      $this->executerRequete($sql, array($Num_Reg_F, $Date_Fac, $Date_Arriv, $Num_Fac, $Nom_Frs, $Montant_TTC, $Id));
		}
	//Valider la récéption d'une facture
	public function validerfacture($Num_Enrg){
      $sql = "update factures
	          set    Etat_Dossier=?
			  where  Id=? ";
      $this->executerRequete($sql, array(1, $Num_Enrg));
	}
	////Rechercher une facture par son numéro(numéro générer automatiquement par l'application)	
	public function getFacturesearch($Num_Enrg_F){
		$sql = "SELECT * FROM factures WHERE Num_Enrg_F=? ";
		$Num_Enrg = $this->executerRequete($sql, array($Num_Enrg_F));
		return $Num_Enrg;
		}
	//Rechercher des facturess par colonne et le type 
    public function getSearchfactureenrg($Column, $search, $SearchType){
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
	    $sql='SELECT * FROM factures WHERE '.$Column.$SearchType;
		$factures = $this->executerRequete($sql, array($search));
		return $factures; 
		}
	//Récupérer la listes des factures non récéptionner système	
	public function getSearchFacturenonvalide($Column, $search, $SearchType){
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
	$sql='SELECT * FROM factures  INNER JOIN site_reception ON factures.Site_Rec=site_reception.Id WHERE  '.$Column.$SearchType;
		$factures = $this->executerRequete($sql, array($search,));
		return $factures; 
	}
	
}

