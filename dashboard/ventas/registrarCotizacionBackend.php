<?php
session_start();
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codCotizacion = $_POST["numeroCotizacion"];
    $id_persona = $_POST["id_persona"];
    $fechafactura = $_POST["fechaCotizacion"];
    $tipofactura = $_POST["tipoCotizacion"];
    $total = $_POST["total"];
    $observaciones = $_POST["observaciones"];

    // Insertar la cotización en la base de datos
    try {
        $conexion->begin_transaction();

        // Preparar la consulta para insertar en cotizaciones
        $stmt = $conexion->prepare("INSERT INTO cotizaciones (codigo_cotizacion, id_persona, tipo_cotizacion, fecha_cotizacion, valor_total_cot, observaciones) VALUES (?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    throw new Exception("Error en la preparación de la consulta: " . $conexion->error);
}

$stmt->bind_param("iissds", $codCotizacion, $id_persona, $tipofactura, $fechafactura, $total, $observaciones);

if (!$stmt->execute()) {
    throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
}

        // Insertar los detalles de la cotización en la tabla detalle_cotizacion
        $productos = $_POST["producto"];
        $cantidades = $_POST["cantidad"];
        $subtotales = $_POST["subtotal"];

        $stmtDetalle = $conexion->prepare("INSERT INTO detalle_cotizacion (codigo_cotizacion, codigo_producto, cantidad, subtotal) VALUES (?, ?, ?, ?)");

        if (!$stmtDetalle) {
            throw new Exception("Error en la preparación de la consulta de detalle: " . $conexion->error);
        }

        for ($i = 0; $i < count($productos); $i++) {
            $producto = $productos[$i];
            $cantidad = $cantidades[$i];
            $subtotal = $subtotales[$i];

            $stmtDetalle->bind_param("iidi", $codCotizacion, $producto, $cantidad, $subtotal);

            if (!$stmtDetalle->execute()) {
                throw new Exception("Error al ejecutar la consulta de detalle: " . $stmtDetalle->error);
            }
        }

        // Confirmar la transacción
        $conexion->commit();

        echo "Cotización registrada correctamente.";

    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollback();
        echo "Error al registrar la cotización: " . $e->getMessage();
    }

    // Cerrar las conexiones
    $stmt->close();
    $stmtDetalle->close();
    $conexion->close();
}
?>