$(document).ready(function() {
    //$('#valid').attr("disabled", true);
    $("input").prop('required',true);
    var url = $('#valid').data('url');
    var postUrl = $('#valid').data('posturl');
    var villeInput = $('#ville');
    var quartierInput = $('#quartier');
    var allInputs = $( ":input" );
    var $villes = [];
    var allInputAreValid =false;

    $.get(url,function(data){
        $villes = JSON.parse(data);
        $villes.forEach(function(ville){
            var option = '<option value="'+ville.id+'">'+ville.nom+'</option>';
            villeInput.append(option);
        })
    });

    villeInput.change(function(d) {
        var selected = $villes.find(ville => ville.id == villeInput.val());
        quartierInput.html('<option value="" disabled selected>Sélectionner votre quartier *</option>');
        selected.quartiers.forEach(function(quartier){
            var option = '<option value="'+quartier.id_quartier+'">'+quartier.nom+'</option>';
            quartierInput.append(option);
        })
    });

    
    function checkPwds(){
        if($('#pwd').val() === $('#pwdC').val()){
            return true;
        }
        else{
            $("#info").html('<em class="alert-danger">Les deux mots de passe ne sont pas identiques</em>');
            $('#valid').attr("disabled", true);
            return false;
        }
    }

    function buildGeneralParams(){
        var res = {};
        allInputs.each(function(){
            if(this.type !== 'button'){
                res[this.name] = $( this ).val();
            }
        });
        return res;
    }

      
    $('#valid').unbind().click(function(d) {
        if(checkPwds()){ 
            $.post(postUrl,
            {'user' : buildGeneralParams()},
            function(data){
                displayMessage(JSON.parse(data));
                //$("#info").html('<em>'+msg+'</em>');
          }); 
        }
        else {
            console.log(allInputAreValid);
        }
    });
    
    function displayMessage(data){
        var html = data.result ? '<em class="alert-success">' : '<em class="alert-danger">';
        html += data.msg+'</em>';
        $("#info").html(html);
    }


  });