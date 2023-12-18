<?php $this->title = "TCHINLAIT - Accueil";
      $this->login = $login;
      $this->user = $user;
      ?>

  <!--La vu gestion courriers-->
<div class="row">
  <div class="col-md-12">
   <div >
    <header class="page-header">
        <h4><u>Traitement de courriers:</u></h4>
    </header>
    </div>
   <!--récupérer les courriers en attente de récéption-->
   <div class="well well-sm"> <p><a id=""  href="courriernonvalide" >Courrier(s) en attente de réception : </a> <?php echo $nb_courrier_recu; ?></p>
   <!--récupérer les courriers en cours d'envoi-->
   <p> courrier(s) en cours d'envoi : <?php echo $nb_courrier_Env; ?></p>
   <!--récupérer les courriers enregistés aux niveau de site de récéption-->
   <p>Courrier(s) enregistré(s) au niveau de site <?php echo $site['Site'] ; ?> :  <?php echo $nb_courrier_enrg; ?></p> </div>
    <header  class="page-header">
        <h4><u>Traitement de factures: </u></h4>
    </header>
    <!--récupérer les factures en attente de récéption-->
   <div class="well well-sm">   <p> <a id=""  href="facturenonvalide" >Facture(s) en attente de réception :</a> <?php echo $nb_facture_recu; ?></p>
     <!--récupérer les factures en cours d'envoi-->
     <p>Facture(s) en cours  d'envoie : <?php echo $nb_facture_Env; ?></p> 
     <!--récupérer les factures enregistés aux niveau de site de récéption-->
     <p>Facture(s) enregistrée(s) au niveau de site <?php echo $site['Site'] ; ?>  : <?php echo $nb_Facture_Enrg; ?></p> 
   </div>
 
</div>
