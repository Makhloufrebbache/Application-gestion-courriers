<?php

require_once 'Framework/Controleur.php';
/**
* Classe parente des controleurs soumis à authentification
*/

abstract class ControleurSecurise extends Controleur{
	public function executerAction($action){
		if($this->requete->getSession()->existAttribut("IdUser")){
			parent::executerAction($action);
			}else{
				$this->rediriger("connexion");
			}
		}	
	}