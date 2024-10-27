<?php

$host = 'localhost';     
$db = 'ecommerce';     
$user = 'root'; 
$pass = '';   

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha na conexão: " . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = $_POST['produto'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $fornecedor = $_POST['fornecedor'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img = $_FILES['img'];

        $nome_img = uniqid() . '-' . basename($img['name']);
        $upload_dir = 'uploads/'; 
        $upload_file = $upload_dir . $nome_img;

        if (move_uploaded_file($img['tmp_name'], $upload_file)) {
            $sql = "INSERT INTO produto (produto, valor, descricao, imagem, fornecedor) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $produto, $valor, $descricao, $nome_img, $fornecedor);

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Produto adicionado com sucesso!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Erro ao adicionar produto: " . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao mover a imagem para a pasta uploads."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Erro no upload da imagem."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Requisição inválida."]);
}

$conn->close();
?>