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
    <link rel="icon" href="../../IMAGES/favicon.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../STYLES/techlogistic.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="../../PHP/indexdash.php" class="navbar-brand" title="Techlogistic"><img src="../../IMAGES/favicon.png" alt="" class="navigation__image">Techlogistic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
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
        <form style="margin: 0 auto; width: 580px;" id="form-new-sale" action="crearventa.php" method="POST">
            <h4 class="text-md-start text-left">Nueva venta</h4>
            <div class="form-field">
                <label class="form-label" for="sign-up-form-numcargo">Venta realizada por</label>
                <input type="text" class="form-control" name="vendedor" id="vendedor" value="<?php echo $nombre_usuario; ?>" readonly>
                <input type="hidden" name="funcionario" value="<?php echo $tipo_usuario; ?>">
            </div>
            <!-- Otros campos del formulario -->
            <div class="form-field">
                <label class="form-label" for="sign-up-form-numcargo">Género cliente</label>
                <select name="tipocliente" class="form-select" required>
                    <option value="" disabled selected hidden>Seleccione</option>
                    <option value="2">Masculino</option>
                    <option value="3">Femenino</option>
                </select>
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
            <?php
            $conexion;
            include_once "../../PHP/conexion_a_la_DB.php";

            $sql = "SELECT nombre_producto FROM producto";
            $resultado = mysqli_query($conexion, $sql);

            $productos = [];
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $productos[] = $fila["nombre_producto"];
                }
            }
            ?>
            <div id="productos-container">
                <div class="form-field product-div">
                    <label class="form-label" for="descripcion">Producto</label>
                    <select name="descripcion[]" class="form-select product-select" required>
                        <option value="" disabled selected hidden>Seleccione</option>
                        <?php foreach ($productos as $producto) { ?>
                            <option value="<?php echo $producto; ?>"><?php echo $producto; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-field product-div">
                    <label for="cantidadpro" class="form-label">Cantidad de productos</label>
                    <input type="number" name="cantidadpro[]" class="form-control" placeholder="Ingrese cantidad de productos" required>
                </div>
            </div>
            <div class="form-field">
                <button type="button" id="addProduct" class="btn btn-primary">Agregar Producto</button>
            </div>
            <div class="form-field">
                <label for="descuento" class="form-label">Descuento</label>
                <input type="text" class="form-control" name="descuento" id="descuento" placeholder="Ingrese descuento" required>
            </div>
            <div class="form-field">
                <label for="codigoProducto" class="form-label">Fecha de compra</label>
                <input type="date" class="form-control" name="fechafactura" id="fechafactura" required>
            </div>
            <div class="form-field">
                <label for="subtotal" class="form-label">Subtotal ($)</label>
                <input type="text" class="form-control" name="subtotal" id="subtotal" placeholder="0" required>
            </div>
            <div class="form-field">
                <label for="total" class="form-label">Total ($)</label>
                <input type="text" class="form-control" name="total" id="total" placeholder="0" required>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productosContainer = document.getElementById('productos-container');
            const addProductButton = document.getElementById('addProduct');

            function addProductDiv() {
                const newDiv = document.createElement('div');
                newDiv.className = 'form-field product-div';
                newDiv.innerHTML = `
                    <label class="form-label" for="descripcion">Producto</label>
                    <select name="descripcion[]" class="form-select product-select" required>
                        <option value="" disabled selected hidden>Seleccione</option>
                        <?php foreach ($productos as $producto) { ?>
                            <option value="<?php echo $producto; ?>"><?php echo $producto; ?></option
                    <?php } ?>
                </select>
            `;
            productosContainer.appendChild(newDiv);
        }

        productosContainer.addEventListener('change', (event) => {
            if (event.target.classList.contains('product-select') && event.target.value !== '') {
                // Verificar si no se ha agregado un nuevo campo aún
                const selects = productosContainer.getElementsByClassName('product-select');
                if (selects[selects.length - 1] === event.target) {
                    addProductSelect();
                }
            }
        });

        // Agregar el primer campo de producto al cargar la página
        addProductSelect();
    });
</script>
    <div class="copyright">
        <div class="bd-container">
            <p>💙 © 2023 Techlogistic. Todos los derechos reservados. 💚</p>
            <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../../js/techlogistic.js"></script>
</body>

</html>