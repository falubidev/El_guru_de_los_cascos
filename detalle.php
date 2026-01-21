<?php
require 'admin/db.php';
include 'includes/head.php';
include 'includes/navbar.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM tbl_productos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
  echo "<div class='container text-center text-white mt-5'><h2>Producto no encontrado</h2></div>";
  exit;
}
?>
<?php
// Obtener tipo
$tipo = '';
if (!empty($producto['tipo_id'])) {
  $stmtTipo = $pdo->prepare("SELECT nombre FROM tbl_tipos WHERE id = ?");
  $stmtTipo->execute([$producto['tipo_id']]);
  $tipo = $stmtTipo->fetchColumn();
}

// Obtener gráfico
$grafico = '';
if (!empty($producto['grafico_id'])) {
  $stmtGrafico = $pdo->prepare("SELECT nombre FROM tbl_graficos WHERE id = ?");
  $stmtGrafico->execute([$producto['grafico_id']]);
  $grafico = $stmtGrafico->fetchColumn();
}

// Obtener acabado
$acabado = '';
if (!empty($producto['acabado_id'])) {
  $stmtAcabado = $pdo->prepare("SELECT nombre FROM tbl_acabados WHERE id = ?");
  $stmtAcabado->execute([$producto['acabado_id']]);
  $acabado = $stmtAcabado->fetchColumn();
}

// Obtener tallas (múltiples)
$tallasTexto = '';
if (!empty($producto['talla_id'])) {
  $ids = explode(',', $producto['talla_id']);
  $placeholders = implode(',', array_fill(0, count($ids), '?'));
  $stmtTallas = $pdo->prepare("SELECT nombre FROM tbl_tallas WHERE id IN ($placeholders)");
  $stmtTallas->execute($ids);
  $tallasTexto = implode(', ', $stmtTallas->fetchAll(PDO::FETCH_COLUMN));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Detalle del Producto</title>
</head>
<body class="index-page">

<section class="section text-white text-center py-5 seccion-fondo">
  <div class="container">
    <div class="row">
<div class="col-lg-7 col-md-6">
        <img src="admin/uploads/productos/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['referencia']) ?>" class="img-fluid border-neon shadow">
      </div>
<div class="col-lg-5 col-md-6 text-white">
  <h2 class="text-neon display-5 mb-4"><?= htmlspecialchars($producto['referencia']) ?></h2>

  <div class="row mb-3">
    <div class="col-sm-6"><strong>Marca:</strong></div>
    <div class="col-sm-6"><?= htmlspecialchars($producto['marca']) ?></div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-6"><strong>Tipo:</strong></div>
    <div class="col-sm-6"><?= htmlspecialchars($tipo ?: 'N/A') ?></div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-6"><strong>Gráfico:</strong></div>
    <div class="col-sm-6"><?= htmlspecialchars($grafico ?: 'N/A') ?></div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-6"><strong>Acabado:</strong></div>
    <div class="col-sm-6"><?= htmlspecialchars($acabado ?: 'N/A') ?></div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-6"><strong>Tallas:</strong></div>
    <div class="col-sm-6"><?= htmlspecialchars($tallasTexto ?: 'N/A') ?></div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-6"><strong>Color:</strong></div>
    <div class="col-sm-6"><?= htmlspecialchars($producto['color'] ?: 'N/A') ?></div>
  </div>
  <div class="row mb-4">
    <div class="col-sm-6"><strong>Precio:</strong></div>
    <div class="col-sm-6"><?= $producto['precio'] !== null ? '$' . number_format($producto['precio'], 0, ',', '.') : 'Consultar' ?></div>
  </div>

<div class="text-center mt-5">
  <button type="button" class="btn btn-outline-neon btn-xl custom-btn-compra" data-bs-toggle="modal" data-bs-target="#modalFormularioCompra">
    PIDE EL TUYO!
  </button>

</div>

</div>
<div class="row mt-5">
  <div class="col-12">
    <h4 class="text-neon">Descripción detallada</h4>
    <div class="descripcion-amplia mt-3">
      <?= nl2br(htmlspecialchars($producto['descripcion'])) ?>
    </div>
  </div>
</div>
    </div>
  </div>
</section>
<?php
$stmtRelacionados = $pdo->query("SELECT id, referencia, imagen FROM tbl_productos WHERE id != $id ORDER BY RAND() LIMIT 6");
$relacionados = $stmtRelacionados->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="section text-white text-center py-5 seccion-fondo">
  <div class="container">
    <h3 class="text-center text-neon mb-4">También te puede interesar</h3>
    <div id="carouselRelacionados" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach (array_chunk($relacionados, 3) as $index => $grupo): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="row">
              <?php foreach ($grupo as $casco): ?>
                <div class="col-md-4 text-center">
                  <a href="detalle.php?id=<?= $casco['id'] ?>" class="text-white text-decoration-none">
                  <img src="admin/uploads/productos/<?= $casco['imagen'] ?>" class="img-fluid border-neon mb-2" style="max-height: 180px; object-fit: contain; width: 100%; padding: 10px;">
                    <p><?= htmlspecialchars($casco['referencia']) ?></p>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselRelacionados" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselRelacionados" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="modalFormularioCompra" tabindex="-1" aria-labelledby="modalFormularioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formCompra" method="POST" class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalFormularioLabel">Solicita este casco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="marca" value="<?= htmlspecialchars($producto['marca']) ?>">
        <input type="hidden" name="referencia" value="<?= htmlspecialchars($producto['referencia']) ?>">
        <input type="hidden" name="tipo" value="compra">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre completo</label>
          <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>

        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono o WhatsApp</label>
          <input type="text" class="form-control" name="telefono" id="telefono" required>
        </div>

        <div class="mb-3">
          <label for="observaciones" class="form-label">Observaciones (opcional)</label>
          <textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-neon">Enviar solicitud</button>
      </div>
    </form>
  </div>
</div>


<!-- Estilos -->
<style>
  .custom-btn-compra {
  font-size: 2rem;
  padding: 20px 40px;
  border-width: 3px;
  border-radius: 12px;
  letter-spacing: 1px;
  box-shadow: 0 0 20px #39ff14;
  transition: all 0.3s ease;
}

.custom-btn-compra:hover {
  background-color: #39ff14;
  color: black;
  transform: scale(1.05);
}

  .descripcion-amplia {
  font-size: 1.3rem;
  line-height: 1.8;
  background-color: rgba(255, 255, 255, 0.05);
  padding: 20px;
  border-radius: 10px;
  border: 1px solid #39ff14;
  box-shadow: 0 0 8px #39ff14;
}

  h2.display-5 {
  font-size: 2.5rem;
}

.section .row .col-md-6 {
  padding: 20px;
}

.row.mb-3, .row.mb-4 {
  font-size: 1.2rem;
  border-bottom: 1px solid #39ff14;
  padding-bottom: 5px;
}

p {
  font-size: 1.1rem;
}

  html, body {
  height: 100%;
  margin: 0;
  display: flex;
  flex-direction: column;
}

body > section {
  flex: 1;
}

  body {
    font-family: 'Orbitron', sans-serif;
    background: radial-gradient(ellipse at center, #0c0c0c 0%, #000000 100%);
    background-attachment: fixed;
  }

  .seccion-fondo {
    position: relative;
    background-image: url('assets/img/catalogo/fondo.jpg');
    background-size: cover;
    background-position: center;
    z-index: 1;
  }

  .seccion-fondo::before {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.87);
    z-index: 2;
  }

  .seccion-fondo > .container {
    position: relative;
    z-index: 3;
  }

  .text-neon {
    color: #39ff14;
    font-weight: bold;
    text-shadow: 0 0 10px #39ff14;
  }

  .border-neon {
    border: 1px solid #39ff14;
    box-shadow: 0 0 8px #39ff14;
  }

  .btn-outline-neon {
    border: 1px solid #39ff14;
    color: #39ff14;
    transition: all 0.3s ease;
  }

  .btn-outline-neon:hover {
    background-color: #39ff14;
    color: #000;
  }

  .img-fluid {
  /* max-height: 600px; */
  max-width: 100%;
  width: 100%;
  object-fit: contain;
  margin-bottom: 20px;
  padding: 10px;
}


  @keyframes glowTitle {
    from {
      text-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14;
    }
    to {
      text-shadow: 0 0 20px #39ff14, 0 0 40px #39ff14;
    }
  }
</style>
<script>
  const modalElement = document.getElementById('modalFormularioCompra');
  const modalInstance = new bootstrap.Modal(modalElement);

  document.getElementById('formCompra').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    fetch('guardar_formulario.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) return response.text();
      throw new Error('Error al enviar formulario');
    })
    .then(() => {
      alert("Se ha enviado con éxito");

      // Espera a que el modal se cierre manual o automáticamente
      const onModalHidden = () => {
        window.location.reload();
        modalElement.removeEventListener('hidden.bs.modal', onModalHidden);
      };

      modalElement.addEventListener('hidden.bs.modal', onModalHidden);

      modalInstance.hide(); // Oculta el modal después del alert
    })
    .catch(error => {
      console.error(error);
      alert('Hubo un error al enviar. Intenta nuevamente.');
    });
  });
</script>



<?php include 'includes/footer.php'; ?>
</body>
</html>
