<?php
    include 'connection.php';

    $nome = $_GET['nome'];
    $especialidade = $_GET['especialidade'];

    $insert = "INSERT INTO `funcionario`(`Nome`, `Especialidade`, `Status`) VALUES ('$nome','$especialidade', 'offline')";
    $result = $connection->query($insert);
?>