$(document).ready(function() {
    $('#subDem').attr("disabled", true);
    var url = $('#subDem').data('url');
    var selected = $("input:checked");
    var articles = [];
    $("input").change(function(d) {
      selected = $("input:checked");
      $('#subDem').attr("disabled", selected.length === 0); 
      $("#message").html("");
    });


    $('#subDem').unbind().click(function(d) {
        selected.each(function(){
          articles.push(this.value);
        });
        if(articles.length > 0){ 
          $.post(url,
          {'articles' : articles},
          function(data){
            $("#demContent").html('<em class="alert-success"> Nouvelle demande prise en compte </em>');
          }); 
        }
        else{
          $("#message").html("Aucun article sélectionné");
          $('#subDem').attr("disabled", true);
        }
    });  

  });