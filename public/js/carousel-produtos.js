$(document).ready(function() {
    var $produtos = $('.produtos');
    var totalProdutos = $produtos.length;
    var currentIndex = 0;

    function mostrarProduto(index) {
        $produtos.removeClass('ativo'); 
        $produtos.eq(index).addClass('ativo');  
    }

    $('.next').click(function() {
        currentIndex = (currentIndex + 1) % totalProdutos;  
        mostrarProduto(currentIndex);
    });

    $('.prev').click(function() {
        currentIndex = (currentIndex - 1 + totalProdutos) % totalProdutos;  
        mostrarProduto(currentIndex);
    });
});