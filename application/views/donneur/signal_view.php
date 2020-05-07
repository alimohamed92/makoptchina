<div>
  <div id="message"></div>
  <form class="form-inline">
    <label class="sr-only" for="tel">Username</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text">@Tél</div>
      </div>
      <input type="tel" name="tel" class="form-control" id="tel" placeholder="numéro de tél à signaler">
    </div>
    <button type="button" id="sub" class="btn btn-primary mb-2" data-url = '<?php echo site_url("donneur/signaler")?>'>Signaler</button>
    <div style="margin-left: 10px" class="alert alert-warning" role="alert">
      Merci de nous aider à identifier toute personne qui abuse de l'entraide
    </div>
  </form>
</div>
<script src="<?php echo base_url() ?>assets/js/validation.js"></script>
<script src="<?php echo base_url() ?>assets/js/signal.js"> </script>