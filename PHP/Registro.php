<?php
$conexion;
include_once "conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = $_POST["sign-up-form-cedula"];
    $nombre1 = $_POST["sign-up-form-name1"];
    $nombre2 = $_POST["sign-up-form-name2"];
    $apellido1 = $_POST["sign-up-form-apellido1"];
    $apellido2 = $_POST["sign-up-form-apellido2"];
}

$sql = "INSERT INTO personas(no_documento, primer_nombre, segundo_nombre, primer_apellido, Segundo_apellido)   
            VALUES ('$cedula', '$nombre1', '$nombre2', '$apellido1', '$apellido2')";

if ($conexion->query($sql) === TRUE) {
    header("Location: registro-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}

$conexion->close();
