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
        <div class="col-md-4" style="margin-top: 10px;">
        <a href ="<?php echo site_url(''); ?>">
          <img  src="<?php echo base_url() ?>assets/images/logo-alhery.png" class="image-custum" >
        </a>
        </div>
	</div>
	


  <div id="connexion" style="margin-top: 25px;">
    <div class="row col-md-12" >
        <div class ="col-md-4"></div>
		    <div class="col-md-4" style="background-color: #e9ecef; margin-left: 25px">
        <div id="info"></div>
          <form >
                <legend class="title green"><b> Inscrivez-vous et faites des dons</b></legend>
                <div class="form-group">
                  <input style="height: 50px;" type="tel" name="tel" placeholder="Numéro de Tél *" id="tel"  class="form-control">
                </div>
                <div class="form-group">
                  <input style="height: 50px;" type="password"  placeholder="Mot de passe *" name="pwd" id="pwd" class="form-control">
                  <small id="emailHelp" class="form-text text-muted">Le mot de passe doit avoir entre 8 et 16 caractères</small>
                </div>
                <div class="form-group">
                  <input style="height: 50px;" type="password"  placeholder="Confirmer le mot de passe *" name="pwdC" id="pwdC" class="form-control">
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
                  data-urlredirect="<?php echo site_url('auth'); ?>"
                  id="valid" class="btn" type ="button">Valider
                </button> <br><br>

                 <p> Déjà utilisateur ? <a href="<?php echo site_url('auth'); ?>" class="green"> se connecter </a>

          </form> </br>

          
        </div> 
      </div>
  </div>



<div class=" border shadow" style="margin-top : 50px; text-align: center;">
  <footer class=" col-md-12 ">
            <div class="panel panel-body">
              <p style="margin-top: 15px">&copy; Alhery 2020  <a style="margin-left: 10px" href ="mailto: contact@ahery.com" class="green">contact@alhery.com</a> </p>
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