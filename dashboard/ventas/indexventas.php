<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: /techlogistic-4/HTML/404.html");
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
            <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php"> Inicio </a>
          </li>
          <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
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

  <!-- Main -->
  <main class="container my-5 h-100">
    <div class="d-flex flex-column flex-md-row justify-content-between">
      <h4 class="text-md-start text-left">Ventas</h4>
      <!-- Aun no se ha implemantado
      <div>
        <form class="search-box" action="buscarDevolucion.php" method="POST">
          <input type="text" name="query" style="height: 40px" placeholder="Buscar devolución">
          <a class="button w-auto" style="margin-left: 12px" type="submit">Devolución</a>
        </form>
      </div>
      -->
      <div class="actions-table">
        <div class="action-item">
          <a class="button margin-left" aria-current="page" href="./nueva-venta2.php">Registrar venta<i
              class='bx bx-folder-plus icons-styles'></i></a>
        </div>
        <div class="action-item">
          <a class="button margin-left" aria-current="page" href="../../HTML/sign-up.html">Agregar persona<i
              class='bx bx-folder-plus icons-styles'></i></a>
        </div>
      </div>
    </div>
    <hr>
    <ul class="nav nav-tabs mb-2">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="indexventas.php">Ventas</a>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="cotizacion.php">Cotización</a>
      </li>-->
    </ul>
    <div class="table-responsive">
      <?php
      $conexion;
      include_once "../../PHP/conexion_a_la_DB.php";
      $sql = "SELECT numero_orden_venta, fecha_factura, doc_identidad, nombre_cliente FROM orden_venta;";
      $datos = $conexion->query($sql);
      $result = mysqli_query($conexion, $sql);

      echo '<table id="ventas" style="color: black;" class="">
            <thead>
                <tr> 
                    <th scope="scope" >Número Orden de venta</th>
                    <th scope="scope" >Fecha de factura</th>
                    <th scope="scope" >Doc. Identificación</th>
                    <th scope="scope" >Nombre cliente</th>
                    <th scope="scope">Detalle</th>
                </tr>
            </thead>
            <tbody>';
      if ($rta = $conexion->query($sql)) {
        while ($row = $rta->fetch_assoc()) {
          $numero = $row["numero_orden_venta"];
          $fecha = $row["fecha_factura"];
          $documento = $row["doc_identidad"];
          $nombre = $row["nombre_cliente"];
          echo "
            <tr>
                <td>$numero</td>
                <td>$fecha</td>
                <td>$documento</td>
                <td>$nombre</td>
                <td class='text-center'><a class='button' href='./ver_detalle.php?numero=$numero'><i class='bx bx-search-alt-2'></i></a></td>
            </tr>";
        }
        echo "</tbody></table>\n";
        $rta->free();
      }
      ?>

    </div>
    <hr class="my-5">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script>
  $(document).ready(function () {
    $('#ventas').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excel', 'csv', 'pdf'
      ],
      language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar MENU registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de MAX registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
          "copy": "Copiar",
          "colvis": "Visibilidad"
        }
      }
    });
  });

  function generarFactura(numeroVenta) {
    const numeroOrdenVenta = numeroVenta || $(this).data('numero-orden');
    window.location.href = "generar_factura.php?numero_orden_venta=" + numeroOrdenVenta;
  }
</script>

</html>