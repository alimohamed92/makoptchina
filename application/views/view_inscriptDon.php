<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>

<head>
  <link href="<?php echo base_url() ?>assets/css/common.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/auth.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body >

  <div class="container">
   <div class="row">
   		<div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 10px; margin-left: 25px">
			 <img  src="<?php echo base_url() ?>assets/images/logo.png" class="image-custum" >
			 <!--img  src="<?php echo base_url() ?>assets/images/icons8-twitter-64.png" class="image-custum" -->
        </div>
	</div>
	<div class="row" style="margin-top: 25px;">
   	<div class="col-md-4"></div>
		<div class="col-md-4" style="margin-left: 25px">
			<a href ="<?php echo site_url('auth/inscriptDemande'); ?>" class="btn" >Besoin d'aide?</a> 
			<a href ="<?php echo site_url('auth'); ?>" type="button" class="btn" style="margin-left: 10px;">Me connecter</a>
    </div>
  </div>


  <div id="connexion" style="margin-top: 25px;">
    <div class="row col-md-12" >
        <div class ="col-md-4"></div>
		    <div class="col-md-4" style="background-color: #e9ecef; margin-left: 25px">
		 
          <form >
                <legend class="title"><b> Inscription</b></legend>
                <div class="form-group">
                  <input style="height: 50px;" type="tel" name="tel" placeholder="Tél *" id="tel"  class="form-control">
                </div>
                <div class="form-group">
                  <input style="height: 50px;" type="password"  placeholder="Mot de passe *" name="pwd" id="pwd" class="form-control">
                </div>
                <div class="form-group">
                  <input style="height: 50px;" type="password"  placeholder="Confirmer mot de pass *" name="pwdC" id="pwdC" class="form-control">
                </div>

                <div class="form-group">
                  <select class="form-control" name= "ville" id="ville" >
                    <option value="" disabled selected>Sélectionner votre ville *</option>
                  </select>
                </div>
                    
                <div class="form-group">
                  <select class="form-control" name= "quartier" id="quartier" >
                    <option value="" disabled selected>Sélectionner votre quartier *</option>
                  </select>
                </div>
                <button style="height: 40px;" 
                  data-url="<?php echo site_url('auth/villes'); ?>" 
                  data-posturl="<?php echo site_url('auth/inscriptDon'); ?>" 
                  id="valid" class="btn" type ="button">Valider
                </button> 

          </form> </br>
          <div id="info"></div>
        </div> 
      </div>
  </div>



<div class=" border shadow" style="margin-top : 50px; text-align: center;">
  <footer class=" col-md-12 ">
            <div class="panel panel-body">
              <p style="margin-top: 15px">MAQOBTCHI NA Tous droits réservés </p>
            </div>
  </footer>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/addUser.js"></script>
<script src="<?php echo base_url() ?>assets/js/validation.js"></script>
</body>
</html>