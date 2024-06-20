<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techlogistic</title>
  <meta name="description" content="">
  <!-- Favicon -->
  <link rel="icon" href="../../images/favicon.png">
  <!-- Box icons
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>-->
  <!-- Normalize -->
  <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</head>


<body>
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
            <a class="nav-link" aria-current="page" href="./pedidos.php">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./pedidosActualizacion.php">Actualizar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./pedidosEliminar.php">Eliminar</a>
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
  <main class="main">
    <section class="section section-auth">
      <div class="wrapper-box">
        <h3 class="title">Registrar Pedido</h3>
        <form class="form" id="sign-up-form" action="registroPedido.php" method="POST">
          <div class="form-field">
            <label for="codigoProducto" class="form-label">Fecha de Pedido</label>
            <input type="date" class="form-control" name="fechafactura" id="fechafactura" readonly>
          </div>
          <div class="form-field">
            <label for="sign-up-form-materia">Materia Prima</label>
            <select id="sign-up-form-materia" name="sign-up-form-materia" class="form-control" required>
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
          </div>
          <div class="form-field">
            <label for="sign-up-form-proveedor">Proveedor</label>
            <select id="sign-up-form-proveedor" name="sign-up-form-proveedor" class="form-control" required>
              <option value="" disabled selected hidden>Seleccione</option>
              <?php
              $conexion;
              include_once "../../PHP/conexion_a_la_DB.php";
              if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->connect_error);
              }
              $sql = "SELECT id_proveedor, razon_social FROM proveedores";
              $result = $conexion->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id_proveedor'] . "'>" . $row['razon_social'] . "</option>";
                }
              }
              $conexion->close();
              ?>
            </select>
          </div>
          <div class="form-field">
            <label for="sign-up-form-cantidad">Cantidad</label>
            <input type="number" placeholder="0" id="sign-up-form-cantidad" name="sign-up-form-cantidad" required />
          </div>
          <div class="form-field">
            <input type="hidden" id="sign-up-form-siniva" name="sign-up-form-siniva" required />
          </div>
          <div class="form-field">
            <input type="hidden" id="sign-up-form-iva" name="sign-up-form-iva" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-coniva">Valor Total</label>
            <input type="number" placeholder="0" id="sign-up-form-coniva" name="sign-up-form-coniva" required />
          </div>
          <input class="button mb-1" type="submit" value="Registrar Pediddo" />
        </form>
      </div>
    </section>

    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a
            href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </div>
    </footer>
  </main>

  <!-- Scroll reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
    var fechaActual = new Date().toISOString().split('T')[0];
    document.getElementById("fechafactura").value = fechaActual;

    document.getElementById("sign-up-form-coniva").addEventListener("input", function () {
      var conIva = parseFloat(this.value);
      var iva = conIva * 0.19;
      var sinIva = conIva - iva;

      document.getElementById("sign-up-form-iva").value = iva.toFixed(2);
      document.getElementById("sign-up-form-siniva").value = sinIva.toFixed(2);
    });

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