<?php

$conexion;
include_once "../../conexion_a_la_DB.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $estadopro = $_POST["estadoproducto"];
}


$sql = "UPDATE stock SET cantidad_stock = '$cantidad',
       descripcion_stock = '$descripcion', estado = '$estadopro' WHERE id_stock = '$codigo';";

if ($conexion->query($sql) === TRUE) {
    header("Location: actualizar-inventario-exitoso.php");
} else {
    echo "Error al actulizar los elementos: " . $conexion->error;
}






$conexion->close();