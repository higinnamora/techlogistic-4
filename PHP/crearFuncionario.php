<?php
$conexion;
include_once "conexion_a_la_DB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_persona = $_POST["id_persona"];
    $horario = $_POST["sign-up-form-horario"];
    $salario = $_POST["sign-up-form-salario"];
    $cargo = $_POST["sign-up-form-numcargo"];
    $email = $_POST["sign-up-form-email"];
    $contra = $_POST["sign-up-form-password"];
    $confcontra = $_POST["sign-up-form-password-confirm"];
    try {
        // Verificar los datos recibidos
        if (empty($id_persona) || empty($horario) || empty($salario) || empty($cargo) || empty($email) || empty($contra) || empty($confcontra)) {
            throw new Exception("Alguno de los campos está vacío.");
        }
        
        // Insertar datos en la base de datos
        $sql = "INSERT INTO funcionario(id_persona, horario, salario, roles_id_rol) VALUES ('$id_persona', '$horario', '$salario', '$cargo')";
        $sql2 = "INSERT INTO correos ( id_persona, correo, password) values( '$id_persona', '$email', '$contra')";
        
        if ($conexion->query($sql) === TRUE) {
            header("Location: registro-exitoso.php");
        } else {
            throw new Exception("Error al insertar en la tabla 'funcionario': " . $conexion->error);
        }
        
        if ($conexion->query($sql2) === TRUE) {
            echo "Registro exitoso";
        } else {
            throw new Exception("Error al insertar en la tabla 'correos': " . $conexion->error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conexion->close();