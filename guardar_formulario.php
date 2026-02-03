<?php
require 'vendor/autoload.php';
require 'admin/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

date_default_timezone_set('America/Bogota');

function verificarRecaptcha($response) {
    if (empty($response)) return false;
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => RECAPTCHA_SECRET_KEY,
        'response' => $response,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ];
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $result = file_get_contents($url, false, stream_context_create($options));
    if ($result === false) return false;
    $json = json_decode($result, true);
    return isset($json['success']) && $json['success'] === true;
}

$fecha = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'] ?? 'desconocida';

// Validar reCAPTCHA en todos los envíos
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
if (!verificarRecaptcha($recaptchaResponse)) {
    http_response_code(403);
    echo "Error: Verificación reCAPTCHA fallida.";
    exit;
}

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
            <img src='https://elgurudeloscascos.com/assets/img/logos_new/logo_fondo_negro.png' alt='Logo Gurú' style='height:60px;'>
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
$referencia = $_POST['referencia'] ?? '';
$observaciones = $_POST['observaciones'] ?? '';
$tipo = $_POST['tipo'] ?? null;

if ($nombre === '' || $telefono === '' || $marca === '' || $referencia === '') {
    http_response_code(400);
    echo "Faltan datos del formulario";
    exit;
}

// Procesar imagen de referencia (opcional)
$imagen_referencia = null;
if (isset($_FILES['imagen_ref']) && $_FILES['imagen_ref']['error'] === UPLOAD_ERR_OK) {
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['imagen_ref']['tmp_name']);
    finfo_close($finfo);

    if (in_array($mime, $allowed) && $_FILES['imagen_ref']['size'] <= 5 * 1024 * 1024) {
        $uploadDir = 'uploads/referencias/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $ext = pathinfo($_FILES['imagen_ref']['name'], PATHINFO_EXTENSION);
        $filename = 'ref_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        if (move_uploaded_file($_FILES['imagen_ref']['tmp_name'], $uploadDir . $filename)) {
            $imagen_referencia = $uploadDir . $filename;
        }
    }
}

// Guardar en DB
try {
    $stmt = $pdo->prepare("INSERT INTO formularios (fecha, nombre, telefono, marca, referencia, observaciones, ip, tipo, imagen_referencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fecha, $nombre, $telefono, $marca, $referencia, $observaciones, $ip, $tipo, $imagen_referencia]);
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
        <img src='https://elgurudeloscascos.com/assets/img/logos_new/logo_fondo_negro.png' alt='Logo Gurú' style='max-height:80px;'>
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
        <tr><td><strong>Imagen ref:</strong></td><td>" . ($imagen_referencia ? "Sí (adjunta)" : "No") . "</td></tr>
    </table>

    </div>";

    if ($imagen_referencia && file_exists($imagen_referencia)) {
        $mail->addAttachment($imagen_referencia);
    }

    $mail->send();
} catch (Exception $e) {
    error_log("Mailer Error: {$mail->ErrorInfo}");
}

echo "Formulario enviado correctamente.";
http_response_code(200);
