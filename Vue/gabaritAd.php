<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?php echo /*"../../".*/$racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="Contenu/Librairies/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Contenu/Librairies/bootstrap/css/styleMM.css">

        <!-- DrapAlg -->
        <link rel="shortcut icon" href="Contenu/images/Logos TCHIN LAIT.jpg">
       
       <!-- Editeur du text -->
  	<script src="Contenu/ckeditor/ckeditor.js"></script>
	<script src="Contenu/ckeditor/samples/js/sample.js"></script>
	    <!--<link rel="stylesheet" href="Contenu/ckeditor/samples/css/samples.css">-->

        
        <!-- jQuery -->
        <script src="Contenu/Librairies/jquery/jquery-1.10.1.min.js"></script>
        <!-- Plugin JavaScript Boostrap -->
        <script src="Contenu/Librairies/bootstrap/js/bootstrap.min.js"></script>
        
        <script src="Contenu/js/admin.js"></script>

        <!-- Titre -->
        <title><?php echo $title ?></title>
    </head>
    <body>
<!-- Barre de navigation en haut de la page -->
<div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Lien de retour à la page d'accueil -->
        <a class="navbar-brand" href=""><span class="glyphicon glyphicon-cloud">TCHINLAIT</span></a>
    </div>
    <!-- Partie de la barre masquée en fonction de la zone d'affichage -->
    <div class="collapse navbar-collapse">
        <div class="bienvenuMM"><img src="Contenu/images/adminicon.png" />Administration du site, Bienvenu <strong><?php echo $login ?></strong>  
        <span id="deconnexion"><a href="connexion/deconnecter" title="Déconnexion">Déconnexion</a></span>
        </div>
    </div>
</div> 
<ul class="breadcrumb breadcrumbMM">
    <li><a href="admin/"> Accueil</a></li>
    <!--<li class="dropdown">
    <a data-toggle="dropdown" href="#">Suppléments<b class="caret"></b></a>
        <ul class="dropdown-menu">
           <li><a href="admin/supplementSport">Supplément Sport</a></li>
           <li><a href="admin/supplementSante">Supplément Santé</a></li>
           <li><a href="admin/supplementCulture">Supplément Culture</a></li>
           <li><a href="admin/supplementInternational">Supplément International</a></li>
           <li><a href="admin/brocanteHebdo">Brocante hebdo</a></li>
           <li><a href="admin/supplementThema">Supplément Théma</a></li>
           <li><a href="admin/supplementEconomie">Supplément Economie</a></li>
        </ul>
    </li>-->
    <!--<li><a href="admin/infos/">Infos</a></li>
    <li><a href="admin/banners/">Publicité</a></li>-->
    <li><a href="admin/users/">Utilisateurs</a></li>
    <!--<li><a href="admin/#/">News letter</a></li>
    <li><a href="admin/pdf/">Edition PDF</a></li>-->
    <li><a href="admin/nous/">Qui sommes nous?</a></li>
    <!--<li class="dropdown"> 
            <a data-toggle="dropdown" href="#">Config<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="admin/parametres/">Paramètres</a></li>
              <li><a href="admin/rubriques/">Rubriques</a></li>
              <li><a href="admin/contacts/">Contacts</a></li>
            </ul>
    </li>
    <li><a href="admin/entretiens/">Entretiens</a></li>-->
</ul>
       <div class="container">
            <?php echo $contenu ?>

            <footer class="well well-sm">
                <p class="text-center">@Copyright TCHINLAIT.</p>
            </footer>
        </div>
        
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	initSample();
</script>
   
    </body>
</html>
