<?php

$link = 'mysql:host=localhost;dbname=alumnos';
$user = "root";
$password = "fran";

try{
    $pdo = new PDO($link, $user, $password);    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //  echo 'Conectado';
} catch(PDOException $e){
    die("Lo sentimos! Algo anduvo mal. Por favor, intente mas tarde." . $e->getMessage());
}

?>