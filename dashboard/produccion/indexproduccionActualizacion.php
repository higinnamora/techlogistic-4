<?php
session_start();
if ($_SESSION['nombre_usuario']) {
  $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
  $nombre_usuario = "Nombre de usuario no definido";
}

if ($_SESSION['tipo_usuario']) {
  $tipo_usuario = $_SESSION['tipo_usuario'];
} else {
  $tipo_usuario = "Tipo de usuario no definido";
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
            <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./indexproduccion.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./nuevoProducto.php">Registrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./indexproduccionEliminar.php">Eliminar</a>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo" class="rounded-circle" width="38" height="38" />
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
    <form id="update-form" action="editarProducto.php" method="POST" style="margin: 0 auto; width: 580px;">
      <div class="form-field">
        <label class="form-label" for="numcargo">Funcionario</label>
        <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $nombre_usuario; ?>" readonly>
        <input type="hidden" name="funcionario" value="<?php echo $tipo_usuario; ?>">
      </div>
      <div class="form-field">
        <label for="codigo_producto">Código Producto</label>
        <input type="number" placeholder="ingrese código producto" id="codigo_producto" name="codigo_producto" required />
      </div>
      <!-- Codigo para cuando se solucione la llave foranea con materia prima, funciona pero lo ideal es que tenga lalve foranea -->
      <!--
          <div class="form-field">
            <label for="material">Materia Prima</label>
            <select id="material" name="material" class="form-control" required>
              <option value="" disabled selected hidden>Seleccione</option>
              <?php
              $conexion;
              include_once "../../PHP/conexion_a_la_DB.php";
              if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->connect_error);
              }
              $sql = "SELECT id_materia_prima, descripcion_materia FROM materia_prima";
              $result = $conexion->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_materia_prima'] . "'>" . $row['descripcion_materia'] . "</option>";
                }
              }
              ?>
            </select>
          </div> -->
      <div class="form-field">
        <label for="material">Materia Prima</label>
        <input type="text" placeholder="Ingrese nombre producto" id="material" name="material" required />
      </div>
      <div class="form-field">
        <label for="producto">Nombre producto</label>
        <input type="text" placeholder="Ingrese nombre producto" id="producto" name="producto" required />
      </div>
      <div class="form-field">
        <label for="cantidad">Cantidad de productos</label>
        <input type="number" placeholder="Ingrese cantidad de productos" id="cantidad" name="cantidad" required />
      </div>
      <div class="form-field">
        <label for="precio">Precio</label>
        <input type="number" placeholder="Ingrese precio" id="precio" name="precio" required />
      </div>
      <div class="form-field">
        <label for="talla">Talla</label>
        <input type="text" placeholder="Ingrese talla" id="talla" name="talla" required />
      </div>
      <div class="form-field">
        <label for="color">Color</label>
        <input type="text" placeholder="Ingrese color" id="color" name="color" required />
      </div>
      <div class="form-field">
        <label for="ubicacion">Ubicación</label>
        <input type="text" placeholder="Ingrese ubicacion" id="ubicacion" name="ubicacion" required />
      </div>
      <input class="button mb-1" type="submit" value="Actualizar Producto" />
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