<div>
    <table class="table table-striped table-hover" id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tél</th>
                <th>Quartier</th>
                <th>Demande</th>
                <th>Aider</th>
                        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demandes as $demande) { ?>
                    
                <tr>
                    <td> <?php echo $demande['tel'] ?> </td>
                    <td> <?php echo $demande['quartier'].' '.$demande['ville'] ?> </td>
                    <td> <?php echo $demande['label'] ?> </td>
                    <td> 
                        <a href="#" data-toggle="modal" data-target="#modalDetails" >
                            <i class="fa fa-eye" aria-hidden="true" style="margin-right: 20px"
                                id="details<?php echo $demande['tel']?>"
                                data-toggle="tooltip" data-placement="top" title="Voir détails de la demande"
                                data-tel="<?php echo $demande['tel'] ?>" 
                                data-url = '<?php echo site_url("donneur/detailsDemande")?>'
                                >
                            </i> 
                        </a>
                        <a href="<?php echo site_url("donneur/detailsDemande").'?tel='.$demande['tel']?>">
                            <i class="fa fa-sign-in" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Participer à cette demande"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
                <!--tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th></th>
                </tfoot-->
    </table>
</div>