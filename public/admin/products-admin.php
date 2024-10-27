<?php
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha na conexão: " . $conn->connect_error]));
}

if (isset($_POST['busca'], $_POST['pagina'])) {
    $busca = $_POST['busca'];
    $pagina = (int) $_POST['pagina'];
    $produtosPorPagina = 4;
    $offset = ($pagina - 1) * $produtosPorPagina;

    $sql = "SELECT * FROM produto WHERE produto LIKE ? LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $busca = "%$busca%";
    $stmt->bind_param('sii', $busca, $produtosPorPagina, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    $produtos = [];

    while ($produto = $result->fetch_assoc()) {
        $produto['imagem'] = '../functions/admin/uploads/' . $produto['imagem'];
        $produtos[] = $produto;
    }

    echo json_encode(["status" => "success", "produtos" => $produtos]);

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Parâmetro de busca inválido."]);
}

$conn->close();
?>