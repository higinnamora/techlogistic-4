<?php

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminar = $_POST["eliminarmateria"];
}

$eliminar = (int) $eliminar;

$sql = "DELETE FROM materia_prima WHERE id_materia_prima = '$eliminar';";
if ($conexion->query($sql) === TRUE) {
    header("Location: eliminar-materia-exitosa.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
