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
  <link rel="icon" href="./favicon.png">
  <!-- Box icons
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>-->
  <!-- Normalize -->
  <link rel="stylesheet" href="../STYLES/normalize.css">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../HTML/styles/techlogistic.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>


<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="./indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../images/favicon.png" alt="" class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./indexdash.php">Inicio</a>
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
  <!-- Tabla de proveedores -->
  <ul class="nav nav-tabs mb-4">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="consultarFuncionarios.php">Consultar funcionarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Registrar funcionario</a>
      </li>
    </ul>
  <main class="main">
    <section class="section section-auth">
      <div class="wrapper-box">
        <h3 class="title">Registrar funcionario</h3>
        <form class="form" id="sign-up-form" action="crearFuncionario.php" method="POST">
          <div class="form-field">
            <label class="form-label" for="sign-up-form-numcargo">Cargo</label>
            <select name="sign-up-form-numcargo" class="form-select">>
              <option value="1">1 Administrador</option>
              <option value="2">2 Vendedor</option>
              <option value="3">3 Costurero</option>
            </select>
          </div>
          <div class="form-field">
            <label class="form-label" for="documento">Número de documento</label>
            <input class="form-control" type="text" id="documento" name="documento" placeholder="Ingrese el número de documento" required />
          </div>
          <div class="form-field">
            <input class="form-control" type="hidden" id="id_persona" name="id_persona" readonly />
          </div>
          <div class="form-field">
            <label class="form-label" for="primer_nombre">Primer Nombre</label>
            <input class="form-control" type="text" id="primer_nombre" name="primer_nombre" readonly />
          </div>
          <div class="form-field">
            <label class="form-label" for="segundo_nombre">Segundo Nombre</label>
            <input class="form-control" type="text" id="segundo_nombre" name="segundo_nombre" readonly />
          </div>
          <div class="form-field">
            <label class="form-label" for="primer_apellido">Primer Apellido</label>
            <input class="form-control" type="text" id="primer_apellido" name="primer_apellido" readonly />
          </div>
          <div class="form-field">
            <label class="form-label" for="segundo_apellido">Segundo Apellido</label>
            <input class="form-control" type="text" id="segundo_apellido" name="segundo_apellido" readonly />
          </div>

          <div class="form-field">
            <label class="form-label" for="sign-up-form-horario">Horario</label>
            <input class="form-control" type="text" placeholder="Ingrese el horario del funcionario" id="sign-up-form-horario" name="sign-up-form-horario" required />
          </div>

          <div class="form-field">
            <label class="form-label" for="sign-up-form-salario">Salario</label>
            <input class="form-control" type="number" placeholder="Sin puntos ni comas" id="sign-up-form-salario" name="sign-up-form-salario" required />
          </div>

          <div class="form-field">
            <label class="form-label" for="sign-up-form-email">Correo electrónico</label>
            <input class="form-control" type="email" placeholder="Ingresa tu correo electrónico" id="sign-up-form-email" name="sign-up-form-email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required />
          </div>
          <div class="form-field">
            <label class="form-label" for="sign-up-form-password">Contraseña</label>
            <input class="form-control" type="password" placeholder="Ingresa tu contraseña" id="sign-up-form-password" name="sign-up-form-password" required />
          </div>
          <div class="form-field">
            <label class="form-label" for="sign-up-form-password-confirm">Confirmar contraseña</label>
            <input class="form-control" type="password" placeholder="Confirma tu contraseña" id="sign-up-form-password-confirm" name="sign-up-form-password-confirm" title="La contraseña debe tener al menos 8 caracteres" required />
          </div>
          <input class="button mb-1" type="submit" value="Registrar" />

        </form>
      </div>
    </section>

    <footer class="copyright">
      <div class="bd-container">
        <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
        <p><a href="../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
      </div>
    </footer>
  </main>

  <script src="https://unpkg.com/scrollreveal"></script>
  <!--<script src="./js/techlogistic.js" defer></script>-->

  <script>
    document.getElementById('documento').addEventListener('change', function() {
      var documento = this.value;
      if (documento.trim() !== '') {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../PHP/obtener_persona.php?id=' + documento, true);
        xhr.onload = function() {
          if (xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            document.getElementById('id_persona').value = data.id_persona;
            document.getElementById('primer_nombre').value = data.primer_nombre;
            document.getElementById('segundo_nombre').value = data.segundo_nombre;
            document.getElementById('primer_apellido').value = data.primer_apellido;
            document.getElementById('segundo_apellido').value = data.segundo_apellido;
          }
        };
        xhr.send();
      } else {
        document.getElementById('id_persona').value = '';
        document.getElementById('primer_nombre').value = '';
        document.getElementById('segundo_nombre').value = '';
        document.getElementById('primer_apellido').value = '';
        document.getElementById('segundo_apellido').value = '';
      }
    });
  </script>
</body>

</html>