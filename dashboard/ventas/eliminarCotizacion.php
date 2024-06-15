<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarcotizacion = $_POST["eliminar_cotizacion"];
}

$eliminarcotizacion = (int) $eliminarcotizacion;


$sql = "DELETE FROM cotizaciones WHERE codigo_cotizacion = '$eliminarcotizacion';";
if ($conexion->query($sql) === TRUE) {
    header("Location: /dashboard/ventas/eliminar-cotizacion-exitosa.php");
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