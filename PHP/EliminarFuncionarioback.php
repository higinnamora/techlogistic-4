<?php

$conexion;
include_once "./conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminarfuncionario = $_POST["eliminarFuncionario"];
}

$sql = "DELETE FROM correos WHERE correo = '$eliminarfuncionario';";
if ($conexion->query($sql) === TRUE) {
    header("Location: ./eliminarFuncionarioExitosa.php");
} else {
    echo "Error al eliminar el elemento: " . $conexion->error;
}
$conexion->close();
?>
