<?php if(sizeof($demandes) == 0) { ?> <h5 class="alert alert-primary" role="alert"> Pas de dossier de suivi; </h5> <?php }?>
<div>
    <?php if(sizeof($demandes) > 0) { ?>
        <table class="table table-striped table-hover table-borderless" id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tél</th>
                    <th>Quartier</th>
                    <th>Demande</th>                        
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $demande) { ?>
                    <tr id='det_<?php echo $demande['tel'] ?>' class="table-info tr-link <?php if($demande['etat'] == EN_ATTENTE) { echo 'table-warning';}?>" <?php if($demande['etat'] == EN_ATTENTE)  echo 'data-toggle="tooltip" data-placement="top" title="en attente de confirmation"'; ?>>
                        <td data-url ='<?php echo site_url("admin/detailsDemande").'?tel='.$demande['tel']?>'> <?php echo $demande['tel'] ?> </td>
                        <td data-url ='<?php echo site_url("admin/detailsDemande").'?tel='.$demande['tel']?>'> <?php echo $demande['quartier'].' '.$demande['ville'] ?> </td>
                        <td data-url ='<?php echo site_url("admin/detailsDemande").'?tel='.$demande['tel']?>'> <?php echo $demande['label'] ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
<script>
 $("tr[id*='det_']").click(function(e){
    var $target = $(e.target);
    var url = $target.data('url');
    if(url) {
        window.location = url;
    }
 });
</script>