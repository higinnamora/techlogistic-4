<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $codigoProducto = $_POST["codigo_producto"];
  $cantidad = $_POST["cantidad"];
  $producto = $_POST["producto"];
  $material = $_POST["material"];
  $precio = $_POST["precio"];
  $talla = $_POST["talla"];
  $color = $_POST["color"];
  $ubicacion = $_POST["ubicacion"];
}


$sql = "UPDATE producto SET cantidad = '$cantidad', nombre_producto = '$producto', material = '$material', precio = '$precio', talla = '$talla', color_producto = '$color', ubicacion = '$ubicacion'
        WHERE codigo_producto = '$codigoProducto';";

if ($conexion->query($sql) === TRUE) {
  header("Location: actualizar-producto-exitoso.php");
} else {
  echo "Error al actualizar los elementos: " . $conexion->error;
}
