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
			<a href ="<?php echo site_url('auth/inscriptDemande'); ?>" class="btn" >Demande de soutien</a> 
			<a href ="<?php echo site_url('auth'); ?>" type="button" class="btn" style="margin-left: 10px;">Me connecter</a>
    </div>
  </div>


  <div id="connexion" style="margin-top: 25px;">
    <div class="row col-md-12" >
        <div class ="col-md-4"></div>
		<div class="col-md-4" style="background-color: #e9ecef; margin-left: 25px">
		 
		 <!-- Formulaire A completer !-->
            <form>
              <legend class="title"><b> Inscription</b></legend>
              <div class="form-group">
                <input style="height: 50px;" type="text" name="login" placeholder="Tél" id="login" value="<?php set_value('login')?>" class="form-control">
              </div>
              <div class="form-group">
                <input style="height: 50px;" type="text"  placeholder="..." name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <input style="height: 50px;" type="text"  placeholder="..." name="" id="" class="form-control">
              </div>
              <div class="form-group">
                <input style="height: 50px;" type="text"  placeholder="..." name="" id="" class="form-control">
              </div>
              <button style="height: 40px; " class="btn" type="submit">Valider</button> 

            </form> </br>
          </div> 
      </div>
  </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-md-11" id="exampleModalLabel">Mot de passe oublié</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email">
          </div>
        </form>
        <div id="r"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Anuler</button>
        <button type="button" class="btn btn-primary" id="action">Envoyer</button>
      </div>
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
</body>
</html>