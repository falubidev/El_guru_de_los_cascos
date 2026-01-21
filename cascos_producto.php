<?php
include 'includes/head.php';
include 'includes/navbar.php';

$tipo = $_GET['tipo'] ?? '';
$marca = $_GET['marca'] ?? '';
require 'admin/db.php';

$tipo = $_GET['tipo'] ?? '';
$marca = $_GET['marca'] ?? '';
$grafico_id = $_GET['grafico_id'] ?? '';
$acabado_id = $_GET['acabado_id'] ?? '';
$talla_id = $_GET['talla_id'] ?? '';

// Construcción dinámica del WHERE
$where = [];
$params = [];

if (!empty($tipo)) {
    $where[] = 'tipo_id = (SELECT id FROM tbl_tipos WHERE nombre = :tipo)';
    $params[':tipo'] = $tipo;
}

if (!empty($marca)) {
    $where[] = 'marca = :marca';
    $params[':marca'] = $marca;
}

if (!empty($grafico_id)) {
    $where[] = 'grafico_id = :grafico_id';
    $params[':grafico_id'] = $grafico_id;
}

if (!empty($acabado_id)) {
    $where[] = 'acabado_id = :acabado_id';
    $params[':acabado_id'] = $acabado_id;
}

if (!empty($talla_id)) {
    $where[] = "FIND_IN_SET(:talla_id, talla_id)";
    $params[':talla_id'] = $talla_id;
}


$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$sql = "SELECT * FROM tbl_productos $whereSql ORDER BY fecha_creacion DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Obtener marcas desde la base de datos
$marcasStmt = $pdo->query("SELECT nombre FROM tbl_marcas ORDER BY nombre ASC");
$marcas = $marcasStmt->fetchAll(PDO::FETCH_COLUMN);
// Obtener filtros adicionales
$graficos = $pdo->query("SELECT id, nombre FROM tbl_graficos ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);
$acabados = $pdo->query("SELECT id, nombre FROM tbl_acabados ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);
$tallas = $pdo->query("SELECT id, nombre FROM tbl_tallas ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html lang="es">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
</head>
<body class="index-page">

<!-- Loader -->
<div id="loader" style="position: fixed; inset: 0; background: #000; z-index: 99999; display: flex; align-items: center; justify-content: center;">
  <img src="assets/img/gurulogo.png" alt="Cargando..." style="width: 100px; animation: pulse 1.5s infinite;">
</div>


<section class="section text-white text-center py-5 seccion-fondo">
  <div class="container">
    <div class="mb-5 text-shadow">
      <h2 class="catalogo-titulo">Catálogo de Cascos</h2>
      <p class="catalogo-subtitulo">Explora nuestros cascos según el tipo o la marca.</p>
    </div>

    <div class="row">
      <!-- Filtros -->
      <div class="col-md-3 mb-4">
        <form method="GET" class="bg-black p-4 rounded shadow border-neon">
          <h5 class="text-neon mb-3">Filtrar</h5>

          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Casco</label>
            <select class="form-select" name="tipo" id="tipo">
  <option value="">Todos</option>
  <?php
    $tiposStmt = $pdo->prepare("SELECT id, nombre FROM tbl_tipos WHERE linea_id = 1 ORDER BY nombre ASC");
    $tiposStmt->execute();
    $tipos = $tiposStmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tipos as $t) {
      $selected = ($tipo == $t['nombre']) ? 'selected' : '';
      echo "<option value=\"" . htmlspecialchars($t['nombre']) . "\" $selected>" . htmlspecialchars($t['nombre']) . "</option>";
    }
  ?>
</select>

          </div>

          <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <select class="form-select" name="marca" id="marca">
              <option value="">Todas</option>
              <?php foreach ($marcas as $m): ?>
                <option value="<?= htmlspecialchars($m) ?>" <?= $marca === $m ? 'selected' : '' ?>>
                  <?= htmlspecialchars($m) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
<!-- Filtro: Gráfico -->
<div class="mb-3">
  <label for="grafico_id" class="form-label">Gráfico</label>
  <select class="form-select" name="grafico_id" id="grafico_id">
    <option value="">Todos</option>
    <?php foreach ($graficos as $g): ?>
      <option value="<?= $g['id'] ?>" <?= $grafico_id == $g['id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($g['nombre']) ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>

<!-- Filtro: Acabado -->
<div class="mb-3">
  <label for="acabado_id" class="form-label">Acabado</label>
  <select class="form-select" name="acabado_id" id="acabado_id">
    <option value="">Todos</option>
    <?php foreach ($acabados as $a): ?>
      <option value="<?= $a['id'] ?>" <?= $acabado_id == $a['id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($a['nombre']) ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>

<!-- Filtro: Talla -->
<div class="mb-3">
  <label for="talla_id" class="form-label">Talla</label>
  <select class="form-select" name="talla_id" id="talla_id">
    <option value="">Todas</option>
    <?php foreach ($tallas as $t): ?>
      <option value="<?= $t['id'] ?>" <?= $talla_id == $t['id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($t['nombre']) ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>


          <button type="submit" class="btn btn-outline-neon w-100">Aplicar</button>
        </form>
      </div>

      <!-- Productos -->
      <div class="col-md-9">
        <div class="row g-4">
          <?php if (count($productos) === 0): ?>
  <div class="col-12">
    <div class="alert alert-warning text-center">No se encontraron productos con estos filtros.</div>
  </div>
<?php endif; ?>

  <?php foreach ($productos as $producto): ?>
  <div class="col-md-4">
    <div class="card bg-black text-white border-neon h-100 shadow-sm">
      <img src="admin/uploads/productos/<?= htmlspecialchars($producto['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['referencia']) ?>">

      <div class="card-body">
        <!-- REF - NOMBRE_GRAFICO -->
        <h5 class="card-title">
          <?= htmlspecialchars($producto['referencia']) ?> - <?= htmlspecialchars($producto['nombre_grafico'] ?? '') ?>
        </h5>
        <!-- MARCA - TIPO DE GRÁFICO -->
        <p class="card-text text-muted mb-1">
          <?= htmlspecialchars($producto['marca']) ?> -
          Tipo de gráfico:
          <?php
            if (!empty($producto['grafico_id'])) {
              $grafico_stmt = $pdo->prepare("SELECT nombre FROM tbl_graficos WHERE id = ?");
              $grafico_stmt->execute([$producto['grafico_id']]);
              $grafico_nombre = $grafico_stmt->fetchColumn();
              echo ' ' . htmlspecialchars($grafico_nombre);
            }
          ?>
        </p>


        <!-- TIPO DE CASCO -->
        <p class="card-text text-muted">
          <?php
            if (!empty($producto['tipo_id'])) {
              $tipo_stmt = $pdo->prepare("SELECT nombre FROM tbl_tipos WHERE id = ?");
              $tipo_stmt->execute([$producto['tipo_id']]);
              echo htmlspecialchars($tipo_stmt->fetchColumn());
            }
          ?>
        </p>

        <a href="detalle.php?id=<?= $producto['id'] ?>" class="btn btn-outline-neon w-100">Ver más</a>

      </div>
    </div>
  </div>
<?php endforeach; ?>


        </div>
      </div>
    </div>

  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>

<!-- Ocultar loader -->
<script>
window.addEventListener('load', function () {
  const loader = document.getElementById('loader');
  if (loader) {
    setTimeout(() => {
      loader.classList.add('explode');
      setTimeout(() => {
        loader.style.display = "none";
      }, 600);
    }, 1500);
  }
});
</script>

<!-- Estilos locales -->
<style>
  body {
    font-family: 'Orbitron', sans-serif;
    background: radial-gradient(ellipse at center, #0c0c0c 0%, #000000 100%);
    background-attachment: fixed;
  }

  .text-shadow {
    text-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14;
  }

  .catalogo-titulo {
    font-size: 2.0rem;
    font-weight: 900;
    color: #e6ffe2;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 1rem;
    animation: glowTitle 2s ease-in-out infinite alternate;
  }

  .catalogo-subtitulo {
    font-size: 1.2rem;
    color: #ffffffbd;
    max-width: 600px;
    margin: 0 auto;
    font-style: italic;
    animation: fadeIn 2s ease forwards;
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

  .card-img-top {
    height: 250px;
    object-fit: cover;
  }

  .card-title {
    font-size: 1rem;
    font-weight: bold;
  }

  .card-text {
    font-size: 0.85rem;
    color: #fff !important;
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

  @keyframes glowTitle {
    from {
      text-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14;
    }
    to {
      text-shadow: 0 0 20px #39ff14, 0 0 40px #39ff14;
    }
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.1); opacity: 1; }
  }

  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url('https://www.transparenttextures.com/patterns/stardust.png');
    opacity: 0.06;
    z-index: 0;
    animation: moveStars 60s linear infinite;
    pointer-events: none;
  }

  @keyframes moveStars {
    0% { background-position: 0 0; }
    100% { background-position: 1000px 1000px; }
  }
</style>
<script>
window.addEventListener('load', function () {
  const url = new URL(window.location.href);
  const hasParams = url.search.length > 0;

  // Si hay parámetros, los limpiamos visualmente
  if (hasParams) {
    window.history.replaceState({}, document.title, url.pathname);
  }
});
</script>
<script src="assets/js/clean-url.js"></script>


</body>
</html>
