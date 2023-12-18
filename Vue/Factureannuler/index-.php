<?php 
header('Content-type: text/html; charset=UTF-8');
$this->title = "TCHINLAIT - Listes des factures";
      $this->login = $login;
      $this->user = $user;
	   $this->menuNum = $menuNum;
	  
      //$this->login = $this->nettoyer($login); ?>
 
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
       <td>Annuler</td>             

       <th scope="col"  ><?php echo $this->columnConstruct("N° Enregistrement", "Num_Enrg_F");?> </th>
       <th scope="col" ><?php echo $this->columnConstruct("N° sur Registre", "Num_Reg_F");?> </th>
    <th scope="col" ><?php echo $this->columnConstruct("Date D'enregistrement", "Date_Saisie", "date");?></th>
       <th scope="col" ><?php echo $this->columnConstruct("Heure Saisie", "Heure_Saisie", "time");?></th>
       <th scope="col" ><?php echo $this->columnConstruct("Date Facture", "Date_Fac", "date");?></th> 
       <th scope="col" ><?php echo $this->columnConstruct("N° Facture", "Num_Fac");?></th>
       <th scope="col" ><?php echo $this->columnConstruct("Fournisseur", "Nom_Frs");?></th>
       <th scope="col"  ><?php echo $this->columnConstruct("Montant TTC", "Montant_TTC");?> </th>
       <th scope="col" ><?php echo $this->columnConstruct("Site", "");?> </th>
   </thead>
   <tbody class="Corp">
    <?php foreach($factures as $facture): ?>
     <tr>
 <th scope="col" style="vertical-align:inherit;"> <button type="button" id="BB"  onclick="AnnulerFacture('<?php echo $facture[0];?>')"  class="btn btn-danger" ><span class="glyphicon glyphicon-remove-sign"></span></button>
       <td><?php echo $facture['Num_Enrg_F'];?></td>
        <td><?php echo $facture['Num_Reg_F'];?></td>
       <td><?php echo $this->formatdate($facture['Date_Saisie'], "/", true);?></a></td>
       <td><?php echo $facture['Heure_Saisie']?></a></td>
       <td><?php echo $facture['Date_Fac']?></a></td>
       <td><?php echo $facture['Num_Fac'];?></td>
       <td><?php foreach($frss as $frs): if($frs['Num_Frs'] == $facture['Nom_Frs']) echo $frs['Nom_Frs']; endforeach; ?></td>
       <td><?php echo $facture['Montant_TTC'];?></td>
                <td><?php foreach($sites_rec as $site_rec): if($site_rec['Id'] == $facture['Site_Dest']) if($facture['Etat_Dossier']==1) echo $site_rec['Site']; elseif($facture['Etat_Dossier']==0) echo "En cours de transfert vers ".$site_rec['Site']; else echo "Annulée"; endforeach; ?></td>

     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>
