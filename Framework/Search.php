<?php

//require_once 'Requete.php';
require_once 'Vue.php';

class Search {

  // Action à réaliser
  private $mot_rech;
  
	public function __construct(){
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
      public  function regexAccents($chaine) {
   $espace = array("+","  ","   ","    ");
   $accent = array('a','à','á','â','ã','ä','å','c','ç','e','è','é','ê','ë','i','ì','í','î','ï','o','ð','ò','ó','ô','õ','ö','u','ù','ú','û','ü','y','ý','ý','ÿ');
   $inter = array('%01','%02','%03','%04','%05','%06','%07','%08','%09','%10','%11','%12','%13','%14','%15','%16','%17','%18','%19','%20','%21','%22','%23','%24','%25','%26','%27','%28','%29','%30','%31','%32','%33','%34','%35');
   $regex = array('(a|à|á|â|ã|ä|å)','(a|à|á|â|ã|ä|å)','(a|à|á|â|ã|ä|å)','(a|à|á|â|ã|ä|å)','(a|à|á|â|ã|ä|å)','(a|à|á|â|ã|ä|å)','(a|à|á|â|ã|ä|å)',
'(c|ç)','(c|ç)',
'(è|e|é|ê|ë)','(è|e|é|ê|ë)','(è|e|é|ê|ë)','(è|e|é|ê|ë)','(è|e|é|ê|ë)',
'(i|ì|í|î|ï)','(i|ì|í|î|ï)','(i|ì|í|î|ï)','(i|ì|í|î|ï)','(i|ì|í|î|ï)',   '(o|ð|ò|ó|ô|õ|ö)','(o|ð|ò|ó|ô|õ|ö)','(o|ð|ò|ó|ô|õ|ö)','(o|ð|ò|ó|ô|õ|ö)','(o|ð|ò|ó|ô|õ|ö)','(o|ð|ò|ó|ô|õ|ö)','(o|ð|ò|ó|ô|õ|ö)',         '(u|ù|ú|û|ü)','(u|ù|ú|û|ü)','(u|ù|ú|û|ü)','(u|ù|ú|û|ü)',
'(y|ý|ý|ÿ)','(y|ý|ý|ÿ)','(y|ý|ý|ÿ)','(y|ý|ý|ÿ)');
   $chaine = str_replace($espace, " ", $chaine);
   $chaine = str_ireplace($accent, $inter, $chaine); 
   $chaine = str_replace($inter, $regex, $chaine); 
   $chaine = str_replace(" ", "|", $chaine);
   return $chaine;
  }//end regexAccents 

	  
}//end Controler