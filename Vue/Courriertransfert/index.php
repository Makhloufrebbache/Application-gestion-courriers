<?php $this->title = "COURRIER";
      $this->login = $login;
      $this->user = $user;
	  $this->menuNum = $menuNum;
      ?>

<div class="row">
<!-- Vue pour séléctionner les courriers et les factures à transférer -->
<div class="col-md-10">
<div class="row" >
 <?php echo $msg; ?>

<div class="">

<form id="courrier" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">

<div class="row">

 <div class="form-group" >
 <!--Séléction des courriers-->
  <label for="" class="col-lg-3 control-label">Séléctionner un courrier :</label>
  <div class="col-lg-9"  >
  <select class="multiselect-ui form-control" name="Num_Enrg[]" id="Num_Enrg"  required multiple="multiple" onchange="liberer('Num_Fac');">
    			<?php
						foreach($courriers as $courrier): 
    					?>  
    						<option value="<?php echo($courrier['Num_Enrg_C']); ?>" ><?php echo($courrier['Num_Enrg_C']); ?></option>
    					<?php
						 endforeach;
    			?>
  </select>
  	
    	
  </div>
</div>
<div class="form-group" >
 <!--Séléction des factures-->
  <label for="" class="col-lg-3 control-label">Séléctionner une facture :</label>
  <div class="col-lg-9"  >
  <select class="multiselect-ui form-control" name="Num_Fac[]" id="Num_Fac"  required multiple="multiple" onchange="liberer('Num_Enrg');">
    			<?php
						foreach($factures as $facture): 
    					?>  
    						<option value="<?php echo($facture['Num_Enrg_F']); ?>" ><?php echo($facture['Num_Enrg_F']); ?></option>
    					<?php
						 endforeach;
    			?>
  </select>
  	
    	
  </div>
</div>
<div class="form-group" >
   <!-- saisie de nom de transporteur --> 
    <label for="Trans" class="col-lg-3 control-label" style="float: left; ">Transporteur :</label> 
     <div class="col-lg-9" >
     <input class="form-control"  name="Trans" value="" required="required"  > </input>
     </div>
  </div>
  
<div class="form-group" >
   <!--Séléction de site de déstination-->	
  <label for="" class="col-lg-3 control-label">Séléctionner le site transfert :</label>
  <div class="col-lg-9"  >
  <select class="form-control" name="Site_Dist" id="Id"  required >
    		<option value=""> - - - Séléctionner site transfert - - -</option>
    			<?php
						foreach($sites_rec as $site_rec):
						if($Sit !=  $site_rec['Id']){
    					?>  
    						<option value="<?php echo($site_rec['Id']); ?>" ><?php echo($site_rec['Site']); ?></option>
    					<?php }
						 endforeach;
    			?>
  </select>
  	
    	
  </div>
</div>
  
   <div class="form-group" style="text-align:center;"><input type="submit" value="Transferer" class="btn btn-primary" />
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

