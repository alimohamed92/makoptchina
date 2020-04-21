$(document).ready(function() {
    $('#sub').attr("disabled", true);
    $('#tel').on('input', function() {
        setInputColor($('#tel'));
        //checkSubmit()
    });
    function setInputColor(){
        if(isValidInput('tel',  $('#tel'))){
            css = 'rgb(255, 255, 255)';
            $('#sub').attr("disabled", false);
        }
        else{
            css = 'rgb(247, 199, 199)';
            $('#sub').attr("disabled", true);
        }
        $('#tel').css("background-color",css,'!important');
    }

    $('#sub').unbind().click(function(e) {
      var url = $('#sub').data('url');
      
      $.post(url,
        {'tel' : $('#tel').val()},
        function(data){
          $('#tel').val('');
          $('#sub').attr("disabled", true);
          $("#message").html('<div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">'+data+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }); 
    
    } );

  });