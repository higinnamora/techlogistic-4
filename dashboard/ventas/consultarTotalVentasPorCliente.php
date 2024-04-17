<?php
    $conexion;
    include_once "../../PHP/conexion_a_la_DB.php";
 
    $sql = "CALL ConsultarTotalVentasClientes()";
    if ($stmt = $conn->prepare($sql)) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            echo '<table>
                <tr> 
                    <th>Id Persona</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Total Ventas</th>
                </tr>';

            while ($fila = $result->fetch_assoc()) {

                $id = $fila["id_persona"];
                $nombre = $fila["primer_nombre"];
                $apellido = $fila["primer_apellido"];
                $totalVentas = $fila["total_ventas"];
            echo "
                <tr>
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$totalVentas</td>
                </tr>";
            }
            echo "</table>";
            $stmt->close();
        } else {
            die("Error en la ejecución del procedimiento almacenado: " . $stmt->error);
        }
    } else {
        die("Error en la preparación del procedimiento almacenado: " . $conex->error);
    }
    mysqli_close($conn);
