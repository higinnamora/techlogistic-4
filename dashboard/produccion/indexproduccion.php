<!-- Estamos validando que el usuario si tenga una sesion iniciada, de lo contrario se enviara a login-->
<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: ../../sign-in.html");
  exit;
}
$conexion;
include_once "../../conexion_a_la_DB.php";
$sql = "SELECT codigo_producto, material, modelo, precio, talla, color_producto, ubicacion FROM producto;";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../styles/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body class="vh-100">
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="../../indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../favicon.png" alt="" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../indexdash.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../proveedores/indexproveedores.php">Proveedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produccion/indexproduccion.php">Producción</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../inventario/indexinventario.php">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../ventas/indexventas.php">Ventas</a>
          </li>
          <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo" class="rounded-circle" width="38" height="38" />
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
      <h4 class="text-md-start text-left">Producción</h4>
      <div class="d-flex flex-column flex-md-row gap-2">
        <a href="./nueva-orden.html"> <button class="btn btn-primary w-auto">Agregar orden</button></a>
        <div class="input-group w-auto">
          <input type="text" class="form-control" placeholder="Buscar orden" aria-label="Buscar orden">
          <!-- Icon buscar -->
          <span class="input-group-text" id="basic-addon2"><i class='bx bx-search'></i></span>
        </div>
      </div>
    </div>
    <hr>
    <!-- Tabla de Producción -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Ordenes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Consumos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../404.html" target="_blank">Horarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Almacenes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../404.html" target="_blank">Informes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Maquinaria</a>
      </li>
    </ul>
    <div class="table-responsive">
      <table id="productos" class="table">
        <thead>
          <tr>
            <th scope="col">Código de producto</th>
            <th scope="col">Material</th>
            <th scope="col">Modelo</th>
            <th scope="col">Precio</th>
            <th scope="col">Talla</th>
            <th scope="col">Color producto</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Acciones</th>
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
              <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class='bx bx-dots-horizontal-rounded'></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Editar</a></li>
                  <li><a class="dropdown-item" href="#">Eliminar</a></li>
                </ul>
              </div>
            </td>
          <?php
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
</body>

<footer class="copyright">
  <div class="bd-container">
    <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
    <p><a href="https://higinnamora.github.io/techlogistic/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="https://higinnamora.github.io/techlogistic/politica-de-privacidad.html">Política de Privacidad</a></p>
  </div>
</footer>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#productos').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excel', 'csv'
      ]
    });
  });
</script>

</html>