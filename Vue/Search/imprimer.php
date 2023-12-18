<?php $this->title = "COURRIER";
      $this->login = $login;
      $this->user = $user;
	  $this->menuNum = $menuNum;
      ?>
<!--Format de boredereau d'envoi-->
<div class="pageContent" style="margin:20px 20px 20px 20px;">

    <header class="page-header" style="padding-bottom: 25px; margin: 40px 0 10px; border-bottom: 0px solid #eee;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col"><img src="Contenu/images/Logos TCHIN LAIT.jpg" width="124" height="72" /></th>
    <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col" style="text-align:center; text-decoration:underline; font-size:25px; font-weight:bolder;">BORDEREAU D’ENVOI</th>
  </tr>
  <tr>
    <!--Numéro d'envoi-->
    <td style="text-align:center; font-size:20px;">N° :<?php echo $Num;?></td>
  </tr>
</table>
</th>
    <th scope="col" style="float:right;"><img src="Contenu/images/Logos CANDIA.jpg" width="124" height="72"/></th>
  </tr>
</table>
     
    </header>

<div class="row">
  <!--Date d'envoi-->
  <div class="col-md-12" style="text-align:center; ">Date d'envoi: <?php echo $Date_Envoi;?></div>
</div>  

<div class="row">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <!--Site éxpéditeure-->
    <td scope="col" >Site d'origine: <?php echo $Site_Actuel;?></td>
  <!--Site distinataire-->
    <td scope="col" style="float:right;">Site de distination: <?php echo $Site_Dest;?></td>
  </tr>
</table>

  <div class="col-md-12" style="text-align:right;"> </div>
</div>  

<div class="row">
  <div class="col-md-12" style="text-align:center;"></div>
</div>

<div class="row">
  <div class="col-md-12" style="text-align:center;">
<table width="100%" border="1" bordercolor="#000000">
  <!--Entete du tableau-->
   <thead>
     <tr class="success">
       <th scope=" col" style="vertical-align:inherit; text-align:center;"  >N°</th>
       <th scope="col" style="vertical-align:inherit; text-align:center;">DESIGNATION </th>
       <th scope="col" style="vertical-align:inherit; text-align:center;">EXPEDITEUR </th>
       <th scope="col" style="vertical-align:inherit; text-align:center;">SIGNATURE DESTINATAIRE</th>
     </tr>
   </thead>
   <tbody>
    <!--Les informations courriers et factures-->
    <?php $i=0; foreach($resultats as $resultat): if($resultat['Num_Enrg'] != 0){ $i++;?>
     <tr>
       <td><?php echo $i;?></td>
       <td><?php echo "Courrier N° ".$resultat['Num_Enrg']; ?></td>
       <td><?php $j=0; foreach($courriers as $courrier): if($courrier['Num_Enrg_C'] == $resultat['Num_Enrg']){ $j++; echo $courrier['Exp'];} endforeach;?></td>
       <td>&nbsp;</td>
     </tr>
    <?php } endforeach; ?>
    <?php foreach($resultats as $resultat): if($resultat['Num_Fact'] != 0){ $i++;?>
     <tr>
       <td><?php echo $i;?></td>
       <td><?php echo "Facture N° ".$resultat['Num_Fact']; ?></td>
       <td><?php $j=0; foreach($factures as $facture): if($facture['Num_Enrg_F'] == $resultat['Num_Fact']){ $j++; 
	   $k=0; foreach($frss as $frs): if($frs['Num_Frs'] == $facture['Nom_Frs']){ $k++; echo "";} endforeach; } endforeach; ?></td>
       <td>&nbsp;</td>
     </tr>
    <?php } endforeach; ?>
   </tbody>
</table>
  </div>
</div>

 <div>
</div>

<div class="row">
  <div class="col-md-12" style="text-align:center;">
<table width="100%" border="1" bordercolor="#000000" >
   <thead>
    <!--Espace réservé pour la signatures des responsables-->
     <tr class="success">
       <td  width="33%"scope=" col" style="vertical-align:inherit; text-align:center;" >Bureau d’Ordre site d’expédition</td>
       <td  scope="col" style="vertical-align:inherit; text-align:center;">Chauffeur / Transporteur</td>
       <td  width="33%" scope="col" style="vertical-align:inherit; text-align:center;">Bureau d’Ordre site de destination</td>
     </tr>
   </thead>
   <tbody>
     <tr style="vertical-align:top; text-align:left;">
       <td height="139"><p></p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>Date:</p></td>
       <td><p></p>
         <p><?php echo $Trans;?></p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>Date:</p></td>
       <td><p></p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>Date:</p></td>
     </tr>
   </tbody>
</table>
  </div>
</div>
</div>
