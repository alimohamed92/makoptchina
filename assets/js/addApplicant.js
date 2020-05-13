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
    var redirect_url = $("#valid").data('redirect');

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

    $("#registration").validate({
        errorPlacement: function(error, element) {
        // Append error within linked label
        $(element )
        .closest( "form" )
        .find( "label[for='" + element.attr( "id" ) + "']" )
        .append( error );
        },
        errorElement: "span",
        rules: {
            tel: {
                required : true,
                minlength: 8,
                maxlength : 8
            },
            quartier : "required",
            nbr_personne : "required",
            items : "required",
            pwd: {
                required: true,
                minlength: 8
            },
            pwdC: {
                required: true,
                minlength: 8,
                equalTo : '#pwd'
            }
        },
        messages: {
            tel: {
                required: "Le numéro de téléphone est obligatoire",
                minlength: "Le téléphone doit contenir 8 chiffres",
                maxlength : "Le téléphone doit contenir 8 chiffres"
            },
            quartier: "Le quartier est obligatoire",
            pwd: {
                required: "Le mot de passe est obligatoire",
                minlength: "Le mot de passe doit contenir au moins 8 charactères"
            },
            pwdC: {
                required: "Le mot de passe est obligatoire",
                minlength: "Le mot de passe doit contenir au moins 8 charactères",
                equalTo : 'Le mot de passe ne correspond pas'
            },
            items : "Sélectionner les articles dont vous avez besoin", 
            nbr_personne: "Renseigner le nombre de personne dont vous êtes en charge"
        },
        submitHandler: function(form) {
            $.post(postUrl,{'user' : buildGeneralParams()},function(data){
                    console.log(data);
                    console.log(redirect_url);
                    displayMessage(JSON.parse(data));
            }); 
            // $("#registration").submit();
            /*if(checkPwds()){ 
                $.post(postUrl,{'user' : buildGeneralParams()},function(data){
                    displayMessage(JSON.parse(data));
                        //$("#info").html('<em>'+msg+'</em>');
                }); 
            }
            else {
                console.log(allInputAreValid);
            }*/ 
        }
    });    

      
    $('#valid').unbind().click(function(d) {
        
        
    });
    
    function displayMessage(data){
        var html = data.result ? '<em class="alert-success">' : '<em class="alert-danger">';
        html += data.msg+'</em>';
        if(data.msg == "login_redirect"){
            window.location.href = redirect_url; 
        }
        else{
            $("#msg").html(html);
        }
    }


  });