<?php
require_once 'Configuration.php';


class Vue{
	
	private $fichier;  //fichier associé à la vue
	private $title       = "TCHINLAIT";    //titre de la vue (défini dans le fichier vue)
	private $USER_NOM    = "";
	private $USER_PRENOM = "";
	private $login       = "";
	private $USER_TYPE   = "";
	private $user        = array();
	private $servCode    = "";
	private $rubriques;
	private $rubriquesMenu=array();
	private $banners=array();
	private $menuNum     = 0;

	
	public function __construct($action, $controler = ""){
		//determination du nom du fichier vue à partir de l'action et du controleur
		$file = "Vue/";
		if($controler != ""){
			$file = $file. $controler."/";
			}
		$this->fichier = $file.$action.".php";
				}
		
	//Génère et affiche la vue
	public function generer($donnees, $template=null){ 
		//Génération de la partie specifique de la vue
		$contenu = $this->genererfichier($this->fichier, $donnees);
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $racineWeb = Configuration::get("racineWeb", "/");  
		//Génération du gabarit utilisant la partie spécifique
		$vue = $this->genererfichier($template, array('banners'=>$this->banners ,'title'=>$this->title, 'rubriquesMenu'=>$this->rubriquesMenu, 'rubriques'=>$this->rubriques, 'user'=>$this->user, 'login'=>$this->login, 'servCode'=>$this->servCode, 'contenu'=>$contenu, 'racineWeb' => $racineWeb, 'menuNum'=>$this->menuNum));
		//renvoi de la vue au nvigateur
		echo $vue;
		}
		
	//Generer un fichier vue et renvoi le resultat produit
	private function genererfichier($fichier, $donnees){
		if(file_exists($fichier)){ 
			//Rend les elements du tableau $donnees accessible dans la vue
			extract($donnees); 
			//Démarrage de la temporisation de sortie
			ob_start();
			//Inclut le fichier vue
			//Son resultat est placé dans le tampon de sortie
			require($fichier);
			//arrêt de la temporisation et renvoi du tampon de sortie
			return ob_get_clean(); 
			
			}else{
				throw new Exception ("Fichier '$fichier' introuvable");
				}
		}
		
    // Nettoie une valeur insérée dans une page HTML
    private function nettoyer($valeur) {
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
  }//end nettoyer	
  
	
	    // Récupèrer une portion de la chaine courante
  protected function portionText($text, $length) {
	if(strlen($text) > $length)
	{
		$text 	    = substr($text, 0, $length);
		$t_text 	= @explode(" ", $text);
		$text    	= '';
		
		for($i=0; $i<count($t_text)-1;$i++)			
		$text .= $t_text[$i]." ";
		
		$text .= "...";
	}
	return trim($text);
  }//end portionText
  
      //Renvoi le slug d'un titre
    private function slug($title) {
    $title = trim($title);
	$title = str_replace(array("'", "°", "é", "è", "ê", "ë", "à", "â", "ä", "û", "ü", "É", ":", "’", "È", ",", "<p>", "</p>", "ô", "«", "»", "%", "ç", "…", "ï", "Œ", "(", ")", "{", "}", ".", "î", "+", "ã", "å", "á", "À", "!", "œ", " ", "Æ", "/", "\/", "ğ"), array("", "", "e", "e", "e", "e", "a", "a", "a", "u", "u", "E", "", "-", "E", "", "", "", "o", "", "", "pour-cent", "c", "", "i", "oe", "", "", "", "", "", "i", "", "a", "a", "a", "A", "", "oe", "", "", "-", "", "g"), $title);
    return str_replace(" ", "-", $title);
  }//end slug

      /**
	  *Renvoi une date au format jj/mm/aaaa ou jj-mm-aaaa
	  *@param Date $date  date au format SQL
	  *@param String $separator séparateur(-,/)
	  *@return date
	  */
    private function formatDate($date, $separator="/", $datetime=false) {
	if($date != ""){
		if($datetime){
	   $date    = explode(" ", $date);
       $sqldate = explode("-", $date[0]);
		}else $sqldate = explode("-", $date);
	   $date    = $sqldate[2].$separator.$sqldate[1].$separator.$sqldate[0];
    return $date;
	}else return "";
  }//end slug
  
      /**
	  *Renvoi une date au format jj/mm/aaaa ou jj-mm-aaaa
	  *@param Date $date  date au format SQL
	  *@param String $separator séparateur(-,/)
	  *@return date
	  */
    private function datetime_date($date) {
	   $date    = explode(" ", $date);
       $date    = $date[0];
    return $date;
  }//end slug
    
  	public function displayName($int){
		switch($int){
			case 1: return "Animé"; break;
			case 2: return "Figé"; break;
			case 3: return "En continu"; break;
			}
		}//end displayName
  private function columnConstruct($columnName, $columnID, $imputType="search") {
	$column = '<div class="TabCol" id="'.$columnID.'" >
                              <div class="ColContent '.$columnID.'" >'.$columnName.'</div>
                              <div class="glyphicon glyphicon-search glyphiconPers '.$columnID.'" data-ColID="'.$columnID.'"></div>
                              <div class="SearchMenu">
                                <ul class="list-group">';
		if($imputType =="date" || $imputType =="number" || $imputType =="text" || $imputType =="time")	
           $column .=            '<li class="list-group-item liCursor" data-ColID="'.$columnID.'" data-action="EqualTo" data-InputType="'.$imputType.'">Egale à</li>
								  <li class="list-group-item liCursor" data-ColID="'.$columnID.'" data-action="UperTo" data-InputType="'.$imputType.'">Supérieur à</li>
								  <li class="list-group-item liCursor" data-ColID="'.$columnID.'" data-action="LowerTo" data-InputType="'.$imputType.'">Inférieur à</li>';
		if($imputType =="search")						  
           $column .=            '<li class="list-group-item liCursor" data-ColID="'.$columnID.'" data-action="StartW" data-InputType="'.$imputType.'">Commencer par</li>
                                  <li class="list-group-item liCursor" data-ColID="'.$columnID.'" data-action="EqualTo" data-InputType="'.$imputType.'">Egale à</li>
                                  <li class="list-group-item liCursor" data-ColID="'.$columnID.'" data-action="Content" data-InputType="'.$imputType.'">Qui contient</li>
								   '
								  ;
           $column .=            '</ul>
                              </div>
                            </div>';
	return $column;
  }//end columnConstruct


}//end Vue