<?php
require 'vendor/autoload.php';
require 'admin/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

date_default_timezone_set('America/Bogota');

$fecha = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'] ?? 'desconocida';

// Verifica si es una duda rápida
if (isset($_POST['mensaje']) && !isset($_POST['nombre'])) {
    $mensaje = trim($_POST['mensaje']);
    if ($mensaje === '') {
        http_response_code(400);
        echo "Falta el mensaje";
        exit;
    }

    @mkdir('dudas_logs');
    file_put_contents("dudas_logs/duda_" . date('Ymd_His') . ".txt", "[$fecha][$ip]\n$mensaje");

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'elgurudeloscascos@gmail.com';
        $mail->Password = 'dtok tsxe qylk tvez';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('elgurudeloscascos@gmail.com', 'Dudas Gurú');
        $mail->addAddress('elgurudeloscascos@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Nueva duda recibida';
       $mail->Body = "
        <div style='background:#111;padding:20px;border-radius:10px;color:#0f0;'>
        <div style='text-align:center; margin-bottom:15px;'>
            <img src='https://elgurudeloscascos.com/assets/img/gurulogo.png' alt='Logo Gurú' style='height:60px;'>
        </div>
        <h3 style='color:#80ff80;'>Duda recibida</h3>
        <p><strong>Mensaje:</strong><br>" . nl2br(htmlspecialchars($mensaje)) . "</p>
        <hr>

        </div>";

        $mail->send();

        echo "OK";
        http_response_code(200);
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        http_response_code(500);
        echo "Error al enviar: {$mail->ErrorInfo}";
    }

    exit;
}

// Si es un formulario completo
$nombre = $_POST['nombre'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$marca = $_POST['marca'] ?? '';
$referencia = $_POST['referencia'] ?? '';$referencia = $_POST['referencia'] ?? '';
$observaciones = $_POST['observaciones'] ?? '';
$tipo = $_POST['tipo'] ?? null;

if ($nombre === '' || $telefono === '' || $marca === '' || $referencia === '') {
    http_response_code(400);
    echo "Faltan datos del formulario";
    exit;
}

// Guardar en DB
try {
    $stmt = $pdo->prepare("INSERT INTO formularios (fecha, nombre, telefono, marca, referencia, observaciones, ip, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fecha, $nombre, $telefono, $marca, $referencia, $observaciones, $ip, $tipo]);
} catch (Exception $e) {
    http_response_code(500);
    echo "Error al guardar en DB: " . $e->getMessage();
    exit;
}

// Guardar en Excel
$file = 'datos_formulario.xlsx';
if (file_exists($file)) {
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $row = $sheet->getHighestRow() + 1;
} else {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle("Formularios");
    $sheet->fromArray(['Fecha','Nombre','Teléfono','Marca','Referencia','Observaciones','IP'], NULL, 'A1');
    $row = 2;
}
$sheet->fromArray([$fecha, $nombre, $telefono, $marca, $referencia, $observaciones, $ip], NULL, "A$row");
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($file);
@mkdir('backups');
// copy($file, 'backups/backup_' . date('Y-m-d_H-i-s') . '.xlsx');

// Enviar correo
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elgurudeloscascos@gmail.com';
    $mail->Password = 'dtok tsxe qylk tvez';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('elgurudeloscascos@gmail.com', 'Formulario Gurú');
    $mail->addAddress('elgurudeloscascos@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo formulario recibido';
    $mail->Body = "
    <div style='max-width:600px;margin:auto;background-color:#1a1a1a;color:#fff;padding:20px;border-radius:10px;'>
    <div style='text-align:center; margin-bottom:20px;'>
        <img src='https://elgurudeloscascos.com/assets/img/gurulogo.png' alt='Logo Gurú' style='max-height:80px;'>
    </div>
    <h2 style='color:#00ff99;'>Formulario recibido</h2>
    <table style='width:100%;font-size:14px;'>
        <tr><td><strong>TIPO DE CONSULTA:</strong></td><td>" . ($tipo === 'compra' ? "<span style='color:#00ff99; text-decoration: underline;'>$tipo</span>" : htmlspecialchars($tipo)) . "</td></tr>
        <tr><td><strong>Fecha:</strong></td><td>$fecha</td></tr>
        <tr><td><strong>Nombre:</strong></td><td>$nombre</td></tr>
        <tr><td><strong>Teléfono:</strong></td><td>$telefono</td></tr>
        <tr><td><strong>Marca:</strong></td><td>$marca</td></tr>
        <tr><td><strong>Referencia:</strong></td><td>$referencia</td></tr>
        <tr><td><strong>Observaciones:</strong></td><td>$observaciones</td></tr>    
    </table>

    </div>";

    $mail->send();
} catch (Exception $e) {
    error_log("Mailer Error: {$mail->ErrorInfo}");
}

echo "Formulario enviado correctamente.";
http_response_code(200);
