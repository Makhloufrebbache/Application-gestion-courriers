<?php $this->titre = "Connexion"; 
      $this->login = $login;
?>
<!--La vue login-->
<?php if (isset($msgErreur)) : ?>
    <div class="alert alertMM alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Erreur !</strong> <?php echo $this->nettoyer($msgErreur) ?>
    </div>
<?php endif; ?>
<div class="row" >
 <div class="col-sm-6 col-sm-offset-2 col-md-6 col-md-offset-3" >
<div class="well wellMM" style="background-color: #88988e;">
    <div class="row">
            <h2 class="text-center" style="text-align:center;">Saisie courriers & factures</h2>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="connexion">
            <form class="form-signin form-horizontal" role="form" action="connexion/connecter" method="post">
                <div class="form-group">
                    <div class="col-lg-12 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-left:0;">
                       <!--Saisie de mot de login-->
                        <input name="login" type="text" class="form-control" placeholder="Entrez votre login" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-left:0;">
                       <!--Saisie de mot de passe-->
                        <input name="mdp" type="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" >
                    
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Connexion</button>      
                     
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
  </div>
</div>