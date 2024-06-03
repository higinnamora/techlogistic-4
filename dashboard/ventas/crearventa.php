
<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario = $_POST["funcionario"];
    $id_persona = $_POST["id_persona"];
    $mediopago = $_POST["mediodepago"];
    $fechafactura = $_POST["fechafactura"];
    $documento = $_POST["documento"];
    $nombrecliente = $_POST["primer_nombre"];
    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    $subtotal = $_POST["subtotal"];
    $total = $_POST["total"];
}
$productos = $_POST["productos"];
$cantidades = $_POST["cantidades"];
$subtotales = $_POST["subtotales"];

$sql = "INSERT INTO orden_venta(id_funcionario, id_persona, id_medio_pago, fecha_factura, doc_identidad, nombre_cliente)   
            VALUES ('$funcionario', '$id_persona', '$mediopago', '$fechafactura', '$documento', '$nombrecliente');";
$numero_orden_venta = "";

if ($conexion->query($sql) === TRUE) {
    $numero_orden_venta = $conexion->insert_id;
    foreach ($productos as $key => $producto) {
        $cantidad = $cantidades[$key];
        $subtotal = $subtotales[$key];
        $sql2 = "INSERT INTO detalle_venta(numero_orden_venta, producto, cantidad, subtotal)   
                VALUES ('$numero_orden_venta', '$producto', '$cantidad', '$subtotal');";
        
        if ($conexion->query($sql2) !== TRUE) {
            throw new Exception("Error al registrar los elementos: " . $conexion->error);
        }
    }
    header("Location: registro-venta-exitosa.php");
    exit;
} else {
    echo "Error al registrar los elementos: " . $conexion->error;
}

$conexion->close();
