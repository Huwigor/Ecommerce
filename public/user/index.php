<?php
session_start();
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/user/index.css">
    <link rel="stylesheet" href="../css/user/carousel-products.css">
    <title>SeuPet</title>
    <style>
        body{
            background-color: #0e0f0f;
        }
    </style>
</head>
<body>


    <div class="d-flex header">
        <div class="d-flex box-tittle">
            <h1>SeuPet</h1>
            <img src="../icons/icons8-gato-64.png" alt="" height="40px">
        </div>
        <div class="d-flex box-buttons">
            <button>Home</button>
            <button>Produtos</button>
            <button>Central de ajuda</button>
        </div>
        <?php if (!$usuario): ?>
            <div class="box-conta">
                <button class="btn-user" onclick="window.location.href='account/login-create-account.html'">Sua Conta</button>
            </div>
        <?php else: ?>
            <div class="box-usuario">
            <button class="btn-user">Olá, <span style="color: green;"><?php echo $usuario; ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="height: 20px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                </svg>
            </button>
                <div class="box-btn-user">
                    <button class="btn-func-user">Seus Dados</button>
                    <button class="btn-func-user">Carrinho de Compras</button>
                    <button class="btn-func-user" class="btn-sair" onclick="window.location.href='../functions/logout.php'">Sair</button>
                </div>
            </div>
        <?php endif; ?>
    </div>




    <div class="box-produtos">
        <div class="lista-produtos">
            <div class="produtos ativo">
                <h1 class="text-center">PRODUTO 1</h1>
            </div>
            <div class="produtos">
                <h1 class="text-center">PRODUTO 2</h1>
            </div>
            <div class="produtos">
                <h1 class="text-center">PRODUTO 3</h1>
            </div>
        </div>
        <button class="prev">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 svg-btn-conta">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>              
        </button>
        <button class="next">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 svg-btn-conta">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>              
        </button>
    </div>
 


    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../js/login-user.js"></script>
    <script src="../js/carousel-produtos.js"></script>
    
</body>
</html>