<?php
session_start();
require 'db.php';

// Validar reCAPTCHA
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
if (empty($recaptchaResponse)) {
    echo "<script>alert('Por favor completa el reCAPTCHA'); window.location.href='login.php';</script>";
    exit;
}
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = ['secret' => RECAPTCHA_SECRET_KEY, 'response' => $recaptchaResponse, 'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''];
$options = ['http' => ['header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => http_build_query($data)]];
$result = file_get_contents($url, false, stream_context_create($options));
$json = json_decode($result, true);
if (!isset($json['success']) || $json['success'] !== true) {
    echo "<script>alert('Verificación reCAPTCHA fallida'); window.location.href='login.php';</script>";
    exit;
}

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
