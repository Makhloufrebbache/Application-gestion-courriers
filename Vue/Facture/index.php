<?php $this->title = "COURRIER";
      $this->login = $login;
      $this->user = $user;
	  $this->menuNum = $menuNum;
?>
 <!--Vue pour la saisie d'une facture-->
<div class="row">

<div class="col-md-10">
<div class="row" >
  <?php echo $msg; ?>

<div class="">

<form id="courrier" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">

<div class="row">


  <div class="form-group" >
   <!--Saisie de numéro de facture-->
  <label for="Num_Fac" class="col-lg-3 control-label">N° Facture :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="text" name="Num_Fac" required="required"  value="<?php echo $facture['Num_Fac'];?>"/>
     </div>
  </div>
  
  <div class="form-group" >
   <!--Saisie de numéro sur registre-->
  <label for="Num_Reg_F" class="col-lg-3 control-label">N° sur registre :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="text" name="Num_Reg_F" required="required"  value="<?php echo $facture['Num_Reg_F'];?>"/>
     </div>
  </div>
   <!--Séléction de fournisseur-->
  <div class="form-group" >
  <label for="Nom_Frs" class="col-lg-3 control-label" style="float: left;">Fournisseur : </label> 
  <div class="col-lg-9"  >
    <select class="form-control" name="Nom_Frs" id="Nom_Frs"  required>
    		<option value="">- - - Séléctionner le fournisseur - - -</option>
    			<?php
						foreach($frss as $frs): 
    					?>
    						<option value="<?php echo($frs['Num_Frs']); ?>"<?php if($facture['Nom_Frs'] == $frs['Num_Frs']) echo 'selected="selected"'; ?> ><?php echo($frs['Nom_Frs']); ?></option>
    					<?php
    				    endforeach;
    			?>
     </select>     
   </div>
  </div>

 <div class="form-group" >
   <!--Saisie de la date de facture-->
  <label for="Date_Fac" class="col-lg-3 control-label">Date Facture :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="date" name="Date_Fac" id="Date_Fac" required="required" value="<?php echo $facture['Date_Fac'];?>"/>
     </div>
  </div>
<div class="form-group" >
  <!--Saisie de la date d'arrivée-->
  <label for="Date_Arriv" class="col-lg-3 control-label">Date Arrivée :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="date" name="Date_Arriv" id="Date_Arriv" required="required" value="<?php echo $facture['Date_Arriv'];?>" <?php echo $red_only ;?> />
     </div>
  </div>  
  <div class="form-group" >
   <!--Montant de la facture-->
  <label for="Montant_TTC" class="col-lg-3 control-label">Montant TTC :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="text" name="Montant_TTC"  required="required" value="<?php echo $facture['Montant_TTC'];?>"/>
     </div>
  </div>

  

 <div class="form-group" style="text-align:center;"><input type="submit" value="Enregistrer la facture" class="btn btn-primary" />
<input type="hidden" name="idHidden" value=""/>
<span id="contactAlert"></span>
</div>
									
								</form>
     </div>
   </div>
  </div>
 </div>
</div>
</div>

