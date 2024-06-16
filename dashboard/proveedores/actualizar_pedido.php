<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPedido = $_POST["id_pedido"];
    $idMateriaPrima = $_POST["sign-up-form-materia"];
    $idProveedor = $_POST["sign-up-form-proveedor"];
    $cantidad = $_POST["cantidad"];
    $fecha = $_POST["fechafactura"];
    $valorSinIva = $_POST["sign-up-form-siniva"];
    $iva = $_POST["sign-up-form-iva"];
    $valorConIva = $_POST["sign-up-form-coniva"];
}
$sql = "UPDATE pedidos SET id_materia_prima = '$idMateriaPrima', id_proveedor = '$idProveedor', cantidad_pedido = '$cantidad', fecha_pedido = '$fecha', 
        valor_bruto = '$valorSinIva', iva = '$iva', valor_total = '$valorConIva'
        WHERE id_pedido = '$idPedido';";

if ($conexion->query($sql) === TRUE) {
    header("Location: registro-pedido-exitoso.php");
} else {
    echo "Error al actulizar los elementos: " . $conexion->error;
}
$conexion->close();
