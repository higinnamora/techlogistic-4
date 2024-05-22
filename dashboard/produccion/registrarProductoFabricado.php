<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $material = $_POST["sign-up-form-material"];
    $cantidadADescontar= $_POST["utilizado"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $funcionario = $_POST["sign-up-form-funcionario"];
    $material = $_POST["sign-up-form-material"];
    $producto = $_POST["sign-up-form-producto"];
    $modelo = $_POST["sign-up-form-modelo"];
    $precio = $_POST["sign-up-form-precio"];
    $talla = $_POST["sign-up-form-talla"];
    $color = $_POST["sign-up-form-color"];
    $ubicacion = $_POST["sign-up-form-ubicacion"];
}
$sql = "INSERT INTO producto(id_funcionario, material, nombre_producto, modelo, precio, talla, color_producto, ubicacion)   
        VALUES ('$funcionario', '$material', '$producto', '$modelo', '$precio', '$talla', '$color', '$ubicacion');";

if ($conexion->query($sql) == TRUE) {
    header("Location: registrar-producto-exitoso.php");
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}

$conexion->begin_transaction();

try {

    // Verificar si la cantidad es suficiente antes de actualizar
    $sqlSelect = "SELECT cantidad_materia FROM materia_prima WHERE nombre = '$material'";
    $stmtSelect = $conexion->prepare($sqlSelect);
    $stmtSelect->bind_param("s", $nombre);
    $stmtSelect->execute();
    $resultado = $stmtSelect->get_result();
    $fila = $resultado->fetch_assoc();

    if ($fila['cantidad_materia'] >= $cantidadADescontar) {
        // Actualizar la cantidad disponible
        $sqlUpdate = "UPDATE materia_prima SET cantidad_materia = cantidad_materia - '$cantidadADescontar WHERE descripcion_materia = '$material';";
        $stmtUpdate = $conexion->prepare($sqlUpdate);
        $stmtUpdate->bind_param("is", $cantidadADescontar, $material);
        $stmtUpdate->execute();

        // Confirmar la transacción
        $conexion->commit();
        echo "Registro insertado y cantidad actualizada exitosamente.";
    } else {
        throw new Exception("Cantidad insuficiente para descontar.");
    }
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conexion->rollback();
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conexion->close();
?>
