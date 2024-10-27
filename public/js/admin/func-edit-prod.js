$(document).ready(function() {
    $('.btn-busca').on('click', function() {
        var nomeProduto = $('#busca').val();

        if (nomeProduto.length > 2) { 
            $.ajax({
                url: '../functions/admin/buscar-prod-admin.php', 
                type: 'POST',
                data: { busca: nomeProduto },
                success: function(response) {
                    var produto = JSON.parse(response);

                    if (produto) {
                        $('#edit-prod').val(produto.produto);
                        $('#edit-valor').val(produto.valor);
                        $('#edit-descricao').val(produto.descricao);
                        $('#edit-fornecedor').val(produto.fornecedor);
                    } else {
                        alert('Produto não encontrado');
                    }
                },
                error: function() {
                    alert('Erro ao buscar produto.');
                }
            });
        }
    });

    $('.btn-edit').click(function(e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('produto', $('#edit-prod').val());
        formData.append('valor', $('#edit-valor').val());
        formData.append('descricao', $('#edit-descricao').val());
        formData.append('fornecedor', $('#edit-fornecedor').val());
        formData.append('imagem', $('#edit-img')[0].files[0]);

        $.ajax({
            url: '../functions/admin/edit-prod.php', 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var jsonResponse = JSON.parse(response);

                if (jsonResponse.status === 'success') {
                    alert(jsonResponse.message);
                } else {
                    alert(jsonResponse.message);
                }
            },
            error: function() {
                alert('Erro ao editar produto.');
            }
        });
    });
});