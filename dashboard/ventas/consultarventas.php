<?php

$conn = new mysqli('localhost', 'root', '', 'techlogisticdb');


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $consultar = $_POST["consultardash"];
}
echo "consultar contiene: " . $consultar;
 
$traerfuncion = $conn->prepare("CALL ConsultarProductosMateriasProveedores(?)");
$traerfuncion->bind_param("i", $consultar);
$traerfuncion->execute();


$result = $traerfuncion->get_result();

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>no_documento</th>";
    echo "<th>primer_nombre</th>";
    echo "<th>segundo_nombre</th>";
    echo "<th>primer_apellido</th>";
    echo "<th>segundo_apellido</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["no_documento"] . "</td>";
        echo "<td>" . $row["primer_nombre"] . "</td>";
        echo "<td>" . $row["segundo_nombre"] . "</td>";
        echo "<td>" . $row["primer_apellido"] . "</td>";
        echo "<td>" . $row["segundo_apellido"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Persona no encontrada";
}

$conn->close();
?>