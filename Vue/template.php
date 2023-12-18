<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <base href="<?php echo $racineWeb;?>" >
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Contenu/Librairies/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Contenu/Librairies/bootstrap/css/style.css" rel="stylesheet">
    <link href="Contenu/Librairies/bootstrap/css/mstest.css" rel="stylesheet" id="bootstrap-css">
    <link rel="shortcut icon" href="Contenu/images/Logos TCHIN LAIT.jpg">
  </head>
  <body>
    
  <header class="container">
  <div class="row ligne">
       <div class="col-md-2" style="text-align:center;">
         <a href="./"><img id="img_logo" src="Contenu/images/Logos TCHIN LAIT.jpg" /></a>
       </div>
       
       <div class="col-md-8">
         <div class="row ligne">
         
             <div class="col-md-3">&nbsp;</div>
        <form class="form-inline" action="./search/" name="form_search" method="POST">
             <div class="col-md-6"> 
                <div class="row ligne">      
                  
                      <div class="form-group">
                         <div class="input-group">
                           <input type="search" name="search" required="" class="form-control" value="" placeholder="">
                         <span class="input-group-btn">
           <button class="btn btn-primary" type="submit" title="Rechercher un article"><span class="glyphicon glyphicon-search" style="line-height:0;"></span></button> <!--submit-->
           </span> 
              
                          </div>
                      </div>
                   
                </div>
                <div class="row ligne" style="text-align:center;">
                   <input type="radio" name="choix" value="0" required> Courrier
                   <input type="radio" name="choix" value="1"> Facture
                   <input type="radio" name="choix" value="2"> Bordereau 
                </div>
              </div>
          </form>
             <div class="col-md-3">&nbsp;</div>

          </div>
       </div>
       <div class="col-md-2 mote" style="text-align:right; padding-top:10px; ">
       <a class="btn btn-primary" href="connexion/deconnecter" role="button"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a>
        
       </div>
       
       </div>
     
     <div class="row ligne  hidden-xs">
       <div class="col-md-12 menu-secondaire" style="text-align: left;" id="menup">
       <a id="menup0" class="btn btn-primary" href="./" role="button"><span class="glyphicon glyphicon-home"></span>Accueil</a> | <a id="menup1" class="btn btn-primary" href="courrier" role="button">Courrier</a>| <a id="menup2" class="btn btn-primary" href="facture" role="button">Facture</a>|<a id="menup2" class="btn btn-primary" href="Bordereaux" role="button">Bordereaux</a>| <a id="menup3" class="btn btn-primary" href="courrierenregistre" role="button">Courrier enregistrés</a>| <a id="menup4" class="btn btn-primary" href="factureenregistre" role="button">Factures enregistrées</a>| <a id="menup5" class="btn btn-primary" href="courriertransfert" role="button">Transfert courrier</a> | <a id="menup6" class="btn btn-primary" href="factureannuler" role="button">Annuler Facture</a> 
       </div>
     </div>
     
  </div>
  
   
  
  
  </header>

  <div class="container">
  
  <!-- Contenu de la page d'accueil -->
    <div class="col-md-12 pageac" >
    <?php echo $contenu;?>   
    </div>
  </div>
  
  <footer class="container-fluid piedpage" style="height:35px; ">
    <div class="container">
       <div class="col-md-12">
        <div class="row">
        <div class="col-md-3 ligne">
        
         <span class="concept-dev">
           © 2018 TCHINLAIT
         </span>
       
       </div>
       <div class="col-md-2 ligne">&nbsp;</div>
         <div class="col-md-7 menu-secondaire" style="padding:0; color:#FFF;">&nbsp;</div>
         
        </div>
       </div>
       
     </div>
  </footer>
    <script src="Contenu/Librairies/jquery/jquery-1.10.1.min.js"></script>
    <script src="Contenu/Librairies/bootstrap/js/bootstrap.min.js"></script>
    <script src="Contenu/js/admin.js"></script>
    <script src="Contenu/js/mstest.js"></script>
    <script>
      //Reset des liens du menu
	  var currentNum = <?php echo $menuNum; ?>;
	  $( "#menup a" ).removeClass( "btn-primary" ).addClass( "btn-secondary" );
	  $( "#menups a" ).removeClass( "btn-primary" ).addClass( "btn-secondary" );
	  $( "#menup"+currentNum).addClass( "btn-primary" );
	  $( "#menups"+currentNum).addClass( "btn-primary" );
    </script>
<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>

  </body>
</html>