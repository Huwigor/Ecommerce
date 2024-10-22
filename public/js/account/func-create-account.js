$(document).ready(function(){

    $('#btn-criar-conta').click(function(e){
        e.preventDefault();
  

    var usuario = $('#usuario-create').val();
    var senha = $('#senha-create').val();
    var reptsenha = $('#rept-senha').val();

    if (reptsenha !== senha) {
        alert("As senhas não coincidem");
        return;
    }

        $.ajax({
            url: '../../functions/create-account.php',
            type: 'POST',
            data: {
                usuario,
                senha
            },
            success: function(response){
                alert(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }

        });

    });

});