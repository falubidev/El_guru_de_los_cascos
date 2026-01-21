<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$archivo = 'datos_formulario.xlsx';
$ipActual = $_SERVER['REMOTE_ADDR'];
$limiteAdvertencia = 2;
$limiteBloqueo = 4;
$repeticiones = 0;
$fechaHoy = date('Y-m-d'); 

if (file_exists($archivo)) {
    $spreadsheet = IOFactory::load($archivo);
    $sheet = $spreadsheet->getActiveSheet();
    $filas = $sheet->getHighestRow();

    for ($i = 2; $i <= $filas; $i++) {
        $ip = trim($sheet->getCell("G$i")->getValue());
        $fechaRaw = $sheet->getCell("A$i")->getFormattedValue(); 

        // Asegúrate que la fecha esté en formato YYYY-MM-DD
        $fechaConvertida = date('Y-m-d', strtotime($fechaRaw));

        if ($ip === $ipActual && $fechaConvertida === $fechaHoy) {
            $repeticiones++;
        }
    }
}

header('Content-Type: application/json');
echo json_encode([
    'count' => $repeticiones,
    'limitAdvertencia' => $limiteAdvertencia,
    'limitBloqueo' => $limiteBloqueo
]);
