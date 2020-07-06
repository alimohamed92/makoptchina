<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>

<head>
  <link href="<?php echo base_url() ?>assets/css/common.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/auth.css" rel="stylesheet">
  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link href="<?php echo base_url() ?>assets/css/bootstrap-select.min.css" rel="stylesheet">
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
		 <!-- Formulaire A completer !-->
            <div class="" id="msg"> </div>
            <form method="post" id="registration">
              <legend class="title green"><b> Inscrivez-vous et recevez de l'aide</b></legend>
              <div class="form-group">
                <label for="tel"></label>
                <input style="height: 50px;" type="text" name="tel" placeholder="Numéro de Tél *" id="tel" class="form-control"> </p>
                
              </div> 
              <div class="form-group">
                  <label for="pwd"></label>
                  <input style="height: 50px;" type="password"  placeholder="Mot de passe *" name="pwd" id="pwd" class="form-control">
                  <small id="emailHelp" class="form-text text-muted">Le mot de passe doit avoir entre 8 et 16 caractères</small>
                </div>
                <div class="form-group">
                  <label for="pwdC"></label>
                  <input style="height: 50px;" type="password"  placeholder="Confirmer le mot de passe *" name="pwdC" id="pwdC" class="form-control">
                </div>
              <div class="form-group">
                <select style="height: 50px;" placeholder="Ville" name="ville" id="ville" class="form-control">
                  <option value="" disabled selected>Choissisez votre ville</option>
                </select>
              </div>
              <div class="form-group">
                <label for="quartier"></label>
                <select style="height: 50px;" placeholder="Quartier" name="quartier" id="quartier" class="form-control">
                   <option value="" disabled selected>Choissisez votre quartier</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nbr_personne"></label>
                <input style="height: 50px;" type="number" placeholder="Nbr de personnes dans le foyer" name="nbr_personne" id="nbr_personne" class="form-control" min="1" max="10" >
              </div> 
              <div class="form-group">
                <label for="items"></label>
                <select class="form-control selectpicker" name="items" id="items" multiple data-live-search="true" data-style="btn-primary" title="Sélectionner vos besoins" >
                  <?php 

                    $query = $this->db->order_by('nom_categorie')->get('category');
                    $results = $query->result();
                    foreach ($results as $row){
                      echo "<optgroup label='".$row->nom_categorie."'>";
                      $items_query = $this->db->order_by('nom_produit')->get_where('catalogue', array('id_categorie' => $row->id_categorie));
                      foreach ($items_query->result() as $item) {
                        echo "<option style='color:green !important; font-weight:bold;' value='".$item->id_produit."'>".$item->nom_produit."</option>";
                      }
                      echo "</optgroup>";

                    }
                  ?>
                </select>
              </div>
              <input type="hidden" id="urlredirect" value="<?php echo site_url('auth'); ?>">

              <div class="form-group">
                <textarea class="form-control" style="height: 50px;" id="autre" name="autre" placeholder="Autres besoins"></textarea>
              </div>
              <button style="height: 40px;" 
                  data-url="<?php echo site_url('auth/villes'); ?>" 
                  data-posturl="<?php echo site_url('auth/inscriptDemande'); ?>"
                  id="valid" class="btn" type ="submit">Valider</button> 
            </form> 
             </br>
            <div id="info"></div>
            <p> Déjà utilisateur ? <a href="<?php echo site_url('auth'); ?>" class="green"> se connecter </a>
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
              <p style="margin-top: 15px">&copy; Alhery 2020  <a style="margin-left: 10px" class="green" href ="mailto: contact@alhery.com">contact@alhery.com</a> </p>
            </div>
  </footer>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/addApplicant.js"></script>


</body>
</html>