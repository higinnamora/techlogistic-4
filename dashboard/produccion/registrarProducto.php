<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $funcionario = $_POST["funcionario"];
    $cantidad = $_POST["cantidad"];
    $producto = $_POST["producto"];
    $material = $_POST["material"];
    $precio = $_POST["precio"];
    $talla = $_POST["talla"];
    $color = $_POST["color"];
    $ubicacion = $_POST["ubicacion"];
}
$sql = "INSERT INTO producto(id_funcionario, cantidad, nombre_producto, material, precio, talla, color_producto, ubicacion)   
        VALUES ('$funcionario', '$cantidad', '$producto', '$material', '$precio', '$talla', '$color', '$ubicacion');";

if ($conexion->query($sql) == TRUE) {
    header("Location: registrar-producto-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();