<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM tbl_productos WHERE id = ?");
    $stmt->execute([$id]);
    echo "ok";
} else {
    echo "error";
}
