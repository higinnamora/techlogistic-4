<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idmateriaprima = $_POST["idmateriaprima"];
    $colormateria = $_POST["colormateria"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
}
$sql = "UPDATE materia_prima SET color_materia = '$colormateria',
       precio = '$precio', cantidad_materia = '$cantidad', descripcion_materia = '$descripcion' 
       WHERE id_materia_prima = '$idmateriaprima';";

if ($conexion->query($sql) === TRUE) {
    header("Location: actualizar-materia-exitosa.php");
} else {
    echo "Error al actulizar los elementos: " . $conexion->error;
}
$conexion->close();
