$("i[id*='details']").on('click', function (e) {
    var $target = $(e.target);
    var tableContent = "";
    var tel = $target.data('tel');
    var url = $target.data('url');
    loadMoadalValues();
  
    function loadMoadalValues(){
      $.get(url + '?tel=' + tel + '&view=true',function(data){
          data = JSON.parse(data);
          data.forEach(function(article){
              var cmt = article.comment.length <= 90 ? article.comment : article.comment.substring(0,89) + '...';
              var tmp = cmt ? '' : 'Pourriez-vous m’assister avec un peu de'+ article.nom +' selon vos capacités ?'; 
            tableContent += "<tr> <th >" + article.nom + "</th><td>" +cmt + tmp + "</td></tr>";
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
