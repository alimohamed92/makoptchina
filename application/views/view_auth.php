<!DOCTYPE HTML>
<html>

  <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>

<body>

  <div class="container">
   <div class="row">
           <div class="col-md-3" style="margin-top: 10px;">
             <img  src="<?php echo base_url() ?>assets/images/logo.png" class="img-responsive" style="width: 80%"; >
           </div>
           <div class="col-md-5"></div>
           <div class="col-md-4 " style="margin-top: 5%">
              <h3 style="text-align : center"> BIENVENUE</h3> 
           </div>  
    </div>
  </div>

  <div class="container-fluid">
    <div class="row"> 
          <div class="col-md-12" style="background-image:url(<?php echo base_url() ?>assets/images/bandeau.png); height: 220px; background-repeat: no-repeat; margin-top: 15px;">
      </div>
    </div>
  </div>

  <div class="container">

    <div class="container" style="margin-top : 30px;">

         <!-- <div class="container border shadow" style="margin-top : 30px; background-color: #f1f1f1">!-->

         
      <div class="row col-sm-12" style="margin : 10px;">
        <div class ="col-md-4"></div>
        <div class="col-md-4"> <!-- Formulaire !-->
          <?php echo form_open("auth");?>
            <legend> Espace d'authentification</legend>
            <div class="form-group">
              <input style="height: 50px;" type="text" name="login" placeholder="Identifiant" id="login" value="<?php set_value('login')?>" class="form-control">
              <?php echo form_error('login','<div class="error">','</div>') ?>
            </div>
            <div class="form-group">
              <input style="height: 50px;" type="password"  placeholder="Mot de passe" name="mp" id="mp" class="form-control">
              <?php echo form_error('mp','<div class="error">','</div>') ?>
            </div>
            <button style="height: 40px; background-color: #3f6a21; border-color: #3f6a21;" class="btn-success" type="submit">Se connecter</button> 
            <a href="" data-toggle="modal" data-target="#exampleModal" style =" margin-left: 50px;">
              Mot de pass oublié
            </a>

          <?php echo form_close();?>

          <!--Mot de passe oublié-->

<!-- Button trigger modal -->


<!-- Modal -->
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

        </div>
        
      </div>
    </div>  
</div>
<div class=" border shadow" style="margin-top : 50px; text-align: center;">
<footer class=" col-md-12 ">
          <div class="panel panel-body">
            <p style="margin-top: 15px">MAKOPTCHI NA Tous droits réservés </p>
          </div>
</footer>
</div>

<script>
 $(function() {
        $('#action').click(function() {
          var param = 'email=' + $('#email').val();
          $('#r').load('<?php echo site_url("auth/mp")?>',param);
        });  

        $('#cancel').click(function() {
          $('#r'). empty();
        });  
      });
</script>
</body>
</html>