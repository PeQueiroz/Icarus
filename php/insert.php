<?php
    include '/php/conection.php';

    $nome = $_GET['nome_cadastro'];
    $email = $_GET['email_cadastro'];
    $senha = $_GET['senha_cadastro'];

    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $insert = "INSERT INTO usuario (id, nome, email, senha) VALUES (NULL, '$nome', '$email', '$hash')";

   $resultado = $conection->query($insert); 

    if($resultado == TRUE){
        echo "cadastrado com sucesso !";
}
    else{
        echo "Erro ao cadastrar !";
   }

?>