<?php

    $user = "root";
    $server = "localhost";
    $password = "Aura2117*";
    $db = "techlogisticdb";
    $conexion = new mysqli($server, $user, $password, $db);



if (!$conexion) {
    die ("error de conexion". $conexion->connect_error);
}
 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["sign-in-form-email"];
    $contra = $_POST["sign-in-form-password"];

}
    $sql = "SELECT id_funcionario, pass, correo FROM rol WHERE correo = '$email';";
    
    $pregunta = $conexion->query($sql);

    $existeusuario = $pregunta->num_rows;

if ($existeusuario > 0) {
    $row = $pregunta->fetch_assoc();
    $pass_db = $row['pass'];

    if($pass_db == $contra) {

        $_SESSION['correo'] = $row['correo'];
        $_SESSION['tipo_usuario'] = $row['id_funcionario'];

        header("Location: indexdash.php");

    }else{

        echo "contraseña incorrecta";
    }


    
} else{
    echo "el usuario no existe";
}


$conexion->close();

?>