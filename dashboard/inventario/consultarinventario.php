<?php

$conn = new mysqli('localhost', 'root', '', 'techlogisticdb');


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $consultar = $_POST["consultardash"];
}
 
if ($traerfuncion = $conn->prepare("CALL ConsultarProductosMateriasProveedores(?)")) {
//$traerfuncion->bind_param("i", $consultar);
 //$traerfuncion->execute();


$traerfuncion->bind_result(/*$codigoproducto, $codigofuncionario, */$material, $nombrepro, $modelo, $precio, $talla, $color, $ubicacion, /*$codigomaterial, $codigomateriaprima, 
$codigoproductom, */$gastomaterial, /*$codigoproveedor,*/ $nitproveedor, /*$codigopersona*/);


while ($row = $traerfuncion->fetch_assoc()) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>codigo del producto</th>";
    echo "<th>codigo del funcionario</th>";
    echo "<th>material de construccion</th>";
    echo "<th>nombre producto</th>";
    echo "<th>modelo</th>";
    echo "<th>precio</th>";
    echo "<th>talla</th>";
    echo "<th>color</th>";
    echo "<th>ubicacion</th>";
    echo "<th>codigo material</th>";
    echo "<th>codigo materia prima</th>";
    echo "<th>codigo producto</th>";
    echo "<th>gasto material</th>";
    echo "<th>codigo proveedor</th>";
    echo "<th>nit proveedor</th>";
    echo "<th>codigo personal</th>";
    //echo "<th>nombre empresa de proveedor</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    
        echo "<tr>"; 
      // echo "<td>" . $codigoproducto . "</td>";
       // echo "<td>" . $codigofuncionario . "</td>";
        echo "<td>" . $material . "</td>";
        echo "<td>" . $nombrepro . "</td>";
        echo "<td>" . $modelo . "</td>";
        echo "<td>" . $precio . "</td>";
        echo "<td>" . $talla . "</td>";
        echo "<td>" . $color . "</td>";
        echo "<td>" . $ubicacion . "</td>";
        //echo "<td>" . $codigomaterial . "</td>";
        //echo "<td>" . $codigomateriaprima . "</td>";
        //echo "<td>" . $codigoproductom . "</td>";
        echo "<td>" . $gastomaterial . "</td>";
        //echo "<td>" . $codigoproveedor . "</td>";
        echo "<td>" . $nitproveedor . "</td>";
        //echo "<td>" . $codigopersona . "</td>";
        //echo "<td>" . $nombreempresaproveedor . "</td>";
        
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    $traerfuncion->close();
}else{
    echo "producto no encontrado";
}

$conn->close();
?>