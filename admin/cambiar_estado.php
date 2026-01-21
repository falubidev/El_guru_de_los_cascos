<?php
require 'db.php';

$id = $_POST['id'] ?? 0;
$estado = $_POST['estado'] ?? '';

if ($id && in_array($estado, ['PENDIENTE', 'RESUELTO', 'CANCELADO'])) {
    $stmt = $pdo->prepare("UPDATE formularios SET estado = ? WHERE id = ?");
    $stmt->execute([$estado, $id]);
}

header('Location: dashboard.php'); // Ajusta al nombre real del archivo dashboard
exit;
