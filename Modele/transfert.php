<?php
require_once 'Framework/Modele.php';

class transfert extends Modele{
    //Récupérer les transferts ordre descendant d'id
	public function getTransfert1(){
		$sql='SELECT * FROM transferts order by Id_TRF desc  ';
		$transferts = $this->executerRequete($sql);
		return $transferts;
	}
	//Mise àjours d'un transfert
    public function Magtransfert($Num_Fact, $Id){
		$sql = "update transferts set Num_Fact=? where  Id_TRF=? ";
        $this->executerRequete($sql, array($Num_Fact, $Id));
	}	
	
   //requette	de jointure entre la table courrier et transfert.
	public function getCourriersite($User_Site){
		$sql = "SELECT Num_Enrg, Date_Saisie, Heure_Saisie, Date_Arriv, Exp, Src, Site_Rec, Objet, Site_Actuel FROM couriers WHERE Site_Rec=? ";
		$Site_Rec = $this->executerRequete($sql, array($User_Site));
		return $Site_Rec;
	}
	//Récuprer le numéro d'envoi d'un transfert	
	public function getNumenvoi($month, $year){
		$sql='SELECT *  FROM transferts WHERE MONTH(Date_Envoi)=? AND YEAR(Date_Envoi)=? ORDER BY Id_TRF  DESC LIMIT 1 ';
		$num_envoi = $this->executerRequete($sql, array($month, $year));
		return $num_envoi;
	}
	//Renvoi d'un getTransfert
	public function getTransfert($lastid){
		$sql='SELECT * FROM transferts WHERE Id_TRF=? ';
		$transfet = $this->executerRequete($sql, array($lastid));
		$transfet = $transfet->fetch();
		return $transfet;
	}//end getTransfert
		
	//Renvoi d'un getTransfert
	public function getTransfertsearch($Num_Envoi){
		$sql='SELECT * FROM transferts WHERE Num_Envoi=? ';
		$transfet = $this->executerRequete($sql, array($Num_Envoi));
		return $transfet;
	}//end getTransfert
		
	//Renvoi les transferts d'un courrier ou d'une fcture
	public function getCourriermvt($Num_Enrg, $choix){
		if($choix == 0)
		$sql='SELECT * FROM transferts WHERE Num_Enrg=? ';
		else
		$sql='SELECT * FROM transferts WHERE Num_Fact=? ';
		
		$transfet = $this->executerRequete($sql, array($Num_Enrg));
		return $transfet;
	}//end getTransfert
		
	//Ajouter un transfert
	public function addTransfert($Id_User_Trans, $Num_Envoi, $Num_Enrg, $Num_Fact, $Site_Actuel, $Site_Dist, $Date_Envoi, $Trans){
      $sql = "INSERT INTO transferts (Id_User_Trans, Num_Envoi, Num_Enrg, Num_Fact, Site_Actuel, Site_Dist,  Date_Envoi, Trans) values(?, ?, ?, ?, ?, ?, ?, ?)";
    $lastid = $this->executerRequete($sql, array($Id_User_Trans, $Num_Envoi, $Num_Enrg, $Num_Fact,$Site_Actuel, $Site_Dist, $Date_Envoi, $Trans), 'Y');
	return $lastid;
	  
	}//end addTransfert
   //Valider les transferts récéption des factures
	public function Validertransfert($Date_Rec, $Id_User_Rec, $Num_Enrg){
      $sql = "update transferts set  Date_Rec=?, Id_User_Rec=?
			  where  Num_Fact=?";
      $this->executerRequete($sql, array($Date_Rec, $Id_User_Rec, $Num_Enrg));
	}
    //Valider les transferts récéption des courriers
	public function Validertransfertc($Date_Rec, $Id_User_Rec, $Num_Enrg){
      $sql = "update transferts set Date_Rec=?, Id_User_Rec=?
			  where  Num_Enrg=?";
      $this->executerRequete($sql, array($Date_Rec, $Id_User_Rec, $Num_Enrg));
	}
 
}
