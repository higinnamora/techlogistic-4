<?php

$conexion;
include_once "conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["sign-in-form-email"];
    $contra = $_POST["sign-in-form-password"];
}
$sql = "SELECT * FROM persona WHERE correo = '$email' and pass = '$contra';";

$pregunta = $conexion->query($sql);
if ($pregunta->num_rows == 1 && $pregunta2->num_rows == 1) {
    header("location:indexdash.html");
} else {
    echo "correo o contraseña incorrectos";
}
$conexion->close();
