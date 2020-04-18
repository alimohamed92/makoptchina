<div>
    <table class="table table-striped table-hover" id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tél</th>
                <th>Quartier</th>
                <th>Ville</th>      
            </tr>
        </thead>
        <tbody>
            <?php foreach ($referents as $referent) { ?>
                    
                <tr>
                    <td> <?php echo $referent['tel'] ?> </td>
                    <td> <?php echo $referent['quartier'] ?> </td>
                    <td> <?php echo $referent['ville'] ?> </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>