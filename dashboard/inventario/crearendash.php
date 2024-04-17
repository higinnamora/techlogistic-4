<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_func = $_POST["id_funcionario"];
    $material = $_POST["material"];
    $nombrepro = $_POST["nombreproducto"];
    $modelo = $_POST["modelo"];
    $preciopro = $_POST["precio"];
    $talla = $_POST["talla"];
    $color = $_POST["color"];
    $ubicacion = $_POST["ubicacion"];
}


$sql = "INSERT INTO producto (id_funcionario, material, nombre_producto, modelo, precio, talla, color_producto, ubicacion) 
        VALUES('$id_func', '$material', '$nombrepro', '$modelo', '$preciopro', '$talla', '$color', '$ubicacion');";

if ($conexion->query($sql) === TRUE) {
    header("Location: ./crear-inventario-exitoso.php");
} else {
    echo "fallo el registro del producto";
}


$conexion->close();










?>