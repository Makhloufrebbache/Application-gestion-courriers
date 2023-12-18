<?php 
header('Content-type: text/html; charset=UTF-8');
$this->title = "TCHINLAIT - Listes des factures";
      $this->login = $login;
      $this->user = $user;
	   $this->menuNum = $menuNum;
?>
<!--Génération d'un bordereau d'envoi pour visualisation et impression-->
<div class="pageContent">
   <caption>
      <div class="row">
        <div class="col-lg-12" style="text-align:right;"><a class="btn btn-primary" href="newbordereau" role="button">Créer un bordereau</a></div>
        <div class="col-lg-2" style="text-align: right;"></div>
      </div>
   </caption>
<section class="col-sm-12 table-responsive" style="overflow-x: auto;">
<table class="table table-bordered table-striped table-hover table-dark">
   <thead>
    <!--l'entête-->
     <tr class="success">
       <th scope="col"  ><?php echo $this->columnConstruct("N° Bordereau", "Num_B", "", "TabCol1");?> </th>
       <th scope="col" ><?php echo $this->columnConstruct("Site source", "Site_Src", "", "TabCol1");?> </th>
       <th scope="col" ><?php echo $this->columnConstruct("Site destination", "Site-Dist", "", "TabCol1");?></th>
       <th scope="col" ><?php echo $this->columnConstruct("Date Création", "Date_Creation", "date", "TabCol1");?></th> 
       <th scope="col" ><?php echo $this->columnConstruct("Date d'Envoi", "Date_Envoi", "date", "TabCol1");?></th> 
       <th scope="col" ><?php echo $this->columnConstruct("Date Récéption", "Date_Rec", "date", "TabCol1");?></th> 
       <th scope="col"  ><?php echo $this->columnConstruct("Transporteur", "", "", "TabCol1");?> </th>
       <th scope="col" ><?php echo $this->columnConstruct("Etat", "", "", "TabCol1");?></th>
     </tr>  
   </thead>
   <tbody class="Corp">
    <!--Le contenu-->
    <?php foreach($bordereaux as $bordereau): ?>
       <tr> <?php if ($bordereau['Num_B']==2) echo 'style="color: red;"'; ?>
       <td><?php echo $bordereau['Num_B'];?></td>
       <td><?php echo $bordereau['Site_Src'];?></td>
        <td><?php echo $bordereau['Site_Dist'];?></td>
       <td><?php echo $this->formatdate($bordereau['Date_Creation'], "/", true);?></a></td>
       <td><?php echo $this->formatdate($bordereau['Date_Envoi'], "/", true);?></a></td>
       <td><?php echo $this->formatdate($bordereau['Date_Rec'], "/", true);?></a></td>
       <td><?php echo $bordereau['Transporteur'];?></td>
       <td><?php if($bordereau['Etat']==0) echo "Nouveau"; else if($bordereau['Etat']==1) echo "En cours d'envoi"; else echo "Reçu"; ?></td>
     </tr>
    <?php endforeach; ?>
   </tbody>
</table>
</section>
</div>
