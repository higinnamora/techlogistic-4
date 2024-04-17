<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarven = $_POST["eliminar_venta"];
}

$eliminarven = (int) $eliminarven;

$sql = "DELETE FROM orden_venta_producto WHERE numero_orden_venta = '$eliminarven';";
$sql2 = "DELETE FROM orden_venta WHERE numero_orden_venta = '$eliminarven';";
if ($conexion->query($sql) === TRUE) {
    header("Location: /dashboard/ventas/eliminar-venta-exitosa.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
if ($conexion->query($sql2) === TRUE) {
    header("Location: eliminar-venta-exitosa.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
?>