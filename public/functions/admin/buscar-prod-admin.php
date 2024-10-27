<?php
$host = 'localhost';     
$db = 'ecommerce';     
$user = 'root'; 
$pass = '';   

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha na conexão: " . $conn->connect_error]));
}

if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];

    $sql = "SELECT * FROM produto WHERE produto LIKE ?";
    $stmt = $conn->prepare($sql);
    $busca = "%$busca%";
    $stmt->bind_param('s', $busca);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
        echo json_encode($produto);
    } else {
        echo json_encode(null); 
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Parâmetro de busca inválido."]);
}

$conn->close();
?>