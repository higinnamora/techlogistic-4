<?php
$conexion;
include_once "conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = $_POST["documento"];
    $nombre1 = $_POST["primer_nombre"];
    $nombre2 = $_POST["segundo_nombre"];
    $apellido1 = $_POST["primer_apellido"];
    $apellido2 = $_POST["segundo_apellido"];
}
$sql = "UPDATE personas SET primer_nombre = '$nombre1', segundo_nombre = '$nombre2', primer_apellido = '$apellido1', segundo_apellido = '$apellido2'
        WHERE no_documento = '$cedula';";

if ($conexion->query($sql) === TRUE) {
    header("Location: registro-exitoso.php");
} else {
    echo "Error al actulizar los elementos: " . $conexion->error;
}
$conexion->close();