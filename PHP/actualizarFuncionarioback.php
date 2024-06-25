<?php
session_start();
include_once "conexion_a_la_DB.php"; // Asegúrate de incluir la conexión a tu base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_persona = $_POST["id_persona"];
    $correoactual = $_POST["correo_actual"];
    $email = $_POST["sign-up-form-email"];
    $contra = $_POST["sign-up-form-password"];
    $contra_confirm = $_POST["sign-up-form-password-confirm"];

    try {
        // Validación de campos requeridos
        if (empty($email) || empty($contra) || empty($contra_confirm)) {
            throw new Exception("Todos los campos son requeridos.");
        }

        // Validación de que las contraseñas coincidan
        if ($contra != $contra_confirm) {
            throw new Exception("Las contraseñas no coinciden. Por favor, verifica.");
        }

        // Consulta SQL para actualizar correo y contraseña
        $sql = "UPDATE correos SET correo = '$email', password = MD5($contra) WHERE correo = '$correoactual'";
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta 'correos': " . $conexion->error);
        }
        $stmt->bind_param("sss", $email, $contra, $correoactual);
        if (!$stmt->execute()) {
            throw new Exception("Error al actualizar 'correos': " . $stmt->error);
        }

        // Redireccionar después de la actualización exitosa
        header("Location: registro-exitoso.php");
        exit();
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conexion->close();
?>