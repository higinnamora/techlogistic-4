<!-- Estamos validando que el usuario si tenga una sesion iniciada, de lo contrario se enviara a login-->
<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: ../../sign-in.html");
  exit;
}
$conexion;
include_once "../../conexion_a_la_DB.php";
$sql = "SELECT codigo_producto, cantidad_stock, descripcion_stock, estado FROM stock;";
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
      <a href="../../indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../favicon.png" alt=""
          class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../indexdash.php">Inicio</a>


            <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo"
                  class="rounded-circle" width="38" height="38" />
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <!--<li><a class="dropdown-item" href="../../502.html" target="_blank">Mi perfil</a></li>
                <li><a class="dropdown-item" href="../../502.html" target="_blank">Configuración</a></li>
                <li>
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
      <h4 class="text-md-start text-left">Inventario</h4>
      <div class="d-flex flex-column flex-md-row gap-2">
        <a href="./nuevo-producto.html"> <button class="button w-auto">Agregar producto</button></a>
      </div>
    </div>
    <hr>


    <div class="table-responsive">
      <table id="stock" class="table">
        <thead>
          <tr>
            <th scope="col">Código de producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Descripción</th>
            <th scope="col">Estado</th>
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
            <td>
              <!-- <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary border-0" type="button" id="dropdownMenuButton1"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class='bx bx-dots-horizontal-rounded'></i>
                </button>
              </div> -->
            </td>
            <?php
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <hr class="my-4">

    <h4>Actualizar Inventario</h4>

    <form class="form" id="sign-up-form" action="actualizardash.php" method="POST">

      <div class="form-field">
        <label for="cantidad">Codigo stock</label>
        <input type="number" placeholder="ingrese codigo" id="codigo" name="codigo" required />
      </div>



      <div class="form-field">
        <label for="cantidad">Cantidad en stock</label>
        <input type="number" placeholder="ingrese cantidad de producto disponible" id="cantidad" name="cantidad"
          required />
      </div>

      <div class="form-field">
        <label for="descripcion">Descripcion</label>
        <input type="text" placeholder="Nombre del producto" id="descripcion" name="descripcion" required />
      </div>

      <div class="mb-3">
        <label for="estadoproducto" class="form-label">Disponibilidad del producto</label>
        <select name="estadoproducto" class="form-select">
          <option value="Disponible">Disponible</option>
          <option value="Agotado">Agotado</option>
        </select>
      </div>

      <div></div>
      <div></div>
      <div>
        <input class="button" type="submit" value="Actualizar" />
      </div>
    </form>

    <hr class="my-4">
    <h4>Eliminar orden de venta</h4>

    <form class="newsletter-form" action="eliminardash.php" id="newsletter-form" method="POST">
      <div class="form-field">
        <input type="number" name="eliminar_inventario" placeholder="codigo del stock " class="newsletter-input"
          pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
        <button class="button" type="submit">Eliminar</button>
    </form>
  </main>
  <div class="copyright">
    <div class="bd-container">
      <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
      <p><a href="./../../terminos-y-condiciones.html">Términos y Condiciones</a> · <a
          href="../../politica-de-privacidad.html">Política de Privacidad</a></p>
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
    $('#stock').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excel', 'csv'
      ]
    });
  });
</script>

</html>