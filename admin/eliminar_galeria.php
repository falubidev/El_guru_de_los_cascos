<?php
session_start();
if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    echo 'No autorizado';
    exit;
}

require 'db.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    http_response_code(400);
    echo 'Falta ID';
    exit;
}

// Obtener nombre de imagen antes de eliminar
$stmt = $pdo->prepare("SELECT imagen FROM tbl_producto_galeria WHERE id = ?");
$stmt->execute([$id]);
$img = $stmt->fetchColumn();

if ($img) {
    $ruta = __DIR__ . '/uploads/productos/' . $img;
    if (file_exists($ruta)) {
        unlink($ruta);
    }
    $stmtDel = $pdo->prepare("DELETE FROM tbl_producto_galeria WHERE id = ?");
    $stmtDel->execute([$id]);
    echo 'ok';
} else {
    http_response_code(404);
    echo 'No encontrada';
}
