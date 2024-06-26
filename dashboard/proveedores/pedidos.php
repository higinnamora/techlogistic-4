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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body class="vh-100">
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
                        <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
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
                                <!--<li><a class="dropdown-item" href="#">Mi perfil</a></li>-->
                                <!--<li><a class="dropdown-item" href="#">Configuración</a></li>-->
                                <!--<li>
                  <hr class="dropdown-divider">
                </li>-->
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
            <h4 class="text-md-start text-left">Pedidos</h4>
            <div class="actions-table">
                <div class="action-item">
                    <a class="button margin-left" aria-current="page" href="./registrarPedido.php">Registrar<i
                            class='bx bx-folder-plus icons-styles'></i></a>
                </div>
                <div class="action-item">
                    <a class="button margin-left" aria-current="page" href="./pedidosActualizacion.php">Actualizar<i
                            class='bx bx-edit icons-styles'></i></a>
                </div>
                <div class="action-item">
                    <a class="button margin-left" aria-current="page" href="./pedidosEliminar.php">Eliminar<i
                            class='bx bx-trash icons-styles'></i></a>
                </div>
            </div>
        </div>
        <hr>
        <!-- Tabla de proveedores -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="indexproveedores.php">Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="materiaPrima.php">Materia Prima</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  active" aria-current="page" href="#">Pedidos</a>
            </li>
        </ul>

        <div class="table-responsive">

            <?php
            $conexion;
            include_once "../../PHP/conexion_a_la_DB.php";
            $sql = "SELECT 
                        pedidos.id_pedido,
                        pedidos.fecha_pedido,
                        materia_prima.descripcion_materia AS id_materia_prima,
                        proveedores.razon_social AS id_proveedor,
                        pedidos.cantidad_pedido,
                        pedidos.valor_bruto,
                        pedidos.iva,
                        pedidos.valor_total
                    FROM 
                        pedidos
                        JOIN materia_prima ON pedidos.id_materia_prima = materia_prima.id_materia_prima
                        JOIN proveedores ON pedidos.id_proveedor = proveedores.id_proveedor;";
            $result = mysqli_query($conexion, $sql);

            echo '<table id="pedidos" style= "color: #000"; class="">
            <thead>
                <tr> 
                    <th scope="scope" >Id Pedido</th>
                    <th scope="scope" >Id Materia prima</th>
                    <th scope="scope" >Id Proveedor</th>
                    <th scope="scope" >Cantidad pedido</th>
                    <th scope="scope" >Fecha Pedido</th>
                    <th scope="scope" >Valor bruto</th>
                    <th scope="scope" >Iva</th>
                    <th scope="scope" >Valor Total</th>
                </tr>
            </thead>
            <tbody>';
            if ($rta = $conexion->query($sql)) {
                while ($row = $rta->fetch_assoc()) {
                    $idPedido = $row["id_pedido"];
                    $IdMateria = $row["id_materia_prima"];
                    $idProveedor = $row["id_proveedor"];
                    $cantidad = $row["cantidad_pedido"];
                    $fecha = $row["fecha_pedido"];
                    $valorBruto = $row["valor_bruto"];
                    $iva = $row["iva"];
                    $valor_total = $row["valor_total"];
                    #$devolucion = $row["devolucion"];
                    #$devolucionTexto = ($devolucion == 1) ? "SI" : "NO";
                    echo "
            <tr>
                <td>$idPedido</td>
                <td>$IdMateria</td>
                <td>$idProveedor</td>
                <td>$cantidad</td>
                <td>$fecha</td>
                <td>$valorBruto</td>
                <td>$iva</td>
                <td>$valor_total</td>
            </tr>";
                }
                echo "</tbody></table>\n";
                $rta->free();
            }
            ?>
        </div>
        <hr class="my-4">
    </main><br><br>
    <br><br>

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
        $('#pedidos').DataTable({
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