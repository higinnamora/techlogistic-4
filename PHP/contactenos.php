<?php
$conexion;
$correo = '';
$id_persona = 1;
$pass = '';

include_once "conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["email"];
}

$sql = "INSERT INTO correos(id_persona, correo, password)   
            VALUES ('$id_persona', '$correo', '$pass')";

if ($conexion->query($sql) === TRUE) {
    header("Location: ./contactenos-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();