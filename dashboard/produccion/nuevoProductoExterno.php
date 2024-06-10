<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: ../../HTML/sign-in.html");
  exit;
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
  <link rel="icon" href="../../IMAGES/favicon.png">
  <!-- Box icons
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>-->
  <!-- Normalize -->
  <link rel="stylesheet" href="../../HTML/styles/normalize.css">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
        <ul class="nav nav-tabs mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Productos Externos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="nuevoProductoFabricado.php" aria-current="page" href="#">Productos fabricados</a>
          </li>
        </ul>
        <h3 class="title">Registrar Productos Externos</h3>
        <form class="form" id="sign-up-form" action="registrarProducto.php" method="POST">

          <div class="form-field" style="display: none;">
            <label for="sign-up-form-funcionario">Funcionario</label>
            <input type="number" value="2" id="sign-up-form-funcionario" name="sign-up-form-funcionario" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-material">Material</label>
            <input type="text" placeholder="Ingrese material" id="sign-up-form-material" name="sign-up-form-material" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-producto">Nombre producto</label>
            <input type="text" placeholder="Ingrese nombre producto" id="sign-up-form-producto" name="sign-up-form-producto" required />
          </div>
          <div class="form-field">
            <label for="cantidad">Cantidad de productos</label>
            <input type="number" placeholder="Ingrese cantidad de productos" id="cantidad" name="cantidad" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-precio">Precio</label>
            <input type="number" placeholder="Ingrese precio" id="sign-up-form-precio" name="sign-up-form-precio" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-talla">Talla</label>
            <input type="text" placeholder="Ingrese talla" id="sign-up-form-talla" name="sign-up-form-talla" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-color">Color</label>
            <input type="text" placeholder="Ingrese color" id="sign-up-form-color" name="sign-up-form-color" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-ubicacion">Ubicación</label>
            <input type="text" placeholder="Ingrese ubicacion" id="sign-up-form-ubicacion" name="sign-up-form-ubicacion" required />
          </div>

          <input class="button mb-1" type="submit" value="Registrar Producto" />
        </form>
      </div>
    </section>

    <div class="copyright">
      <div class="bd-container">
        <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </div>
    </footer>
  </main>

  <!-- Scroll reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Main JS-->
  <!--<script src="../../js/techlogistic.js" defer></script>-->

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
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