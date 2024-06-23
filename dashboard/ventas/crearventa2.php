
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
    echo "Error: " . $e->getMessage();
}
$conexion->close();
?>