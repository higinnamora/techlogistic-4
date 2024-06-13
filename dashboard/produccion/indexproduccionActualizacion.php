<!-- Estamos validando que el usuario si tenga una sesion iniciada, de lo contrario se enviara a login-->
<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: ../../HTML/sign-in.html");
  exit;
}
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";
$sql = "SELECT codigo_producto, id_funcionario, cantidad, nombre_producto, material, precio, talla, color_producto, ubicacion FROM producto;";
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
  <link rel="x" href="../../images/favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="../../PHP/indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../IMAGES/favicon.png" alt="" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="indexproduccion.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo"
                  class="rounded-circle" width="38" height="38" />
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="../../PHP/cerrar_sesion.php">Cerrar sesión</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container my-5 h-100">
    <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
      <h4 class="text-md-start text-left">Producción</h4>
    </div>
    <hr>
    <h4>Actualizar Producto</h4>
    <form class="form" id="sign-up-form" action="editarProducto.php" method="POST">
      <div class="form-field" style="display: none;">
        <label for="funcionario">Funcionario/label>
          <input type="number" value="2" id="funcionario" name="funcionario" required />
      </div>
      <div class="form-field">
        <label for="producto">Código Producto</label>
        <input type="number" placeholder="ingrese código producto" id="producto" name="producto" required />
      </div>
      <div class="form-field">
        <label for="material">Material</label>
        <input type="text" placeholder="ingrese material" id="material" name="material" required />
      </div>
      <div class="form-field">
        <label for="modelo">Módelo</label>
        <input type="text" placeholder="ingrese módelo" id="modelo" name="modelo" required />
      </div>
      <div class="form-field">
        <label for="precio">Precio</label>
        <input type="number" placeholder="ingrese precio" id="precio" name="precio" required />
      </div>
      <div class="form-field">
        <label for="talla">Talla</label>
        <input type="text" placeholder="ingrese talla" id="talla" name="talla" required />
      </div>
      <div class="form-field">
        <label for="color">Color Producto</label>
        <input type="text" placeholder="ingrese color producto" id="color" name="color" required />
      </div>
      <div class="form-field">
        <label for="ubicacion">Ubicación</label>
        <input type="text" placeholder="ingrese ubicación" id="ubicacion" name="ubicacion" required />
      </div>
      <div></div>
      <div>
        <input class="button" type="submit" value="Actualizar" />
      </div>
    </form>
    <hr class="my-4" />
  </main>
  <footer>
    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </div>
  </footer>
</body>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script>
  $(document).ready(function() {
    $('#productos').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excel', 'csv', 'pdf'
      ]
    });
  });
</script>

</html>