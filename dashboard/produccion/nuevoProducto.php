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
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techlogistic</title>
  <meta name="description" content="">
  <!-- Favicon -->
  <link rel="icon" href="../../images/favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="../../PHP/indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../images/favicon.png"
          alt="Logo Techlogistic" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./indexproduccion.php">Producción</a>
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

  <main class="container my-5">
    <div class="d-flex flex-column justify-content-between">
      <h4 class="text-center">Registrar Producto</h4>
    </div>
    <hr>
    <form id="sign-up-form" action="registrarProducto.php" method="POST" style="margin: 0 auto; width: 580px;">
      <div class="form-field">
        <label for="numcargo">Funcionario:</label>
        <input type="text" class="form-control" name="usuario" id="usuario" value=" <?php echo $nombre_usuario; ?>"
          readonly />
        <input type="hidden" name="funcionario" value="<?php echo $tipo_usuario; ?>">
      </div>
      <!-- Codigo para cuando se solucione la llave foranea con materia prima, funciona pero lo ideal es que tenga lalve foranea -->
      <!--
          <div class="form-field">
            <label for="material">Materia Prima</label>
            <select id="material" name="material" class="form-control" required>
              <option value="" disabled selected hidden>Seleccione</option> </select>
          </div> -->
      <!-- <?php
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
      ?> -->
      <div class="form-field">
        <label for="material">Materia Prima:</label>
        <input type="text" placeholder="Ingresa el nombre del producto" id="material" name="material" required />
      </div>
      <div class="form-field">
        <label for="producto">Nombre Producto:</label>
        <input type="text" placeholder="Ingresa el nombre del producto" id="producto" name="producto" required />
      </div>
      <div class="form-field">
        <label for="cantidad">Cantidad de Productos:</label>
        <input type="number" placeholder="Ingresa la cantidad de productos" min="1" id="cantidad" name="cantidad"
          required />
      </div>
      <div class="form-field">
        <label for="precio">Precio:</label>
        <input type="number" placeholder="Ingresa el precio" min="1" id="precio" name="precio" required />
      </div>
      <div class="form-field">
        <label for="talla">Talla:</label>
        <input type="text" placeholder="Ingresa la talla" id="talla" name="talla" required />
      </div>
      <div class="form-field">
        <label for="color">Color:</label>
        <input type="text" placeholder="Ingresa el color" id="color" name="color" required />
      </div>
      <div class="form-field">
        <label for="ubicacion">Ubicación</label>
        <input type="text" placeholder="Ingresa la ubicación" id="ubicacion" name="ubicacion" required />
      </div>
      <div>
        <input class="button" type="submit" value="Registrar" />
      </div>
    </form>
    <hr class="my-4">
  </main>
  <footer>
    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a
            href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </div>
  </footer>

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
<!-- Scroll reveal -->
<script src="https://unpkg.com/scrollreveal"></script>
<script>
  function validarFormulario(event) { //Validar Cantidad
    var cantidad = document.getElementById('cantidad').value;
    cantidad = parseInt(cantidad);
    if (cantidad < 1) {
      alert('La cantidad de productos debe ser mayor o igual a 1');
      event.preventDefault();
    }
    var precio = document.getElementById('precio').value;
    precio = parseInt(precio);
    if (precio < 1) {
      alert('El precio debe ser mayor o igual a 1');
      event.preventDefault();
    }
  }
  document.getElementById('sign-up-form').addEventListener('submit', validarFormulario);

  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
</body>

</html>