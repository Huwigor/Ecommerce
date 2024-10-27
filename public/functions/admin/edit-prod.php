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
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $fornecedor = $_POST['fornecedor'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Busca a imagem antiga do produto
        $sql = "SELECT imagem FROM produto WHERE produto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $produto);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto_data = $result->fetch_assoc();
        $imagem_antiga = $produto_data['imagem'];
        $stmt->close();

        $img = $_FILES['imagem'];
        $nome_img = uniqid() . '-' . basename($img['name']);
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . $nome_img;

        if (move_uploaded_file($img['tmp_name'], $upload_file)) {
            if ($imagem_antiga && file_exists($upload_dir . $imagem_antiga)) {
                unlink($upload_dir . $imagem_antiga);
            }

            $sql = "UPDATE produto SET valor = ?, descricao = ?, fornecedor = ?, imagem = ? WHERE produto = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $valor, $descricao, $fornecedor, $nome_img, $produto);

            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Produto atualizado com sucesso!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Erro ao atualizar produto: " . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao mover a imagem para o diretório uploads."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Nenhuma nova imagem enviada. O produto não foi atualizado."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Requisição inválida."]);
}

$conn->close();
?>