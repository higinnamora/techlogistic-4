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
            <h4 class="text-md-start text-left">Hacer devolución</h4>

        <div class="search-container">
            <form class="search-box" action="devolucion.php" method="POST">
                <input type="text" name="query" placeholder="Buscar devolucion">
                <button type="submit">Buscar</button>
            </form>
            <div id="resultados"></div>
        </div>


        <?php
            $conexion;
            include_once "../../PHP/conexion_a_la_DB.php";

            $sql = "SELECT * FROM materia_prima;";
            $result = mysqli_query($conexion, $sql);

            echo '<table class="table">
            <thead>
                <tr>
                    <th scope="scope" >numero orde de venta</th>
                    <th scope="scope" >Color Materia</th>
                    <th scope="scope" >Precio</th>
                    <th scope="scope" >Cantidad Materia</th>
                    <th scope="scope" >Descripción Materia</th>
                </tr>
            </thead>
            <tbody>';
            if ($rta = $conexion->query($sql)) {
                while ($row = $rta->fetch_assoc()) {
                    $idMateriaPrima = $row["id_materia_prima"];
                    $colorMateria = $row["color_materia"];
                    $precio = $row["precio"];
                    $cantidadMateria = $row["cantidad_materia"];
                    $descripcionMateria = $row["descripcion_materia"];
                    echo "
            <tr>
                <td>$idMateriaPrima</td>
                <td>$colorMateria</td>
                <td>$precio</td>
                <td>$cantidadMateria</td>
                <td>$descripcionMateria</td>
            </tr>";
                }
                echo "</tbody></table>\n";
                $rta->free();
            }
            ?>




            
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