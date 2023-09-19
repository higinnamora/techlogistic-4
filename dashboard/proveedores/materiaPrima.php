<?php
    $conexion;
    include_once "../../conexion_a_la_DB.php";
 
    $sql ="SELECT * FROM materia_prima;";
    $result = mysqli_query($conexion,$sql);

    echo '<table>
            <tr> 
                <th>Id Materia Prima</th>
                <th>Id Funcionario</th>
                <th>Color Materia</th>
                <th>Textura</th>
                <th>Precio</th>
                <th>Cantidad Materia</th>
                <th>Peso</th>
                <th>Descripción Materia</th>
            </tr>';
    if ($rta = $conexion -> query($sql)) {
        while($row = $rta -> fetch_assoc()){
            $idMateriaPrima = $row["id_materia_prima"];
            $idFuncionario = $row["id_funcionario"];
            $colorMateria = $row["color_materia"];
            $textura = $row["textura"];
            $precio = $row["precio"];
            $cantidadMateria = $row["cantidad_materia"];
            $peso = $row["peso"];
            $descripcionMateria = $row["descripcion_materia"];
        echo "
            <tr>
                <td>$idMateriaPrima</td>
                <td>$idFuncionario</td>
                <td>$colorMateria</td>
                <td>$textura</td>
                <td>$precio</td>
                <td>$cantidadMateria</td>
                <td>$peso</td>
                <td>$descripcionMateria</td>
            </tr>";
        }
        echo "\n";
        $rta -> free();
    }
?>