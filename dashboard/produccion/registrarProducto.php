<?php
$conexion;
include_once "../../conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $funcionario = $_POST["sign-up-form-funcionario"];
    $material = $_POST["sign-up-form-material"];
    $producto = $_POST["sign-up-form-producto"];
    $modelo = $_POST["sign-up-form-modelo"];
    $precio = $_POST["sign-up-form-precio"];
    $talla = $_POST["sign-up-form-talla"];
    $color = $_POST["sign-up-form-color"];
    $ubicacion = $_POST["sign-up-form-ubicacion"];
}
$sql = "INSERT INTO producto(id_funcionario, material, nombre_producto, modelo, precio, talla, color_producto, ubicacion)   
        VALUES ('$funcionario', '$material', '$producto', '$modelo', '$precio', '$talla', '$color', '$ubicacion');";

if ($conexion->query($sql) == TRUE) {
    header("Location: registrar-producto-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();