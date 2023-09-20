<?php
$conexion;
include_once "../../conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $producto = $_POST["producto"];
  $funcionario = $_POST["funcionario"];
  $producto = $_POST["producto"];
  $material = $_POST["material"];
  $modelo = $_POST["modelo"];
  $precio = $_POST["precio"];
  $talla = $_POST["talla"];
  $color = $_POST["color"];
  $ubicacion = $_POST["ubicacion"];
}


$sql = "UPDATE producto SET material = '$material', nombre_producto = '$producto', modelo = '$modelo', precio = '$precio', talla = '$talla', color_producto = '$color', ubicacion = '$ubicacion'
        WHERE codigo_producto = '$producto';";

if ($conexion->query($sql) === TRUE) {
  header("Location: actualizar-producto-exitoso.php");
} else {
  echo "Error al actualizar los elementos: " . $conexion->error;
}