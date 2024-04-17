<?php
$conexion;
include_once "conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = $_POST["sign-up-form-cedula"];
    $numcargo = $_POST["sign-up-form-numcargo"];
    $cargo = $_POST["sign-up-form-cargo"];
    $nombre1 = $_POST["sign-up-form-name1"];
    $nombre2 = $_POST["sign-up-form-name2"];
    $apellido1 = $_POST["sign-up-form-apellido1"];
    $apellido2 = $_POST["sign-up-form-apellido2"];
    $email = $_POST["sign-up-form-email"];
    $contra = $_POST["sign-up-form-password"];
    $confcontra = $_POST["sign-up-form-password-confirm"];
}

$sql = "INSERT INTO personas(no_documento, primer_nombre, segundo_nombre, primer_apellido, Segundo_apellido)   
            VALUES ('$cedula', '$nombre1', '$nombre2', '$apellido1', '$apellido2')";
$sql2 = "INSERT INTO correos ( id_persona, correo, password) 
            values( '$numcargo', '$email', '$contra')";

if ($conexion->query($sql) === TRUE) {
    header("Location: registro-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
if ($conexion->query($sql2)) {
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}





$conexion->close();