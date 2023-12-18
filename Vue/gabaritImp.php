<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?php echo $racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="Contenu/Librairies/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Contenu/Librairies/bootstrap/css/styleMM.css">
        <link rel="stylesheet" media="print" href="print.css" type="text/css" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="">
        
        <!-- jQuery -->
        <script src="Contenu/Librairies/jquery/jquery-1.10.1.min.js"></script>
        <!-- Plugin JavaScript Boostrap -->
        <script src="Contenu/Librairies/bootstrap/js/bootstrap.min.js"></script>

        <!-- Titre -->
        <title>Bordereau d'envoi</title>
    </head>
    <body onload="window.print()">
        <div class="container">
            <?php echo $contenu ?>
        </div>
        
    </body>
</html>
