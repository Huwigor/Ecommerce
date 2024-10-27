<?php
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha na conexão: " . $conn->connect_error]));
}

if (isset($_POST['nome'])) {
    $produtoNome = $_POST['nome'];

    $sql = "SELECT id, imagem FROM produto WHERE produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $produtoNome);
    $stmt->execute();
    $stmt->bind_result($produtoId, $imagem);
    $stmt->fetch();
    $stmt->close();

    if ($produtoId) {
        $caminhoImagem = '../functions/admin/uploads/' . $imagem;
        if (file_exists($caminhoImagem)) {
            unlink($caminhoImagem);
        }

        $sqlDelete = "DELETE FROM produto WHERE id = ?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param('i', $produtoId);
        if ($stmtDelete->execute()) {
            echo json_encode(["status" => "success", "message" => "Produto excluído com sucesso."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erro ao excluir o produto."]);
        }
        $stmtDelete->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Produto não encontrado."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Nome do produto não fornecido."]);
}

$conn->close();
?>