<?php
require_once 'Framework/Modele.php';

class frs extends Modele{
	//Renvoi tous les fournisseurs
	public function getFrs(){
		$sql='SELECT * FROM fournisseur ORDER BY Nom_Frs DESC ';
		$frs = $this->executerRequete($sql);
		return $frs;
	}
	//Rechercher un fournisseur
    public function getFrss($search, $SearchType){
		if($SearchType == "EqualTo")
		      $SearchType = "=?";
		elseif($SearchType == "StartW")
		      $SearchType = " LIKE ?\"%\"";
		elseif($SearchType == "EndW")
		      $SearchType = " LIKE \"%\"?";
		elseif($SearchType == "Content")
		      $SearchType = " LIKE \"%\"?\"%\"";
		$sql='SELECT * FROM fournisseur WHERE Nom_Frs '.$SearchType;
		$frs = $this->executerRequete($sql,array($search));
		return $frs;
	}
	
}
