<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nit = $_POST["sign-up-form-nit"];
    $persona = $_POST["sign-up-form-persona"];
    $razonSocial = $_POST["sign-up-form-razon"];
}
$sql = "INSERT INTO proveedores(nit, id_persona, razon_social)   
        VALUES ('$nit', '$persona', '$razonSocial');";

if ($conexion->query($sql) == TRUE) {
    header("Location: registrar-proveedor-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();