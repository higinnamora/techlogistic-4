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

            while ($fila = $result->fetch_assoc()) {
                echo "ID: " . $fila['id_persona'] . "<br>";
                echo "Numero de documento: " . $fila['no_documento'] . "<br>";
                echo "Nombres: " . $fila['primer_nombre'] . " " . $fila['segundo_nombre'] . "<br>";
                echo "Apellidos: " . $fila['primer_apellido'] . " " . $fila['segundo_apellido'] . "<br>";
                echo "Correo: " . $fila['correo'] . "<br>";
                echo "Rol: " . $fila['rol'] . "<br>";
                echo "<br>\n\n";
            }
            $stmt->close();
        } else {
            die("Error en la ejecución del procedimiento almacenado: " . $stmt->error);
        }
    } else {
        die("Error en la preparación del procedimiento almacenado: " . $conex->error);
    }
    mysqli_close($conn);
?>