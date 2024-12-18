<?php
    include 'php/conection.php';

    $password = $_GET['senha'];
    $email = $_GET['email'];

    $update = "UPDATE `usuario` SET `senha`=$password WHERE `email`=$email";
    $result = $conn->query($update);

    if($result){
        echo "Feito!";
    }
?>