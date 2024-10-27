$(document).ready(function() {
    let pagina = 1;
    const produtosPorPagina = 4;

    function buscarProdutos() {
        $.ajax({
            url: 'products-admin.php',
            type: 'POST',
            dataType: 'json',
            data: {
                busca: $('#campoDeBusca').val(),
                pagina: pagina
            },
            success: function(response) {
                if (response.status === "success") {
                    $('.list-products').fadeOut(300, function() {
                        renderizarProdutos(response.produtos);
                        ajustarMargemProdutos();
                        $('.list-products').fadeIn(300);
                    });
                    atualizarNavegacao(response.produtos.length);
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert("Erro ao buscar produtos.");
            }
        });
    }

    function renderizarProdutos(produtos) {
        const container = $('.list-products');
        container.empty();

        produtos.forEach(produto => {
            const produtoHTML = `
                <div class="products">
                    <h3>${produto.produto}</h3>
                    <img class="img-products" src="${produto.imagem}" alt="${produto.produto}">
                    <p class="valor-prod">R$<span style="color:green; font-size: 18px;">${produto.valor}</span></p>
                </div>`;
            container.append(produtoHTML);
        });
    }

    function ajustarMargemProdutos() {
        const containerWidth = $('.list-products').width();
        const productWidth = $('.products').outerWidth(true);
        const totalProductsWidth = productWidth * produtosPorPagina;

        const espacoRestante = containerWidth - totalProductsWidth;
        const margem = espacoRestante / (produtosPorPagina - 1);

        $('.products').css('margin-right', margem + 'px');
        $('.products:last-child').css('margin-right', '0');
    }

    function atualizarNavegacao(qtdProdutos) {
        $('.prev').prop('disabled', pagina === 1);
        $('.next').prop('disabled', qtdProdutos < produtosPorPagina);
    }

    $('#campoDeBusca').on('input', function() {
        pagina = 1;
        buscarProdutos();
    });

    $('.prev').click(function() {
        if (pagina > 1) {
            pagina--;
            buscarProdutos();
        }
    });

    $('.next').click(function() {
        pagina++;
        buscarProdutos();
    });

    $(window).resize(ajustarMargemProdutos); 

    buscarProdutos();
});