<?php

$conexion;
include_once "conexion_a_la_DB.php";
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

    if ($pass_db == $contra) {
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['tipo_usuario'] = $row['id_funcionario'];
        header("Location: indexdash.php");
<<<<<<< Updated upstream
    }else{
        header("Location: contraseña-incorrecta.php");
    }
} else{
=======
    } else {
        header("Location: contrasena-incorrecta.php");
    }
} else {
>>>>>>> Stashed changes
    header("Location: usuario-inexistente.php");
}
$conexion->close();