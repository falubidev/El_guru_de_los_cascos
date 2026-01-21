<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require '../admin/db.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $clave = $_POST['clave'];
    $claveHash = password_hash($clave, PASSWORD_BCRYPT);

    // Verifica si ya existe
    $check = $pdo->prepare("SELECT id FROM admin_users WHERE usuario = ?");
    $check->execute([$usuario]);

    if ($check->rowCount() > 0) {
        $mensaje = "⚠️ El usuario ya existe.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO admin_users (usuario, clave) VALUES (?, ?)");
        $stmt->execute([$usuario, $claveHash]);
        $mensaje = "✅ Usuario creado exitosamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear nuevo usuario admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">👤 Crear nuevo usuario administrador</h3>

    <?php if ($mensaje): ?>
      <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="clave" class="form-label">Contraseña</label>
        <input type="password" name="clave" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Crear Usuario</button>
      <a href="dashboard.php" class="btn btn-secondary">Volver al Dashboard</a>
    </form>
  </div>
</body>
</html>
