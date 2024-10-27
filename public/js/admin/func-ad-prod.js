$(document).ready(function() {
    $('.btn-adc-prod').click(function(e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('produto', $('#produto').val());
        formData.append('valor', $('#valor').val());
        formData.append('fornecedor', $('#fornecedor').val());
        formData.append('descricao', $('#descricao').val());
        formData.append('img', $('#img')[0].files[0]);

        $.ajax({
            url: '../functions/admin/ad-prod.php', 
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
                var jsonResponse = JSON.parse(response);

                $('.msg-error').text(jsonResponse.message);

                if (jsonResponse.status === 'success') {
                    $('.box-msg-error').css('display', 'block');
                    $('.box-msg-error').css('border', 'green');
                } else {
                    $('.box-msg-error').css('display', 'block');
                    $('.msg-error').css('color', 'red');
                }
            },
            error: function(xhr, status, error) {
                // Exibe erro genérico
                $('.msg-error').text('Erro ao processar a requisição. Tente novamente.');
                $('.msg-error').css('color', 'red');
            }
        });
    });
});