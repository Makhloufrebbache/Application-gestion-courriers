<?php

require_once 'session.php';

class Requete {

  // paramètres de la requête
  private $parametres;

  public function __construct($parametres) {
    $this->parametres = $parametres;
	$this->session = new Session();
  }

  // Renvoie vrai si le paramètre existe dans la requête
  public function existeParametre($nom) {
    return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
  }
		
	/**
	* Renvoi l'objet session assoscié à la requête
	* @return Session objet session
	*/
	public function getSession(){
		return $this->session;
		}

  // Renvoie la valeur du paramètre demandé
  // Lève une exception si le paramètre est introuvable
  public function getParametre($nom) {
    if ($this->existeParametre($nom)) {
      return $this->parametres[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent de la requête");
  }
  
}//end Requete