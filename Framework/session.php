<?php
/**
*Class Modélisant la session
*Encapsule la superglobal PHP $_SESSION
*/

class Session{
	
	/**
	*  Constructeur.
	*  Démarre ou restaure la session.
	*/
	public function __construct(){
		session_start();
		}
		
	/**
	*  Détruire la session actuelle.
	*/
	public function destroy(){
		session_destroy();
		}
		
	/**
	* Ajoute un attribut à la session
	*@param string $nom Nom de l'attribut
	*@param string $valeur Valeur de l'attribut
	*/	
	public function setAttribut($nom, $valeur){
		$_SESSION[$nom] = $valeur;
		}
		
	/**
	*Renvoi vrai si l'attribut existe dans la session
	*@param string $nom Nom de l'attribut
	*@return bool Vrai si l'attribut existe et sa valeur n'est pas vide
	*/		
	public function existAttribut($nom){
		return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
		}
		
	/**
	*Renvoi la valeur de l'attributdemandé
	*@param string $nom Nom de l'attribut
	*@return string Valeur de l'attribut
	*@throws Exception si l'attribut n'existe pas dans la session
	*/
	public function getAttribut($nom){
        if($this->existAttribut($nom)){
			return $_SESSION[$nom];
			}	else{
				throw new Exception("Attribut $nom absent de la session"); 
				}	
		}
		
	}//end session