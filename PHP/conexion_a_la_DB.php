<?php

$user = "root";
$server = "localhost";
$password = "admin";
$db = "techlogistic";

//Conexion al servidor
/*
$user = "educand4_techlogistic";
$server = "localhost";
$password = "educand4_techlogistic";
$db = "educand4_techlogistic";*/

$conexion = new mysqli($server, $user, $password, $db);

if (!$conexion) {
    die("error de conexion" . mysqli_connect_error());
}

?>