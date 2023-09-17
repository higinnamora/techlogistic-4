<?php
    $conexion;
    include_once "../conexion_a_la_DB.php";
 
    $sql = "CALL ConsultarPersona()";
    if ($stmt = $conexion->prepare($sql)) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            echo '<table>
                <tr> 
                    <th>Id Persona</th>
                    <th>No Documento</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                </tr>';

            while ($fila = $result->fetch_assoc()) {

                $id = $fila["id_persona"];
                $ndoc = $fila["no_documento"];
                $PrimerNombr = $fila["primer_nombre"];
                $SegundoNombr = $fila["segundo_nombre"];
                $primerApell = $fila["primer_apellido"];
                $segundoApell = $fila["segundo_apellido"];
                $correo = $fila["correo"];
                $rol = $fila["rol"];
            echo "
                <tr>
                    <td>$id</td>
                    <td>$ndoc</td>
                    <td>$PrimerNombr</td>
                    <td>$SegundoNombr</td>
                    <td>$primerApell</td> 
                    <td>$segundoApell</td>
                    <td>$correo</td>
                    <td>$rol</td>
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
?>