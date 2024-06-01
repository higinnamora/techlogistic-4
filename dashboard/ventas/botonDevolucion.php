<?php
include_once "../../PHP/conexion_a_la_DB.php";
$conexion;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    $sql = "UPDATE orden_venta SET devolucion = TRUE WHERE numero_orden_venta = '$order_id'";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        echo "Orden de venta devuelta con éxito.";
    } else {
        echo "Error al devolver la orden de venta: " . $conexion->error;
    }

    $stmt->close();
} else {
    echo "No se proporcionó un ID de orden válido.";
}

$conexion->close();
