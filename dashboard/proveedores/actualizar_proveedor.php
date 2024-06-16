<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProveedor = $_POST["id_proveedor"];
    $nit = $_POST["nit"];
    $razonSocial = $_POST["razonSocial"];
}
$sql = "UPDATE proveedores SET nit = '$nit', razon_social = '$razonSocial'
        WHERE id_proveedor = '$idProveedor';";

if ($conexion->query($sql) === TRUE) {
    header("Location: registrar-proveedor-exitoso.php");
} else {
    echo "Error al actulizar los elementos: " . $conexion->error;
}
$conexion->close();
