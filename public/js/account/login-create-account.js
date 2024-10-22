$(document).ready(function() {
    $('.criar').click(function() {
        $('.form-wrapper').css('transform', 'translateX(-50%)'); 
        $('.img-form').removeClass('ativo'); 
        $('.img-form').eq(0).addClass('ativo');
    });

    // Quando o botão "Login" for clicado
    $('.login').click(function() {
        $('.form-wrapper').css('transform', 'translateX(0%)');
        $('.img-form').removeClass('ativo'); 
        $('.img-form').eq(1).addClass('ativo');
    });
});