<?php
require_once 'Framework/Modele.php';

class site_rec extends Modele{
	//Récupérer les sites de récéption par ordre décroissent du nom.
	public function getSite_Rec(){
		$sql='SELECT Id, Site FROM site_reception ORDER BY Site DESC ';
		$site_rec = $this->executerRequete($sql);
		return $site_rec;
		}
	//récupérer un site par id passé en paramètre	
	public function getSite($id){
		$sql='SELECT * FROM site_reception WHERE Id=?';
		$site = $this->executerRequete($sql, array($id));
		$site =$site->fetch();
		return $site;
		}
   
}
