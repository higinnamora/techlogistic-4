<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMateriaPrima = $_POST["sign-up-form-materia"];
    $idProveedor = $_POST["sign-up-form-proveedor"];
    $cantidad = $_POST["sign-up-form-cantidad"];
    $fecha = $_POST["fechafactura"];
    $valorSinIva = $_POST["sign-up-form-siniva"];
    $iva = $_POST["sign-up-form-iva"];
    $valorConIva = $_POST["sign-up-form-coniva"];
}
$sql = "INSERT INTO pedidos(id_materia_prima, id_proveedor, cantidad_pedido, fecha_pedido, valor_bruto, iva, valor_total)   
        VALUES ('$idMateriaPrima', '$idProveedor', '$cantidad', '$fecha', '$valorSinIva', '$iva', '$valorConIva');";

if ($conexion->query($sql) == TRUE) {
    header("Location: registro-pedido-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();