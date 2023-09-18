<?php
$conexion;
include_once "../../conexion_a_la_DB.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nit = $_POST["sign-up-form-nit"];
    $persona = $_POST["sign-up-form-persona"];
    $razonSocial = $_POST["sign-up-form-razon"];
}
//echo "nit: ".$nit."\n";
//echo "persona: ".$persona."\n";
//echo "razon social: ".$razonSocial."\n";

$sql = "INSERT INTO proveedor(nit, id_persona, razon_social)   
        VALUES ('$nit', '$persona', '$razonSocial');";

if ($conexion->query($sql) == TRUE) {
    echo "Registro exitoso";
} else {
    echo "por favor verifique su informacion " . $conexion->error;
}
$conexion->close();
