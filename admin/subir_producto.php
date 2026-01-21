<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $referencia = trim($_POST['nombre']); // input 'nombre' → referencia
    $marca = $_POST['marca'] ?? null;
    $color = $_POST['color'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $estado = $_POST['estado'] ?? null;

    // Nuevos campos
    $linea_id = $_POST['linea_id'] ?? null;
    $tipo_id = $_POST['tipo_id'] ?? null;
    $grafico_id = $_POST['grafico_id'] ?: null;
    $acabado_id = $_POST['acabado_id'] ?: null;
$tallas_array = $_POST['tallas'] ?? [];
$talla_id = !empty($tallas_array) ? implode(',', $tallas_array) : null;
$nombre_grafico = trim($_POST['nombre_grafico'] ?? null);

    $imagen = $_FILES['imagen'];

    if ($imagen['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        $nombre_archivo = uniqid('casco_') . '.' . strtolower($ext);
$ruta_destino = __DIR__ . '/uploads/productos/' . $nombre_archivo;

        $carpeta = __DIR__ . '/uploads/productos';
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0777, true);
}


        if (move_uploaded_file($imagen['tmp_name'], $ruta_destino)) {
$stmt = $pdo->prepare("INSERT INTO tbl_productos 
(referencia, marca, color, descripcion, imagen, precio, estado, linea_id, tipo_id, grafico_id, acabado_id, talla_id, nombre_grafico)
VALUES 
(:referencia, :marca, :color, :descripcion, :imagen, :precio, :estado, :linea_id, :tipo_id, :grafico_id, :acabado_id, :talla_id, :nombre_grafico)");
            $stmt->execute([
                ':referencia' => $referencia,
                ':marca' => $marca,
                ':color' => $color,
                ':descripcion' => $descripcion,
                ':imagen' => $nombre_archivo,
                ':precio' => $precio ?: null,
                ':estado' => $estado,
                ':linea_id' => $linea_id,
                ':tipo_id' => $tipo_id,
                ':grafico_id' => $grafico_id,
                ':acabado_id' => $acabado_id,
                ':talla_id' => $talla_id,
                ':nombre_grafico' => $nombre_grafico

            ]);

            header('Location: dashboard.php?ok=1');
            exit;
        } else {
            die("❌ Error al mover la imagen.");
        }
    } else {
        die("❌ Error al subir la imagen.");
    }
} else {
    header('Location: dashboard.php');
    exit;
}