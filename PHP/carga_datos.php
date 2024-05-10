<?php

require '../composer/vendor/autoload.php';
$conexion;
include_once "./conexion_a_la_DB.php";
class MyReadfilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadfilter{

    public function readCell($colum, $row, $worksheetName = '') {
        if ($row>1){
            return true;
        }
        return false;
    }
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = '../Base de datos/carga de datos.xlsx';

$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

$reader->setReadFilter( new MyReadfilter() );

$spreadsheet = $reader->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();
foreach($cantidad as $row){
    if($cantidad[0] !=''){
        $sql = "INSERT INTO materia_prima (id_funcionario, color_materia, precio, cantidad_materia, descripcion_materia, categoria_materia_id_categoria) 
        VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]')";
        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro insertado correctamente </br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
}
$conexion->close();
?>