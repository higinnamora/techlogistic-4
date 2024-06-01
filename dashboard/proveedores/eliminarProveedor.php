<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarven = $_POST["eliminarProveedor"];
}

$sql = "DELETE FROM proveedores WHERE nit = '$eliminarven';";
if ($conexion->query($sql) === TRUE) {
    header("Location: eliminar-proveedor-exitoso.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
