<?php

$conn = new mysqli('localhost', 'root', '', 'techlogisticdb');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $eliminar = $_POST["eliminardash"];
}

$traerfuncion = $conn->prepare("CALL eliminarendash(?)");
$traerfuncion->bind_param("i", $eliminar);
$traerfuncion->execute();

$result = $traerfuncion->get_result();

if ($result->num_rows > 0) {
    echo "se elimina correctamente";
}else{
    echo "no se pudo eliminar";
}




$conn->close();





?>