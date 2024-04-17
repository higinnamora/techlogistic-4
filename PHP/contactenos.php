<?php
$conexion;
include_once "conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["email"];
    $numcelular = $_POST["numerotelefono"];
    
    
}

    $sql = "INSERT INTO persona(no_documento, primer_nombre, segundo_nombre, primer_apellido, Segundo_apellido)   
            VALUES ('0', '$nombre', '', '$apellido', '')";

    $sql2= "SELECT id_persona FROM persona;";

    $result = mysqli_query($conexion,$sql2);
        if ($result->num_rows > 0)  {
            while ($row = $result->fetch_assoc()) {
            $idpersona = $row["id_persona"];
            }
        } else {
            echo "por favor verifique su informacion " . $conexion->error;
        }

    $sql3 = "INSERT INTO correo( id_persona, correo)
            values( $idpersona, '$correo')";

    $sql4 = "INSERT INTO movil( id_persona, numero_movil) 
            values( $idpersona, '$numcelular')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}



if ($conexion->query($sql3) === true){
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}

if ($conexion->query($sql4) === true){
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}




$conexion->close();