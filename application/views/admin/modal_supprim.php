
<!-- Modal -->
<div class="modal fade" id="modalSupprim" tabindex="-1" role="dialog" aria-labelledby="modalSupprimLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSupprimLabel">Confirmation de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="message" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" id="confirmDelete" class="btn btn btn-danger">Confirmer</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/suppressionConfirm.js"></script>