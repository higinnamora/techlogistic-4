<?php
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $query = htmlspecialchars($_POST['query']);
    $sql = "SELECT numero_orden_venta, id_funcionario, id_cliente, id_medio_pago, cantidad_productos, descuento, fecha_factura, observacion, subtotal, valor_Total, devolucion FROM orden_venta WHERE numero_orden_venta LIKE '%$query%' OR id_funcionario LIKE '%$query%'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
        <th>numero de orden</th>
        <th>numero del funcionario</th>
        <th>numero del cliente</th>
        <th>medio de pago</th>
        <th>cantidad de productos</th>
        <th>descuento</th>
        <th>fecha</th>
        <th>detalles de los productos</th>
        <th>subtotal</th>
        <th>Total</th>
        <th>devolucion</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["numero_orden_venta"] . "</td>";
            echo "<td>" . $row["id_funcionario"] . "</td>";
            echo "<td>" . $row["id_cliente"] . "</td>";
            echo "<td>" . $row["id_medio_pago"] . "</td>";
            echo "<td>" . $row["cantidad_productos"] . "</td>";
            echo "<td>" . $row["descuento"] . "</td>";
            echo "<td>" . $row["fecha_factura"] . "</td>";
            echo "<td>" . $row["observacion"] . "</td>";
            echo "<td>" . $row["subtotal"] . "</td>";
            echo "<td>" . $row["valor_Total"] . "</td>";
            echo "<td>" . ($row["devolucion"] ? 'Sí' : 'No') . "</td>";
            echo "<td><form action='devolucion.php' method='POST'><input type='hidden' name='order_id' value='" . $row["numero_orden_venta"] . "'><button type='submit' class='btn-devolucion'>Devolución</button></form></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "Por favor, ingresa una consulta de búsqueda.";
}

$conexion->close();
?>