<?php
session_start();
if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: ../../HTML/sign-in.html");
  exit;
}
$conexion;
include_once "conexion_a_la_DB.php";
$sql = "SELECT p.primer_nombre, p.primer_apellido, c.correo, f.horario, f.salario
        FROM funcionario f
        JOIN personas p ON f.id_persona = p.id_persona
        JOIN correos c ON f.id_persona = c.id_persona;";
$datos = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techlogistic</title>
  <meta name="description" content="">
  <!-- Favicon -->
  <link rel="icon" href="../../IMAGES/favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../STYLES/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body class="vh-100">
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../IMAGES/favicon.png" width="50"
          height="50" alt="" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./indexdash.php">Inicio</a>
          </li>
          <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo"
                  class="rounded-circle" width="38" height="38" />
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end">
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
      <table id="ventas" class="table table-striped overflow-x-auto">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Horario</th>
            <th scope="col">Salario</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Itera sobre los datos y genera las filas de la tabla
          foreach ($datos as $fila) {
            echo "<tr>";
            foreach ($fila as $valor) {
              echo "<td>$valor</td>";
            }
          ?>
          <?php echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

  </main>

  <footer>
    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
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