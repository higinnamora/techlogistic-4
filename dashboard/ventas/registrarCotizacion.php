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
        <form style="margin: 0 auto; width: 580px;" id="form-new-sale" action="registrarCotizacionBackend.php" method="POST">
            <h4 class="text-md-start text-left">Nueva Cotizacion</h4>
            <div class="form-field">
                <label class="form-label" for="sign-up-form-numcargo">Cotizacion realizada por</label>
                <input type="text" class="form-control" name="vendedor" id="vendedor" value="<?php echo $nombre_usuario; ?>" required>
                <input type="hidden" name="funcionario" value="<?php echo $tipo_usuario; ?>">
            </div>
            <div class="form-field">
                <label for="codigoProducto" class="form-label">Fecha de cotización</label>
                <input type="date" class="form-control" name="fechaCotizacion" id="fechaCotizacion" required>
            </div>
            <div class="form-field">
                <label for="tipoCotizacion" class="form-label">Tipo de cotización</label>
                <input type="text" class="form-control" name="tipoCotizacion" id="tipoCotizacion" required>
            </div>
            <div class="form-field">
                <label class="form-label" for="documento">Número de documento</label>
                <input class="form-control" type="text" id="documento" name="documento" placeholder="Ingrese el número de documento" required />
            </div>
            <div class="form-field">
                <input class="form-control" type="hidden" id="id_persona" name="id_persona" readonly />
            </div>
            <div class="form-field">
                <input class="form-control" type="hidden" id="numeroCotizacion" name="numeroCotizacion" value="<?php echo $numeroCotizacion; ?>" readonly />
            </div>
            <div id="productos-container">
                <div class="producto-group">
                    <div class="form-field">
                        <label class="form-label" for="producto">Producto</label>
                        <select name="producto[]" class="form-select producto" required>
                            <option value="" disabled selected hidden>Seleccione un producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value="<?php echo $producto['codigo_producto']; ?>"><?php echo $producto['nombre_producto']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="cantidad">Cantidad</label>
                        <input type="number" class="form-control cantidad" name="cantidad[]" placeholder="cantidad" required>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="subtotal">Subtotal ($)</label>
                        <input type="text" class="form-control subtotal" name="subtotal[]" placeholder="0" required>
                    </div>
                </div>
            </div>
            <div class="form-field">
                <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar Producto</button>
            </div>
            <div class="form-field">
                <label for="total" class="form-label">Total ($)</label>
                <input type="text" class="form-control" name="total" id="total" placeholder="0" required>
            </div>
            <div class="form-field">
                <label for="observaciones" class="form-label">Observaciones</label>
                <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="observaciones">
            </div>
            <input type="submit" class="button" value="Realizar cotización" />
        </form>
    </main>
    <footer>
        <div class="copyright">
            <div class="bd-container">
                <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
                <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
            </div>
        </div>
    </footer>
</body>

</html>