<?php
$conexion;
include_once "../../conexion_a_la_DB.php";

$idProveedor;
$nit;
$idPersona;
$razonSocial;

$sql = "SELECT id_proveedor FROM proveedor;";
$datos = $conexion->query($sql);
$fila;
foreach ($datos as $fila) {
    foreach ($fila as $valor) {
      echo "$valor \n\n";
      
    }
}



$sql ="SELECT * FROM proveedor where nit = '123a';";
    $result = mysqli_query($conexion,$sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idProveedor = $row["id_proveedor"];
            $nit = $row["nit"];
            $idPersona = $row["id_persona"];
            $razonSocial = $row["razon_social"];
            
        }
    } else {
        echo "\nNo se encontraron resultados en la tabla.";
    }
    echo "ID: " . $idProveedor . 
    ", Nit: " . $nit . 
    ", Id Persona: " . $idPersona . 
    ", Razon social: " . $razonSocial . "<br>\n\n";
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nit = $_POST["sign-up-form-nit"];
    $persona = $_POST["sign-up-form-persona"];
    $razonSocial = $_POST["sign-up-form-razon"];
}*/
echo "Nit: " . $nit . "<br>";
echo "Id persona: " . $idPersona . "<br>";
echo "Razon social: " . $razonSocial . "<br>";

/*
$sql = "INSERT INTO proveedor(nit, id_persona, razon_social)   
        VALUES ('$nit', '$persona', '$razonSocial');";

if ($conexion->query($sql) == TRUE) {
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();
*/
/*
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_proveedor"])) {
    $idProveedor = $_GET["id_proveedor"];
  
    // Obtener los datos del proveedor usando su ID
    $sql = "SELECT nit, id_persona, razon_social FROM proveedor WHERE id_proveedor = $idProveedor";
    $result = $conexion->query($sql);
  
    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $nit = $row["nit"];
      $idPersona = $row["id_persona"];
      $razonSocial = $row["razon_social"];
    } else {
      echo "Proveedor no encontrado.";
      exit;
    }
  } else {
    echo "ID de proveedor no proporcionado.";
    exit;
  }
  ?>
  
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <!-- Resto de tus etiquetas head -->
  </head>
  <body>
    <!-- Resto de tu código HTML -->
  
    <form action="actualizarProveedor.php" method="POST">
      <input type="hidden" name="idProveedor" value="<?php echo $idProveedor; ?>">
      <label for="sign-up-form-nit">Nit:</label>
      <input type="text" id="sign-up-form-nit" name="sign-up-form-nit" value="<?php echo $nit; ?>"><br>
  
      <label for="sign-up-form-persona">Id persona:</label>
      <input type="text" id="sign-up-form-persona" name="sign-up-form-persona" value="<?php echo $idPersona; ?>"><br>
  
      <label for="sign-up-form-razon">Razon social:</label>
      <input type="text" id="sign-up-form-razon" name="sign-up-form-razon" value="<?php echo $razonSocial; ?>"><br>
  
      <button type="submit">Actualizar</button>
    </form>
  
    <!-- Resto de tu código HTML -->
  
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
  </html>
*/

