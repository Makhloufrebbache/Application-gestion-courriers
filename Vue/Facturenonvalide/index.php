<?php 
  $this->title = "FACTURES";
  $this->login = $login;
  $this->user = $user;
?> 
<!--Affichage des facture en attente de récéption-->
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
       <th scope=" col" style="vertical-align:inherit;" >N° Dossier</th>
       <th scope=" col" style="vertical-align:inherit;" >N° sur Registre</th>
       <th scope="col" style="vertical-align:inherit;">Date Saisie</th>
       <th scope=" col" style="vertical-align:inherit;" >N° Facture</th>
       <th scope=" col" style="vertical-align:inherit;" >Date Facture</th>
       <th scope="col" style="vertical-align:inherit;">Fournisseur</th>     
       <th scope="col" style="vertical-align:inherit;">Montant TTC</th>
       <th scope="col" style="vertical-align:inherit;">Site réception</th>
        <th scope="col" style="vertical-align:inherit;">Validation</th>
     </tr>
   </thead>
   <tbody>
    <?php foreach($facture_nonvalides as $facture_nonvalide): ?>
     <tr>
       <td><?php echo $facture_nonvalide['Num_Enrg_F'];?></td>
       <td><?php echo $facture_nonvalide['Num_Reg_F']?></td>
       <td><?php echo $facture_nonvalide['Date_Saisie']?></a></td>
       <td><?php echo $facture_nonvalide['Num_Fac'];?></td>
       <td><?php echo $facture_nonvalide['Date_Fac'];?></td>
       <td><?php foreach($frss as $frs): if($frs['Num_Frs'] == $facture_nonvalide['Nom_Frs']) echo $frs['Nom_Frs']; endforeach; ?></td>
       <td><?php echo $facture_nonvalide['Montant_TTC']; ?></td>
       <td><?php echo $facture_nonvalide['Site']; ?></td>
       <td><img src="Contenu/images/bou_ok.gif" title="Valider le courrier" onclick="Validerfacture(<?php echo $facture_nonvalide[0];?>)" style="cursor:pointer;"/></td>
     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>
