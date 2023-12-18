<?php $this->title = "COURRIER";
      $this->login = $login;
      $this->user = $user;
	  $this->menuNum = $menuNum;
      ?>

<!-- Vue pour création d'un nouveau courrier -->
<div class="row">
<div class="col-md-10">
<div class="row" >
 <?php echo $msg; ?>

<div class="">

<form id="courrier" method="post" enctype="multipart/form-data" class="form-horizontal col-lg-12">
<div class="text-form" id="categories">

<div class="row">
<!-- Saisie date arrivée -->
 <div class="form-group" >
  <label for="Date_Arriv" class="col-lg-3 control-label">Date arrivée :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="date" name="Date_Arriv" id="Date_Arriv" required="required"  value=""/>
     </div>
  </div>
  <!-- Saisie numéro sur registre-->
  <div class="form-group" >
  <label for="Num_Reg_C" class="col-lg-3 control-label">N° sur registre :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="text" name="Num_Reg_C"   value=""/>
     </div>
  </div>
  <!-- Saisie de l'expéditeur -->
  <div class="form-group" >
  <label for="Exp" class="col-lg-3 control-label">Expéditeur :</label>
  <div class="col-lg-9" >
  <input class="form-control" type="text" name="Exp"  required="required"  value=""/>
     </div>
  </div>
<!-- Choisir la source -->
 <div class="form-group" >
  <label for="" class="col-lg-3 control-label">Source :</label>
  <div class="col-lg-9"  >
  <select class="form-control" name="Src" id="Id"  required >
    		<option value=""> - - - Choisissez une source - - -</option>
    			<?php
						foreach($sources as $source): 
    					?>  
    						<option value="<?php echo($source['Id']); ?>" ><?php echo($source['Src']); ?></option>
    					<?php
						 endforeach;
    			?>
    	</select>
  	
    	
  </div>
</div>

 

  <div class="form-group" >
   <!-- saisie de l'observation --> 
    <label for="Objet" class="col-lg-3 control-label" style="float: left;">Objet :</label> 
     <div class="col-lg-9" >
     <input class="form-control" type="text" name="Objet"  value=""/> 
     </div>
  </div>
 
 <div class="form-group" >
   <!-- saisie de l'observation --> 
    <label for="Objet" class="col-lg-3 control-label" style="float: left;">Observation :</label> 
     <div class="col-lg-9" >
     <textarea class="form-control"  name="Observation"   > </textarea>
     </div>
  </div>
  
   <div class="form-group" style="text-align:center;"><input type="submit" value="Enregistrer le courrier" class="btn btn-primary" />
<span id="contactAlert"></span>
</div>
									
</form>
     </div>
   </div>
  </div>
 </div>
</div>

  
</div>

