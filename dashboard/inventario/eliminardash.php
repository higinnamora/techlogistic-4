<?php

$conexion;
include_once "../../conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarinv = $_POST["eliminar_inventario"];
}

$eliminarinv = (int) $eliminarinv;

//$sql = "DELETE FROM producto WHERE codigo_producto = '$eliminarinv';";
$sql2 = "DELETE FROM stock WHERE id_stock  = '$eliminarinv';";

//if ($conexion->query($sql) === TRUE) {
//   echo "Elemento eliminado correctamente";
//} else {
// echo "Error al eliminar el elemento: " . $conexion->error;
//}
if ($conexion->query($sql2) === TRUE) {
    header("Location: eliminar-inventario-exitoso.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
?>