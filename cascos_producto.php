<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<?php
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
    $where[] = 'tipo_id = (SELECT id FROM tbl_tipos WHERE LOWER(nombre) = LOWER(:tipo))';
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

// Obtener filtros
$marcas = $pdo->query("SELECT nombre FROM tbl_marcas ORDER BY nombre ASC")->fetchAll(PDO::FETCH_COLUMN);
$tiposStmt = $pdo->prepare("SELECT id, nombre FROM tbl_tipos WHERE linea_id = 1 AND LOWER(nombre) != 'modular' ORDER BY nombre ASC");
$tiposStmt->execute();
$tipos = $tiposStmt->fetchAll(PDO::FETCH_ASSOC);
$graficos = $pdo->query("SELECT id, nombre FROM tbl_graficos ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);
$acabados = $pdo->query("SELECT id, nombre FROM tbl_acabados ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);
$tallas = $pdo->query("SELECT id, nombre FROM tbl_tallas ORDER BY nombre ASC")->fetchAll(PDO::FETCH_ASSOC);

$tipoActual = !empty($tipo) ? ucfirst($tipo) : 'Todos';
?>
<body class="productos-page">

  <!-- Loader -->
  <div id="scan-loader">
    <div class="scan-container">
      <div class="scan-logo">
        <img src="assets/img/logos_new/logo_fondo_negro.png" alt="El Gurú de los Cascos">
        <div class="scan-line"></div>
      </div>
      <div class="scan-text"><?= strtoupper($tipoActual) ?></div>
      <div class="scan-progress">
        <div class="scan-progress-bar"></div>
      </div>
    </div>
  </div>

  <!-- Floating Menu Toggle (Mobile) -->
  <button class="floating-menu-toggle" id="floatingMenuToggle" aria-label="Abrir menú">
    <i class="bi bi-list"></i>
    <span class="toggle-pulse"></span>
  </button>

  <!-- Sidebar Overlay -->
  <!-- Main Layout -->
  <div class="cascos-layout">

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar" id="sidebar">
      <div class="sidebar__header">
        <a href="index.php" class="sidebar__logo">
          <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Logo">
        </a>
      </div>

      <ul class="sidebar__menu">
        <li>
          <a href="index.php" class="sidebar__link">
            <i class="bi bi-house-door"></i>
            <span>Inicio</span>
          </a>
        </li>
        <li>
          <a href="cascos.php" class="sidebar__link sidebar__link--active">
            <i class="bi bi-grid-3x3-gap"></i>
            <span>Catálogo</span>
          </a>
        </li>
        <li>
          <a href="buscascasco.php" class="sidebar__link">
            <i class="bi bi-headset"></i>
            <span>Asesoría</span>
          </a>
        </li>
        <li>
          <a href="guru.php" class="sidebar__link">
            <i class="bi bi-person"></i>
            <span>Sobre Mí</span>
          </a>
        </li>
        <li>
          <a href="videos.php" class="sidebar__link">
            <i class="bi bi-play-circle"></i>
            <span>Videos</span>
          </a>
        </li>
      </ul>

      <div class="sidebar__footer">
        <div class="sidebar__social">
          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank"><i class="bi bi-youtube"></i></a>
          <a href="https://www.instagram.com/elgurudeloscascos/" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://www.tiktok.com/@elgurudeloscascos" target="_blank"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>

      <button class="sidebar__close" id="sidebarClose">
        <i class="bi bi-x-lg"></i>
      </button>
    </nav>

    <!-- Main Content -->
    <main class="productos-main">

      <!-- Background Particles -->
      <div class="bg-particles">
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
        <span class="bg-dot"></span>
      </div>

      <!-- Decorative Corners -->
      <div class="decor decor--top-left"></div>
      <div class="decor decor--top-right"></div>
      <div class="decor decor--bottom-left"></div>
      <div class="decor decor--bottom-right"></div>

      <!-- Header -->
      <header class="productos-header">
        <a href="cascos.php" class="back-btn">
          <i class="bi bi-arrow-left"></i>
          <span>Volver</span>
        </a>
        <div class="header-title">
          <h1 class="productos-title">
            <span class="title-accent"><?= htmlspecialchars($tipoActual) ?></span>
          </h1>
          <p class="productos-count"><?= count($productos) ?> producto<?= count($productos) !== 1 ? 's' : '' ?> encontrado<?= count($productos) !== 1 ? 's' : '' ?></p>
        </div>
        <button class="filter-toggle" id="filterToggle">
          <i class="bi bi-sliders"></i>
          <span>Filtros</span>
        </button>
      </header>

      <!-- Content Grid -->
      <div class="productos-grid">

        <!-- Filters Panel -->
        <aside class="filters-panel" id="filtersPanel">
          <div class="filters-header">
            <h3><i class="bi bi-funnel"></i> Filtros</h3>
            <button class="filters-close" id="filtersClose"><i class="bi bi-x-lg"></i></button>
          </div>

          <form method="GET" class="filters-form" id="filtersForm">
            <!-- Tipo -->
            <div class="filter-group">
              <label class="filter-label">Tipo de Casco</label>
              <select class="filter-select" name="tipo" id="tipo">
                <option value="">Todos</option>
                <?php foreach ($tipos as $t): ?>
                  <option value="<?= htmlspecialchars($t['nombre']) ?>" <?= strcasecmp($tipo, $t['nombre']) === 0 ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Marca -->
            <div class="filter-group">
              <label class="filter-label">Marca</label>
              <select class="filter-select" name="marca" id="marca">
                <option value="">Todas</option>
                <?php foreach ($marcas as $m): ?>
                  <option value="<?= htmlspecialchars($m) ?>" <?= $marca === $m ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Gráfico -->
            <div class="filter-group">
              <label class="filter-label">Gráfico</label>
              <select class="filter-select" name="grafico_id" id="grafico_id">
                <option value="">Todos</option>
                <?php foreach ($graficos as $g): ?>
                  <option value="<?= $g['id'] ?>" <?= $grafico_id == $g['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($g['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Acabado -->
            <div class="filter-group">
              <label class="filter-label">Acabado</label>
              <select class="filter-select" name="acabado_id" id="acabado_id">
                <option value="">Todos</option>
                <?php foreach ($acabados as $a): ?>
                  <option value="<?= $a['id'] ?>" <?= $acabado_id == $a['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($a['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Talla -->
            <div class="filter-group">
              <label class="filter-label">Talla</label>
              <select class="filter-select" name="talla_id" id="talla_id">
                <option value="">Todas</option>
                <?php foreach ($tallas as $t): ?>
                  <option value="<?= $t['id'] ?>" <?= $talla_id == $t['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="filter-actions">
              <button type="submit" class="btn-apply">
                <i class="bi bi-check-lg"></i>
                <span>Aplicar</span>
              </button>
              <a href="cascos_producto.php" class="btn-clear">
                <i class="bi bi-x-circle"></i>
                <span>Limpiar</span>
              </a>
            </div>
          </form>
        </aside>

        <!-- Products Grid -->
        <section class="products-container">
          <?php if (count($productos) === 0): ?>
            <div class="no-products">
              <i class="bi bi-emoji-frown"></i>
              <h3>No se encontraron productos</h3>
              <p>Intenta cambiar los filtros de búsqueda</p>
              <a href="cascos_producto.php" class="btn-reset">Ver todos los productos</a>
            </div>
          <?php else: ?>
            <div class="products-grid">
              <?php foreach ($productos as $producto): ?>
                <?php
                  $imgProducto = (!empty($producto['imagen']) && file_exists('admin/uploads/productos/' . $producto['imagen']))
                    ? 'admin/uploads/productos/' . htmlspecialchars($producto['imagen'])
                    : 'assets/img/iconos/aliencasco.png';
                ?>
                <a href="detalle.php?id=<?= $producto['id'] ?>" class="product-card">
                  <div class="product-card__image">
                    <img src="<?= $imgProducto ?>" alt="<?= htmlspecialchars($producto['referencia']) ?>">
                    <div class="product-card__overlay">
                      <span class="view-btn">Ver detalle <i class="bi bi-arrow-right"></i></span>
                    </div>
                  </div>
                  <div class="product-card__content">
                    <span class="product-card__brand"><?= htmlspecialchars($producto['marca']) ?></span>
                    <span class="product-card__price"><?= $producto['precio'] !== null ? 'Desde $' . number_format($producto['precio'], 0, ',', '.') : 'Consultar' ?></span>
                    <h4 class="product-card__title">
                      <?= htmlspecialchars($producto['referencia']) ?>
                      <?php if (!empty($producto['nombre_grafico'])): ?>
                        - <?= htmlspecialchars($producto['nombre_grafico']) ?>
                      <?php endif; ?>
                    </h4>
                    <div class="product-card__meta">
                      <?php if (!empty($producto['tipo_id'])): ?>
                        <?php
                          $tipo_stmt = $pdo->prepare("SELECT nombre FROM tbl_tipos WHERE id = ?");
                          $tipo_stmt->execute([$producto['tipo_id']]);
                          $tipo_nombre = $tipo_stmt->fetchColumn();
                        ?>
                        <span class="meta-tag"><i class="bi bi-tag"></i> <?= htmlspecialchars($tipo_nombre) ?></span>
                      <?php endif; ?>
                      <?php if (!empty($producto['grafico_id'])): ?>
                        <?php
                          $grafico_stmt = $pdo->prepare("SELECT nombre FROM tbl_graficos WHERE id = ?");
                          $grafico_stmt->execute([$producto['grafico_id']]);
                          $grafico_nombre = $grafico_stmt->fetchColumn();
                        ?>
                        <span class="meta-tag"><i class="bi bi-palette"></i> <?= htmlspecialchars($grafico_nombre) ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="product-card__glow"></div>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </section>

      </div>

    </main>

  </div>

  <!-- Floating Guru Button -->
  <a href="https://wa.me/573052332296?text=Hola%20Guru!%20Quiero%20preguntarte%20por%20un%20casco" target="_blank" class="floating-guru">
    <span class="guru-float-bubble">Pide el tuyo!</span>
    <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Gurú" class="guru-float-img">
  </a>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Loader
      const loader = document.getElementById('scan-loader');
      setTimeout(() => {
        document.body.classList.add('loaded');
        loader.classList.add('done');
        setTimeout(() => loader.style.display = 'none', 500);
      }, 1800);

      // Sidebar Toggle (Mobile) - Floating Button
      const floatingToggle = document.getElementById('floatingMenuToggle');
      const sidebarClose = document.getElementById('sidebarClose');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebarOverlay');

      function openSidebar() {
        sidebar.classList.add('sidebar--open');
        overlay.classList.add('active');
        floatingToggle.classList.add('active');
        floatingToggle.querySelector('i').classList.remove('bi-list');
        floatingToggle.querySelector('i').classList.add('bi-x-lg');
        document.body.style.overflow = 'hidden';
      }

      function closeSidebar() {
        sidebar.classList.remove('sidebar--open');
        overlay.classList.remove('active');
        floatingToggle.classList.remove('active');
        floatingToggle.querySelector('i').classList.remove('bi-x-lg');
        floatingToggle.querySelector('i').classList.add('bi-list');
        document.body.style.overflow = '';
      }

      function toggleSidebar() {
        if (sidebar.classList.contains('sidebar--open')) {
          closeSidebar();
        } else {
          openSidebar();
        }
      }

      floatingToggle.addEventListener('click', toggleSidebar);
      sidebarClose.addEventListener('click', closeSidebar);
      overlay.addEventListener('click', closeSidebar);

      document.querySelectorAll('.sidebar__link').forEach(link => {
        link.addEventListener('click', () => {
          if (window.innerWidth <= 968) closeSidebar();
        });
      });

      // Filters Panel Toggle (Mobile)
      const filterToggle = document.getElementById('filterToggle');
      const filtersPanel = document.getElementById('filtersPanel');
      const filtersClose = document.getElementById('filtersClose');

      filterToggle.addEventListener('click', () => {
        filtersPanel.classList.toggle('filters-panel--open');
      });

      filtersClose.addEventListener('click', () => {
        filtersPanel.classList.remove('filters-panel--open');
      });

    });
  </script>

  <style>
    :root {
      --neon-primary: #39ff14;
      --neon-glow: rgba(57, 255, 20, 0.5);
      --gray-900: #0a0a0a;
      --gray-800: #141414;
      --gray-700: #1f1f1f;
      --gray-600: #2a2a2a;
      --gray-500: #3a3a3a;
      --gray-400: #4a4a4a;
      --gray-300: #6a6a6a;
      --gray-200: #8a8a8a;
      --gray-100: #aaaaaa;
      --white: #ffffff;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    html, body {
      height: 100%;
      overflow: hidden;
      background: var(--gray-900);
      font-family: 'Poppins', sans-serif;
    }

    /* Loader */
    #scan-loader {
      position: fixed;
      inset: 0;
      background: var(--gray-900);
      z-index: 99999;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.5s ease, visibility 0.5s ease;
    }

    #scan-loader.done { opacity: 0; visibility: hidden; }

    .scan-container { display: flex; flex-direction: column; align-items: center; gap: 1.5rem; }

    .scan-logo {
      position: relative;
      width: 120px;
      height: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .scan-logo img {
      width: 80px;
      filter: drop-shadow(0 0 20px var(--neon-glow));
      animation: logoPulse 1.5s ease-in-out infinite;
    }

    .scan-line {
      position: absolute;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, transparent, var(--neon-primary), transparent);
      box-shadow: 0 0 20px var(--neon-primary);
      animation: scanMove 1.5s ease-in-out infinite;
    }

    @keyframes scanMove { 0%, 100% { top: 0; } 50% { top: 100%; } }
    @keyframes logoPulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }

    .scan-text {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 6px;
    }

    .scan-progress { width: 200px; height: 3px; background: var(--gray-700); border-radius: 3px; overflow: hidden; }
    .scan-progress-bar { height: 100%; background: var(--neon-primary); animation: progressFill 1.8s ease forwards; }
    @keyframes progressFill { from { width: 0; } to { width: 100%; } }

    /* Layout */
    .cascos-layout {
      display: flex;
      height: 100vh;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s ease 1.8s forwards;
    }

    @keyframes fadeIn { to { opacity: 1; } }

    /* Floating Menu Toggle */
    .floating-menu-toggle {
      display: none;
      position: fixed;
      top: 20px;
      left: 20px;
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, var(--gray-800) 0%, var(--gray-900) 100%);
      border: 2px solid var(--neon-primary);
      border-radius: 50%;
      color: var(--neon-primary);
      font-size: 1.5rem;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 1002;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      box-shadow: 0 4px 20px rgba(57, 255, 20, 0.3);
    }

    .floating-menu-toggle i { transition: transform 0.3s ease; }
    .floating-menu-toggle:hover { transform: scale(1.1); box-shadow: 0 6px 30px rgba(57, 255, 20, 0.5); }
    .floating-menu-toggle:active { transform: scale(0.95); }

    .floating-menu-toggle.active {
      background: var(--neon-primary);
      color: var(--gray-900);
      transform: rotate(180deg) scale(1.1);
      box-shadow: 0 0 40px rgba(57, 255, 20, 0.7);
    }

    .floating-menu-toggle.active:hover { transform: rotate(180deg) scale(1.2); }

    .toggle-pulse {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 2px solid var(--neon-primary);
      animation: togglePulse 2s ease-out infinite;
      pointer-events: none;
    }

    .floating-menu-toggle.active .toggle-pulse { animation: none; opacity: 0; }

    @keyframes togglePulse {
      0% { transform: scale(1); opacity: 0.8; }
      100% { transform: scale(1.8); opacity: 0; }
    }

    /* Sidebar Overlay */
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, 0.7); z-index: 999; opacity: 0; transition: opacity 0.3s ease; }
    .sidebar-overlay.active { opacity: 1; }

    .sidebar__close {
      display: none;
      position: absolute;
      top: 1rem;
      right: 1rem;
      width: 36px;
      height: 36px;
      background: var(--gray-700);
      border: 1px solid var(--gray-600);
      border-radius: 8px;
      color: var(--white);
      font-size: 1rem;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    /* Sidebar */
    .sidebar {
      width: 80px;
      height: 100%;
      background: var(--gray-800);
      border-right: 1px solid var(--gray-600);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 1.5rem 0;
      position: relative;
      z-index: 100;
      transition: width 0.3s ease;
      flex-shrink: 0;
    }

    .sidebar:hover { width: 200px; }

    .sidebar__header { display: flex; flex-direction: column; align-items: center; gap: 0.5rem; margin-bottom: 2rem; }
    .sidebar__logo img { width: 70px; filter: drop-shadow(0 0 15px var(--neon-glow)); transition: transform 0.3s ease; }
    .sidebar__logo:hover img { transform: scale(1.1); }

    .sidebar__brand {
      font-family: 'Orbitron', sans-serif;
      font-size: 0.65rem;
      font-weight: 700;
      color: var(--neon-primary);
      letter-spacing: 2px;
      opacity: 0;
      white-space: nowrap;
      transition: opacity 0.3s ease;
    }

    .sidebar:hover .sidebar__brand { opacity: 1; }

    .sidebar__menu { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; width: 100%; padding: 0 0.75rem; flex: 1; }

    .sidebar__link {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 0.9rem;
      color: var(--gray-200);
      text-decoration: none;
      border-radius: 12px;
      transition: all 0.3s ease;
      overflow: hidden;
    }

    .sidebar__link i { font-size: 1.3rem; min-width: 24px; text-align: center; }
    .sidebar__link span { font-size: 0.85rem; font-weight: 500; opacity: 0; white-space: nowrap; transition: opacity 0.3s ease; }
    .sidebar:hover .sidebar__link span { opacity: 1; }
    .sidebar__link:hover { background: var(--gray-700); color: var(--white); }
    .sidebar__link--active { background: linear-gradient(135deg, var(--neon-primary), #2ecc71); color: var(--gray-900); }

    .sidebar__footer { margin-top: auto; padding: 1rem 0; }
    .sidebar__social { display: flex; flex-direction: column; gap: 0.75rem; align-items: center; }
    .sidebar:hover .sidebar__social { flex-direction: row; }

    .sidebar__social a {
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--gray-700);
      color: var(--gray-200);
      border-radius: 50%;
      text-decoration: none;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .sidebar__social a:hover { background: var(--neon-primary); color: var(--gray-900); transform: scale(1.1); }

    /* Main Content */
    .productos-main {
      flex: 1;
      height: 100%;
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    /* Background Particles */
    .bg-particles {
      position: absolute;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .bg-dot {
      position: absolute;
      width: 4px;
      height: 4px;
      background: var(--neon-primary);
      border-radius: 50%;
      opacity: 0;
      animation: dotFloat linear infinite;
      box-shadow: 0 0 6px var(--neon-glow), 0 0 12px rgba(57, 255, 20, 0.2);
    }

    .bg-dot:nth-child(1)  { left: 5%;  animation-duration: 12s; animation-delay: 0s; width: 3px; height: 3px; }
    .bg-dot:nth-child(2)  { left: 15%; animation-duration: 10s; animation-delay: 1s; width: 5px; height: 5px; }
    .bg-dot:nth-child(3)  { left: 25%; animation-duration: 14s; animation-delay: 2s; }
    .bg-dot:nth-child(4)  { left: 35%; animation-duration: 11s; animation-delay: 0.5s; width: 3px; height: 3px; }
    .bg-dot:nth-child(5)  { left: 45%; animation-duration: 13s; animation-delay: 3s; width: 5px; height: 5px; }
    .bg-dot:nth-child(6)  { left: 55%; animation-duration: 9s;  animation-delay: 1.5s; }
    .bg-dot:nth-child(7)  { left: 65%; animation-duration: 15s; animation-delay: 4s; width: 3px; height: 3px; }
    .bg-dot:nth-child(8)  { left: 75%; animation-duration: 10s; animation-delay: 2.5s; width: 5px; height: 5px; }
    .bg-dot:nth-child(9)  { left: 85%; animation-duration: 12s; animation-delay: 0.8s; }
    .bg-dot:nth-child(10) { left: 92%; animation-duration: 11s; animation-delay: 3.5s; width: 3px; height: 3px; }
    .bg-dot:nth-child(11) { left: 10%; animation-duration: 14s; animation-delay: 5s; width: 5px; height: 5px; }
    .bg-dot:nth-child(12) { left: 50%; animation-duration: 16s; animation-delay: 6s; }

    @keyframes dotFloat {
      0% {
        transform: translateY(100vh) scale(0);
        opacity: 0;
      }
      10% {
        opacity: 0.5;
        transform: translateY(80vh) scale(1);
      }
      50% {
        opacity: 0.8;
      }
      90% {
        opacity: 0.3;
        transform: translateY(-10vh) scale(0.8);
      }
      100% {
        transform: translateY(-15vh) scale(0);
        opacity: 0;
      }
    }

    .decor { position: absolute; width: 60px; height: 60px; z-index: 1; pointer-events: none; opacity: 0.3; }
    .decor--top-left { top: 10px; left: 10px; border-top: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--top-right { top: 10px; right: 10px; border-top: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }
    .decor--bottom-left { bottom: 10px; left: 10px; border-bottom: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--bottom-right { bottom: 10px; right: 10px; border-bottom: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }

    /* Header */
    .productos-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid var(--gray-700);
      position: relative;
      z-index: 10;
    }

    .back-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1rem;
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 8px;
      color: var(--gray-200);
      text-decoration: none;
      font-size: 0.85rem;
      transition: all 0.3s ease;
    }

    .back-btn:hover { border-color: var(--neon-primary); color: var(--neon-primary); }

    .header-title { text-align: center; }

    .productos-title {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .title-accent { color: var(--neon-primary); text-shadow: 0 0 15px var(--neon-glow); }

    .productos-count { font-size: 0.8rem; color: var(--gray-300); margin-top: 0.25rem; }

    .filter-toggle {
      display: none;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1rem;
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 8px;
      color: var(--gray-200);
      font-size: 0.85rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .filter-toggle:hover { border-color: var(--neon-primary); color: var(--neon-primary); }

    /* Products Grid Layout */
    .productos-grid {
      flex: 1;
      display: flex;
      overflow: hidden;
    }

    /* Filters Panel */
    .filters-panel {
      width: 260px;
      background: var(--gray-800);
      border-right: 1px solid var(--gray-600);
      display: flex;
      flex-direction: column;
      flex-shrink: 0;
      overflow-y: auto;
    }

    .filters-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 1.25rem;
      border-bottom: 1px solid var(--gray-600);
    }

    .filters-header h3 {
      font-family: 'Orbitron', sans-serif;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--neon-primary);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .filters-close { display: none; background: none; border: none; color: var(--gray-300); font-size: 1.2rem; cursor: pointer; }

    .filters-form { padding: 1rem 1.25rem; display: flex; flex-direction: column; gap: 1rem; }

    .filter-group { display: flex; flex-direction: column; gap: 0.4rem; }

    .filter-label { font-size: 0.75rem; font-weight: 600; color: var(--gray-200); text-transform: uppercase; letter-spacing: 1px; }

    .filter-select {
      width: 100%;
      padding: 0.7rem 0.9rem;
      background: var(--gray-700);
      border: 1px solid var(--gray-500);
      border-radius: 8px;
      color: var(--white);
      font-size: 0.85rem;
      cursor: pointer;
      transition: all 0.3s ease;
      appearance: none;
    }

    .filter-select:focus { outline: none; border-color: var(--neon-primary); }
    .filter-select option { background: var(--gray-800); }

    .filter-actions { display: flex; flex-direction: column; gap: 0.75rem; margin-top: 0.5rem; }

    .btn-apply {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.8rem;
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      border: none;
      border-radius: 8px;
      color: var(--gray-900);
      font-family: 'Orbitron', sans-serif;
      font-size: 0.8rem;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-apply:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(57, 255, 20, 0.3); }

    .btn-clear {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.7rem;
      background: transparent;
      border: 1px solid var(--gray-500);
      border-radius: 8px;
      color: var(--gray-300);
      font-size: 0.8rem;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .btn-clear:hover { border-color: var(--gray-400); color: var(--white); }

    /* Products Container */
    .products-container {
      flex: 1;
      padding: 1.25rem;
      overflow-y: auto;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1.25rem;
    }

    /* Product Card */
    .product-card {
      position: relative;
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 16px;
      overflow: hidden;
      text-decoration: none;
      transition: all 0.4s ease;
    }

    .product-card:hover { border-color: var(--neon-primary); transform: translateY(-5px); }

    .product-card__image {
      position: relative;
      height: 220px;
      overflow: hidden;
    }

    .product-card__image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .product-card:hover .product-card__image img { transform: scale(1.1); }

    .product-card__overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 60%);
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding-bottom: 1rem;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .product-card:hover .product-card__overlay { opacity: 1; }

    .view-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
      background: var(--neon-primary);
      border-radius: 50px;
      color: var(--gray-900);
      font-size: 0.8rem;
      font-weight: 600;
    }

    .product-card__content { padding: 1rem; }

    .product-card__brand {
      font-size: 0.7rem;
      font-weight: 600;
      color: var(--neon-primary);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .product-card__price {
      font-size: 0.65rem;
      font-weight: 500;
      color: var(--gray-200);
      margin-top: 0.1rem;
      display: block;
      letter-spacing: 0.5px;
    }

    .product-card__title {
      font-size: 1rem;
      font-weight: 600;
      color: var(--white);
      margin: 0.3rem 0 0.5rem;
      line-height: 1.3;
    }

    .product-card__meta { display: flex; flex-wrap: wrap; gap: 0.5rem; }

    .meta-tag {
      display: flex;
      align-items: center;
      gap: 0.3rem;
      padding: 0.25rem 0.6rem;
      background: var(--gray-700);
      border-radius: 50px;
      font-size: 0.7rem;
      color: var(--gray-300);
    }

    .product-card__glow {
      position: absolute;
      inset: -2px;
      border-radius: 18px;
      background: linear-gradient(135deg, var(--neon-primary), transparent 50%);
      opacity: 0;
      z-index: -1;
      filter: blur(10px);
      transition: opacity 0.4s ease;
    }

    .product-card:hover .product-card__glow { opacity: 0.4; }

    /* No Products */
    .no-products {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      text-align: center;
      color: var(--gray-400);
      gap: 1rem;
    }

    .no-products i { font-size: 4rem; opacity: 0.5; }
    .no-products h3 { font-size: 1.3rem; color: var(--gray-200); }
    .no-products p { font-size: 0.9rem; }

    .btn-reset {
      padding: 0.8rem 1.5rem;
      background: var(--neon-primary);
      border-radius: 50px;
      color: var(--gray-900);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-reset:hover { transform: scale(1.05); box-shadow: 0 5px 20px rgba(57, 255, 20, 0.3); }

    /* Floating Guru */
    .floating-guru {
      position: fixed;
      bottom: 25px;
      right: 25px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-decoration: none;
      z-index: 99;
      transition: transform 0.3s ease;
      animation: guruFloatBounce 3s ease-in-out infinite;
    }
    .floating-guru:hover {
      transform: scale(1.1) translateY(-5px);
      animation: none;
    }
    .guru-float-img {
      width: 70px;
      height: 70px;
      object-fit: contain;
      filter: drop-shadow(0 0 15px var(--neon-glow)) drop-shadow(0 0 30px rgba(57, 255, 20, 0.2));
      transition: filter 0.3s ease;
    }
    .floating-guru:hover .guru-float-img {
      filter: drop-shadow(0 0 20px var(--neon-glow)) drop-shadow(0 0 40px rgba(57, 255, 20, 0.4));
    }
    .guru-float-bubble {
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      margin-bottom: 6px;
      padding: 0.4rem 0.8rem;
      background: var(--neon-primary);
      color: #000;
      font-size: 0.7rem;
      font-weight: 800;
      white-space: nowrap;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(57, 255, 20, 0.4);
      animation: bubbleFloat 2s ease-in-out infinite;
    }
    .guru-float-bubble::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      border: 6px solid transparent;
      border-top-color: var(--neon-primary);
    }
    @keyframes guruFloatBounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    @keyframes bubbleFloat {
      0%, 100% { transform: translateX(-50%) translateY(0); }
      50% { transform: translateX(-50%) translateY(-4px); }
    }

    /* Responsive - Tablet */
    @media (max-width: 968px) {
      .floating-menu-toggle { display: flex; }
      .sidebar-overlay { display: block; }

      .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 260px;
        height: 100%;
        transform: translateX(-100%);
        border-right: 2px solid var(--neon-primary);
        box-shadow: 5px 0 30px rgba(0,0,0,0.5);
        transition: transform 0.3s ease;
        z-index: 1001;
      }

      .sidebar--open { transform: translateX(0); }
      .sidebar--open .sidebar__brand, .sidebar--open .sidebar__link span { opacity: 1; }
      .sidebar__close { display: flex; }

      .productos-main { padding-top: 10px; }
      .productos-header { padding: 1rem; }
      .productos-title { font-size: 1.2rem; }

      .filter-toggle { display: flex; }

      .filters-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 280px;
        height: 100%;
        transform: translateX(100%);
        z-index: 999;
        border-left: 2px solid var(--neon-primary);
        border-right: none;
        transition: transform 0.3s ease;
      }

      .filters-panel--open { transform: translateX(0); }
      .filters-close { display: block; }

      .products-container { padding: 1rem; }
      .products-grid { grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 1rem; }
    }

    /* Responsive - Mobile */
    @media (max-width: 768px) {
      .productos-header { flex-wrap: wrap; gap: 0.75rem; }
      .back-btn span { display: none; }
      .filter-toggle span { display: none; }
      .productos-title { font-size: 1rem; }

      .products-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); }
      .product-card__image { height: 180px; }
      .floating-guru { bottom: 15px; right: 15px; }
      .guru-float-img { width: 55px; height: 55px; }
      .guru-float-bubble { font-size: 0.6rem; padding: 0.3rem 0.6rem; }
    }

    /* Responsive - Small Mobile */
    @media (max-width: 480px) {
      .productos-header { padding: 0.75rem; }
      .products-container { padding: 0.75rem; }
      .products-grid { grid-template-columns: 1fr 1fr; gap: 0.75rem; }
      .product-card__image { height: 150px; }
      .product-card__content { padding: 0.75rem; }
      .product-card__title { font-size: 0.85rem; }
      .meta-tag { font-size: 0.65rem; padding: 0.2rem 0.5rem; }
      .decor { width: 40px; height: 40px; opacity: 0.2; }

      .floating-menu-toggle {
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
      }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
      #scan-loader { display: none !important; }
      .cascos-layout { opacity: 1; animation: none; }
    }
  </style>

</body>
</html>
