    $(document).ready(function(){

        function abrirBoxConta() {
            $('.box-btn-conta').css('display', 'block');
        }

        function exitBoxConta() {
            $('.box-btn-conta').css('display', 'none');
        }


        $('.btn-user').on('click', function(i){
        i.preventDefault();
        i.stopPropagation();
        abrirBoxConta();
        });

        $(document).on('click', function(e){
        exitBoxConta();
        });

        $('.box-btn-conta').on('click', function(b){
            b.stopPropagation();
        });

    });