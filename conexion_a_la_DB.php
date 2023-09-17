<?php

$user = "root";
    $server = "localhost";
    $password = "";
    $db = "techlogisticdb";
    $conexion = new mysqli($server, $user, $password, $db);



if (!$conexion) {
    die ("error de conexion".mysqli_connect_error());
}

?>