<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminar = $_POST["eliminarProducto"];
}

$eliminar = (int) $eliminar;

$sql = "DELETE FROM producto WHERE codigo_producto = '$eliminar';";
if ($conexion->query($sql) === TRUE) {
    header("Location: eliminar-producto-exitoso.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();