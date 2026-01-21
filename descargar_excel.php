<?php
require 'vendor/autoload.php';
require __DIR__ . '/admin/db.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Obtener datos desde la tabla 'formularios'
$stmt = $pdo->query("SELECT * FROM formularios ORDER BY fecha DESC");
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear nuevo Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle("Formularios");

// Encabezados
$sheet->setCellValue('A1', 'Fecha');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Teléfono');
$sheet->setCellValue('D1', 'Marca');
$sheet->setCellValue('E1', 'Referencia');
$sheet->setCellValue('F1', 'Observaciones');
$sheet->setCellValue('G1', 'IP');

// Datos
$fila = 2;
foreach ($datos as $item) {
    $sheet->setCellValue("A{$fila}", $item['fecha']);
    $sheet->setCellValue("B{$fila}", $item['nombre']);
    $sheet->setCellValue("C{$fila}", $item['telefono']);
    $sheet->setCellValue("D{$fila}", $item['marca']);
    $sheet->setCellValue("E{$fila}", $item['referencia']);
    $sheet->setCellValue("F{$fila}", $item['observaciones']);
    $sheet->setCellValue("G{$fila}", $item['ip']);
    $fila++;
}

// Descargar
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="formularios.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
