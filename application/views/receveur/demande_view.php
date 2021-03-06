<div id="demContent">
<?php if(sizeof($articles) == 0) { ?> <h5 class="alert alert-primary" role="alert"> Aucun article associé à cette demande; </h5> <?php }?>
    <div class="list-group">
        <table>
        <?php foreach ($articles as $article) { ?>
            <tr class="spacer"  id="tr_<?php echo $article['id_article'] ?>" >
                <td>
                    <input class="" type="checkbox" value="<?php echo $article['id_article'] ?>" 
                     id="check_<?php echo $article['id_article'] ?>" 
                     >
                </td>
                <td>
                    <a id="a_<?php echo $article['id_article'] ?>"  class="list-group-item list-group-item-action list-group-item-secondary"
                    <?php if($article['etat'] == EN_ATTENTE) { echo 'style="background: #ffc10714;" '.'data-toggle="tooltip" data-placement="top" title="en attente de confirmation"';} ?>
                    > <!--style ="background: #dee2e6;"-->
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Demande : <?php echo $article['nom'] ?></h5>
                        </div>
                        <p class="mb-1">
                            <?php /*
                                if($article['comment']) {
                                    echo $article['comment']; 
                                } 
                                else {
                                    echo 'Pourriez-vous m’assister avec un peu de'.$article['nom'].' selon vos capacités ?';
                                }
                            */?>
                        </p>
                        <div class = "row">
                                <div class="col-md-12">
                                    <!--small style=" text-align:left"  class="text-muted">Merci de votre soutien</small><br-->
                                    <small  style="float: right;"><?php echo explode(" ", $article['date'])[0]?></small>
                                </div>
                        </div>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <div style="margin-top: 50px; margin-left:15px" class="col-md-6">
        <?php if(sizeof($articles) > 0) {?> 
            <span data-toggle="tooltip" data-placement="top" title="Cliquer sur ce bouton uniquement si vous avez reçu les demandes sélectionnées ci-dessus">
                <button 
                    type="button" class="btn btn-custum" id ="validDem"
                    data-toggle="modal" data-target="#modalConfirm"
                    data-url = '<?php echo site_url("receveur/confirmerReception")?>'>
                Confirmation de reception
                </button>
            </span>
        <?php } ?>
    </div>
</div>

<script>
 $(document).ready(function() {
    var selected = $("input:checked");
    $('#validDem').attr("disabled",true);
    $("input").change(function(d) {
      selected = $("input:checked");
      $('#validDem').attr("disabled", selected.length === 0); 
      $("#message").html("");
    });
 });
    
</script>