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
$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

$sql = "SELECT codigo_producto, nombre_producto, precio FROM producto";
$result = $conexion->query($sql);

$productos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techlogistic</title>
    <meta name="description" content="">
    <link rel="icon" href="../../images/favicon.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="../../PHP/indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../images/favicon.png" alt="Logo Techlogistic" class="navigation__image">Techlogistic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./indexventas.php">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../../HTML/sign-up.html">Agregar persona</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown" role="group">
                            <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo" class="rounded-circle" width="38" height="38" />
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
        <form style="margin: 0 auto; width: 580px;" id="form-new-sale" action="crearventa2.php" method="POST">
            <h4 class="text-md-start text-left">Nueva venta</h4>
            <div class="form-field">
                <label class="form-label" for="sign-up-form-numcargo">Venta realizada por</label>
                <input type="text" class="form-control" name="vendedor" id="vendedor" value="<?php echo $nombre_usuario; ?>" readonly>
                <input type="hidden" name="funcionario" value="<?php echo $tipo_usuario; ?>">
            </div>
            <div class="form-field">
                <label for="codigoProducto" class="form-label">Fecha de compra</label>
                <input type="date" class="form-control" name="fechafactura" id="fechafactura" readonly>
            </div>
            <div class="form-field">
                <label class="form-label" for="sign-up-form-numcargo">Medio de pago</label>
                <select name="mediodepago" class="form-select" required>
                    <option value="" disabled selected hidden>Seleccione</option>
                    <option value="1">1 Efectivo</option>
                    <option value="2">2 Tarjeta crédito</option>
                    <option value="3">3 Tarjeta débito</option>
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
                <label for="primer_nombre" class="form-label">Nombre del cliente</label>
                <input type="text" name="primer_nombre" class="form-control" id="primer_nombre" readonly>
            </div>
            <div class="form-field">
                <label class="form-label" for="primer_apellido">Apellido del cliente</label>
                <input class="form-control" type="text" id="primer_apellido" name="primer_apellido" readonly />
            </div>
            <div id="productos-container">
                <div class="producto-group">
                    <div class="form-field">
                        <label class="form-label" for="producto">Producto</label>
                        <select name="producto[]" class="form-select producto" onchange="calcularSubtotal(this)" required>
                            <option value="" disabled selected hidden>Seleccione un producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value="<?php echo $producto['codigo_producto']; ?>" data-precio="<?php echo $producto['precio']; ?>"><?php echo $producto['nombre_producto']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="cantidad">Cantidad</label>
                        <input type="number" class="form-control cantidad" min="1" id="cantidad" name="cantidad[]" placeholder="cantidad" required onchange="calcularSubtotal(this)">
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="subtotal">Subtotal ($)</label>
                        <input type="text" class="form-control subtotal" name="subtotal[]" placeholder="0" readonly>
                    </div>
                </div>
            </div>
            <div class="form-field">
                <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar Producto</button>
            </div>
            <div class="form-field">
                <label for="total" class="form-label">Total ($)</label>
                <input type="text" class="form-control" name="total" id="total" placeholder="0" readonly>
            </div>
            <input type="submit" class="button" value="Agregar venta" />
        </form>
    </main>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Registro completado ✅</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="successModalMessage">
                    <!-- Mensaje de éxito dinámico -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="copyright">
            <div class="bd-container">
                <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
                <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
            </div>
        </div>
    </footer>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        var fechaActual = new Date().toISOString().split('T')[0];
        document.getElementById("fechafactura").value = fechaActual;

        document.getElementById('documento').addEventListener('change', function() {
            var documento = this.value;
            if (documento.trim() !== '') {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../../PHP/obtener_persona.php?id=' + documento, true);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        var data = JSON.parse(xhr.responseText);
                        document.getElementById('id_persona').value = data.id_persona;
                        document.getElementById('primer_nombre').value = data.primer_nombre;
                        document.getElementById('primer_apellido').value = data.primer_apellido;
                    }
                };
                xhr.send();
            } else {
                document.getElementById('id_persona').value = '';
                document.getElementById('primer_nombre').value = '';
                document.getElementById('primer_apellido').value = '';
            }
        });

        function calcularSubtotal(element) {
            var productoGroup = element.closest('.producto-group');
            var productoSelect = productoGroup.querySelector('.producto');
            var cantidadInput = productoGroup.querySelector('.cantidad');
            var subtotalInput = productoGroup.querySelector('.subtotal');

            var precio = productoSelect.options[productoSelect.selectedIndex].getAttribute('data-precio');
            var cantidad = cantidadInput.value;

            if (precio && cantidad) {
                var subtotal = parseFloat(precio) * parseInt(cantidad);
                subtotalInput.value = subtotal.toFixed(2);
            } else {
                subtotalInput.value = 0;
            }

            calcularTotal();
        }

        function calcularTotal() {
            var subtotals = document.querySelectorAll('.subtotal');
            var totalInput = document.getElementById('total');
            var total = 0;

            subtotals.forEach(function(subtotal) {
                total += parseFloat(subtotal.value) || 0;
            });

            totalInput.value = total.toFixed(2);
        }

        function agregarProducto() {
            var productosContainer = document.getElementById('productos-container');
            var productoGroup = document.createElement('div');
            productoGroup.className = 'producto-group';
            productoGroup.innerHTML = `
                <div class="form-field">
                    <label class="form-label" for="producto">Producto</label>
                    <select name="producto[]" class="form-select producto" onchange="calcularSubtotal(this)" required>
                        <option value="" disabled selected hidden>Seleccione un producto</option>
                        <?php foreach ($productos as $producto) : ?>
                            <option value="<?php echo $producto['codigo_producto']; ?>" data-precio="<?php echo $producto['precio']; ?>"><?php echo $producto['nombre_producto']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-field">
                    <label class="form-label" for="cantidad">Cantidad</label>
                    <input type="number" class="form-control cantidad" min="1" id="cantidad" name="cantidad[]" placeholder="cantidad" required onchange="calcularSubtotal(this)">
                </div>
                <div class="form-field">
                    <label class="form-label" for="subtotal">Subtotal ($)</label>
                    <input type="text" class="form-control subtotal" name="subtotal[]" placeholder="0" readonly>
                </div>
            `;
            productosContainer.appendChild(productoGroup);
        }

        document.getElementById('cantidad').addEventListener('input', function () {
            var value = this.value;
            if (value < 0) {
                this.value = 1;
            }
        });
    </script>
</body>

</html>