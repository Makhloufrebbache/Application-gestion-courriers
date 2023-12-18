<?php

//require_once 'Requete.php';
require_once 'Vue.php';

abstract class Controleur {

  // Action à réaliser
  private $action;

  // Requête entrante
  protected $requete;

  // Définit la requête entrante
  public function setRequete(Requete $requete) {
    $this->requete = $requete;
  }

  // Exécute l'action à réaliser
  public function executerAction($action) {
    if (method_exists($this, $action)) {
      $this->action = $action;
      $this->{$this->action}();
    }
    else {
      $classeControleur = get_class($this);
      throw new Exception("Action '$action' non définie dans la classe $classeControleur");
    }
  }

  // Méthode abstraite correspondant à l'action par défaut
  // Oblige les classes dérivées à implémenter cette action par défaut
  public abstract function index();

  // Génère la vue associée au contrôleur courant
  protected function genererVue($donneesVue = array(), $template="Vue/template.php", $action = NULL) {
    // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
    $classeControleur = get_class($this);
    $controleur = str_replace("Controleur", "", $classeControleur); //die($controleur);
    // Instanciation et génération de la vue
	if($action != NULL)
	$this->action = $action;
    $vue = new Vue($this->action, $controleur);
    $vue->generer($donneesVue, $template);
  }
	  
      /**
      * Effectue une redirection vers un contrôleur et une action spécifiques
      *
      * @param string $controleur Contrôleur
      * @param type $action Action Action
      */
      protected function rediriger($controleur, $action = null)
      {
       $racineWeb = Configuration::get("racineWeb", "/");
       // Redirection vers l'URL racine_site/controleur/action
       header("Location:" . $racineWeb . $controleur . "/" . $action);
      }
	  
      /**
      * Uploader un fichier
      *
      * @param string $index Nom du input type file
      * @param string $destination Chemin dossier de destination
	  * @param array  $valid_extensions Extensions valides du fichier
	  * @param string  $name Nom spécifique au fichier
	  * @return string $filename Nom du fichier/chaine vide
      */
      protected function uploadFile($index, $destination, $valid_extensions=NULL, $name=NULL)
      {
	   $filename = "";
	   if($this->requete->existeParametre($index)){//1*
	   $file     = $this->requete->getParametre($index);
	   if($file['name'] != "" && $file['size'] > 0 && $file['error'] == 0){//2*
	      $valid_extensions = $valid_extensions;	//tableau des extensions autorisées
		  $upload_extension = strtolower(substr(strrchr($file['name'], '.'), 1));
		  if($valid_extensions!=NULL){ //Upload uniquement les types de fichiers spécifiés  3*
		  if(in_array($upload_extension, $valid_extensions)){
			  if($name!=NULL)
			  $filename = $name.'.'.$upload_extension;
			   else
			   $filename = md5(uniqid(rand(), true)).'.'.$upload_extension;
			       if(move_uploaded_file($file['tmp_name'], $destination.$filename))
			       return $filename;
			  }else{ return $filename; }
		     }else{ //Upload tout type de fichiers
			   if($name!=NULL)
			  $filename = $name.'.'.$upload_extension;
			   else
			  $filename = md5(uniqid(rand(), true)).'.'.$upload_extension;
			  if(move_uploaded_file($file['tmp_name'], $destination.$filename))
			  return $filename;		
				 }//end 3*
		   }//end //2*
		   return $filename;
	    }//end 1*
		return $filename;
      }//end uploadFile
	  	  
}//end Controler