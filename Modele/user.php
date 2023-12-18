<?php

require_once 'Framework/Modele.php';

/**
* Modelise un user
*/

class user extends Modele{
	
	/**
	* Verifier qu'un utilisateur existe dans la BDD
	* @param $login string Le login
	* @param $mdp   string Le mot de passe
	* @return boolean Vrai si l'utilisateur existe, Faux sinon
	*/
	
	public function connecter($login, $mdp){
		$sql = "select User_Id from USER where User_Login=? and User_Mdp=? ";
		$user = $this->executerRequete($sql, array($login, $mdp));
		return($user->rowCount() == 1);		
		}

    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function getUser($login, $mdp){
		$sql = "select User_Id, User_Nom, User_Prenom, User_Login, User_Site from USER where User_Login=? and User_Mdp=? ";
		$user = $this->executerRequete($sql, array($login, $mdp));
		if($user->rowCount() == 1){
			return($user->fetch()); //Acces à la premiere du resultat
			}else{
				throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
				}		
		}
	
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function getUsers($USER_ID){
		$sql = "select User_Id, User_Nom, User_Prenom, User_Login, User_Site from USER  where User_Id=?";
		$user = $this->executerRequete($sql, array($USER_ID));
		if($user->rowCount() == 1){
			return($user->fetch()); //Acces à la premiere du resultat
			}else{
				throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
				}		
		}
		
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function getUserAdmin($USER_ID){
		$sql = "select USER_ID, USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_SERV_CODE, USER_ACTIF, USER_DATE, USER_SUPP from USER where USER_ID =?";
		$user = $this->executerRequete($sql, array($USER_ID));
		if($user->rowCount() == 1){
			return($user->fetch()); //Acces à la premiere du resultat
			}else{
				throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
				}		
		}
		
	public function getAllusers(){
		$sql = "select USER_ID, USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_SERV_CODE, USER_ACTIF, USER_DATE, USER_SUPP from USER ";
		$users = $this->executerRequete($sql);
		return $users;	
		}
	
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function addUser($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE){
      $sql = "INSERT INTO USER (USER_NOM, USER_PRENOM, USER_LOGIN, USER_MDP, USER_TYPE, USER_DATE) values(?, ?, ?, ?, ?, ?)";
	  $date = date("Y-m-d");
      $this->executerRequete($sql, array($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $date));
		}
		
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function actifUser($USER_ID){
      $sql = "update USER
	          set    USER_ACTIF=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array("Y", $USER_ID));
		}
		
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function blocUser($USER_ID){
      $sql = "update USER
	          set    USER_ACTIF=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array("N", $USER_ID));
		}
	
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function updateUser($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $USER_ID){
      $sql = "update USER
	          set    USER_NOM=?, USER_PRENOM=?, USER_LOGIN=?, USER_MDP=?, USER_TYPE=?
			  where  USER_ID=? ";
      $this->executerRequete($sql, array($USER_NOM, $USER_PRENOM, $USER_LOGIN, $USER_MDP, $USER_TYPE, $USER_ID));
		}
		
    /**
	* Renvoi un utilisateur existant dans la BDD
	* @param string $login Le login 
	* @param string $mdp Le mot de passe
	* @return mixed l'Utilisateur
	* @throws Exception Si aucun utilsateur ne correspond aux paramètres
	*/		
	public function delUser($USER_ID){
      $sql = "delete from USER
			  where  USER_ID=? ";
      $this->executerRequete($sql, array($USER_ID));
		}
	}//end User