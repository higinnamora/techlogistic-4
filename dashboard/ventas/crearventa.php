<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario = $_POST["funcionario"];
    $id_persona = $_POST["id_persona"];
    $mediopago = $_POST["mediodepago"];
    $fechafactura = $_POST["fechafactura"];
    $documento = $_POST["documento"];
    $nombrecliente = $_POST["primer_nombre"];
    $producto = $_POST["descripcion"];
    $cantidad = $_POST["cantidadpro"];
    $subtotal = $_POST["subtotal"];
    $total = $_POST["total"];  
}


$sql = "INSERT INTO orden_venta(id_funcionario, id_persona, id_medio_pago, fecha_factura, doc_identidad, nombre_cliente, producto, cantidad_productos, valor_Total)   
VALUES ('$funcionario', '$id_persona', '$mediopago', '$fechafactura', '$documento', '$nombrecliente', '$producto', '$cantidad', '$total');";

if ($conexion->query($sql) === TRUE) {
    header("Location: registro-venta-exitosa.php");
} else {
    echo "Error al registrar los elementos: " . $conexion->error;
}

$conexion->close();