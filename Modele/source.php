<?php
require_once 'Framework/Modele.php';

class source extends Modele{
	//Renvoi toutes les sources d'envoie
	public function getSource(){
		$sql='SELECT Id, Src FROM source ORDER BY Src DESC ';
		$source = $this->executerRequete($sql);
		return $source;
		}
    //rechercher selon la source d'envoi.
    public function getSources($search, $SearchType){
		if($SearchType == "EqualTo")
		      $SearchType = "=?";
		elseif($SearchType == "StartW")
		      $SearchType = " LIKE ?\"%\"";
		elseif($SearchType == "EndW")
		      $SearchType = " LIKE \"%\"?";
		elseif($SearchType == "Content")
		      $SearchType = " LIKE \"%\"?\"%\"";
		$sql='SELECT * FROM source WHERE Src '.$SearchType;
		$source = $this->executerRequete($sql,array($search));
		return $source;		
}
}