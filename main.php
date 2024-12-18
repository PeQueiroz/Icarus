<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Tela Principal</title>
</head>

<body>
  <nav id="sidebar">
    <div id="button-expandir">
      <i class="bi bi-list-task" id="btn-exp"></i>
    </div>
    <div id="perfil" class="hidden">
      <img src="img/cara.png" alt="">
      <div id="nome-perfil">
        <h3>Pedro Queiroz</h3>
      </div>
    </div>
    <ul>
      <li class="item-menu">
        <a href="#">
          <span class="icon"><i class="bi bi-person-fill"></i></span>
          <span class="txt-link">Perfil</span>
        </a>
      </li>
      <li class="item-menu">
        <a href="#">
          <span class="icon"><i class="bi bi-gear-fill"></i></span>
          <span class="txt-link">Configurações</span>
        </a>
      </li>
    </ul>
  </nav>

  <div class="main-content">
    <h1 id="titulo-principal">Parceiros</h1>

    <div class="containe">
      <?php
      include 'php/connection.php';

      $select = "SELECT `Nome`, `Especialidade`, `Status`, ID_Funcionario FROM `funcionario`";
      $result = $connection->query($select);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $status = strtolower(htmlspecialchars($row["Status"]));

          // Adicionar o atributo href apenas se o status for online
          $link = ($status === "online") ? 'href="detalhes.php?id=' . urlencode($row["ID_Funcionario"]) . '"' : '';

          echo '<a class="info-box ' . ($status === "online" ? 'clickable' : 'disabled') . '" ' . $link . '>';
          echo '<img src="img/cara.png" alt="Imagem de ' . htmlspecialchars($row["Nome"]) . '">';
          echo '<p>' . htmlspecialchars($row["Nome"]) . '</p>';
          echo '<p>' . htmlspecialchars($row["Especialidade"]) . '</p>';
          echo '<p>Status: <span class="' . $status . '">' . htmlspecialchars($row["Status"]) . '</span></p>';
          echo '</a>';
        }
      } else {
        echo '<p>Nenhuma pessoa encontrada no banco de dados.</p>';
      }
      ?>

    </div>

    <script src="js/sidebar.js"></script>
  </div>
</body>

</html>