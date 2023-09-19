<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techlogistic</title>
  <meta name="description" content="">
  <!-- Favicon -->
  <link rel="icon" href="../../favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../styles/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
    <a href="../indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../favicon.png" width="50"
            height="50" alt="" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../indexdash.php">Inicio</a>
          </li>
          <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo"
                  class="rounded-circle" width="38" height="38" />
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <!--<li><a class="dropdown-item" href="#">Mi perfil</a></li>-->
                <!--<li><a class="dropdown-item" href="#">Configuración</a></li>-->
                <!--<li>
                  <hr class="dropdown-divider">
                </li>-->
                <li><a class="dropdown-item" href="../../cerrar_sesion.php">Cerrar sesión</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main -->
  <main class="container my-5 h-100">
    <div class="d-flex flex-column flex-md-row justify-content-between">
      <h4 class="text-md-start text-left">Funcionarios</h4>
    </div>
    <hr>
    <div class="table-responsive">

      <?php
      $conexion;
      include_once "../conexion_a_la_DB.php";

      $sql = "CALL ConsultarPersona()";
      if ($stmt = $conexion->prepare($sql)) {
        if ($stmt->execute()) {
          $result = $stmt->get_result();

          echo '
            <table class="table">
            <thead>
              <tr> 
                <th>Id Persona</th>
                <th>No Documento</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Correo</th>
                <th>Rol</th>
              </tr>
            </thead>
            <tbody>
            ';

          while ($fila = $result->fetch_assoc()) {

            $id = $fila["id_persona"];
            $ndoc = $fila["no_documento"];
            $PrimerNombr = $fila["primer_nombre"];
            $SegundoNombr = $fila["segundo_nombre"];
            $primerApell = $fila["primer_apellido"];
            $segundoApell = $fila["segundo_apellido"];
            $correo = $fila["correo"];
            $rol = $fila["rol"];
            echo "
        <tr>
          <td>$id</td>
          <td>$ndoc</td>
          <td>$PrimerNombr</td>
          <td>$SegundoNombr</td>
          <td>$primerApell</td> 
          <td>$segundoApell</td>
          <td>$correo</td>
          <td>$rol</td>
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

    </div>

  </main>

  <footer>
    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../terminos-y-condiciones.html">Términos y Condiciones</a> · <a
            href="../politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </div>
  </footer>

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

</html>