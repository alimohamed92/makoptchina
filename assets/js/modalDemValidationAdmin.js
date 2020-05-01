$("#validDem").on('click', function (e) {
    var $target = $(e.target);
    var url = $target.data('url');
    var articleIds = [];
    var selected = $( "input:checked" );

    selected.each(function(){
      articleIds.push(this.value);
      
    });

    function updatePageContent(tab) {
      if(tab['demande']){
        $('#demContent').html('<h4 class="alert alert-warning" role="alert"> Tous les articles liés à cette demande ont été traités</h4>')
      }
      tab['articles'].forEach(function(id){
        $( "#tr_"+id).remove();
      })
    }

    if(articleIds.length > 0){
      var tmp = articleIds.length > 1 ? 'ces besoins ont été satisfaits ?</b>' : 'ce besoin a été satisfait ?</b>';
      $("#message").html('<b>Êtes-vous sûr que '+tmp);
      $('#updateState').prop("disabled", false);
    }
    else {
      $('#updateState').prop("disabled", true);
      $("#message").html('<b>Aucun élément sélectionné, merci d\'en sélectionner dans la liste des demandes </b>');
    }
    
    $('#updateState').unbind().click(function(d) {
      if(articleIds.length > 0){ 
        $.post(url,
        {'articles' : articleIds},
        function(data){
          updatePageContent(JSON.parse(data));
          $("#message").html("<em> Mise à jour réussie ! </em>");
        }); 
        
      }
      else{
        $("#message").html("Aucune demande sélectionnée");
        $('#updateState').attr("disabled", true);
      }
    setTimeout(function() 
          {
            $('#modalConfirm').modal('hide');
            $("#message").html("");
          }, 3000);
    });  


    $('#close').click(function() {
    });  
    
});
