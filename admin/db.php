<?php
$host = 'localhost';
$db = 'guruprod'; // nombre db
$user = 'root';
$pass = ''; // contraseña
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// reCAPTCHA v2 - Obtener keys en https://www.google.com/recaptcha/admin
define('RECAPTCHA_SITE_KEY', '6Lfa7F4sAAAAAAWQdaR0yG2_fFx_wK8Xlh6furK_');
define('RECAPTCHA_SECRET_KEY', '6Lfa7F4sAAAAAH_vlkrq4GAkcL7F4i69ZX_raQLA');
