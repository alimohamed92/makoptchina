$("a[id*='a_']").on('click', function (e) {
    var $target = $(e.target);
    var url = $target.data('url');
    var tel = $target.data('tel');
  
    function updatePageContent() {
      var tr = document.getElementById(tel);
      tr.hidden = true;
    }
    $("#message").html('<div class="alert alert-danger" role="alert">L’opération de suppression est irréversible êtes-vous sûr de vouloir continuer ?</div>');
    $('#confirmDelete').unbind().click(function(d) {
        $.post(url,
        {'tel' : tel},
        function(){
          updatePageContent();
          $("#message").html("<em> L'utilisateur <b>"+tel+"</b> a été supprimé </em>");
        }); 
    setTimeout(function() 
          {
            $('#modalSupprim').modal('hide');
            $("#message").html("");
          }, 3000);
    });  

    $('#close').click(function() {
    });  
    
});
