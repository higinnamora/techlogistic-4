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
  <link rel="icon" href="../images/favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../HTML/styles/techlogistic.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="consultarFuncionarios.php" class="navbar-brand" title="Techlogistic"><img src="../images/favicon.png"
          alt="Logo Techlogistic" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="consultarFuncionarios.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="consultarFuncionarios.php">Funcionarios</a>
          </li>
          <!-- Menu desplegable de usuario -->
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

  <main class="container my-5">
    <div class="d-flex flex-column justify-content-between">
      <h4 class="text-center">Actualizar Correo y Contraseña</h4>
    </div>
    <hr>

    <!-- Formulario para seleccionar funcionario por correo electrónico y actualizar correo y contraseña -->
    <form id="update-form" action="actualizarFuncionarioback.php" method="POST" style="margin: 0 auto; width: 580px;">
      <!-- Campo para seleccionar funcionario por correo electrónico -->
      <input type="hidden" id="id_persona" name="id_persona" value="valor_del_id_persona_a_actualizar">
      <div class="form-field">
        <label class="form-label" for="correo_actual">Seleccionar Funcionario por Correo Electrónico:</label>
        <input class="form-control" type="email" id="correo_actual" name="correo_actual" required>
      </div>

      <!-- Campos para actualizar correo y contraseña -->
      <div class="form-field">
        <label class="form-label" for="sign-up-form-email">Nuevo Correo electrónico:</label>
        <input class="form-control" type="email" placeholder="Ingresa el nuevo correo electrónico"
          id="sign-up-form-email" name="sign-up-form-email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
          required>
      </div>
      <div class="form-field">
        <label class="form-label" for="sign-up-form-password">Nueva Contraseña:</label>
        <input class="form-control" type="password" placeholder="Ingresa la nueva contraseña" id="sign-up-form-password"
          name="sign-up-form-password" required>
      </div>
      <div class="form-field">
        <label class="form-label" for="sign-up-form-password-confirm">Confirmar Nueva Contraseña:</label>
        <input class="form-control" type="password" placeholder="Confirma la nueva contraseña"
          id="sign-up-form-password-confirm" name="sign-up-form-password-confirm" required>
      </div>

      <!-- Botón para actualizar -->
      <div class="form-field">
        <input class="button" type="submit" value="Actualizar">
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

<script src="https://unpkg.com/scrollreveal"></script>

</html>