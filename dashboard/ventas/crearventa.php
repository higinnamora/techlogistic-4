<?php

$conexion;
include_once "../../conexion_a_la_DB.php";


if($_SERVER["REQUEST_METHOD"] == "POST") {
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


$sql = "INSERT INTO orden_venta(id_funcionario, id_cliente, id_medio_pago, cantidad_productos, descuento, fechaFactura, observacion, subtotal, valor_Total)   
VALUES ('$funcionario', '$tipocliente', '$mediopago', '$cantidad', '$descuento', '$fechafactura', '$observa', '$subtotal', '$total');";

if ($conexion->query($sql) === TRUE) {
    echo "registro exitoso";
} else {
    echo "Error al registrar los elementos: " . $conexion->error;
}






$conexion->close();