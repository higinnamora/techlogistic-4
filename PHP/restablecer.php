<?php
      $conexion;
      include_once "./conexion_a_la_DB.php";

      $sql = "SELECT id_correo, id_persona, correo from correos;";

      if ($stmt = $conexion->prepare($sql)) {
        if ($stmt->execute()) {
          $result = $stmt->get_result();

          echo '
            <table class="table">
            <thead>
              <tr> 
                <th>Id correo</th>
                <th>Id persona</th>
                <th>Correo</th>
              </tr>
            </thead>
            <tbody>
            ';

          while ($fila = $result->fetch_assoc()) {
            
            $idCorreo = $fila["id_correo"];
            $idPersona = $fila["id_persona"];
            $correo = $fila["correo"];
            echo "
        <tr>
            <td>$idCorreo</td>
            <td>$idPersona</td>
            <td>$correo</td>
        </tr>";
          }
          echo "</tbody></table>";
          $stmt->close();
        } else {
          die("Error en la ejecución del procedimiento almacenado: " . $stmt->error);
        }
      } else {
        die("Error en la preparación del procedimiento almacenado: " . $conex->error);
      }

// Configuración de la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para generar una nueva contraseña aleatoria
function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

// Obtener el correo del formulario
$sql = "SELECT correo FROM correos";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    $correos = [];
    while ($row = $result->fetch_assoc()) {
        $correos[] = $row['correo'];
    }
} else {
    $correos = [];
}

// Generar y hashear la nueva contraseña
$newPassword = generateRandomPassword();
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Actualizar la nueva contraseña en la base de datos
$sql = "UPDATE correos SET password='$hashedPassword' WHERE email='$correos'";

if ($conn->query($sql) === TRUE) {
    // Configuración de correo electrónico
    $to = "dayana@correo.com, sandra@correo.com, diana@correo.com"; // Correos a los que se enviará el mensaje
    $subject = "Restablecimiento de contraseña";
    $message = "La contraseña del usuario con correo $coreos ha sido restablecida.\n\nNueva contraseña: $newPassword";
    $headers = "From: tu_correo@tudominio.com";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "Contraseña actualizada correctamente y correo de confirmación enviado.";
    } else {
        echo "Contraseña actualizada pero error al enviar el correo de confirmación.";
    }
} else {
    echo "Error al actualizar la contraseña: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
