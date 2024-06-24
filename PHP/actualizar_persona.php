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
                        <a class="nav-link active" aria-current="page" href="../../PHP/indexdash.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../PHP/personas.php">Personas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../dashboard/ventas/indexventas.php">Ventas</a>
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

    <main class="container my-5 h-100">
        <div class="d-flex flex-column justify-content-between">
            <h4 class="text-center">Actualizar Persona</h4>
        </div>
        <hr>
        <form id="sign-up-form" action="actualizarPersona.php" method="POST" style="margin: 0 auto; width: 580px;">
            <div class="form-field">
                <label class="form-label" for="documento">Número de documento:</label>
                <input class="form-control" type="text" id="documento" name="documento"
                    placeholder="Ingresa el número de documento" required />
            </div>
            <div class="form-field">
                <input class="form-control" type="hidden" id="id_persona" name="id_persona" required />
            </div>
            <div class="form-field">
                <label class="form-label" for="primer_nombre">Primer Nombre:</label>
                <input class="form-control" type="text" id="primer_nombre" name="primer_nombre"
                    placeholder="Ingresa el primer nombre" required />
            </div>
            <div class="form-field">
                <label class="form-label" for="segundo_nombre">Segundo
                    Nombre:</label>
                <input class="form-control" placeholder="Ingresa el segundo nombre" type="text" id="segundo_nombre"
                    name="segundo_nombre" />
            </div>
            <div class="form-field">
                <label class="form-label" for="primer_apellido">Primer
                    Apellido:</label>
                <input class="form-control" placeholder="Ingresa el primer apellido" type="text" id="primer_apellido"
                    name="primer_apellido" required />
            </div>
            <div class="form-field">
                <label class="form-label" for="segundo_apellido">Segundo
                    Apellido:</label>
                <input class="form-control" placeholder="Ingresa el segundo apellido" type="text" id="segundo_apellido"
                    name="segundo_apellido" />
            </div>
            <div>
                <input class="button" type="submit" value="Actualizar" />
            </div>
        </form>
        <hr class="my-4">
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
    document.getElementById('documento').addEventListener('change', function () {
        var documento = this.value;
        if (documento.trim() !== '') {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../PHP/obtener_persona.php?id=' + documento, true);
            xhr.onload = function () {
                if (xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    document.getElementById('id_persona').value = data.id_persona;
                    document.getElementById('primer_nombre').value = data.primer_nombre;
                    document.getElementById('segundo_nombre').value = data.segundo_nombre;
                    document.getElementById('primer_apellido').value = data.primer_apellido;
                    document.getElementById('segundo_apellido').value = data.segundo_apellido;
                }
            };
            xhr.send();
        } else {
            document.getElementById('id_persona').value = '';
            document.getElementById('primer_nombre').value = '';
            document.getElementById('segundo_nombre').value = '';
            document.getElementById('primer_apellido').value = '';
            document.getElementById('segundo_apellido').value = '';
        }
    });
</script>

</html>