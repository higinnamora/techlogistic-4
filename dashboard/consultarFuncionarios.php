<?php
    $conn = new mysqli('localhost', 'root', 'admin', 'techlogistic');
    /* 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $consultar = $_POST["consultardash"];
    }*/
 
    $sql = "CALL ConsultarPersona()";
    if ($stmt = $conn->prepare($sql)) {
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
                /*echo "ID: " . $fila['id_persona'] . "<br>";
                echo "Numero de documento: " . $fila['no_documento'] . "<br>";
                echo "Nombres: " . $fila['primer_nombre'] . " " . $fila['segundo_nombre'] . "<br>";
                echo "Apellidos: " . $fila['primer_apellido'] . " " . $fila['segundo_apellido'] . "<br>";
                echo "Correo: " . $fila['correo'] . "<br>";
                echo "Rol: " . $fila['rol'] . "<br>";
                echo "<br>\n\n";*/

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