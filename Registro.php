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

    $cedula = $_POST["sign-up-form-cedula"];
    $numcargo = $_POST["sign-up-form-numcargo"];
    $cargo = $_POST["sign-up-form-cargo"];
    $nombre1 = $_POST["sign-up-form-name1"];
    $nombre2 = $_POST["sign-up-form-name2"];
    $apellido1 = $_POST["sign-up-form-apellido1"];
    $apellido2 = $_POST["sign-up-form-apellido2"];
    $email = $_POST["sign-up-form-email"];
    $contra = $_POST["sign-up-form-password"];
    $confcontra = $_POST["sign-up-form-password-confirm"];
}



    $sql = "INSERT INTO persona(no_documento, primer_nombre, segundo_nombre, primer_apellido, Segundo_apellido)   
            VALUES ('$cedula', '$nombre1', '$nombre2', '$apellido1', '$apellido2')";
    $sql2 = "INSERT INTO rol ( id_funcionario, descripcion, pass, passconfirm, correo) 
            values( '$numcargo', '$cargo', '$contra', '$confcontra', '$email')";



if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}

if ($conexion->query($sql2)){
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}





$conexion->close();