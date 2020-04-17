$("i[id*='details']").on('click', function (e) {
    console.log('*******')
    var $target = $(e.target);
    var tableContent = "";
    var tel = $target.data('tel');
    var url = $target.data('url');
    loadMoadalValues();
  
    function loadMoadalValues(){
      $.get(url + '?tel=' + tel + '&view=true',function(data){
          data = JSON.parse(data);
          data.forEach(function(article){
            tableContent += "<tr> <th >" + article.nom + "</th><td>" + article.comment + "</td></tr>";
          });
          if(data.length === 0){
            tableContent = "<b>Pas de détails spécifié</b>"
          }
          $("#formTablex").html(tableContent);
        }); 
    }
  
    $('#close').click(function() {
    });  
    
});
