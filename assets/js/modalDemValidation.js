$("#validDem").on('click', function (e) {
    var $target = $(e.target);
    var url = $target.data('url');
    var articleIds = [];
    var selected = $( "input:checked" );

    selected.each(function(){
      articleIds.push(this.value);
      
    });

    function updatePageContent(tab) {
      tab.forEach(function(id){
        var checkBox = document.getElementById('check_'+id);
        var link = document.getElementById('a_'+id);
        checkBox.setAttribute("disabled", "");
        checkBox.checked = false;
        link.setAttribute("data-toggle", "tooltip" );
        link.setAttribute("data-placement", "top");
        link.setAttribute("title", "en attente de confirmation");
        link.setAttribute('style',"background: #ffc10714;");
        $('[data-toggle="tooltip"]').tooltip();
      })
    }

    if(articleIds.length > 0){
      var tmp = articleIds.length > 1 ? 'ces demandes ?</b>' : 'cette demande ?</b>';
      $("#message").html('<b>Certifiez-vous avoir satisfait '+tmp);
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
      setTimeout(function() {
        $('#modalConfirm').modal('hide');
        $("#message").html("");
        $('#validDem').attr("disabled",true);
      }, 3000);
    });  


    $('#close').click(function() {
    });  
    
});
