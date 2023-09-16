
<!-- Estamos validando que el usuario si tenga una sesion iniciada, de lo contrario se enviara a login-->
<?php
session_start();


if (!isset($_SESSION['tipo_usuario'])) {
    header("Location: ../../sign-in.html");
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
  <link rel="icon" href="../../favicon.png">
  <!-- Box icons-->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="../../styles/techlogistic.css">
</head>

<body class="vh-100">
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a href="../index.html" class="navbar-brand" title="Techlogistic"><img src="../../favicon.png" alt=""
          class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../proveedores/">Proveedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produccion/">Producción</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../inventario/">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../ventas/">Ventas</a>
          </li>
          <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
          <li class="nav-item dropdown">
            <div class="dropdown" role="group">
              <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo" class="rounded-circle" width="38" height="38" />
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="../../502.html" target="_blank">Mi perfil</a></li>
                <li><a class="dropdown-item" href="../../502.html" target="_blank">Configuración</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../../cerrar_sesion.php">Cerrar sesión</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main -->
  <main class="container my-5 h-100">
    <div class="d-flex flex-column flex-md-row justify-content-between">
      <h4 class="text-md-start text-left">Producción</h4>
      <div class="d-flex flex-column flex-md-row gap-2">
        <a href="./nueva-orden.html"> <button class="btn btn-primary w-auto">Agregar orden</button></a>
        <div class="input-group w-auto">
          <input type="text" class="form-control" placeholder="Buscar orden" aria-label="Buscar orden">
          <!-- Icon buscar -->
          <span class="input-group-text" id="basic-addon2"><i class='bx bx-search'></i></span>
        </div>
      </div>
    </div>
    <hr>
    <!-- Tabla de Producción -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Ordenes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Consumos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../404.html" target="_blank">Horarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Almacenes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../404.html" target="_blank">Informes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Maquinaria</a>
      </li>
    </ul>
  <div class="table-responsive">
    <table id="tablaproduccion" class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Número de Orden</th>
          <th scope="col">Fecha</th>
          <th scope="col">Producto</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Estado</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>ORD-2023-001</td>
          <td>2023-08-11</td>
          <td>Producto A</td>
          <td>100</td>
          <td>Pendiente</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary border-0" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bx-dots-horizontal-rounded'></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Editar</a></li>
                <li><a class="dropdown-item" href="#">Eliminar</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>ORD-2023-002</td>
          <td>2023-08-12</td>
          <td>Producto B</td>
          <td>75</td>
          <td>En Proceso</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary border-0" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bx-dots-horizontal-rounded'></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="#">Editar</a></li>
                <li><a class="dropdown-item" href="#">Eliminar</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>ORD-2023-003</td>
          <td>2023-08-12</td>
          <td>Producto C</td>
          <td>150</td>
          <td>Completada</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary border-0" type="button" id="dropdownMenuButton3"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bx-dots-horizontal-rounded'></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <li><a class="dropdown-item" href="#">Editar</a></li>
                <li><a class="dropdown-item" href="#">Eliminar</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <!-- ... (más filas de ejemplos) ... -->
      </tbody>
    </table>
  </div>
  </main>
</body>

  <footer class="copyright">
    <div class="bd-container">
      <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
      <p><a href="https://higinnamora.github.io/techlogistic/terminos-y-condiciones.html">Términos y Condiciones</a> · <a
          href="https://higinnamora.github.io/techlogistic/politica-de-privacidad.html">Política de Privacidad</a></p>
    </div>
  </footer>

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

   

</html>