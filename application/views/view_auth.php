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
		 
		 <!-- Formulaire !-->
            <?php echo form_open("auth");?>
              <legend class="title green"><b> Connectez vous </b></legend>
              <div class="form-group">
                <input style="height: 50px;" type="tel" name="login" placeholder="Numéro de tél" id="login" value="<?php set_value('login')?>" class="form-control">
                <?php echo form_error('login','<div class="error">','</div>') ?>
              </div>
              <div class="form-group">
                <input style="height: 50px;" type="password"  placeholder="Mot de passe" name="mp" id="mp" class="form-control">
                <?php echo form_error('mp','<div class="error">','</div>') ?>
              </div>
              <button style="height: 40px; " class="btn btn-primary" type="submit"> Se connecter <i class="fas fa-sign-in-alt"></i></button> 
              <a href="" data-toggle="modal" data-target="#exampleModal" style =" margin-left: 30px;" class="green">Mot de pass oublié</a>
              <br><br>
              <p >Envie d'aider ? <a href ="<?php echo site_url('auth/inscriptDon'); ?>" class="green">Inscrivez-vous</a></p>
              <p >Besoin d'aide ? <a href ="<?php echo site_url('auth/inscriptDemande'); ?>" class="green">Inscrivez-vous</a></p>

            <?php echo form_close();?> </br>
          </div> 
      </div>
  </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-md-11" id="exampleModalLabel">Mot de passe oublié</h5>
        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form>
          <div class="form-group">
            <input type="tel" class="form-control" id="tel" placeholder="Tél">
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
        <p style="margin-top: 15px">&copy; Alhery 2020 <a class="green" style="margin-left: 10px" href ="mailto: contact@ahery.com">contact@alhery.com</a> </p>
      </div>
  </footer>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
 <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
<script>
 $(function() {
        $('#action').click(function() {
          var param = 'tel=' + $('#tel').val();
          $('#r').load('<?php echo site_url("auth/mp")?>',param);
        });  

        $('#cancel').click(function() {
          $('#r'). empty();
        });  
        $('#close').click(function() {
          $('#r'). empty();
        });  
  });
</script>
</body>
</html>