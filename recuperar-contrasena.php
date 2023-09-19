<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techlogistic</title>
  <meta name="description" content="">
  <!-- Favicon -->
  <link rel="icon" href="./favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Normalize -->
  <link rel="stylesheet" href="./styles/normalize.css">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="./styles/techlogistic.css">
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
        <a href="index.html" class="navigation__logo" title="Techlogistic"><img src="./favicon.png" alt=""
            class="navigation__image">Techlogistic</a>
      </div>
      <div class="navigation__menu" id="navigation-menu">
        <ul class="navigation__list">
          <li class="navigation__item"><a href="./index.html#hero" class="navigation__link active-link">Acerca de</a></li>
          <li class="navigation__item"><a href="./index.html#about" class="navigation__link">Servicios</a></li>
          <li class="navigation__item"><a href="./index.html#contact" class="navigation__link">Contacto</a></li>
          <li class="navigation__item">
            <a href="./sign-in.html" class="button button-outline">Iniciar sesión</a>
          </li>
          <li class="navigation__item">
            <a href="./sign-up.html" class="button ">Registro</a>
          </li>
        </ul>
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
        <h3 class="title">Recuperar contraseña</h3>
        <p class="description mb-2 text-center">Te enviaremos un correo electrónico para recuperar tu contraseña</p>
        <form class="form" id="recovery-password-form">
          <div class="form-field" id="">
            <label for="recovery-password-form-email">Correo electrónico</label>
            <input
              type="email"
              placeholder="Ingresa tu correo electrónico"
              id="recovery-password-form-email"
              pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
              required
            />
          </div>
          <input class="button mb-1" type="submit" value="Recuperar contraseña" />
        </form>
      </div>
    </section>
<?php ?>

    <footer class="copyright">
      <div class="bd-container">
        <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="./terminos-y-condiciones.html">Términos y Condiciones</a> · <a
            href="./politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </footer>
  </main>

  <!-- Scroll reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Main JS-->
  <script src="./js/techlogistic.js"></script>
</body>

</html>