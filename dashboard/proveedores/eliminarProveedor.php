<?php

$conexion;
include_once "../../conexion_a_la_DB.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarven = $_POST["eliminarProveedor"];
}

$sql = "DELETE FROM proveedor WHERE nit = '$eliminarven';";
if ($conexion->query($sql) === TRUE) {
    echo "Elemento eliminado correctamente";
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
?>