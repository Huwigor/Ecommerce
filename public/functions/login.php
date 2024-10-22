<?php
session_start();  

$host = 'localhost'; 
$db = 'ecommerce'; 
$user = 'root'; 
$password = ''; 

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die('Falha de conexão: ' . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if (empty($usuario) || empty($senha)) {
    echo 'Por favor, preencha todos os campos.';
    exit();
}

$sql = "SELECT * FROM usuario WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verifica a senha
    if (password_verify($senha, $user['senha'])) {
        // Armazena informações do usuário na sessão
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['id'] = $user['id'];

        echo 'True';  
    } else {
        echo 'Senha incorreta.';
    }
} else {
    echo 'Usuário não encontrado.';
}

$conn->close();
?>