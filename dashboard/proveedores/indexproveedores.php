<!-- Estamos validando que el usuario si tenga una sesion iniciada, de lo contrario se enviara a login-->
<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: ../../HTML/sign-in.html");
  exit;
}
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
$sql = "SELECT nit, id_persona, razon_social FROM proveedores;";
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
  <link rel="stylesheet" href="../../styles/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="../../PHP/indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../IMAGES/favicon.png" alt=""
          class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
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
                <li><a class="dropdown-item" href="../../PHP/cerrar_sesion.php">Cerrar sesión</a></li>
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
      <h4 class="text-md-start text-left">Proveedores</h4>
      <!-- subir archivos-->
      <form action="../../PHP/carga_datos.php" method="post" enctype="multipart/form-data">
        <h4>Cargar materia prima</h4>
        <input type="file" name="archivo" accept=".xlsx, .xls"/>
        <input type="submit" value="Enviar"/>
      </form>
      <div class="d-flex flex-column flex-md-row gap-2">
        <a href="registrarProveedor.html"> <button class="button w-auto">Agregar proveedor</button></a>
      </div>
    </div>
    <hr>
    <!-- Tabla de proveedores -->
    <ul class="nav nav-tabs mb-4">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Proveedores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="materiaPrima.php">Materia Prima</a>
      </li>
    </ul>

    <div class="table-responsive">
      <table id="proveedor" class="table">
        <thead>
          <tr>
            <th scope="col">Nit</th>
            <th scope="col">Id persona</th>
            <th scope="col">Razon social</th>
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

            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <hr class="my-4">

    <h4>Actualizar Proveedor</h4>
    <form class="form" id="sign-up-form" action="editarProveedor.php" method="POST">

      <div class="form-field">
        <label for="nit">Nit</label>
        <input type="text" placeholder="ingrese el nit del proveedor" id="nit" name="nit" required />
      </div>
      <div class="form-field">
        <label for="idPersona">Id Persona</label>
        <input type="number" placeholder="ingrese id Persona" id="idPersona" name="idPersona" required />
      </div>
      <div class="form-field">
        <label for="razonSocial">Razón social</label>
        <input type="number" placeholder="ingrese Razón social" id="razonSocial" name="razonSocial" required />
      </div>
      <div></div>
      <div>
        <input class="button" type="submit" value="Actualizar" />
      </div>
    </form>

    <hr class="my-4">

    <h4>Eliminar proveedor</h4>
    <form class="newsletter-form" action="eliminarProveedor.php" id="newsletter-form" method="POST">
      <div class="form-field">
        <input type="text" name="eliminarProveedor" placeholder="Nit " class="newsletter-input"
          pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
      </div>
      <button class="button" type="submit">Eliminar</button>
    </form>
  </main>

  <footer>
    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a
            href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
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
<script>
  $(document).ready(function () {
    $('#proveedor').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excel', 'csv'
      ]
    });
  });
</script>

</html>