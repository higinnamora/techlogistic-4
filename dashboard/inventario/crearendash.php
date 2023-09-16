<?php 

$conex = new mysqli("localhost", "root", "", "techlogisticdb");

if (!$conex) {
    echo "fallo la conexion";
}

$id_func = $_POST["id_funcionario"];
$material = $_POST["material"];
$nombrepro = $_POST["nombreproducto"];
$modelo = $_POST["modelo"];
$preciopro = $_POST["precio"];
$talla = $_POST["talla"];
$color = $_POST["color"];
$ubicacion = $_POST["ubicacion"];


$sql = "INSERT INTO producto (id_funcionario, material, nombre_producto, modelo, precio, talla, color_producto, ubicacion) 
        VALUES('$id_func', '$material', '$nombrepro', '$modelo', '$preciopro', '$talla', '$color', '$ubicacion');";

if ($conex->query($sql) == true) {
    echo "Se registro exitosamente este producto";
}else{
    echo "fallo el registro del producto";
}


$conex->close();










?>