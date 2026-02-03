<?php
session_start();
if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

require 'db.php';

$producto_id = $_POST['producto_id'] ?? null;

if (!$producto_id || empty($_FILES['galeria']['name'][0])) {
    http_response_code(400);
    echo json_encode(['error' => 'Faltan datos']);
    exit;
}

$carpeta = __DIR__ . '/uploads/productos';
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0777, true);
}

// Obtener el orden máximo actual
$stmtOrden = $pdo->prepare("SELECT COALESCE(MAX(orden), -1) + 1 FROM tbl_producto_galeria WHERE producto_id = ?");
$stmtOrden->execute([$producto_id]);
$orden = (int) $stmtOrden->fetchColumn();

$subidas = [];

foreach ($_FILES['galeria']['tmp_name'] as $i => $tmpName) {
    if ($_FILES['galeria']['error'][$i] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['galeria']['name'][$i], PATHINFO_EXTENSION);
        $nombre = uniqid('gal_') . '.' . strtolower($ext);
        $ruta = $carpeta . '/' . $nombre;

        if (move_uploaded_file($tmpName, $ruta)) {
            $stmt = $pdo->prepare("INSERT INTO tbl_producto_galeria (producto_id, imagen, orden) VALUES (?, ?, ?)");
            $stmt->execute([$producto_id, $nombre, $orden]);
            $subidas[] = ['id' => $pdo->lastInsertId(), 'imagen' => $nombre];
            $orden++;
        }
    }
}

header('Content-Type: application/json');
echo json_encode(['ok' => true, 'imagenes' => $subidas]);
