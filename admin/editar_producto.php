<?php
require 'db.php';

$id = $_POST['id'] ?? null;
$referencia = $_POST['referencia'] ?? '';
$marca = $_POST['marca'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$color = $_POST['color'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$especificaciones_tecnicas = $_POST['especificaciones_tecnicas'] ?? '';
$nuevaImagen = $_FILES['nueva_imagen'] ?? null;

if (!$id) {
    echo "error";
    exit;
}

// Obtener nombre actual de la imagen
$imagenActual = $pdo->prepare("SELECT imagen FROM tbl_productos WHERE id = ?");
$imagenActual->execute([$id]);
$producto = $imagenActual->fetch(PDO::FETCH_ASSOC);
$nombreImagen = $producto['imagen'] ?? null;

// Subir nueva imagen si se envió
if ($nuevaImagen && $nuevaImagen['error'] === 0) {
    $ext = pathinfo($nuevaImagen['name'], PATHINFO_EXTENSION);
    $nuevoNombre = 'casco_' . uniqid() . '.' . $ext;
    $rutaDestino = 'uploads/productos/' . $nuevoNombre;

    if (move_uploaded_file($nuevaImagen['tmp_name'], $rutaDestino)) {
        // Opcional: eliminar la imagen anterior
        if ($nombreImagen && file_exists('uploads/productos/' . $nombreImagen)) {
            unlink('uploads/productos/' . $nombreImagen);
        }
        $nombreImagen = $nuevoNombre;
    }
}

// Actualizar producto
$stmt = $pdo->prepare("UPDATE tbl_productos SET
    referencia = ?,
    marca = ?,
    tipo = ?,
    color = ?,
    descripcion = ?,
    especificaciones_tecnicas = ?,
    imagen = ?
    WHERE id = ?");
$stmt->execute([
    $referencia, $marca, $tipo, $color, $descripcion, $especificaciones_tecnicas, $nombreImagen, $id
]);

echo "ok";
