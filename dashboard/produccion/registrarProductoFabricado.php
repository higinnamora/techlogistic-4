<?php
// Conexión a la base de datos
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $funcionario = $_POST["sign-up-form-funcionario"];
    $material = $_POST["sign-up-form-material"];
    $producto = $_POST["sign-up-form-producto"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["sign-up-form-precio"];
    $talla = $_POST["sign-up-form-talla"];
    $color = $_POST["sign-up-form-color"];
    $ubicacion = $_POST["sign-up-form-ubicacion"];
    $cantidadADescontar = $_POST["utilizado"];

    // Iniciar la transacción
    $conexion->begin_transaction();

    try {
        // Verificar si la cantidad es suficiente antes de actualizar
        $sqlSelect = "SELECT cantidad_materia FROM materia_prima WHERE descripcion_materia = '$material';";
        $stmtSelect = $conexion->prepare($sqlSelect);
        if (!$stmtSelect) {
            throw new Exception("Error en la preparación de la consulta: " . $conexion->error);
        }
        $stmtSelect->bind_param("i", $cantidadADescontar);
        $stmtSelect->execute();
        $resultado = $stmtSelect->get_result();
        $fila = $resultado->fetch_assoc();

        if ($fila['cantidad_materia'] >= $cantidadADescontar) {
            // Actualizar la cantidad disponible
            $sqlUpdate = "UPDATE materia_prima SET cantidad_materia = cantidad_materia - '$cantidadADescontar WHERE descripcion_materia = '$material'";
            $stmtUpdate = $conexion->prepare($sqlUpdate);
            if (!$stmtUpdate) {
                throw new Exception("Error en la preparación de la consulta: " . $conexion->error);
            }
            $stmtUpdate->bind_param("is", $cantidadADescontar, $material);
            $stmtUpdate->execute();

            // Registrar el nuevo producto
            $sqlInsert = "INSERT INTO producto (id_funcionario, cantidad, nombre_producto, material, precio, talla, color_producto, ubicacion)   
                          VALUES ('$funcionario', '$cantidad', '$producto', '$material', '$precio', '$talla', '$color', '$ubicacion');";
            $stmtInsert = $conexion->prepare($sqlInsert);
            if (!$stmtInsert) {
                throw new Exception("Error en la preparación de la consulta: " . $conexion->error);
            }
            $stmtInsert->bind_param("iissssss", $funcionario, $cantidad, $producto, $material, $precio, $talla, $color, $ubicacion);
            $stmtInsert->execute();

            // Confirmar la transacción
            $conexion->commit();
            header("Location: registrar-producto-exitoso.php");
        } else {
            throw new Exception("Cantidad insuficiente de materia prima para descontar.");
        }
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Cerrar las declaraciones preparadas
    $stmtUpdate->close();
    $stmtInsert->close();
}

// Cerrar la conexión
$conexion->close();
?>