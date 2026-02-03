<?php
session_start();
if (isset($_SESSION['admin'])) {
  header("Location: dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
  <form action="auth.php" method="POST" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-3">Panel de Administración</h3>
    <input type="text" name="usuario" class="form-control mb-3" placeholder="Usuario" required>
    <input type="password" name="clave" class="form-control mb-3" placeholder="Contraseña" required>
    <div class="g-recaptcha mb-3" data-sitekey="<?php require_once 'db.php'; echo RECAPTCHA_SITE_KEY; ?>"></div>
    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
  </form>
</body>
</html>
