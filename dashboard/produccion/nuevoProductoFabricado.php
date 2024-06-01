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
  <link rel="stylesheet" href="../../STYLES/normalize.css">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../STYLES/techlogistic.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</head>


<body>
  <!-- Scroll top -->
  <a href="#" class="scrolltop" id="scroll-top" title="Scroll top">
    <i class='bx bx-chevron-up scrolltop__icon'></i>
  </a>
  <!-- Header -->
  <header class="header" id="header">
    <nav class="navigation bd-container">
      <div class="navigation__container-logo">
        <a href="../../PHP/indexdash.php" class="navigation__logo" title="Techlogistic"><img src="../../IMAGES/favicon.png" alt=""
            class="navigation__image">Techlogistic</a>
      </div>

      <div class="navigation__toggle" id="navigation-toggle">
        <i class='bx bx-menu'></i>
      </div>
    </nav>
  </header>
  <!-- Main-->
  <main class="main">
    <section class="section section-auth">
      <div class="wrapper-box">
      <ul class="nav nav-tabs mb-2">
      <li class="nav-item">
        <a class="nav-link active" href="nuevoProductoExterno.php" aria-current="page" href="#">Productos Externos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Productos fabricados</a>
      </li>
    </ul>
        <h3 class="title">Registrar Productos Fabricados</h3>
        <form class="form" id="sign-up-form" action="registrarProductoFabricado.php" method="POST">

          <div class="form-field" style="display: none;">
            <label for="sign-up-form-funcionario">Funcionario</label>
            <input type="number" value="2" id="sign-up-form-funcionario" name="sign-up-form-funcionario" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-material">Material</label>
            <input type="text" placeholder="Ingrese material" id="sign-up-form-material" name="sign-up-form-material"
              required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-producto">Nombre producto</label>
            <input type="text" placeholder="Ingrese nombre producto" id="sign-up-form-producto"
              name="sign-up-form-producto" required />
          </div>
          <div class="form-field">
            <label for="cantidad">Cantidad de productos</label>
            <input type="number" placeholder="Ingrese cantidad de productos" id="cantidad" name="cantidad"
              required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-precio">Precio</label>
            <input type="number" placeholder="Ingrese precio" id="sign-up-form-precio" name="sign-up-form-precio"
              required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-talla">Talla</label>
            <input type="text" placeholder="Ingrese talla" id="sign-up-form-talla" name="sign-up-form-talla"
              required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-color">Color</label>
            <input type="text" placeholder="Ingrese color" id="sign-up-form-color" name="sign-up-form-color" required />
          </div>
          <div class="form-field">
            <label for="sign-up-form-ubicacion">Ubicación</label>
            <input type="text" placeholder="Ingrese ubicacion" id="sign-up-form-ubicacion" name="sign-up-form-ubicacion"
              required />
          </div>
          <div class="form-field">
            <label for="utilizado">Material Utilizado</label>
            <input type="text" placeholder="Ingrese metros cuadrados" id="utilizado" name="utilizado"
              required />
          </div>

          <input class="button mb-1" type="submit" value="Registrar Producto" />
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