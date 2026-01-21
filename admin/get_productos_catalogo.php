<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM tbl_productos ORDER BY fecha_creacion DESC");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($productos);
