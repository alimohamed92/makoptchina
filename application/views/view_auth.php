<!DOCTYPE HTML>
<html>

<head>
  <link href="<?php echo base_url() ?>assets/css/auth.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
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
    </div>
  </div>

  <div class="container">
    <div class="row"> 
      <nav class="col-md-12 navbar navbar-expand-lg navbar-light " style=" margin-top: 20px; background-color: #3f6a21;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler" >
          <ul class="nav nav-tabs navbar-nav mr-auto mt-2 mt-lg-0" id="myTab" role="tablist" style="width:100%; border-bottom: 0px;">
            <li class="nav-item" style="width:34%">
              <a style="" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Demande d'aide </a>
            </li>
            <li class="nav-item" style="width:33%">
              <a style="" class="nav-link" id="aide-tab" data-toggle="tab" href="#aide" role="tab" aria-controls="aide" aria-selected="false">Je veux aider </a>
            </li>
            <li class="nav-item" style="width:33%">
              <a style="" class="nav-link test" id="connect-tab" data-toggle="tab" href="#connexion" role="tab" aria-controls="connecxion" aria-selected="false">Se connecter</a>
            </li>
            <!--li class="nav-item" style="width:25%">
              <a style="color: #f0f3f5" class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Signaler abus</a>
            </li-->
          </ul>
        </div>
      </nav>
    
    </div>
  </div>
<div class="tab-content" id="myTabContent" style="margin-top: 50px;">



  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Home content</div>
  <div class="tab-pane fade" id="connexion" role="tabpanel" aria-labelledby="connexion-tab">
    <div class="row col-md-12" >
        <div class ="col-md-4"></div>
        <div class="col-md-4"> <!-- Formulaire !-->
            <?php echo form_open("auth");?>
              <legend> Authentification</legend>
              <div class="form-group">
                <input style="height: 50px;" type="text" name="login" placeholder="Tél" id="login" value="<?php set_value('login')?>" class="form-control">
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
          </div> 
      </div>
  </div>
  <div class="tab-pane fade" id="aide" role="tabpanel" aria-labelledby="profil-tab">Aide tab content</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">signal tab content</div>
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
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>