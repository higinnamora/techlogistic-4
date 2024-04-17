<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numventa = $_POST["numerodeventa"];
    $cantidad = $_POST["cantidad"];
    $descuento = $_POST["descuento"];
    $fechafactura = $_POST["fechafactura"];
    $observa = $_POST["observacion"];
    $subtotal = $_POST["subtotal"];
    $total = $_POST["totalapagar"];
}


$sql = "UPDATE orden_venta SET cantidad_productos = '$cantidad',
       descuento = '$descuento', fecha_factura = '$fechafactura', observacion = '$observa',
       subtotal = '$subtotal', valor_Total = '$total' WHERE numero_orden_venta = '$numventa';";

if ($conexion->query($sql) === TRUE) {
    header("Location: actualizar-venta-exitosa.php");
} else {
    echo "Error al actulizar los elementos: " . $conexion->error;
}






$conexion->close();




?>