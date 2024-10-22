<?php

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
    echo 'Preencha todos os campos.';
    exit();
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sqlVerifica = "SELECT * FROM usuario WHERE usuario = ?";
$stmt = $conn->prepare($sqlVerifica);
$stmt->bind_param('s', $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo 'O nome de usuário já está em uso.';
} else {
    $sqlInsert = "INSERT INTO usuario (usuario, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param('ss', $usuario, $senhaHash);

    if ($stmt->execute()) {
        echo 'Conta criada com sucesso!';
    } else {
        echo 'Erro ao criar a conta.';
    }
}

$conn->close();
?>