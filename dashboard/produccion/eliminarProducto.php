<?php

$conexion;
include_once "../../conexion_a_la_DB.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarven = $_POST["eliminarProducto"];
}

$eliminarven = (int)$eliminarven;

$sql = "DELETE FROM materia_producto WHERE codigo_producto = '$eliminarven';";
$sql2 = "DELETE FROM cotizacion WHERE codigo_producto = '$eliminarven';";
$sql3 = "DELETE FROM stock WHERE codigo_producto = '$eliminarven';";
$sql4 = "DELETE FROM orden_venta_producto WHERE codigo_producto = '$eliminarven';";
$sql5 = "DELETE FROM producto WHERE codigo_producto = '$eliminarven';";
if ($conexion->query($sql) === TRUE) {
    
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
if ($conexion->query($sql2) === TRUE) {
    
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
if ($conexion->query($sql3) === TRUE) {
    
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
if ($conexion->query($sql4) === TRUE) {
    
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
if ($conexion->query($sql5) === TRUE) {
    header("Location: eliminar-producto-exitoso.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
?>