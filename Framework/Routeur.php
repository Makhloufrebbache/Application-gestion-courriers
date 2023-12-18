<?php

require_once 'Requete.php';
require_once 'Vue.php';

class Routeur {
	
  //private $controlerTemplate = "Vue/template.php"; //balacer entre template client et celle de l'administration

  // Route une requête entrante : exécute l'action associée
  public function routerRequete() {
	  
    try { 
      // Fusion des paramètres GET et POST de la requête
      $requete = new Requete(array_merge($_GET, $_POST, $_FILES));
	  
      $controleur = $this->creerControleur($requete);       
      $action = $this->creerAction($requete);
      $controleur->executerAction($action);
    }
    catch (Exception $e) {
      $this->gererErreur($e);
    }
  }

  // Crée le contrôleur approprié en fonction de la requête reçue
  private function creerControleur(Requete $requete) { 
    $controleur = "Accueil";  // Contrôleur par défaut
    if ($requete->existeParametre('controleur')) {
      $controleur = $requete->getParametre('controleur');
      // Première lettre en majuscule
      $controleur = ucfirst(strtolower($controleur));
    } 
	$this->controlerTemplate = $controleur;
    // Création du nom du fichier du contrôleur
    $classeControleur = "Controleur" . $controleur; 
    $fichierControleur = "Controleur/" . $classeControleur . ".php";
    if (file_exists($fichierControleur)) { 
      // Instanciation du contrôleur adapté à la requête
      require($fichierControleur); 
      $controleur = new $classeControleur();   
      $controleur->setRequete($requete);
      return $controleur;
    }
    else
      throw new Exception("Le fichier demandé est indisponible sur notre serveur");
  }//end creerControleur

  // Détermine l'action à exécuter en fonction de la requête reçue
  private function creerAction(Requete $requete) {
    $action = "index";  // Action par défaut
    if ($requete->existeParametre('action')) {
      $action = $requete->getParametre('action');
    }
    return $action;
  }//end creerAction

  // Gère une erreur d'exécution (exception)
  private function gererErreur(Exception $exception) {
	  if($this->controlerTemplate == 'Admin')
	      $this->controlerTemplate = "Vue/gabaritAd.php";
	  else $this->controlerTemplate = "Vue/template.php";
	header("HTTP/1.0 404 Not Found");
    $vue = new Vue('404');
    $vue->generer(array('msgErreur' => $exception->getMessage()), $this->controlerTemplate);
  }//end gererErreur

}//end Routeur