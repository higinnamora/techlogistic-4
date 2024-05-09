<?php
include_once "../LIBRERIAS/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

$conexion;
include_once "./conexion_a_la_DB.php";
if($_SERVER["REQUEST_METHOD"] == "POST")

    $archivo = $_FILES['archivo'];
    $carga_archivo = PHPExcel_IOFactory::load($archivo);

    // Obtener la hoja activa
    $sheet = $carga_archivo->getActiveSheet();

    // Iterar sobre las filas
    foreach ($sheet->getRowIterator() as $row) {
        $rowData = $row->getCells();
        
        // Suponiendo que el archivo Excel tiene tres columnas
        $columna1 = $rowData[0]->getValue();
        $columna2 = $rowData[1]->getValue();
        $columna3 = $rowData[2]->getValue();
        $columna4 = $rowData[3]->getValue();
        $columna5 = $rowData[4]->getValue();

        // Insertar en la base de datos
        $sql = "INSERT INTO materia_prima (id_funcionario, color_materia, precio, cantidad_materia, descripcion_materia) 
        VALUES ('$columna1', '$columna2', '$columna3', '$columna4', '$columna5')";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro insertado correctamente <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }








?>