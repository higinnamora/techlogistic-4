<?php
$conexion;
include_once "../../conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nit = $_POST["nit"];
  $idPersona = $_POST["idPersona"];
  $razonSocial = $_POST["razonSocial"];
}


$sql = "UPDATE proveedor SET nit = '$nit', id_persona = '$idPersona', razon_social = '$razonSocial' WHERE nit = '$nit';";

if ($conexion->query($sql) === TRUE) {
  header("Location: /dashboard/proveedores/actualizar-proveedor-exitoso.php");
} else {
  echo "Error al actualizar los elementos: " . $conexion->error;
}