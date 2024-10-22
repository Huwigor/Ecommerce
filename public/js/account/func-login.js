$(document).ready(function(){

    $('#btn-login').click(function(e){
       e.preventDefault();
    
    var usuario = $('#usuario').val();
    var senha = $('#senha').val();

        $.ajax({
            url: '../../functions/login.php',
            type: 'POST',
            data: {
                usuario,
                senha
            },
            success: function(response) {    
                if (response.trim() === 'True') {
                    location.href = '../../user/index.php';
                } else {
                    alert(response);
                }
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });

    });

});