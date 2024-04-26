<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario = $_POST["funcionario"];
    $tipocliente = $_POST["tipocliente"];
    $mediopago = $_POST["mediodepago"];
    $cantidad = $_POST["cantidadpro"];
    $descuento = $_POST["descuento"];
    $fechafactura = $_POST["fechafactura"];
    $observa = $_POST["descripcion"];
    $subtotal = $_POST["subtotal"];
    $total = $_POST["total"];
}


$sql = "INSERT INTO orden_venta(id_funcionario, id_cliente, id_medio_pago, cantidad_productos, descuento, fecha_factura, observacion, subtotal, valor_Total)   
VALUES ('$funcionario', '1', '$mediopago', '$cantidad', '$descuento', '$fechafactura', '$observa', '$subtotal', '$total');";

if ($conexion->query($sql) === TRUE) {
    header("Location: registro-venta-exitosa.php");
} else {
    echo "Error al registrar los elementos: " . $conexion->error;
}

$conexion->close();