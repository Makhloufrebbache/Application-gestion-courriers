<?php $this->title = "COURRIER";
  $this->login = $login;
  $this->user = $user;
	$this->menuNum = $menuNum;
?>
<div class="row">
  <div class="col-xs-12" style="padding-left:57px;">
   <div class="row">
     <div class="col-xs-12">
      <!--Afficher un message par rapport aux résumltat de recherche-->
        <h3> Resultat(s) de recherche pour <?php echo $msg; ?></h3>
     </div>
   </div>
   
 <div class="row">
  <div class="col-md-12"  id="zone_articles"> 
   <article class="archives_art">
     <div class="content">
     <div class="text"><?php echo $msg1; ?></div>
    </div>
  </article>
  </div>
  </div> 
 <?php if($nb_historiquemvts != 0) {?>
 <div class="row">
  <div class="col-md-12"  id="zone_articles"> 
     <!--Affichage du mouvement d'un courrier ou facture-->
     <H4>Historique du mouvement du courrier:</H4>
  </div>
 </div> 
<table class="table table-bordered table-striped table-hover table-dark">
   <thead>
     <tr class="success">
       <th scope=" col" style="vertical-align:inherit;" >Transféré de</th>
       <th scope="col" style="vertical-align:inherit;">Vers </th>
       <th scope="col" style="vertical-align:inherit;">En date de </th>
     </tr>
   </thead>
   <tbody>
    <?php foreach($historiquemvts as $historiquemvt): ?>
     <tr>
       <td><?php foreach($sites as $site): if($site['Id'] == $historiquemvt['Site_Actuel']) echo $site['Site']; endforeach; ?></td>
       <td><?php foreach($sites as $site): if($site['Id'] == $historiquemvt['Site_Dist']) echo $site['Site']; endforeach; ?></td>
       <td><?php echo $this->formatdate($historiquemvt['Date_Envoi'], "/", true);?></a></td>
     </tr>
    <?php  endforeach; ?>
   </tbody>
</table>
 <?php } ?>
 <!--Contenu de boredereau-->
<?php if($choix == 2){ ?>
   <div class="row">
     <div class="col-xs-12">
        <h3>Contenu du bordereau:</h3>
     </div>
   </div>
   
      <div class="row">
        <div class="col-xs-12"><h5>Courrier(s):</h5></div>
      </div>
 <?php foreach($resultats as $resultat): if($resultat['Num_Enrg'] != 0){?>
  <div class="row">
  <div class="col-md-12"  id="zone_articles"> 
   <article class="archives_art">
     <div class="content">
     <div class="text"><?php echo $resultat['Num_Enrg']; ?></div>
     </div>
   </article>
   </div>
  </div> 
  <?php } endforeach; ?>
  
      <div class="row">
        <div class="col-xs-12"><h5>Facture(s):</h5></div>
      </div>
      
       <?php foreach($resultats as $resultat): if($resultat['Num_Fact'] != 0){?>
  <div class="row">
  <div class="col-md-12"  id="zone_articles"> 
   <article class="archives_art">
     <div class="content">
     <div class="text"><?php echo $resultat['Num_Fact']; ?></div>
     </div>
   </article>
   </div>
  </div> 
  <?php } endforeach; ?>
  
      <div class="row">
        <div class="col-xs-12"><h4><input type="button" name="print" value="Imprimer" onClick="imprimer('<?php echo $rechercheImp; ?>');"></h4></div>
      </div>

  <?php } ?>

  </div>
  
</div>