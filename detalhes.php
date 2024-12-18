<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detalhes.css">
    <title>Detalhes</title>
</head>

<body>
    <?php
    include 'php/connection.php';

    // Verifica se o ID foi passado via GET
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Converte o ID para um inteiro seguro

        // Consulta para obter detalhes da pessoa
        $query = "SELECT `Nome`, `Especialidade`, `Status`, `Descricao`, `Contato` FROM `funcionario` WHERE `ID_Funcionario` = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo '<div class="details-container">';
            echo '<div class="image-section">';
            echo '<img src="img/cara.png" alt="Imagem de ' . htmlspecialchars($row["Nome"]) . '">';
            echo '</div>';
            echo '<div class="info-section">';
            echo '<h1>' . htmlspecialchars($row["Nome"]) . '</h1>';
            echo '<p><strong>Especialidade:</strong> ' . htmlspecialchars($row["Especialidade"]) . '</p>';
            echo '<p>' . htmlspecialchars($row["Descricao"]) . '</p>';
            echo '<p><strong>Status:</strong> <span class="' . strtolower(htmlspecialchars($row["Status"])) . '">' . htmlspecialchars($row["Status"]) . '</span></p>';
            
            // Botão de contato com link dinâmico
            if (!empty($row["Contato"])) {
                echo '<a href="' . htmlspecialchars($row["Contato"]) . '" class="action-button" target="_blank">Entrar em Contato</a>';
            } else {
                echo '<p><em>Contato indisponível.</em></p>';
            }
            echo '<a href="main.php" class="back-button">Voltar</a>';

            echo '</div>';
            echo '</div>';
        } else {
            echo '<p>Funcionário não encontrado.</p>';
        }
    } else {
        echo '<p>ID inválido.</p>';
    }
    ?>

</body>

</html>