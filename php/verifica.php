<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['senha'])) {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $senha = $conn->real_escape_string(trim($_POST['senha']));

    $sql = "SELECT * FROM usuario WHERE Email = '$email' AND Senha = '$senha'";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        echo json_encode(["status" => "sucesso", "mensagem" => "Login realizado com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Email ou senha incorretos."]);
    }
} else {
    echo json_encode(["status" => "erro", "mensagem" => "Dados inválidos ou incompletos."]);
}

?>
