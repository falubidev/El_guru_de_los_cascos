<?php
require '../admin/db.php'; 

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $nueva_clave = $_POST['nueva_clave'] ?? '';
    $clave_hash = password_hash($nueva_clave, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("UPDATE admin_users SET clave = ? WHERE usuario = ?");
    $stmt->execute([$clave_hash, $usuario]);

    if ($stmt->rowCount() > 0) {
        $mensaje = "✅ Contraseña actualizada correctamente.";
    } else {
        $mensaje = "❌ No se encontró el usuario o la contraseña no se actualizó.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <button type="submit" class="btn btn-warning">Actualizar Contraseña</button>
    </form>
  </div>
</body>
</html>
