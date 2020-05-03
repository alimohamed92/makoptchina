$(document).ready(function() {
    $('#valid').attr("disabled", true);
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

    allInputs.each(function(){
        var input = $( this ); 
        if(this.type !== 'button'){
          input.on('input',function(){
            CheckInput(this);
            checkAllEnableInput();
            $("#info").html('');
          });
        }   
    });

    function CheckInput(input){
        if(isValidInput(input.type,  $(input))){
            css = 'rgb(255, 255, 255)';
        }
        else{
            css = 'rgb(247, 199, 199)';
        }
        $(input).css("background-color",css,'!important');
    }

    function checkAllEnableInput(){
        allInputAreValid = true;
        allInputs.each(function(){
        if(this.type !== 'button'){
           var input = $( this );
           allInputAreValid = allInputAreValid && isValidInput(this.type,input);
           CheckInput(this);
          }
        });
        $("#valid").attr("disabled",!allInputAreValid);
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

      
    $('#valid').unbind().click(function(d) {
        if(allInputAreValid && checkPwds()){ 
          $.post(postUrl,
          {'user' : buildGeneralParams()},
          function(data){
            displayMessage(JSON.parse(data));
            //$("#info").html('<em>'+msg+'</em>');
          }); 
        }
    });
    
    function displayMessage(data){
        var html = data.result ? '<em class="alert-success">' : '<em class="alert-danger">';
        html += data.msg+'</em>';
        $("#info").html(html);
    }

  });