<?php
require_once 'Framework/Modele.php';

class bordereaux extends Modele{
	
	//Récupérer le numéro de dernier bordereau 	   
	public function getNumbordereau($month, $year){
		$sql='SELECT *  FROM entete_bordereau WHERE MONTH(Date_Creation)=? AND YEAR(Date_Creation)=? ORDER BY Id  DESC LIMIT 1 ';
		$num_bordereau = $this->executerRequete($sql, array($month, $year));
		return $num_bordereau;
	}
    //Récupérer le plus grand numéro de boredereau d'envoi.
	public function getNumordre(){
		$sql='SELECT MAX(Num_Ordre)  FROM entete_bordereau';
		$num_ordre = $this->executerRequete($sql);
		$num_ordre = $num_ordre->fetch();
		return $num_ordre;
	}
	//Afficher les bourderau par ordre descendant de la date		   
	public function getBordereaux(){
		$sql='SELECT * FROM entete_bordereau  ORDER BY  Date_Creation DESC ';
		$bordereaux = $this->executerRequete($sql);
		return $bordereaux;
	}
	
	//Ajouter entete bordereau
	public function addEntete($num_ordre, $year, $Num_B, $Date_Creation ,$Sit, $Site_Dist, $Transporteur){
      $sql = "INSERT INTO entete_bordereau (Num_Ordre, Anne, Num_B, Date_Creation ,Site_Src, Site_Dist, Transporteur) values(?, ?, ?, ?, ?, ?, ?)";
      $this->executerRequete($sql, array($num_ordre, $year, $Num_B, $Date_Creation ,$Sit, $Site_Dist, $Transporteur));
	}//end addEntete
		
	//Ajouter ligne bordereau
	public function addLignesBord($num_ordre, $Num_B, $Description, $Expediteur, $Recepteur){
      $sql = "INSERT INTO ligne_bordereau (Num_Ordre, Num_B, Description, Expediteur ,Recepteur) values(?, ?, ?, ?, ?)";
      $this->executerRequete($sql, array($num_ordre, $Num_B, $Description, $Expediteur, $Recepteur));
	}//end addLignesBord
	
}

