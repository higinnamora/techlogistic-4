<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
</body>
</html>