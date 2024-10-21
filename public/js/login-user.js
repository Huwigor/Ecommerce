$(document).ready(function(){

    function abrirBoxLogin() {
          $('.box-btn-conta').css('display', 'block');
    }

    function fecharBoxLogin() {
        $('.box-btn-conta').css('display', 'none');
  }

  $('.btn-user').on('click', function(event){
    event.stopPropagation();
    abrirBoxLogin();
  });

  $('.btn-user').on('hover', function(event){
    event.preventDefault();
    abrirBoxLogin();
  });

  $(document).on('click', function(event){
    event.preventDefault();
    fecharBoxLogin();
  });

});