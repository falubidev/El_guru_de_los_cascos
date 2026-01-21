<?php
session_start();
require 'db.php';

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

$stmt = $pdo->prepare("SELECT clave FROM admin_users WHERE usuario = ?");
$stmt->execute([$usuario]);
$user = $stmt->fetch();

if ($user && password_verify($clave, $user['clave'])) {
    $_SESSION['admin'] = $usuario;
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Acceso denegado'); window.location.href='login.php';</script>";
}
