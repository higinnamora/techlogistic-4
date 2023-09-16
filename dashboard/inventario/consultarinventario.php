<?php

    $conn = new mysqli('localhost', 'root', 'admin', 'techlogistic');
    /* 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $consultar = $_POST["consultardash"];
    }*/
 
    echo "\nDigite documento: ";
    fscanf (STDIN, "%s",$documento);
    $sql = "CALL ConsultarPersonaPorNoDoc(?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $documento);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $nombre = $row["primer_nombre"];
            $apellido = $row["primer_apellido"];
            echo "Nombre: $nombre, Apellido: $apellido";
        }
        $stmt->close();
    }
?>