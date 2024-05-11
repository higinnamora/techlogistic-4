<?php

$conexion;
include_once "conexion_a_la_DB.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["sign-in-form-email"];
    $contra = $_POST["sign-in-form-password"];

}
$sql = "SELECT correos.correo, correos.password, roles.id_rol
        FROM funcionario
        JOIN personas ON funcionario.id_persona = personas.id_persona
        JOIN correos ON personas.id_persona = correos.id_persona
        JOIN roles ON funcionario.roles_id_rol = roles.id_rol
        WHERE correos.correo = '$email';";
$pregunta = $conexion->query($sql);
$existeusuario = $pregunta->num_rows;

if ($existeusuario > 0) {
    $row = $pregunta->fetch_assoc();
    $pass_db = $row['password'];

    if ($pass_db == $contra) {
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['tipo_usuario'] = $row['id_rol'];
        header("Location: indexdash.php");
    } else {
        header("Location: contrasena-incorrecta.php");
    }

} else {
    header("Location: usuario-inexistente.php");
}
$conexion->close();