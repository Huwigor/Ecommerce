$(document).ready(function() {
    $('.btn-excluir').click(function() {
        const produtoNome = $('#edit-prod').val(); // Obtém o nome do produto

        if (!produtoNome) {
            alert("Nome do produto não encontrado!");
            return;
        }

        if (confirm("Tem certeza que deseja excluir este produto? Esta ação é irreversível.")) {
            $.ajax({
                url: '../admin/excluir-prod.php',
                type: 'POST',
                dataType: 'json',
                data: { nome: produtoNome },
                success: function(response) {
                    if (response.status === 'success') {
                        alert("Produto excluído com sucesso!");
                        $('#edit-prod').val('');
                        $('#edit-valor').val('');
                        $('#edit-img').val('');
                        $('#edit-descricao').val('');
                        $('#edit-fornecedor').val('');
                    } else {
                        alert("Erro ao excluir produto: " + response.message);
                    }
                },
                error: function() {
                    alert("Erro ao realizar a exclusão. Tente novamente.");
                }
            });
        }
    });
});
