<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/user.php';

class ControleurConnexion extends Controleur
{
	private $user;
	public function __construct(){
		$this->user = new User();
		}
    public function index()
       {
	  $login = ""; 
	  if($this->requete->getSession()->existAttribut("login"))
	      $login      = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('login'=>$login), $template="Vue/gabaritV.php");	
       }
    //fonction connecter
    public function connecter()
     {
		$login = "";
		$mdp   = "";
       if ($this->requete->existeParametre("login") &&
           $this->requete->existeParametre("mdp")) {
           $login = $this->requete->getParametre("login");
           $mdp = $this->requete->getParametre("mdp");
           if ($this->user->connecter($login, $mdp)) {
             $admin_user = $this->user->getUser($login, $mdp);
             $this->requete->getSession()->setAttribut("User_Id", $admin_user['User_Id']); 
             $this->requete->getSession()->setAttribut("User_Nom", $admin_user['User_Nom']);
             $this->requete->getSession()->setAttribut("User_Prenom", $admin_user['User_Prenom']);
			       $this->requete->getSession()->setAttribut("User_Login", $admin_user['User_Login']); 
			       $this->requete->getSession()->setAttribut("User_Site", $admin_user['User_Site']); 
             $this->rediriger("accueil"); 
            }
            else 
            //Returner à la vue connexion en cas d'erreur
             $this->genererVue(array('msgErreur' =>
                'Login ou mot de passe incorrects', 'login'=>$login), "Vue/gabaritV.php", "index");//"Vue/gabaritV.php", "index"
           }
           else
            $this->genererVue(array('msgErreur' =>
                'Login ou mot de passe incorrects', 'login'=>$login), "Vue/gabaritV.php", "index");
        }
		//fonction déconnexion
    public function deconnecter()
     {
       $this->requete->getSession()->destroy();
       $this->rediriger("./");   //connexion
     }
}