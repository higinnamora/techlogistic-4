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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="../../PHP/indexdash.php" class="navbar-brand" title="Techlogistic"><img
                    src="../../images/favicon.png" alt="Logo Techlogistic" class="navigation__image">Techlogistic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php"> Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./indexventas.php">Ventas</a>
                    </li>
                    <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
                    <li class="nav-item dropdown">
                        <div class="dropdown" role="group">
                            <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png"
                                    alt="mdo" class="rounded-circle" width="38" height="38" />
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
            <h4 class="text-md-start text-left">Detalle Venta</h4>
        </div>
        <hr>
        <div class="table-responsive">
            <?php
            $conexion;
            include_once "../../PHP/conexion_a_la_DB.php";
            if (isset($_GET['numero'])) {
                $numero = $_GET['numero'];
                $sql = "SELECT ov.numero_orden_venta, ov.fecha_factura, ov.doc_identidad, ov.nombre_cliente,
                               dv.producto, dv.cantidad, dv.subtotal
                        FROM orden_venta ov
                        INNER JOIN detalle_venta dv ON ov.numero_orden_venta = dv.numero_orden_venta
                        WHERE ov.numero_orden_venta = '$numero'";

                $datos = $conexion->query($sql);
                if ($datos->num_rows > 0) {
                    $total = 0;
                    echo '<table id="ventas" class="table">
                          <thead>
                              <tr> 
                                  <th scope="col">Número Orden de venta</th>
                                  <th scope="col">Fecha de factura</th>
                                  <th scope="col">Doc. Identificación</th>
                                  <th scope="col">Nombre cliente</th>
                                  <th scope="col">Producto</th>
                                  <th scope="col">Cantidad</th>
                                  <th scope="col">Sub-total</th>
                                  <th scope="col">Total</th>
                              </tr>
                          </thead>
                          <tbody>';
                    $row_primero = $datos->fetch_assoc();
                    $numero_orden_venta = $row_primero["numero_orden_venta"];
                    $fecha_factura = $row_primero["fecha_factura"];
                    $doc_identidad = $row_primero["doc_identidad"];
                    $nombre_cliente = $row_primero["nombre_cliente"];
                    echo "
                        <tr>
                            <td>$numero_orden_venta</td>
                            <td>$fecha_factura</td>
                            <td>$doc_identidad</td>
                            <td>$nombre_cliente</td>
                            <td>{$row_primero['producto']}</td>
                            <td>{$row_primero['cantidad']}</td>
                            <td>{$row_primero['subtotal']}</td>
                            <td></td> <!-- Espacio para el total, se calculará más adelante -->
                        </tr>";
                    $total += $row_primero['subtotal'];
                    while ($row = $datos->fetch_assoc()) {
                        echo "
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{$row['producto']}</td>
                                <td>{$row['cantidad']}</td>
                                <td>{$row['subtotal']}</td>
                                <td></td> <!-- Espacio para el total -->
                            </tr>";
                        $total += $row['subtotal'];
                    }
                    echo "
                        <tr>
                            <td colspan='6'></td>
                            <td>Total</td>
                            <td>$total</td>
                        </tr>";

                    echo "</tbody></table>\n";
                } else {
                    echo "No se encontraron resultados para el número de orden de venta especificado.";
                }
            } else {
                echo "Número de orden de venta no especificado.";
            }
            ?>
        </div>
        <hr class="my-5">
    </main>
    <footer>
        <div class="copyright footer-absolute">
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
</script>

</html>