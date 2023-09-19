<?php

    $user = "root";
    $server = "localhost";
<<<<<<< Updated upstream
    $password = "admin";
    $db = "techlogistic";
=======
    $password = "";
    $db = "techlogisticdb";
>>>>>>> Stashed changes
    $conexion = new mysqli($server, $user, $password, $db);
    
if (!$conexion) {
    die ("error de conexion".mysqli_connect_error());
}

?>