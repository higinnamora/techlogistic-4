<?php

    $user = "root";
    $server = "localhost";
    $password = "";
    $db = "techlogisticdb";
    $conexion = new mysqli($server, $user, $password, $db);



if (!$conexion) {
    die ("error de conexion".mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consulta_simple = $_POST["consultasimple"];
}

if ($traerfuncion = $conexion->prepare("CALL ConsultaSimpleProducto(?)")) {
    $traerfuncion->bind_param("s", $consulta_simple);
    $traerfuncion->execute();
}

$result = $traerfuncion->get_result();

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>codigo del producto</th>";
    echo "<th>codigo del funcionario</th>";
    echo "<th>material</th>";
    echo "<th>nombre del producto</th>";
    echo "<th>modelo</th>";
    echo "<th>precio</th>";
    echo "<th>talla</th>";
    echo "<th>color del producto</th>";
    echo "<th>ubicacion</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["codigo_producto"] . "</td>";
        echo "<td>" . $row["id_funcionario"] . "</td>";
        echo "<td>" . $row["material"] . "</td>";
        echo "<td>" . $row["nombre_producto"] . "</td>";
        echo "<td>" . $row["modelo"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["talla"] . "</td>";
        echo "<td>" . $row["color_producto"] . "</td>";
        echo "<td>" . $row["ubicacion"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Producto no encontrado";
}





$conexion->close();
?>
