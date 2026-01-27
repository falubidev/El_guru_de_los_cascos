<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="cascos-page">

  <!-- Epic Explosion Loader -->
  <div id="explosion-loader">
    <div class="explosion-container">
      <!-- Particles -->
      <div class="explosion-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
      </div>
      <!-- Central Ring -->
      <div class="explosion-ring"></div>
      <div class="explosion-ring explosion-ring--2"></div>
      <div class="explosion-ring explosion-ring--3"></div>
      <!-- Logo -->
      <div class="explosion-logo">
        <img src="assets/img/gurulogo.png" alt="El Gurú de los Cascos">
      </div>
      <!-- Text -->
      <div class="explosion-text">CATÁLOGO</div>
    </div>
    <!-- Door Panels -->
    <div class="door-panel door-panel--left"></div>
    <div class="door-panel door-panel--right"></div>
  </div>

  <!-- Main Layout -->
  <div class="cascos-layout">

    <!-- Sidebar Navigation -->
    <nav class="sidebar">
      <div class="sidebar__header">
        <a href="index.php" class="sidebar__logo">
          <img src="assets/img/gurulogo.png" alt="Logo">
        </a>
        <span class="sidebar__brand">EL GURÚ</span>
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
      </ul>

      <div class="sidebar__footer">
        <div class="sidebar__social">
          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank"><i class="bi bi-youtube"></i></a>
          <a href="https://www.instagram.com/el_guru_de_los_cascos" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://www.tiktok.com/@el_guru_de_los_cascos" target="_blank"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>

      <!-- Mobile Toggle -->
      <button class="sidebar__toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
      </button>
    </nav>

    <!-- Main Content -->
    <main class="cascos-main">

      <!-- Decorative Corners -->
      <div class="decor decor--top-left"></div>
      <div class="decor decor--top-right"></div>
      <div class="decor decor--bottom-left"></div>
      <div class="decor decor--bottom-right"></div>

      <!-- Header -->
      <header class="cascos-header">
        <h1 class="cascos-title">
          <span class="title-accent">Elige</span> tu estilo
        </h1>
        <p class="cascos-subtitle">Selecciona una categoría</p>
      </header>

      <!-- Categories Grid -->
      <div class="categorias-grid">

        <a href="cascos_producto.php?tipo=aventura" class="categoria" data-category="aventura">
          <div class="categoria__image">
            <img src="assets/img/catalogo/submenu/cascos/aventurasinfondo.png" alt="Aventura">
          </div>
          <div class="categoria__info">
            <span class="categoria__name">Aventura</span>
          </div>
          <div class="categoria__glow"></div>
        </a>

        <a href="cascos_producto.php?tipo=abatible" class="categoria" data-category="abatible">
          <div class="categoria__image">
            <img src="assets/img/catalogo/submenu/cascos/abatiblesinfondo.png" alt="Abatible">
          </div>
          <div class="categoria__info">
            <span class="categoria__name">Abatible</span>
          </div>
          <div class="categoria__glow"></div>
        </a>

        <a href="cascos_producto.php?tipo=modular" class="categoria" data-category="modular">
          <div class="categoria__image">
            <img src="assets/img/catalogo/submenu/cascos/modularsinfondo1.png" alt="Modular">
          </div>
          <div class="categoria__info">
            <span class="categoria__name">Modular</span>
          </div>
          <div class="categoria__glow"></div>
        </a>

        <a href="cascos_producto.php?tipo=integral" class="categoria" data-category="integral">
          <div class="categoria__image">
            <img src="assets/img/catalogo/submenu/cascos/integralsinfondo.png" alt="Integral">
          </div>
          <div class="categoria__info">
            <span class="categoria__name">Integral</span>
          </div>
          <div class="categoria__glow"></div>
        </a>

        <a href="cascos_producto.php?tipo=jet" class="categoria" data-category="jet">
          <div class="categoria__image">
            <img src="assets/img/catalogo/submenu/cascos/modularsinfondo2.png" alt="Jet">
          </div>
          <div class="categoria__info">
            <span class="categoria__name">Jet</span>
          </div>
          <div class="categoria__glow"></div>
        </a>

        <a href="cascos_producto.php?tipo=cross" class="categoria" data-category="cross">
          <div class="categoria__image">
            <img src="assets/img/catalogo/submenu/cascos/crossinfondo.png" alt="Cross">
          </div>
          <div class="categoria__info">
            <span class="categoria__name">Cross</span>
          </div>
          <div class="categoria__glow"></div>
        </a>

      </div>

    </main>

  </div>

  <!-- Floating WhatsApp -->
  <a href="https://wa.me/tuNumero" target="_blank" class="floating-whatsapp">
    <i class="bi bi-whatsapp"></i>
    <span class="whatsapp-pulse"></span>
  </a>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const loader = document.getElementById('explosion-loader');

      // Trigger explosion animation
      setTimeout(() => {
        loader.classList.add('exploding');
      }, 800);

      // Remove loader after animation
      setTimeout(() => {
        loader.classList.add('done');
        setTimeout(() => {
          loader.style.display = 'none';
        }, 100);
      }, 2200);

      // Stagger category animations
      const categories = document.querySelectorAll('.categoria');
      categories.forEach((cat, i) => {
        cat.style.animationDelay = `${2.2 + (i * 0.1)}s`;
      });

      // Sidebar toggle for mobile
      const toggle = document.getElementById('sidebarToggle');
      const sidebar = document.querySelector('.sidebar');

      toggle.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar--open');
        toggle.querySelector('i').classList.toggle('bi-list');
        toggle.querySelector('i').classList.toggle('bi-x');
      });

      // Close sidebar when clicking a link on mobile
      document.querySelectorAll('.sidebar__link').forEach(link => {
        link.addEventListener('click', () => {
          if (window.innerWidth <= 968) {
            sidebar.classList.remove('sidebar--open');
          }
        });
      });

      // Parallax effect on categories
      if (window.innerWidth > 768) {
        document.addEventListener('mousemove', (e) => {
          const x = (e.clientX / window.innerWidth - 0.5) * 2;
          const y = (e.clientY / window.innerHeight - 0.5) * 2;

          categories.forEach((cat, i) => {
            const speed = 3 + (i % 3);
            cat.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
          });
        });
      }
    });
  </script>

  <style>
    /* ==================== */
    /* CSS Variables */
    /* ==================== */
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

    /* ==================== */
    /* Reset */
    /* ==================== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      overflow: hidden;
      background: var(--gray-900);
      font-family: 'Poppins', sans-serif;
    }

    /* ==================== */
    /* Explosion Loader */
    /* ==================== */
    #explosion-loader {
      position: fixed;
      inset: 0;
      background: var(--gray-900);
      z-index: 99999;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .explosion-container {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      z-index: 10;
    }

    .explosion-logo {
      position: relative;
      z-index: 5;
    }

    .explosion-logo img {
      width: 100px;
      filter: drop-shadow(0 0 30px var(--neon-glow));
      animation: logoPulse 1s ease-in-out infinite;
    }

    @keyframes logoPulse {
      0%, 100% { transform: scale(1); filter: drop-shadow(0 0 30px var(--neon-glow)); }
      50% { transform: scale(1.1); filter: drop-shadow(0 0 50px var(--neon-glow)); }
    }

    .explosion-text {
      margin-top: 1.5rem;
      font-family: 'Orbitron', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 8px;
      opacity: 0;
      animation: textFadeIn 0.5s ease 0.3s forwards;
    }

    @keyframes textFadeIn {
      to { opacity: 1; }
    }

    /* Explosion Rings */
    .explosion-ring {
      position: absolute;
      width: 150px;
      height: 150px;
      border: 2px solid var(--neon-primary);
      border-radius: 50%;
      opacity: 0.3;
      animation: ringRotate 3s linear infinite;
    }

    .explosion-ring--2 {
      width: 200px;
      height: 200px;
      border-style: dashed;
      animation-direction: reverse;
      animation-duration: 4s;
    }

    .explosion-ring--3 {
      width: 250px;
      height: 250px;
      border-style: dotted;
      animation-duration: 5s;
    }

    @keyframes ringRotate {
      to { transform: rotate(360deg); }
    }

    /* Explosion Particles */
    .explosion-particles {
      position: absolute;
      width: 300px;
      height: 300px;
    }

    .explosion-particles span {
      position: absolute;
      width: 8px;
      height: 8px;
      background: var(--neon-primary);
      border-radius: 50%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.6;
      box-shadow: 0 0 10px var(--neon-glow);
    }

    .explosion-particles span:nth-child(1) { animation: particle 2s ease-in-out infinite 0s; }
    .explosion-particles span:nth-child(2) { animation: particle 2s ease-in-out infinite 0.15s; }
    .explosion-particles span:nth-child(3) { animation: particle 2s ease-in-out infinite 0.3s; }
    .explosion-particles span:nth-child(4) { animation: particle 2s ease-in-out infinite 0.45s; }
    .explosion-particles span:nth-child(5) { animation: particle 2s ease-in-out infinite 0.6s; }
    .explosion-particles span:nth-child(6) { animation: particle 2s ease-in-out infinite 0.75s; }
    .explosion-particles span:nth-child(7) { animation: particle 2s ease-in-out infinite 0.9s; }
    .explosion-particles span:nth-child(8) { animation: particle 2s ease-in-out infinite 1.05s; }
    .explosion-particles span:nth-child(9) { animation: particle 2s ease-in-out infinite 1.2s; }
    .explosion-particles span:nth-child(10) { animation: particle 2s ease-in-out infinite 1.35s; }
    .explosion-particles span:nth-child(11) { animation: particle 2s ease-in-out infinite 1.5s; }
    .explosion-particles span:nth-child(12) { animation: particle 2s ease-in-out infinite 1.65s; }

    @keyframes particle {
      0%, 100% {
        transform: translate(-50%, -50%) rotate(var(--angle, 0deg)) translateX(0);
        opacity: 0.6;
      }
      50% {
        transform: translate(-50%, -50%) rotate(var(--angle, 0deg)) translateX(120px);
        opacity: 1;
      }
    }

    .explosion-particles span:nth-child(1) { --angle: 0deg; }
    .explosion-particles span:nth-child(2) { --angle: 30deg; }
    .explosion-particles span:nth-child(3) { --angle: 60deg; }
    .explosion-particles span:nth-child(4) { --angle: 90deg; }
    .explosion-particles span:nth-child(5) { --angle: 120deg; }
    .explosion-particles span:nth-child(6) { --angle: 150deg; }
    .explosion-particles span:nth-child(7) { --angle: 180deg; }
    .explosion-particles span:nth-child(8) { --angle: 210deg; }
    .explosion-particles span:nth-child(9) { --angle: 240deg; }
    .explosion-particles span:nth-child(10) { --angle: 270deg; }
    .explosion-particles span:nth-child(11) { --angle: 300deg; }
    .explosion-particles span:nth-child(12) { --angle: 330deg; }

    /* Door Panels */
    .door-panel {
      position: absolute;
      top: 0;
      width: 50%;
      height: 100%;
      background: var(--gray-800);
      z-index: 20;
      transition: transform 1s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .door-panel--left {
      left: 0;
      border-right: 2px solid var(--neon-primary);
      box-shadow: inset -20px 0 60px rgba(0,0,0,0.5);
    }

    .door-panel--right {
      right: 0;
      border-left: 2px solid var(--neon-primary);
      box-shadow: inset 20px 0 60px rgba(0,0,0,0.5);
    }

    /* Explosion Animation */
    #explosion-loader.exploding .explosion-logo img {
      animation: logoExplode 0.8s ease forwards;
    }

    #explosion-loader.exploding .explosion-ring {
      animation: ringExplode 0.8s ease forwards;
    }

    #explosion-loader.exploding .explosion-particles span {
      animation: particleExplode 0.8s ease forwards;
    }

    #explosion-loader.exploding .explosion-text {
      animation: textExplode 0.6s ease forwards;
    }

    #explosion-loader.exploding .door-panel--left {
      transform: translateX(-100%);
    }

    #explosion-loader.exploding .door-panel--right {
      transform: translateX(100%);
    }

    @keyframes logoExplode {
      0% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.5); opacity: 1; filter: drop-shadow(0 0 80px var(--neon-primary)); }
      100% { transform: scale(0); opacity: 0; }
    }

    @keyframes ringExplode {
      to { transform: scale(3); opacity: 0; }
    }

    @keyframes particleExplode {
      to { transform: translate(-50%, -50%) rotate(var(--angle)) translateX(300px); opacity: 0; }
    }

    @keyframes textExplode {
      to { transform: scale(2); opacity: 0; letter-spacing: 30px; }
    }

    #explosion-loader.done {
      opacity: 0;
      pointer-events: none;
    }

    /* ==================== */
    /* Main Layout */
    /* ==================== */
    .cascos-layout {
      display: flex;
      height: 100vh;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s ease 2.2s forwards;
    }

    @keyframes fadeIn {
      to { opacity: 1; }
    }

    /* ==================== */
    /* Sidebar */
    /* ==================== */
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
    }

    .sidebar:hover {
      width: 200px;
    }

    .sidebar__header {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 2rem;
    }

    .sidebar__logo img {
      width: 45px;
      filter: drop-shadow(0 0 15px var(--neon-glow));
      transition: transform 0.3s ease;
    }

    .sidebar__logo:hover img {
      transform: scale(1.1);
    }

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

    .sidebar:hover .sidebar__brand {
      opacity: 1;
    }

    .sidebar__menu {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      width: 100%;
      padding: 0 0.75rem;
      flex: 1;
    }

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

    .sidebar__link i {
      font-size: 1.3rem;
      min-width: 24px;
      text-align: center;
    }

    .sidebar__link span {
      font-size: 0.85rem;
      font-weight: 500;
      opacity: 0;
      white-space: nowrap;
      transition: opacity 0.3s ease;
    }

    .sidebar:hover .sidebar__link span {
      opacity: 1;
    }

    .sidebar__link:hover {
      background: var(--gray-700);
      color: var(--white);
    }

    .sidebar__link--active {
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      color: var(--gray-900);
    }

    .sidebar__link--active:hover {
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      color: var(--gray-900);
    }

    .sidebar__footer {
      margin-top: auto;
      padding: 1rem 0;
    }

    .sidebar__social {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      align-items: center;
    }

    .sidebar:hover .sidebar__social {
      flex-direction: row;
    }

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

    .sidebar__social a:hover {
      background: var(--neon-primary);
      color: var(--gray-900);
      transform: scale(1.1);
    }

    .sidebar__toggle {
      display: none;
    }

    /* ==================== */
    /* Main Content */
    /* ==================== */
    .cascos-main {
      flex: 1;
      height: 100%;
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      display: flex;
      flex-direction: column;
      padding: 1.5rem 2rem;
      position: relative;
      overflow: hidden;
    }

    /* Decorative Corners */
    .decor {
      position: absolute;
      width: 80px;
      height: 80px;
      z-index: 1;
      pointer-events: none;
      opacity: 0.3;
    }

    .decor--top-left {
      top: 15px;
      left: 15px;
      border-top: 2px solid var(--neon-primary);
      border-left: 2px solid var(--neon-primary);
    }

    .decor--top-right {
      top: 15px;
      right: 15px;
      border-top: 2px solid var(--neon-primary);
      border-right: 2px solid var(--neon-primary);
    }

    .decor--bottom-left {
      bottom: 15px;
      left: 15px;
      border-bottom: 2px solid var(--neon-primary);
      border-left: 2px solid var(--neon-primary);
    }

    .decor--bottom-right {
      bottom: 15px;
      right: 15px;
      border-bottom: 2px solid var(--neon-primary);
      border-right: 2px solid var(--neon-primary);
    }

    /* Header */
    .cascos-header {
      text-align: center;
      margin-bottom: 1.5rem;
      position: relative;
      z-index: 2;
    }

    .cascos-title {
      font-family: 'Orbitron', sans-serif;
      font-size: clamp(1.5rem, 4vw, 2.5rem);
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 3px;
      margin-bottom: 0.5rem;
    }

    .title-accent {
      color: var(--neon-primary);
      text-shadow: 0 0 20px var(--neon-glow);
    }

    .cascos-subtitle {
      font-size: clamp(0.8rem, 2vw, 1rem);
      color: var(--gray-200);
      letter-spacing: 2px;
    }

    /* ==================== */
    /* Categories Grid */
    /* ==================== */
    .categorias-grid {
      flex: 1;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, 1fr);
      gap: 1rem;
      position: relative;
      z-index: 2;
      max-height: calc(100vh - 180px);
    }

    .categoria {
      position: relative;
      background: var(--gray-800);
      border-radius: 16px;
      overflow: hidden;
      text-decoration: none;
      border: 1px solid var(--gray-600);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      opacity: 0;
      animation: categoryAppear 0.6s ease forwards;
    }

    @keyframes categoryAppear {
      from {
        opacity: 0;
        transform: scale(0.8) translateY(20px);
      }
      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    .categoria__image {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      padding-top: 10%;
    }

    .categoria__image img {
      width: 85%;
      height: 90%;
      object-fit: contain;
      object-position: top center;
      filter: drop-shadow(0 5px 20px rgba(0,0,0,0.6));
      transition: all 0.4s ease;
    }

    .categoria__info {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(
        to top,
        rgba(0, 0, 0, 0.85) 0%,
        rgba(0, 0, 0, 0.4) 40%,
        transparent 70%
      );
      z-index: 2;
    }

    .categoria__name {
      font-family: 'Orbitron', sans-serif;
      font-size: clamp(0.9rem, 2vw, 1.4rem);
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 3px;
      text-shadow:
        0 0 20px rgba(0, 0, 0, 0.9),
        0 0 40px rgba(0, 0, 0, 0.8),
        0 2px 10px rgba(0, 0, 0, 1);
      transition: all 0.4s ease;
      text-align: center;
      padding: 0 0.5rem;
    }

    .categoria__glow {
      position: absolute;
      inset: 0;
      border-radius: 16px;
      opacity: 0;
      transition: opacity 0.4s ease;
      pointer-events: none;
      box-shadow: inset 0 0 30px var(--neon-glow), 0 0 30px var(--neon-glow);
      z-index: 3;
    }

    .categoria:hover {
      border-color: var(--neon-primary);
      transform: scale(1.03);
    }

    .categoria:hover .categoria__image img {
      transform: scale(1.08);
      filter: drop-shadow(0 0 25px var(--neon-glow));
    }

    .categoria:hover .categoria__name {
      color: var(--neon-primary);
      text-shadow:
        0 0 20px var(--neon-glow),
        0 0 40px var(--neon-glow),
        0 2px 10px rgba(0, 0, 0, 1);
      letter-spacing: 5px;
    }

    .categoria:hover .categoria__glow {
      opacity: 1;
    }

    /* ==================== */
    /* Floating WhatsApp */
    /* ==================== */
    .floating-whatsapp {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 55px;
      height: 55px;
      background: linear-gradient(135deg, #25d366, #128c7e);
      color: var(--white);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.6rem;
      text-decoration: none;
      box-shadow: 0 6px 25px rgba(37, 211, 102, 0.4);
      z-index: 99;
      transition: all 0.3s ease;
    }

    .floating-whatsapp:hover {
      transform: scale(1.1);
    }

    .whatsapp-pulse {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: rgba(37, 211, 102, 0.4);
      animation: whatsappPulse 2s ease-out infinite;
    }

    @keyframes whatsappPulse {
      0% { transform: scale(1); opacity: 0.6; }
      100% { transform: scale(1.8); opacity: 0; }
    }

    /* ==================== */
    /* RESPONSIVE - TABLET */
    /* ==================== */
    @media (max-width: 968px) {
      .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 70px;
        transform: translateX(-100%);
        border-right: 2px solid var(--neon-primary);
        box-shadow: 5px 0 30px rgba(0,0,0,0.5);
      }

      .sidebar--open {
        transform: translateX(0);
        width: 200px;
      }

      .sidebar--open .sidebar__brand,
      .sidebar--open .sidebar__link span {
        opacity: 1;
      }

      .sidebar__toggle {
        display: flex;
        position: fixed;
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        background: var(--gray-800);
        border: 1px solid var(--gray-600);
        border-radius: 12px;
        color: var(--white);
        font-size: 1.5rem;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 101;
        transition: all 0.3s ease;
      }

      .sidebar__toggle:hover {
        border-color: var(--neon-primary);
        color: var(--neon-primary);
      }

      .cascos-main {
        padding: 1rem;
        padding-top: 70px;
      }

      .decor { width: 50px; height: 50px; }

      .categorias-grid {
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 0.75rem;
        max-height: calc(100vh - 150px);
      }
    }

    /* ==================== */
    /* RESPONSIVE - MOBILE */
    /* ==================== */
    @media (max-width: 768px) {
      .cascos-main {
        padding: 0.75rem;
        padding-top: 60px;
      }

      .cascos-header {
        margin-bottom: 0.75rem;
      }

      .cascos-title {
        font-size: 1.3rem;
        letter-spacing: 2px;
      }

      .cascos-subtitle {
        font-size: 0.75rem;
      }

      .decor { width: 40px; height: 40px; }
      .decor--top-left, .decor--top-right { top: 55px; }

      .categorias-grid {
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 0.5rem;
        max-height: calc(100vh - 120px);
      }

      .categoria {
        border-radius: 12px;
      }

      .categoria__name {
        font-size: 0.7rem;
        letter-spacing: 2px;
      }

      .sidebar__toggle {
        width: 40px;
        height: 40px;
        top: 10px;
        left: 10px;
        font-size: 1.3rem;
      }

      .floating-whatsapp {
        width: 48px;
        height: 48px;
        font-size: 1.4rem;
        bottom: 15px;
        right: 15px;
      }
    }

    /* ==================== */
    /* RESPONSIVE - SMALL MOBILE */
    /* ==================== */
    @media (max-width: 480px) {
      .cascos-main {
        padding: 0.5rem;
        padding-top: 55px;
      }

      .cascos-header {
        margin-bottom: 0.5rem;
      }

      .cascos-title {
        font-size: 1.1rem;
      }

      .cascos-subtitle {
        font-size: 0.7rem;
      }

      .decor { width: 30px; height: 30px; opacity: 0.2; }
      .decor--top-left, .decor--top-right { top: 50px; }

      .categorias-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, 1fr);
        gap: 0.4rem;
        max-height: calc(100vh - 100px);
      }

      .categoria__image {
        padding-top: 5%;
      }

      .categoria__image img {
        width: 90%;
        height: 85%;
      }

      .categoria__name {
        font-size: 0.6rem;
        letter-spacing: 1px;
      }
    }

    /* ==================== */
    /* RESPONSIVE - LANDSCAPE MOBILE */
    /* ==================== */
    @media (max-height: 500px) {
      .cascos-header {
        margin-bottom: 0.3rem;
      }

      .cascos-title {
        font-size: 1rem;
        margin-bottom: 0.2rem;
      }

      .cascos-subtitle {
        font-size: 0.65rem;
      }

      .categorias-grid {
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: 1fr;
        gap: 0.5rem;
        max-height: calc(100vh - 80px);
      }

      .categoria__image img {
        width: 90%;
        height: 80%;
      }

      .categoria__name {
        font-size: 0.5rem;
        letter-spacing: 1px;
      }

      .decor { display: none; }
    }

    /* ==================== */
    /* Accessibility */
    /* ==================== */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }

      #explosion-loader {
        display: none !important;
      }

      .cascos-layout {
        opacity: 1;
        animation: none;
      }

      .categoria {
        opacity: 1;
        animation: none;
      }
    }
  </style>

</body>
</html>
