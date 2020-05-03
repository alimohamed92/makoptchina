<?php if(sizeof($articles) == 0) { ?> <p class="alert alert-warning" role="alert"> <?php echo $message.'</p>'; }
else { ?>
        <div id="demContent">
            <div class="list-group">
                <table>
                <?php foreach ($articles as $article) { ?>
                    <tr class="spacer">
                        <td>
                            <input class="" type="checkbox" value="<?php echo $article['nom_produit'] ?>">
                        </td>
                        <td>
                            <a class="list-group-item list-group-item-action "> 
                                <h5 class="mb-1"><?php echo $article['nom_produit'] ?></h5>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </table>
            </div>
            <div style="margin-top: 50px; ">
                <button type="button" class="btn btn-custum" id ="subDem" data-url = '<?php echo site_url("receveur/newDossier")?>'>
                        Enregistrer 
                </button>
                <p id ="message"></p>
            </div>
        </div>
<?php }?>

<script src="<?php echo base_url() ?>assets/js/newDemande.js"></script>