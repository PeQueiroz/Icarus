<?php 

    $dbHost = "localhost:3307";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "icarus";

    $conection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conection){
     echo 'conectado';
    }


?>