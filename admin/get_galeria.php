<?php
session_start();
if (!isset($_SESSION['admin'])) {
    http_response_code(403);
    echo json_encode([]);
    exit;
}

require 'db.php';

$producto_id = $_GET['producto_id'] ?? null;

if (!$producto_id) {
    http_response_code(400);
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("SELECT id, imagen, orden FROM tbl_producto_galeria WHERE producto_id = ? ORDER BY orden ASC");
$stmt->execute([$producto_id]);
$galeria = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($galeria);
