<?php


$user = "root";
$server = "localhost";
$password = "root";
$db = "techlogistic";

//Conexion al servidor
/*
$user = "educand4";
$server = "localhost";
$password = "educandome.org";
$db = "educand4_techlogistic";*/

$conexion = new mysqli($server, $user, $password, $db);

if (!$conexion) {
    die("error de conexion" . mysqli_connect_error());
}
