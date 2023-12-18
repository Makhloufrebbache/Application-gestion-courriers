<?php 
header('Content-type: text/html; charset=UTF-8');
$this->title = "TCHINLAIT - Listes des courriers";
      $this->login = $login;
      $this->user = $user;
	   ?>
<!--Affichage des courriers en attente de validation-->
<div class="pageContent">
   <caption>
      <div class="row">
        <div class="col-lg-10">&nbsp;</div>
        <div class="col-lg-2" style="text-align: right;"></div>
      </div>
   </caption>
<section class="col-sm-12 table-responsive" style="overflow-x: auto;">
<table class="table table-bordered table-striped table-hover table-dark">
   <thead>
     <tr class="success">
       <th scope=" col" style="vertical-align:inherit;" >N° Courrier</th>
       <th scope="col" style="vertical-align:inherit;">Date d'arrivé</th>
       <th scope="col" style="vertical-align:inherit;">Expéditeur</th>     
       <th scope="col" style="vertical-align:inherit;">Objet</th>
       <th scope="col" style="vertical-align:inherit;">Site réception</th>
        <th scope="col" style="vertical-align:inherit;">Validation</th>
     </tr>
   </thead>
   <tbody>
    <?php foreach($courrier_nonvalides as $courrier_nonvalide): ?>
     <tr>
       <td><?php echo $courrier_nonvalide['Num_Enrg_C'];?></td>
       <td><?php echo $courrier_nonvalide['Date_Arriv']?></a></td>
       <td><?php echo $courrier_nonvalide['Exp'];?></td>
       <td><?php echo $courrier_nonvalide['Objet'];?></td>
       <td><?php echo $courrier_nonvalide['Site']; ?></td>
       <td><img src="Contenu/images/bou_ok.gif" title="Valider le courrier" onclick="Validercourrier(<?php echo $courrier_nonvalide['Num_Enrg'];?>)" style="cursor:pointer;"/></td>
     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>
