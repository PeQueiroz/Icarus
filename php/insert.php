<?php
    include "connection.php";

    $nome = $_GET['nome_cadastro'];
    $email = $_GET['email_cadastro'];
    $senha = $_GET['senha_cadastro'];

    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $insert = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$hash')";
    $result = $connection->query($insert); 

    if($result){
        echo "cadastrado com sucesso!";
    }
    else{
        echo "Erro ao cadastrar!";
   }

?>