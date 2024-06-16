<!--conexion de prueba para roles-->
<?php
session_start();
if ($_SESSION['nombre_usuario']) {
  $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
  $nombre_usuario = "Nombre de usuario no definido";
}

?>

<?php if ($_SESSION['tipo_usuario'] == 1 or $_SESSION['tipo_usuario'] == 2 or $_SESSION['tipo_usuario'] == 3) { ?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techlogistic</title>
    <meta name="description" content="">
    <!-- Favicon -->
    <link rel="icon" href="../IMAGES/favicon.png">
    <!-- Box icons-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Normalize -->
    <link rel="stylesheet" href="../HTML/styles/normalize.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../HTML/styles/techlogistic.css">
  </head>

  <body class="vh-100">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a href="indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../IMAGES/favicon.png" width="40" height="40" alt="" class="navigation__image">Techlogistic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <?php } ?>

      <?php if ($_SESSION['tipo_usuario'] == 2) { ?>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="indexdash.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="personas.php">| Personas |</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $nombre_usuario; ?></a>
            </li>
          <?php } ?>

          <?php if ($_SESSION['tipo_usuario'] == 3) { ?>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="indexdash.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><?php echo $nombre_usuario; ?></a>
                <?php } ?>

                <?php if ($_SESSION['tipo_usuario'] == 1) { ?>

                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="indexdash.php">| Inicio |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="personas.php">| Personas |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../PHP/consultarFuncionarios.php">| funcionarios |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo $nombre_usuario; ?></a>
                      </li>

                    <?php } ?>

                    <?php if ($_SESSION['tipo_usuario'] == 1 or $_SESSION['tipo_usuario'] == 2 or $_SESSION['tipo_usuario'] == 3) { ?>

                      <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
                      <li class="nav-item dropdown">
                        <div class="dropdown" role="group">
                          <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo" class="rounded-circle" width="38" height="38" />
                          </a>
                          <ul class="dropdown-menu dropdown-menu-lg-end">


                            <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
                          </ul>
                        </div>
                      </li>

                    <?php } ?>

                    </ul>
                  </div>
            </div>
    </nav>

    <?php if ($_SESSION['tipo_usuario'] == 1 or $_SESSION['tipo_usuario'] == 3 or $_SESSION['tipo_usuario'] == 2) { ?>

      <!-- Main -->
      <main class="container my-5 h-100">
        <h4 class="text-md-start text-left">Bienvenida/o a Techlogistic</h4>
        <hr>


      <?php } ?>

      <?php if ($_SESSION['tipo_usuario'] == 3) { ?>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
            <li class="nav-item">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./indexdash.php">Inicio</a>
            </li>
            <a class="nav-link">Costurero</a>
          <?php } ?>

          <?php if ($_SESSION['tipo_usuario'] == 1) { ?>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="indexdash.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="button" href="../HTML/sign-up.html">Registrar funcionario</a>
                </li>
                <li class="nav-item">
                  <h5>Administrador</h5>
                </li>


              <?php } ?>

              <?php if ($_SESSION['tipo_usuario'] == 2) { ?>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="indexdash.php">Inicio</a>
                    </li>
                    <a class="nav-link">Vendedor</a>
                  <?php } ?>

                  </ul>
                </div>
            </div>
            </nav>

            <!-- 4 Cards -->
            <div class="row g-4">
              <?php if ($_SESSION['tipo_usuario'] == 1) { ?>
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Proveedores</h5>
                      <p class="card-text mb-4">Permite la creación, almacenamiento y actualización de información detallada
                        de los proveedores.</p>
                      <div class="mt-auto">
                        <a href="../dashboard/proveedores/indexproveedores.php" class="button">Ir a
                          proveedores</a></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php if ($_SESSION['tipo_usuario'] == 3 or $_SESSION['tipo_usuario'] == 1) { ?>
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Producción</h5>
                      <p class="card-text mb-4">Se genera la creación, modificación y eliminación del producto final,
                        facilitando la generación y consulta de informes de producción.</p>
                      <div class="mt-auto">
                        <a href="../dashboard/produccion/indexproduccion.php" class="button">Ir a Producción</a></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Inventario</h5>
                      <p class="card-text mb-4">Mantén un registro detallado del inventario de productos, ventas y pedidos.
                        Gestiona la existencia de productos en bodega, registra reportes de ventas y pedidos, y controla las
                        devoluciones.</p>
                      <div class="mt-auto">
                        <a href="../dashboard/inventario/indexinventario.php" class="button">Ir a Inventario</a></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php if ($_SESSION['tipo_usuario'] == 1 or $_SESSION['tipo_usuario'] == 2) { ?>
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Ventas</h5>
                      <p class="card-text mb-4">Administra el proceso de ventas, desde el registro de la venta hasta la
                        generación
                        de facturas y cotizaciones.</p>
                      <div class="mt-auto">
                        <a href="../dashboard/ventas/indexventas.php" class="button">Ir a Ventas</a></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
      </main>


      <?php if ($_SESSION['tipo_usuario'] == 1 or $_SESSION['tipo_usuario'] == 2 or $_SESSION['tipo_usuario'] == 3) { ?>
        </footer>
        <div class="copyright">
          <div class="bd-container">
            <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
            <p><a href="../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
          </div>
        </div>
        </footer>
      <?php } ?>
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>

  </html>