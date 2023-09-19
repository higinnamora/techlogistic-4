<?php

    $user = "root";
    $server = "localhost";
<<<<<<< HEAD
    $password = "admin";
    $db = "techlogistic";
=======
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    $password = "admin";
    $db = "techlogistic";
=======
    $password = "Aura2117*";//Cambiar clave
    $db = "techlogisticdb";
>>>>>>> Stashed changes
=======
    $password = "";
    $db = "techlogisticdb";
>>>>>>> Stashed changes
>>>>>>> 2ed32f938e1c8d37ecedc97ef61bb3020f704115
    $conexion = new mysqli($server, $user, $password, $db);
    
if (!$conexion) {
    die ("error de conexion".mysqli_connect_error());
}

?>