<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
      //mysqli_close($conn);
      ?>
<form class="formulario" action="" method="POS">
                <fieldset>
                  <legend>Contacto</legend>

                  <label for="email">E-mail</label>
                  <input type="email" placeholder="Email de recepción" id="email">

                  <label for="mensaje">Mensaje</label>
                  <textarea type="mensaje" name="Tu mensaje"></textarea>
                </fieldset>
              </form>
</body>
</html>