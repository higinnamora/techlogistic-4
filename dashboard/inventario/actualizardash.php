<?php

$conn = new mysqli('localhost', 'root', '', 'techlogisticdb');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $actualizar = $_POST["consultardash"];
}


$sql = "SELECT * FROM producto 
        WHERE codigo_producto = '$consultar' or material = '$consultar' 
        or nombre_producto = '$consultar' or modelo = '$consultar' 
        or precio = '$consultar' or talla = '$consultar' or color_producto = '$consultar' 
        or ubicacion = '$consultar';";

if ($conn->query($sql) == true) {
        while ($row=$consultar->fetch_assoc()) {
            $codigopro = $row["codigo_producto"];
            $material = $row["material"];
            $nombrepro = $row["nombre_producto"];
            $modelo = $row["modelo"];
            $preciopro = $row["precio"];
            $talla = $row["talla"];
            $color = $row["color_producto"];
            $ubicacion = $row["ubicacion"];
        }

            echo $codigopro;
            echo $material;
            echo $nombrepro;
            echo $modelo;
            echo $preciopro;
            echo $talla;
            echo $color;
            echo $ubicacion;
        
}else{
    echo "producto no encontrado";
}




$conn->close();





?>