<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario = $_POST["sign-up-form-funcionario"];
    $color = $_POST["sign-up-form-color"];
    $precio = $_POST["sign-up-form-precio"];
    $cantidad = $_POST["sign-up-form-cantidad"];
    $descripcion = $_POST["sign-up-form-descripcion"];
}
$sql = "INSERT INTO materia_prima(id_funcionario, color_materia, precio, cantidad_materia, descripcion_materia, categoria_materia_id_categoria)   
        VALUES ('$funcionario', '$color', '$precio', '$cantidad', '$descripcion', '1');";

if ($conexion->query($sql) == TRUE) {
    header("Location: registro-materia-exitosa.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();