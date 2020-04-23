<div>
    <?php 
      function echoUserType($i){
        switch ($i) {
            case ADMIN:
                echo "ADMIN";
                break;
            case USER_D:
                echo "DONNEUR";
                break;
            case USER_R:
                echo "DEMANDEUR";
                break;
        }
      }
    ?>
    <table class="table table-striped table-hover table-bordered" id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tél</th>
                <th>Quartier</th>
                <th>Nb signalement</th> 
                <th><span class="fa fa-cogs"></span></th>     
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                    
                <tr id="<?php echo $user['tel_s'] ?>" class="table-warning">
                    <td> <?php echo $user['tel_s'] ?> </td>
                    <td> <?php echo $user['quartier'].' '.$user['ville'] ?> </td>
                    <td> <?php echo $user['nbSignal'] ?> </td>
                    <td style="text-align: center">
                        <a href="#" class="fa fa-times" id="a_<?php echo $user['tel_s'] ?>"
                           data-toggle="modal" data-target="#modalSupprim" 
                           data-tel="<?php echo $user['tel_s'] ?>" 
                           data-url = '<?php echo site_url("admin/supprimUser")?>'>
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>