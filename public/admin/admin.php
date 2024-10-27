<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../user/account/login-create-account.html");
    exit();
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin/admin-index.css">
    <link rel="stylesheet" href="../css/admin/cad-prod.css">
    <link rel="stylesheet" href="../css/admin/edit-prod.css">
    <link rel="stylesheet" href="../css/admin/products.css">
    <link rel="stylesheet" href="../css/admin/footer-admin.css">
    <title>SeuPet</title>
</head>
<body>

<script>
    $(document).ready(function() {
        $('.btn-adicionar-produto').on('click', function() {
            $('html, body').animate({
                scrollTop: $('.box-txt-cad').offset().top
            }, 800); 
        });

        $('.btn-editar-produto').on('click', function() {
            $('html, body').animate({
                scrollTop: $('.form-edit-prod').offset().top
            }, 800); 
        });
    });
</script>

    <div class=" header d-flex">
        <div class="d-flex box-tittle">
            <h1>SeuPet</h1>
            <img src="../icons/icons8-pets-64.png" alt="" height="40px">
        </div>
            <div class="box-buttons">
                <button class="btn-adicionar-produto">Adicionar Produto</button>
                <button class="btn-editar-produto">Editar Produtos</button>
                <button>Monitoramento</button>
            </div>
            <div class="box-conta">
                <button class="btn-user">Olá <span style="color: green;"><?php echo $usuario ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="height:20px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                </svg>
                </button>
                <div class="box-btn-conta">
                    <button class="btn-conta" onclick="window.location.href='../functions/logout.php'">Sair</button>
                </div>
            </div>
    </div>
  
    <div  class="text-center box-input-busca">
        <input type="text" id="campoDeBusca" placeholder="Encontre o produto que procura!">
    </div>
    <div class="box-products text-center">
        <button class="prev">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="height: 30px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
        </button>
         <div class="list-products mx-auto">
        </div>
        <button class="next">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="height: 30px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
        </button>
    </div>


    <div class="box-cad-prod">
        <div class="box-cadastro-produto">
            <div style="width: 100%;" class="text-center box-txt-cad">
                <h1>Adicionar Produtos</h1>
            </div>
            <div class="form-cadastro-prod mx-auto">
                <input type="text" id="produto" class="inputs" placeholder="Produto" required>
                <br>
                <input type="text" id="valor" class="inputs" placeholder="Valor" required>
                <br>
                <input type="file" id="img" class="inputs" required>
                <br>
                <input type="text" id="fornecedor" class="inputs" placeholder="Fornecedor" required>
                <br>
                <textarea name="" id="descricao" placeholder="Descrição" rows="3"></textarea>
                <br>
                <div style="width: 100%;" class="text-center">
                    <button class="btn-adc-prod mt-4 btn btn-sm btn-primary">Adicionar Produto</button>
                </div>
            </div>
        </div>
        <div class="box-msg-error">
             <p class="msg-error"></p>
        </div>
    </div>


    <div style="width: 100%; " class="input-busca">
        <div class="box-input mx-auto text-center">
            <input type="text" id="busca" placeholder="Busca por Nome">
            <button class="btn-busca">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="height: 30px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>                  
            </button>
        </div>
    </div>

    <div class="box-edit-prod">
        <div style="width: 100%;" class="text-center">
            <h1>Editar/Excluir Produtos</h1>
        </div>
       <div class="form-edit-prod mx-auto">
            <input type="text" class="input-edit" id="edit-prod" placeholder="" required>
            <br>
            <input type="text" class="input-edit" id="edit-valor" placeholder="" required>
            <br>
            <input type="file" class="input-edit" id="edit-img">
            <br>
            <textarea name="" id="edit-descricao" class="" rows="3"></textarea>
            <br>
            <input type="text" class="input-edit" id="edit-fornecedor" required>
            <br>
            <div style="width: 100%;" class="text-center mt-4">
                <button class="btn btn-sm btn-primary btn-edit">Editar</button>
                <button class="btn btn-sm btn-danger btn-excluir">Excluir</button>
            </div>
       </div>
    </div>



    <div class="footer">
        <div class="d-flex box-logo-footer">
            <h1>SeuPet</h1>
            <img src="../icons/icons8-pets-64.png" alt="" height="40px">
        </div>
        <div class="text-center box-tittle-footer">
          <h5>Desenvolvido por Huwigor Meira</h5>
        </div>
    </div>



    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../js/admin/func-ad-prod.js"></script>
    <script src="../js/admin/func-edit-prod.js"></script>
    <script src="../js/admin/conta-admin.js"></script>
    <script src="products-admin.js"></script>
    <script src="../js/admin/excluir-prod.js"></script>

</body> 
</html>   