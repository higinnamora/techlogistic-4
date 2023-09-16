
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
      <a href="../../indexprincipal.html" class="navbar-brand" title="Techlogistic"><img src="../../favicon.png" alt=""
          class="navigation__image">Techlogistic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../indexdash.php">Inicio</a>


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
      <h4 class="text-md-start text-left">Inventario</h4>
      <div class="d-flex flex-column flex-md-row gap-2">
        <a href="./nuevo-producto.html"> <button class="btn btn-primary w-auto" >Agregar producto</button></a>
        
        <!--<form action="consultarinventarios.php" method="POST">
        <div class="input-group w-auto">-->
          
          <!-- Icon buscar -->
          <!--<span class="input-group-text" id="basic-addon2"><i class='bx bx-search'></i></span>
          <input class="button mb-1" name="consultardash" type="submit" value="Consultar" />
        </div>
      </form>-->
      <form action="consultarinventariosimple.php" method="POST">
        <div class="input-group w-auto">
          <input type="text" class="form-control" placeholder="nombre del producto" name="consultasimple" aria-label="Buscar producto">
          <!-- Icon buscar -->
          <span class="input-group-text" id="basic-addon2"><i class='bx bx-search'></i></span>
          <input class="button mb-1" type="submit" value="buscar" />
      </form>
      </div>
    </div>
    <hr>
    
    <!-- Tabla de Inventario -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page"  href="#">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../404.html" target="_blank">Pedidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Ventas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../404.html" target="_blank">Reportes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../502.html" target="_blank">Devoluciones</a>
      </li>
    </ul>
<br><br>



    <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Código de producto</th>
          <th scope="col">Nombre de producto</th>
          <th scope="col">Categoría</th>
          <th scope="col">Marca</th>
          <th scope="col">Cantidad en bodega</th>
          <th scope="col">Precio unitario</th>
          <th scope="col">Ingreso</th>
          <th scope="col">Vencimiento</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">#P12345</th>
          <td>Camisa de algodón</td>
          <td>Ropa</td>
          <td>FashCo</td>
          <td>50</td>
          <td>$25</td>
          <td>2023-03-01</td>
          <td>N/A</td>
          <td>

            <div class="dropdown">
              <button class="btn btn-sm btn-outline-secondary border-0" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bx-dots-horizontal-rounded'></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="./actualizardash.php">Editar</a></li>
                <li><a class="dropdown-item" href="./eliminardash.php">Eliminar</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <tr>
          <th>#P82733</th>
          <td>Pantalon de Jean</td>
          <td>Ropa</td>
          <td>RiverUs</td>
          <td>50</td>
          <td>$35</td>
          <td>2023-03-01</td>
          <td>N/A</td>
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
      </tbody>
    </table>
  </div>
  </main>
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

</body>

</html>