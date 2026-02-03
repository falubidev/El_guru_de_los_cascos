<?php
require 'admin/db.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM tbl_productos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
  echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>No encontrado</title></head><body style='background:#0a0a0a;color:#fff;display:flex;align-items:center;justify-content:center;height:100vh;font-family:Orbitron,sans-serif;'><div style='text-align:center;'><h2 style='color:#39ff14;'>Producto no encontrado</h2><a href='cascos_producto.php' style='color:#39ff14;'>Volver al catálogo</a></div></body></html>";
  exit;
}

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

// Productos relacionados
$stmtRelacionados = $pdo->query("SELECT id, referencia, imagen, marca FROM tbl_productos WHERE id != $id ORDER BY RAND() LIMIT 6");
$relacionadosRaw = $stmtRelacionados->fetchAll(PDO::FETCH_ASSOC);

// Agregar imagen correcta a cada producto relacionado
$relacionados = array_map(function($item) {
  $item['imagen_url'] = !empty($item['imagen']) && file_exists('admin/uploads/productos/' . $item['imagen'])
    ? 'admin/uploads/productos/' . $item['imagen']
    : 'assets/img/iconos/aliencasco.png';
  return $item;
}, $relacionadosRaw);

// Imagen predeterminada si no hay foto
$imagenProducto = !empty($producto['imagen']) && file_exists('admin/uploads/productos/' . $producto['imagen'])
  ? 'admin/uploads/productos/' . htmlspecialchars($producto['imagen'])
  : 'assets/img/iconos/aliencasco.png';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($producto['referencia']) ?> - El Gurú de los Cascos</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    /* ========== LOADER ========== */
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
    .scan-progress-bar { height: 100%; background: var(--neon-primary); animation: progressFill 1.5s ease forwards; }
    @keyframes progressFill { from { width: 0; } to { width: 100%; } }

    /* ========== LAYOUT ========== */
    .detalle-layout {
      display: flex;
      height: 100vh;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s ease 1.5s forwards;
    }

    @keyframes fadeIn { to { opacity: 1; } }

    /* ========== FLOATING MENU TOGGLE ========== */
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

    /* ========== SIDEBAR OVERLAY ========== */
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, 0.7); z-index: 999; opacity: 0; pointer-events: none; transition: opacity 0.3s ease; }
    .sidebar-overlay.active { opacity: 1; pointer-events: auto; }

    /* ========== SIDEBAR ========== */
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

    /* ========== MAIN CONTENT ========== */
    .detalle-main {
      flex: 1;
      height: 100%;
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    /* Decorative Corners */
    .decor { position: absolute; width: 60px; height: 60px; z-index: 1; pointer-events: none; opacity: 0.3; }
    .decor--top-left { top: 10px; left: 10px; border-top: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--top-right { top: 10px; right: 10px; border-top: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }
    .decor--bottom-left { bottom: 10px; left: 10px; border-bottom: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--bottom-right { bottom: 10px; right: 10px; border-bottom: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }

    /* ========== BACKGROUND PARTICLES ========== */
    .bg-particles {
      position: absolute;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .bg-dot {
      position: absolute;
      bottom: 0;
      border-radius: 50%;
      background: var(--neon-primary);
      opacity: 0;
      animation: dotFloatUp linear infinite;
    }

    .bg-dot:nth-child(1)  { left: 5%;  width: 3px; height: 3px; animation-duration: 9s;  animation-delay: 0s;   }
    .bg-dot:nth-child(2)  { left: 15%; width: 4px; height: 4px; animation-duration: 11s; animation-delay: 1.2s; }
    .bg-dot:nth-child(3)  { left: 25%; width: 2px; height: 2px; animation-duration: 8s;  animation-delay: 3s;   }
    .bg-dot:nth-child(4)  { left: 35%; width: 5px; height: 5px; animation-duration: 12s; animation-delay: 0.5s; box-shadow: 0 0 6px var(--neon-glow); }
    .bg-dot:nth-child(5)  { left: 45%; width: 3px; height: 3px; animation-duration: 10s; animation-delay: 2s;   }
    .bg-dot:nth-child(6)  { left: 55%; width: 4px; height: 4px; animation-duration: 9.5s; animation-delay: 4s;  }
    .bg-dot:nth-child(7)  { left: 65%; width: 2px; height: 2px; animation-duration: 11s; animation-delay: 1.5s; }
    .bg-dot:nth-child(8)  { left: 75%; width: 5px; height: 5px; animation-duration: 10s; animation-delay: 3.5s; box-shadow: 0 0 6px var(--neon-glow); }
    .bg-dot:nth-child(9)  { left: 85%; width: 3px; height: 3px; animation-duration: 8.5s; animation-delay: 0.8s; }
    .bg-dot:nth-child(10) { left: 92%; width: 4px; height: 4px; animation-duration: 12s; animation-delay: 2.5s; }
    .bg-dot:nth-child(11) { left: 10%; width: 2px; height: 2px; animation-duration: 13s; animation-delay: 5s;   }
    .bg-dot:nth-child(12) { left: 50%; width: 3px; height: 3px; animation-duration: 9s;  animation-delay: 6s;   }

    @keyframes dotFloatUp {
      0%   { bottom: -5%; opacity: 0; transform: translateX(0) scale(1); }
      10%  { opacity: 0.7; }
      50%  { opacity: 0.5; transform: translateX(15px) scale(1.1); }
      90%  { opacity: 0.2; }
      100% { bottom: 105%; opacity: 0; transform: translateX(-10px) scale(0.8); }
    }

    /* ========== BOTTOM GLOW ========== */
    .bottom-glow {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 18%;
      background:
        radial-gradient(ellipse 80% 70% at 50% 100%, rgba(57, 255, 20, 0.08) 0%, transparent 70%),
        radial-gradient(ellipse 50% 50% at 30% 100%, rgba(46, 204, 113, 0.05) 0%, transparent 60%),
        radial-gradient(ellipse 50% 50% at 70% 100%, rgba(57, 255, 20, 0.05) 0%, transparent 60%);
      z-index: 0;
      pointer-events: none;
    }

    /* ========== HEADER ========== */
    .detalle-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 1.5rem;
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

    .header-title { text-align: center; flex: 1; }

    .detalle-title {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .title-accent { color: var(--neon-primary); text-shadow: 0 0 15px var(--neon-glow); }

    .header-spacer { width: 100px; }

    /* ========== CONTENT AREA ========== */
    .detalle-content {
      flex: 1;
      overflow-y: auto;
      padding: 1.5rem;
      position: relative;
      z-index: 5;
    }

    /* ========== PRODUCT GRID ========== */
    .product-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    /* ========== PRODUCT IMAGE ========== */
    .product-image-section {
      position: sticky;
      top: 0;
      align-self: start;
    }

    .product-image-container {
      background: linear-gradient(145deg, var(--gray-700), var(--gray-800));
      border-radius: 20px;
      padding: 1.5rem;
      border: 1px solid var(--gray-600);
      position: relative;
      overflow: hidden;
    }

    .product-image-container::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: conic-gradient(from 0deg, transparent, rgba(57, 255, 20, 0.03), transparent 30%);
      animation: rotateGlow 10s linear infinite;
    }

    @keyframes rotateGlow { to { transform: rotate(360deg); } }

    .product-image-wrapper { position: relative; z-index: 1; }

    .product-main-image {
      width: 100%;
      height: auto;
      max-height: 450px;
      object-fit: contain;
      border-radius: 12px;
      transition: transform 0.5s ease;
    }

    .product-image-container:hover .product-main-image { transform: scale(1.02); }

    .product-badge {
      position: absolute;
      top: 1rem;
      left: 1rem;
      background: var(--neon-primary);
      color: var(--gray-900);
      font-family: 'Orbitron', sans-serif;
      font-size: 0.7rem;
      font-weight: 700;
      padding: 0.4rem 0.8rem;
      border-radius: 50px;
      z-index: 2;
      box-shadow: 0 0 15px var(--neon-glow);
    }

    /* ========== PRODUCT INFO ========== */
    .product-info-section { display: flex; flex-direction: column; gap: 1.5rem; }

    .product-header { border-bottom: 1px solid var(--gray-600); padding-bottom: 1rem; }

    .product-brand {
      font-size: 0.85rem;
      color: var(--neon-primary);
      text-transform: uppercase;
      letter-spacing: 2px;
      font-weight: 600;
    }

    .product-name {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--white);
      margin: 0.5rem 0;
      line-height: 1.2;
    }

    .product-price {
      font-family: 'Orbitron', sans-serif;
      font-size: 2rem;
      font-weight: 800;
      color: var(--neon-primary);
      text-shadow: 0 0 15px var(--neon-glow);
    }

    .product-price span {
      font-size: 0.9rem;
      color: var(--gray-300);
      font-weight: 400;
      margin-left: 0.5rem;
    }

    /* ========== INFO CARDS ROW ========== */
    .info-cards-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem;
      margin-top: 2rem;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
    }

    .info-card {
      background: var(--gray-800);
      border-radius: 14px;
      border: 1px solid var(--gray-600);
      overflow: hidden;
      transition: border-color 0.3s ease;
    }

    .info-card:hover { border-color: rgba(57, 255, 20, 0.3); }

    .info-card__header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 1.25rem;
      cursor: pointer;
      border-bottom: 1px solid var(--gray-600);
      transition: background 0.3s ease;
      -webkit-tap-highlight-color: rgba(57, 255, 20, 0.1);
      user-select: none;
    }

    .info-card__header:hover { background: rgba(57, 255, 20, 0.03); }

    .info-card__title {
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }

    .info-card__title i { font-size: 1.1rem; color: var(--neon-primary); }

    .info-card__title h3 {
      font-family: 'Orbitron', sans-serif;
      font-size: 0.85rem;
      color: var(--neon-primary);
      margin: 0;
    }

    .info-card__arrow {
      color: var(--gray-300);
      font-size: 1rem;
      transition: transform 0.3s ease;
    }

    .info-card--open .info-card__arrow { transform: rotate(180deg); }

    .info-card__body {
      position: relative;
      max-height: 120px;
      overflow: hidden;
      transition: max-height 0.4s ease;
    }

    .info-card--open .info-card__body {
      max-height: none;
    }

    .info-card__content {
      padding: 1.25rem;
      font-size: 0.9rem;
      line-height: 1.7;
      color: var(--gray-200);
    }

    .info-card__fade {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 60px;
      background: linear-gradient(to bottom, transparent, var(--gray-800));
      pointer-events: none;
      transition: opacity 0.3s ease;
    }

    .info-card--open .info-card__fade { opacity: 0; }

    .info-card__toggle {
      width: 100%;
      padding: 0.7rem;
      background: none;
      border: none;
      border-top: 1px solid var(--gray-600);
      color: var(--neon-primary);
      font-size: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      -webkit-tap-highlight-color: rgba(57, 255, 20, 0.1);
      user-select: none;
      align-items: center;
      justify-content: center;
      gap: 0.4rem;
      transition: background 0.3s ease;
    }

    .info-card__toggle:hover { background: rgba(57, 255, 20, 0.05); }

    .info-card__toggle .toggle-hide { display: none; }
    .info-card--open .info-card__toggle .toggle-show { display: none; }
    .info-card--open .info-card__toggle .toggle-hide { display: inline-flex; align-items: center; gap: 0.4rem; }

    /* Specs inline (fully visible, no collapse) */
    .specs-inline {
      background: var(--gray-800);
      border-radius: 14px;
      border: 1px solid var(--gray-600);
      padding: 1rem 1.25rem;
    }

    /* Specs grid inside info card */
    .specs-grid-card {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 0.75rem;
    }

    .spec-item {
      background: var(--gray-700);
      border-radius: 10px;
      padding: 0.75rem;
      border: 1px solid var(--gray-600);
      transition: all 0.3s ease;
    }

    .spec-item:hover { border-color: var(--neon-primary); }

    .spec-label {
      font-size: 0.7rem;
      color: var(--gray-300);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 0.2rem;
    }

    .spec-value { font-size: 0.9rem; color: var(--white); font-weight: 500; }

    /* ========== CTA BUTTON ========== */
    .cta-button {
      width: 100%;
      padding: 1rem 2rem;
      background: transparent;
      border: 2px solid var(--neon-primary);
      color: var(--neon-primary);
      font-family: 'Orbitron', sans-serif;
      font-size: 1rem;
      font-weight: 700;
      letter-spacing: 2px;
      border-radius: 10px;
      -webkit-tap-highlight-color: rgba(57, 255, 20, 0.2);
      touch-action: manipulation;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.4s ease;
      box-shadow: 0 0 15px rgba(57, 255, 20, 0.2);
    }

    .cta-button:hover {
      background: var(--neon-primary);
      color: var(--gray-900);
      box-shadow: 0 0 30px var(--neon-glow);
      transform: translateY(-2px);
    }

    .cta-button i { margin-right: 0.5rem; }

    /* ========== WA VERIFY ========== */
    .wa-verify-box {
      margin-top: 0.75rem;
      padding: 1rem;
      background: rgba(57, 255, 20, 0.05);
      border: 1px solid var(--gray-600);
      border-radius: 12px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.75rem;
    }

    .wa-verify-text {
      color: var(--gray-200);
      font-size: 0.85rem;
      margin: 0;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .wa-verify-text i {
      color: var(--neon-primary);
      font-size: 1rem;
    }

    .wa-confirm-btn {
      width: auto;
      padding: 0.75rem 2rem;
      background: #25d366;
      border-color: #25d366;
      color: #fff;
      font-size: 0.9rem;
    }

    .wa-confirm-btn:hover {
      background: #128c7e;
      border-color: #128c7e;
      color: #fff;
    }


    /* ========== RELATED PRODUCTS ========== */
    .related-section {
      margin-top: 2rem;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
    }

    .related-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.25rem;
    }

    .related-title {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.1rem;
      color: var(--white);
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .related-title i { color: var(--neon-primary); }

    .related-nav { display: flex; gap: 0.5rem; }

    .related-nav-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 1px solid var(--gray-500);
      background: var(--gray-700);
      color: var(--gray-200);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .related-nav-btn:hover { border-color: var(--neon-primary); color: var(--neon-primary); }

    .related-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.25rem;
    }

    .related-card {
      background: var(--gray-800);
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid var(--gray-600);
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .related-card:hover { border-color: var(--neon-primary); transform: translateY(-5px); }

    .related-card__image {
      position: relative;
      padding: 1rem;
      background: linear-gradient(145deg, var(--gray-700), var(--gray-800));
    }

    .related-card__image img {
      width: 100%;
      height: 140px;
      object-fit: contain;
      transition: transform 0.3s ease;
    }

    .related-card:hover .related-card__image img { transform: scale(1.05); }

    .related-card__brand {
      position: absolute;
      top: 0.5rem;
      left: 0.5rem;
      background: var(--neon-primary);
      color: var(--gray-900);
      font-size: 0.6rem;
      font-weight: 700;
      padding: 0.2rem 0.4rem;
      border-radius: 4px;
      text-transform: uppercase;
    }

    .related-card__info { padding: 0.75rem 1rem 1rem; }

    .related-card__title {
      font-family: 'Orbitron', sans-serif;
      font-size: 0.8rem;
      color: var(--white);
      margin: 0;
      line-height: 1.3;
    }

    .related-card__cta {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      color: var(--neon-primary);
      font-size: 0.75rem;
      margin-top: 0.5rem;
      opacity: 0;
      transform: translateX(-10px);
      transition: all 0.3s ease;
    }

    .related-card:hover .related-card__cta { opacity: 1; transform: translateX(0); }

    /* ========== MODAL ========== */
    .modal-content {
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 16px;
    }

    .modal-header {
      border-bottom: 1px solid var(--gray-600);
      padding: 1.25rem;
    }

    .modal-title {
      font-family: 'Orbitron', sans-serif;
      color: var(--neon-primary);
      font-size: 1rem;
    }

    .btn-close { filter: invert(1); }

    .modal-body { padding: 1.25rem; }

    .modal-body .form-label { color: var(--gray-200); font-size: 0.85rem; margin-bottom: 0.4rem; }

    .modal-body .form-control {
      background: var(--gray-700);
      border: 1px solid var(--gray-500);
      color: var(--white);
      border-radius: 8px;
      padding: 0.7rem 1rem;
    }

    .modal-body .form-control:focus {
      border-color: var(--neon-primary);
      box-shadow: 0 0 0 3px rgba(57, 255, 20, 0.1);
      background: var(--gray-700);
      color: var(--white);
    }

    .modal-body .form-control::placeholder { color: var(--gray-400); }

    .modal-footer { border-top: 1px solid var(--gray-600); padding: 1.25rem; }

    /* ========== FLOATING GURU BUTTON ========== */
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
      right: 0;
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
      right: 20px;
      border: 6px solid transparent;
      border-top-color: var(--neon-primary);
    }
    @keyframes guruFloatBounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    @keyframes bubbleFloat {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-4px); }
    }

    /* ========== RESPONSIVE - TABLET ========== */
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

      .detalle-main { padding-top: 10px; }

      .product-grid { grid-template-columns: 1fr; gap: 1.5rem; }

      .product-image-section { position: relative; }

      .info-cards-row { grid-template-columns: 1fr; gap: 1rem; }

      .related-grid { grid-template-columns: repeat(2, 1fr); }
    }

    /* ========== RESPONSIVE - MOBILE ========== */
    @media (max-width: 768px) {
      html, body {
        height: auto;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
      }

      .detalle-layout {
        height: auto;
        min-height: 100vh;
      }

      .detalle-main {
        height: auto;
        overflow: visible;
      }

      .detalle-content {
        overflow: visible;
      }

      .detalle-header { padding: 0.75rem 1rem; }
      .back-btn span { display: none; }
      .detalle-title { font-size: 1rem; }

      .detalle-content { padding: 1rem; }

      .product-name { font-size: 1.3rem; }
      .product-price { font-size: 1.6rem; }

      .specs-grid { grid-template-columns: 1fr; }
      .specs-grid-card { grid-template-columns: 1fr; }

      .related-nav { display: none; }
      .related-grid { gap: 1rem; }
      .related-card__image img { height: 120px; }

      .floating-guru { bottom: 15px; right: 15px; }
      .guru-float-img { width: 55px; height: 55px; }
      .guru-float-bubble { font-size: 0.6rem; padding: 0.3rem 0.6rem; }

      .bg-particles { display: none; }
      .bottom-glow { display: none; }
      .decor { display: none; }

      .detalle-content,
      .detalle-header {
        position: relative;
        z-index: 5;
      }

      .info-card__header,
      .info-card__toggle,
      .cta-button,
      .back-btn,
      .related-card {
        position: relative;
        z-index: 10;
      }
    }

    /* ========== RESPONSIVE - SMALL MOBILE ========== */
    @media (max-width: 480px) {
      .detalle-content { padding: 0.75rem; }

      .product-image-container { padding: 1rem; }

      .product-name { font-size: 1.1rem; }
      .product-price { font-size: 1.4rem; }

      .specs-section, .sizes-section { padding: 1rem; }

      .cta-button { padding: 0.85rem 1.5rem; font-size: 0.9rem; }

      .related-grid { grid-template-columns: 1fr 1fr; gap: 0.75rem; }
      .related-card__image img { height: 100px; }
      .related-card__title { font-size: 0.7rem; }

      .decor { width: 25px; height: 25px; opacity: 0.15; }

      .floating-menu-toggle {
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
      }

      .product-main-image { max-height: 300px; }

      .info-cards-row { gap: 0.75rem; }
      .info-card__content { padding: 1rem; font-size: 0.85rem; }
      .info-card__header { padding: 0.75rem 1rem; }
      .info-card__title h3 { font-size: 0.75rem; }

      .related-title { font-size: 0.9rem; }
    }
  </style>
</head>
<body>

<!-- Loader -->
<div id="scan-loader">
  <div class="scan-container">
    <div class="scan-logo">
      <img src="assets/img/logos_new/logo_fondo_negro.png" alt="El Gurú de los Cascos">
      <div class="scan-line"></div>
    </div>
    <div class="scan-text">CARGANDO</div>
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

<!-- Main Layout -->
<div class="detalle-layout">

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
  <main class="detalle-main">

    <!-- Decorative Corners -->
    <div class="decor decor--top-left"></div>
    <div class="decor decor--top-right"></div>
    <div class="decor decor--bottom-left"></div>
    <div class="decor decor--bottom-right"></div>

    <!-- Background Particles -->
    <div class="bg-particles">
      <span class="bg-dot"></span><span class="bg-dot"></span><span class="bg-dot"></span>
      <span class="bg-dot"></span><span class="bg-dot"></span><span class="bg-dot"></span>
      <span class="bg-dot"></span><span class="bg-dot"></span><span class="bg-dot"></span>
      <span class="bg-dot"></span><span class="bg-dot"></span><span class="bg-dot"></span>
    </div>

    <!-- Bottom green glow (particle source) -->
    <div class="bottom-glow"></div>

    <!-- Header -->
    <header class="detalle-header">
      <a href="cascos_producto.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        <span>Volver</span>
      </a>
      <div class="header-title">
        <h1 class="detalle-title">
          <span class="title-accent"><?= htmlspecialchars($producto['marca']) ?></span>
        </h1>
      </div>
      <div class="header-spacer"></div>
    </header>

    <!-- Content -->
    <div class="detalle-content">

      <!-- Product Grid -->
      <div class="product-grid">

        <!-- Image Section -->
        <div class="product-image-section">
          <div class="product-image-container">
            <span class="product-badge"><?= htmlspecialchars($producto['marca']) ?></span>
            <div class="product-image-wrapper">
              <img src="<?= $imagenProducto ?>"
                   alt="<?= htmlspecialchars($producto['referencia']) ?>"
                   class="product-main-image">
            </div>
          </div>
        </div>

        <!-- Info Section -->
        <div class="product-info-section">

          <!-- Header -->
          <div class="product-header">
            <div class="product-brand"><?= htmlspecialchars($producto['marca']) ?></div>
            <h2 class="product-name"><?= htmlspecialchars($producto['referencia']) ?></h2>
            <div class="product-price">
              <?= $producto['precio'] !== null ? '$' . number_format($producto['precio'], 0, ',', '.') : 'Consultar' ?>
              <?php if ($producto['precio'] !== null): ?>
                <span>COP</span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Especificaciones inline -->
          <div class="specs-inline">
            <div class="specs-grid-card">
              <div class="spec-item">
                <div class="spec-label">Tipo</div>
                <div class="spec-value"><?= htmlspecialchars($tipo ?: 'N/A') ?></div>
              </div>
              <div class="spec-item">
                <div class="spec-label">Gráfico</div>
                <div class="spec-value"><?= htmlspecialchars($grafico ?: 'N/A') ?></div>
              </div>
              <div class="spec-item">
                <div class="spec-label">Acabado</div>
                <div class="spec-value"><?= htmlspecialchars($acabado ?: 'N/A') ?></div>
              </div>
              <div class="spec-item">
                <div class="spec-label">Color</div>
                <div class="spec-value"><?= htmlspecialchars($producto['color'] ?: 'N/A') ?></div>
              </div>
              <?php if ($tallasTexto): ?>
              <div class="spec-item" style="grid-column: 1 / -1;">
                <div class="spec-label">Tallas</div>
                <div class="spec-value"><?= htmlspecialchars($tallasTexto) ?></div>
              </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- CTA - WhatsApp con verificación -->
          <?php
            $whatsapp_numero = '573052332296'; // Cambia por tu número real con código de país
            $precio_texto = $producto['precio'] !== null ? '$' . number_format($producto['precio'], 0, ',', '.') . ' COP' : 'Consultar precio';
            $wa_mensaje = "Hola Yaru! 👋 Quiero preguntarte por este casco:\n\n"
              . "🏍 *Marca:* " . $producto['marca'] . "\n"
              . "📦 *Referencia:* " . $producto['referencia'] . "\n"
              . "💰 *Precio:* " . $precio_texto . "\n"
              . "🎨 *Color:* " . ($producto['color'] ?: 'N/A') . "\n\n"
              . "¿Está disponible?";
            $wa_url = "https://wa.me/" . $whatsapp_numero . "?text=" . rawurlencode($wa_mensaje);
          ?>
          <button type="button" class="cta-button" id="btnPedir">
            <i class="bi bi-whatsapp"></i>
            ¡PIDE EL TUYO!
          </button>
          <div id="wa-verify" style="display:none;">
            <div class="wa-verify-box">
              <p class="wa-verify-text"><i class="bi bi-shield-check"></i> Verifica que eres humano</p>
              <div class="g-recaptcha" id="recaptchaWa" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>" data-callback="onRecaptchaWa"></div>
              <a id="wa-link" href="<?= $wa_url ?>" target="_blank" class="cta-button wa-confirm-btn" style="display:none; text-decoration:none; text-align:center;">
                <i class="bi bi-whatsapp"></i>
                Ir a WhatsApp
              </a>
            </div>
          </div>

        </div>
      </div>

      <!-- Info Cards Row -->
      <div class="info-cards-row">

        <!-- Description Card -->
        <?php if (!empty($producto['descripcion'])): ?>
        <div class="info-card">
          <div class="info-card__header" onclick="this.closest('.info-card').classList.toggle('info-card--open')">
            <div class="info-card__title">
              <i class="bi bi-file-text"></i>
              <h3>Descripción Detallada</h3>
            </div>
            <i class="bi bi-chevron-down info-card__arrow"></i>
          </div>
          <div class="info-card__body">
            <div class="info-card__content">
              <?= nl2br(htmlspecialchars($producto['descripcion'])) ?>
            </div>
            <div class="info-card__fade"></div>
          </div>
          <button class="info-card__toggle" onclick="this.closest('.info-card').classList.toggle('info-card--open')">
            <span class="toggle-show">Ver más <i class="bi bi-chevron-down"></i></span>
            <span class="toggle-hide">Ver menos <i class="bi bi-chevron-up"></i></span>
          </button>
        </div>
        <?php endif; ?>

        <!-- Technical Specifications Card -->
        <div class="info-card">
          <div class="info-card__header" onclick="this.closest('.info-card').classList.toggle('info-card--open')">
            <div class="info-card__title">
              <i class="bi bi-gear"></i>
              <h3>Especificaciones Técnicas</h3>
            </div>
            <i class="bi bi-chevron-down info-card__arrow"></i>
          </div>
          <div class="info-card__body">
            <div class="info-card__content">
              <?php if (!empty($producto['especificaciones_tecnicas'])): ?>
                <?= nl2br(htmlspecialchars($producto['especificaciones_tecnicas'])) ?>
              <?php else: ?>
                <p style="color: var(--gray-300); font-style: italic;">Especificaciones técnicas del casco</p>
              <?php endif; ?>
            </div>
            <div class="info-card__fade"></div>
          </div>
          <button class="info-card__toggle" onclick="this.closest('.info-card').classList.toggle('info-card--open')">
            <span class="toggle-show">Ver más <i class="bi bi-chevron-down"></i></span>
            <span class="toggle-hide">Ver menos <i class="bi bi-chevron-up"></i></span>
          </button>
        </div>

      </div>

      <!-- Related Products -->
      <?php if (!empty($relacionados)): ?>
      <div class="related-section">
        <div class="related-header">
          <h3 class="related-title">
            <i class="bi bi-lightning"></i>
            También te puede interesar
          </h3>
          <div class="related-nav">
            <button class="related-nav-btn" id="relatedPrev"><i class="bi bi-chevron-left"></i></button>
            <button class="related-nav-btn" id="relatedNext"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
        <div class="related-grid" id="relatedGrid">
          <?php foreach (array_slice($relacionados, 0, 3) as $casco): ?>
            <a href="detalle.php?id=<?= $casco['id'] ?>" class="related-card">
              <div class="related-card__image">
                <span class="related-card__brand"><?= htmlspecialchars($casco['marca']) ?></span>
                <img src="<?= htmlspecialchars($casco['imagen_url']) ?>"
                     alt="<?= htmlspecialchars($casco['referencia']) ?>">
              </div>
              <div class="related-card__info">
                <h4 class="related-card__title"><?= htmlspecialchars($casco['referencia']) ?></h4>
                <div class="related-card__cta">
                  <span>Ver detalles</span>
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>

  </main>

</div>

<!-- Floating Guru Button -->
<a href="https://wa.me/573052332296?text=Hola%20Guru!%20Quiero%20preguntarte%20por%20un%20casco" target="_blank" class="floating-guru">
  <span class="guru-float-bubble">Preguntame!</span>
  <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Gurú" class="guru-float-img">
</a>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  // Loader
  const loader = document.getElementById('scan-loader');
  setTimeout(() => {
    document.body.classList.add('loaded');
    loader.classList.add('done');
    setTimeout(() => loader.style.display = 'none', 500);
  }, 1500);

  // Sidebar Toggle - Floating Button
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
    document.body.style.overflow = window.innerWidth <= 768 ? 'auto' : '';
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

  // Related products navigation
  const relatedProducts = <?= json_encode($relacionados) ?>;
  const relatedGrid = document.getElementById('relatedGrid');
  const prevBtn = document.getElementById('relatedPrev');
  const nextBtn = document.getElementById('relatedNext');
  let currentIndex = 0;

  function getVisibleCount() {
    if (window.innerWidth <= 480) return 2;
    if (window.innerWidth <= 768) return 2;
    return 3;
  }

  function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }

  function renderRelated() {
    const visibleCount = getVisibleCount();
    const start = currentIndex;
    const end = Math.min(start + visibleCount, relatedProducts.length);
    const visible = relatedProducts.slice(start, end);

    relatedGrid.innerHTML = visible.map(casco => `
      <a href="detalle.php?id=${casco.id}" class="related-card">
        <div class="related-card__image">
          <span class="related-card__brand">${escapeHtml(casco.marca)}</span>
          <img src="${escapeHtml(casco.imagen_url)}" alt="${escapeHtml(casco.referencia)}">
        </div>
        <div class="related-card__info">
          <h4 class="related-card__title">${escapeHtml(casco.referencia)}</h4>
          <div class="related-card__cta">
            <span>Ver detalles</span>
            <i class="bi bi-arrow-right"></i>
          </div>
        </div>
      </a>
    `).join('');
  }

  if (prevBtn && nextBtn && relatedProducts.length > 0) {
    prevBtn.addEventListener('click', () => {
      const visibleCount = getVisibleCount();
      currentIndex = Math.max(0, currentIndex - visibleCount);
      renderRelated();
    });

    nextBtn.addEventListener('click', () => {
      const visibleCount = getVisibleCount();
      if (currentIndex + visibleCount < relatedProducts.length) {
        currentIndex += visibleCount;
        renderRelated();
      }
    });

    window.addEventListener('resize', () => {
      currentIndex = 0;
      renderRelated();
    });
  }

  // WhatsApp button with rate limiting
  const btnPedir = document.getElementById('btnPedir');
  const waVerify = document.getElementById('wa-verify');

  if (btnPedir) {
    btnPedir.addEventListener('click', function() {
      // Rate limiting: max 5 per hour
      const key = 'wa_clicks';
      const now = Date.now();
      let clicks = JSON.parse(localStorage.getItem(key) || '[]');
      clicks = clicks.filter(t => now - t < 3600000); // last hour only

      if (clicks.length >= 5) {
        alert('Has hecho muchas solicitudes. Intenta de nuevo más tarde.');
        return;
      }

      // Show verification
      btnPedir.style.display = 'none';
      waVerify.style.display = 'block';
    });
  }
});

// reCAPTCHA callback (must be global)
function onRecaptchaWa(token) {
  if (token) {
    const waLink = document.getElementById('wa-link');
    waLink.style.display = 'flex';

    // Save click timestamp
    const key = 'wa_clicks';
    const now = Date.now();
    let clicks = JSON.parse(localStorage.getItem(key) || '[]');
    clicks.push(now);
    localStorage.setItem(key, JSON.stringify(clicks));
  }
}
</script>

</body>
</html>
