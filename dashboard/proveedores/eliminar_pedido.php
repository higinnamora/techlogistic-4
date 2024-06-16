<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminar = $_POST["eliminarpedido"];
}

$eliminar = (int) $eliminar;

$sql = "DELETE FROM pedidos WHERE id_pedido = '$eliminar';";
if ($conexion->query($sql) === TRUE) {
    header("Location: eliminar-pedido-exitosa.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
