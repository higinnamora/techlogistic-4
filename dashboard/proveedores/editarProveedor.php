<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nit = $_POST["nit"];
  $idPersona = $_POST["idPersona"];
  $razonSocial = $_POST["razonSocial"];
}


$sql = "UPDATE proveedores SET nit = '$nit', id_persona = '$idPersona', razon_social = '$razonSocial' WHERE nit = '$nit';";

if ($conexion->query($sql) === TRUE) {
  header("Location: actualizar-proveedor-exitoso.php");
} else {
  echo "Error al actualizar los elementos: " . $conexion->error;
}