<?php
require '../admin/db.php'; 

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar reCAPTCHA
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
    if (empty($recaptchaResponse)) {
        $mensaje = "Por favor completa el reCAPTCHA.";
    } else {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret' => RECAPTCHA_SECRET_KEY, 'response' => $recaptchaResponse, 'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''];
        $options = ['http' => ['header' => "Content-type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => http_build_query($data)]];
        $result = file_get_contents($url, false, stream_context_create($options));
        $json = json_decode($result, true);
        if (!isset($json['success']) || $json['success'] !== true) {
            $mensaje = "Verificación reCAPTCHA fallida.";
        }
    }

    if (empty($mensaje)) {
        $usuario = $_POST['usuario'] ?? '';
        $nueva_clave = $_POST['nueva_clave'] ?? '';
        $clave_hash = password_hash($nueva_clave, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("UPDATE admin_users SET clave = ? WHERE usuario = ?");
        $stmt->execute([$clave_hash, $usuario]);

        if ($stmt->rowCount() > 0) {
            $mensaje = "Contraseña actualizada correctamente.";
        } else {
            $mensaje = "No se encontró el usuario o la contraseña no se actualizó.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">🔐 Recuperación de Contraseña</h3>

    <?php if ($mensaje): ?>
      <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nueva_clave" class="form-label">Nueva Contraseña</label>
        <input type="password" name="nueva_clave" class="form-control" required>
      </div>
      <div class="g-recaptcha mb-3" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
      <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
    </form>
  </div>
</body>
</html>
