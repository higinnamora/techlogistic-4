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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../../HTML/styles/techlogistic.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body class="vh-100">
    <!-- Header -->
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
                    <!-- Menu desplegable d-c flexon foto del  flex-columnusuario -->
                    <li class="nav-item dropdown">
                        <div class="dropdown" role="group">
                            <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://higinnamora.github.io/techlogistic/images/profile/profile.png" alt="mdo" class="rounded-circle" width="38" height="38" />
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
            <h4 class="text-md-start text-left">Materia prima</h4>
            <div class="d-flex flex-column flex-md-row gap-2">
                <a href="registrarMateria.html"> <button class="button w-auto">Agregar materia prima</button></a>
            </div>
        </div>
        <hr>
        <!-- Tabla de proveedores -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="indexproveedores.php">Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="materiaPrima.php">Materia Prima</a>
            </li>
            <!-- Pedidos
            <li class="nav-item">
                <a class="nav-link" href="pedidos.php">Pedidos</a>
            </li> -->
        </ul>

        <div class="table-responsive">

            <?php
            $conexion;
            include_once "../../PHP/conexion_a_la_DB.php";

            $sql = "SELECT * FROM materia_prima;";
            $result = mysqli_query($conexion, $sql);

            echo '<table class="table">
            <thead>
                <tr> 
                    <th scope="scope" >Id Materia Prima</th>
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
        </div>
        <h4>Actualizar Materia prima</h4>
        <form class="form" id="sign-up-form" action="actualizarmateriaprima.php" method="POST">

            <div class="form-field">
                <label for="idmateriaprima">Id</label>
                <input type="text" placeholder="Ingrese el id a actualizar" id="idmateriaprima" name="idmateriaprima" required />
            </div>

            <div class="form-field">
                <label for="colormateria">Color materia</label>
                <input type="text" placeholder="Ingrese color" id="colormateria" name="colormateria" required />
            </div>

            <div class="form-field">
                <label for="precio">Precio</label>
                <input type="number" placeholder="Ingrese el precio" id="precio" name="precio" required />
            </div>

            <div class="form-field">
                <label for="cantidad">Cantidad</label>
                <input type="text" placeholder="Ingrese cantidad" id="cantidad" name="cantidad" required />
            </div>

            <div class="form-field">
                <label for="descripcion">Descripción</label>
                <input type="text" placeholder="Ingrese descripcion" id="descripcion" name="descripcion" required />
            </div>
            <div>
                <input class="button" type="submit" value="Actualizar" />
            </div>
        </form>

        <hr class="my-4">

        <h4>Eliminar materia prima</h4>
        <form class="newsletter-form" action="eliminarmateria.php" id="newsletter-form" method="POST">
            <div class="form-field">
                <input type="text" name="eliminarmateria" placeholder="Id " class="newsletter-input" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
            </div>
            <button class="button" type="submit">Eliminar</button>
        </form>
    </main><br><br>
    <br><br>

    <footer>
        <div class="copyright">
            <div class="bd-container">
                <p>💙 © 2024 Techlogistic. Todos los derechos reservados. 💚</p>
                <p><a href="../../HTML/terminos-y-condiciones.html">Términos y Condiciones</a> · <a href="../../HTML/politica-de-privacidad.html">Política de Privacidad</a></p>
            </div>
        </div>
    </footer>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

</html>