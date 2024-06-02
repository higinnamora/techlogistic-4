<?php
include_once "conexion_a_la_DB.php";
if (isset($_GET['id'])) {

    $no_documento = mysqli_real_escape_string($conexion, $_GET['id']);

    $sql = "SELECT id_persona, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM personas WHERE no_documento = '$no_documento'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);
            echo json_encode($fila);
        } else {
            echo json_encode(array('error' => 'No se encontró ninguna persona con el ID proporcionado.'));
        }
    } else {
        echo json_encode(array('error' => 'Error al consultar la base de datos.'));
    }
} else {
    echo json_encode(array('error' => 'No se proporcionó ningún ID de persona.'));
}