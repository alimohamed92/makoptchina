<!-- end base divs-->
    </div>
</div>

<!-- footer-->
    <div class=" border shadow" style="text-align: center;">
    <footer class=" col-md-12 ">
                <div class="panel panel-body">
                <p style="margin-top: 15px">&copy; Alhery 2020 </p>
                </div>
    </footer>
    </div>

<!-- includ scripts-->
  
    <script src="<?php echo base_url() ?>assets/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/mainSidebar.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
          $('#example').DataTable({
            "language": {
                "url": "/assets/js/dataTables.fr.lang"
            }
          });
      } );

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    </script>
</body>
</html>