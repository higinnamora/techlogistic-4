<?php
    $conexion;
    include_once "../../PHP/conexion_a_la_DB.php";

    $sql = "CALL ConsultarProductosMateriasProveedores()";
    if ($stmt = $conexion->prepare($sql)) {
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            echo '<table>
                <tr>
                    <th>Código Producto</th>
                    <th>Id Funcionario</th>
                    <th>Material</th>
                    <th>Nombre Producto</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Talla</th>
                    <th>Color Producto</th>
                    <th>Ubicación</th>
                    <th>Id Materia Producto</th>
                    <th>Id Materia Prima</th>
                    <th>Código Producto</th>
                    <th>Gasto Materia Prima</th>
                    <th>Id Proveedor</th>
                    <th>Nit</th>
                    <th>Id Persona</th>
                </tr>';

            while ($fila = $result->fetch_assoc()) {

                $codigoProducto = $fila["codigo_producto"];
                $idFuncionario = $fila["id_funcionario"];
                $material = $fila["material"];
                $nombreProducto = $fila["nombre_producto"];
                $modelo = $fila["modelo"];
                $precio = $fila["precio"];
                $talla = $fila["talla"];
                $colorProducto = $fila["color_producto"];
                $ubicacion = $fila["ubicacion"];
                $idMateriaProducto = $fila["id_materia_producto"];
                $idMateriaPrima = $fila["id_materia_prima"];
                $codigoProducto = $fila["codigo_producto"];
                $gastoMateriaPrima = $fila["gasto_materia_prima"];
                $idProveedor = $fila["id_proveedor"];
                $nit = $fila["nit"];
                $idPersona = $fila["id_persona"];
            echo "
                <tr>
                    <td>$codigoProducto</td>
                    <td>$idFuncionario</td>
                    <td>$material</td>
                    <td>$nombreProducto</td>
                    <td>$modelo</td>
                    <td>$precio</td>
                    <td>$talla</td>
                    <td>$colorProducto</td>
                    <td>$ubicacion</td>
                    <td>$idMateriaProducto</td>
                    <td>$idMateriaPrima</td>
                    <td>$codigoProducto</td>
                    <td>$gastoMateriaPrima</td>
                    <td>$idProveedor</td>
                    <td>$nit</td>
                    <td>$idPersona</td>
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
    mysqli_close($conexion);
?>