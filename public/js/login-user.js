$(document).ready(function(){

    function abrirBoxLogin() {
          $('.box-btn-conta').css('display', 'block');
    }

    function fecharBoxLogin() {
        $('.box-btn-conta').css('display', 'none');
    }
    
    function abrirBoxUser() {
        $('.box-btn-user').css('display', 'block');
    }

    function fecharBoxUser() {
      $('.box-btn-user').css('display', 'none');
    }

    $('.btn-user').on('click', function(e){
      e.stopPropagation();
      abrirBoxLogin();
      abrirBoxUser();
    });

    $('.btn-user').on('hover', function(c){
      c.preventDefault();
      abrirBoxLogin();
      abrirBoxUser();
    });

    $(document).on('click', function(b){
      b.preventDefault();
      fecharBoxLogin();
      fecharBoxUser();
    });

});