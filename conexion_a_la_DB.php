<?php

    $user = "root";
    $server = "localhost";
<<<<<<< Updated upstream
    $password = "admin";
    $db = "techlogistic";
=======
    $password = "Aura2117*";//Cambiar clave
    $db = "techlogisticdb";
>>>>>>> Stashed changes
    $conexion = new mysqli($server, $user, $password, $db);
    
if (!$conexion) {
    die ("error de conexion".mysqli_connect_error());
}

?>