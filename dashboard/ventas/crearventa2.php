<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario = $_POST["funcionario"];
    $id_persona = $_POST["id_persona"];
    $mediodepago = $_POST["mediodepago"];
    $fechafactura = $_POST["fechafactura"];
    $documento = $_POST["documento"];
    $nombrecliente = $_POST["primer_nombre"];
    $productos = $_POST["producto"];
    $cantidades = $_POST["cantidad"];
    $subtotales = $_POST["subtotal"];
    $total = $_POST["total"];
}

try {
    $conexion->begin_transaction();
    for ($i = 0; $i < count($productos); $i++) {
        $producto_id = $productos[$i];
    $cantidad = $cantidades[$i];

    $stmt_producto = $conexion->prepare("SELECT nombre_producto, cantidad FROM producto WHERE codigo_producto = ?");
    $stmt_producto->bind_param("i", $producto_id);
    $stmt_producto->execute();
    $stmt_producto->bind_result($nombre_producto, $cantidad_actual);
    $stmt_producto->fetch();
    $stmt_producto->close();
    
    if ($cantidad_actual < $cantidad) {
        throw new Exception("Cantidad insuficiente para el producto '$nombre_producto' (ID: $producto_id). Disponible: $cantidad_actual, Requerido: $cantidad.");
    }
    }
    $stmt = $conexion->prepare("INSERT INTO orden_venta (id_funcionario, id_persona, id_medio_pago, fecha_factura, doc_identidad, nombre_cliente) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsss", $funcionario, $id_persona, $mediodepago, $fechafactura, $documento, $nombrecliente);
    
    if ($stmt->execute() === true) {
        $orden_id = $stmt->insert_id;
        $stmt->close();

        $stmt_detalle = $conexion->prepare("INSERT INTO detalle_venta (numero_orden_venta, producto, cantidad, subtotal) VALUES (?, ?, ?, ?)");
        for ($i = 0; $i < count($productos); $i++) {
            $producto_id = $productos[$i];
            $cantidad = $cantidades[$i];
            $subtotal = $subtotales[$i];
            $stmt_detalle->bind_param("iiid", $orden_id, $producto_id, $cantidad, $subtotal);
            $stmt_detalle->execute();

            $stmt_update = $conexion->prepare("UPDATE producto SET cantidad = cantidad - ? WHERE codigo_producto = ?");
            $stmt_update->bind_param("ii", $cantidad, $producto_id);
            $stmt_update->execute();
            $stmt_update->close();
        }
        $stmt_detalle->close();
        $conexion->commit();
        header("Location: registro-venta-exitosa.php");
        exit();
    } else {
        throw new Exception("Error en la inserción en orden_venta: " . $stmt->error);
    }
} catch (Exception $e) {
    $conexion->rollback();
    $errorMessage = urlencode($e->getMessage());
    header("Location: nueva-venta2.php?error=$errorMessage");
    exit();
}