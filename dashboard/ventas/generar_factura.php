<?php
header('Content-Type: text/html; charset=utf-8');
use PhpOffice\PhpSpreadsheet\IOFactory;
require '../../vendor/autoload.php';

$conexion;
include_once "../../PHP/conexion_a_la_DB.php";

$numeroOrden = $_GET['numero_orden_venta'];

$sql = "SELECT ov.numero_orden_venta, ov.fecha_factura, ov.doc_identidad, ov.nombre_cliente,
               dv.producto, dv.cantidad, dv.subtotal
        FROM orden_venta ov
        INNER JOIN detalle_venta dv ON ov.numero_orden_venta = dv.numero_orden_venta
        WHERE ov.numero_orden_venta = '$numeroOrden'";

$result = $conexion->query($sql);
$objPHPExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

$objPHPExcel->getProperties()->setCreator("Techlogistic")
    ->setLastModifiedBy("Techlogistic")
    ->setTitle("$numeroOrden")
    ->setSubject("OrdenDeVenta")
    ->setDescription("OrdenDeVenta generada desde datos de la base de datos")
    ->setKeywords("OrdenDeVenta excel phpspreadsheet")
    ->setCategory("OrdenDeVenta");

// Establecer el nombre de la hoja de trabajo
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();
$sheet->setTitle("$numeroOrden");

// Agregar los datos de la orden de venta a la hoja de trabajo
$sheet->setCellValue('A1', 'Número de Orden');
$sheet->setCellValue('B1', 'Fecha');
$sheet->setCellValue('C1', 'Documento de Identidad');
$sheet->setCellValue('D1', 'Nombre del Cliente');
$sheet->setCellValue('E1', 'Producto / Valor por unidad');
$sheet->setCellValue('F1', 'Cantidad');
$sheet->setCellValue('G1', 'Subtotal');
$sheet->setCellValue('H1', 'TOTAL');

$row = 2;
$total = 0;
if ($result->num_rows > 0) {
    while ($row_data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, strip_tags($row_data["numero_orden_venta"]));
        $sheet->setCellValue('B' . $row, strip_tags($row_data["fecha_factura"]));
        $sheet->setCellValue('C' . $row, strip_tags($row_data["doc_identidad"]));
        $sheet->setCellValue('D' . $row, strip_tags($row_data["nombre_cliente"]));
        $sheet->setCellValue('E' . $row, strip_tags($row_data["producto"]));
        $sheet->setCellValue('F' . $row, strip_tags($row_data["cantidad"]));
        $sheet->setCellValue('G' . $row, strip_tags($row_data["subtotal"]));
        $total += $row_data["subtotal"];
        $row++;
    }
}

$sheet->setCellValue('H' . $row, $total); 

// Establecer el ancho de las columnas
$sheet->getColumnDimension('A')->setWidth(15);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(30);
$sheet->getColumnDimension('E')->setWidth(30);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15); 

// Ajustar el estilo de la celda para que sea más legible
$sheet->getStyle('A1:H1')->getFont()->setBold(true);
$sheet->getStyle('A1:H' . $row)->getAlignment()->setWrapText(true);

// Crear el archivo Excel
$objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');

// Nombre del archivo Excel
$nombre_archivo = "$numeroOrden.xlsx";

// Encabezado para forzar la descarga del archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombre_archivo . '"');
header('Cache-Control: max-age=0');

// Escribir el archivo Excel en la salida
$objWriter->save('php://output');

$conexion->close();