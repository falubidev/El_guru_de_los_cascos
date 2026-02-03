<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="guru-page">

  <!-- Scan Loader -->
  <div id="scan-loader">
    <div class="scan-container">
      <div class="scan-logo">
        <img src="assets/img/logos_new/logo_fondo_negro.png" alt="El Gurú de los Cascos">
        <div class="scan-line"></div>
      </div>
      <div class="scan-text">SOBRE MÍ</div>
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
          <a href="cascos.php" class="sidebar__link">
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
          <a href="guru.php" class="sidebar__link sidebar__link--active">
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
    <main class="guru-main">

      <!-- Decorative Corners -->
      <div class="decor decor--top-left"></div>
      <div class="decor decor--top-right"></div>
      <div class="decor decor--bottom-left"></div>
      <div class="decor decor--bottom-right"></div>

      <!-- Content Grid -->
      <div class="guru-grid">

        <!-- Left Column - Info -->
        <div class="guru-info">
          <div class="guru-info__content">
            <span class="guru-tag">Experto en Cascos</span>
            <h1 class="guru-title">¿Quién <span class="accent">soy</span>?</h1>
            <p class="guru-subtitle">Soy el Gurú de los Cascos. Te acompaño a elegir el casco ideal, con estilo, seguridad y verdad.</p>

            <p class="guru-text">
              Llevo años analizando, probando y recomendando cascos. No vendo humo: te cuento lo bueno, lo malo y lo que debes saber antes de comprar.
            </p>

            <div class="guru-stats">
              <div class="stat">
                <span class="stat__number">500+</span>
                <span class="stat__label">Cascos analizados</span>
              </div>
              <div class="stat">
                <span class="stat__number">10K+</span>
                <span class="stat__label">Seguidores</span>
              </div>
              <div class="stat">
                <span class="stat__number">5+</span>
                <span class="stat__label">Años de experiencia</span>
              </div>
            </div>

            <h3 class="guru-social-title">Mis redes:</h3>
            <div class="guru-social">
              <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank" class="social-btn social-btn--youtube">
                <i class="bi bi-youtube"></i>
                <span>YouTube</span>
              </a>
              <a href="https://www.instagram.com/elgurudeloscascos/" target="_blank" class="social-btn social-btn--instagram">
                <i class="bi bi-instagram"></i>
                <span>Instagram</span>
              </a>
              <a href="https://www.tiktok.com/@elgurudeloscascos" target="_blank" class="social-btn social-btn--tiktok">
                <i class="bi bi-tiktok"></i>
                <span>TikTok</span>
              </a>
            </div>

            <a href="buscascasco.php" class="guru-cta">
              <span>Pide tu asesoría gratis</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Right Column - Video -->
        <div class="guru-video">
          <div class="video-container">
            <video autoplay muted loop playsinline>
              <source src="assets/videos/guru-cascos.mp4" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
            <div class="video-frame"></div>
          </div>
        </div>

      </div>

    </main>

  </div>

  <!-- Floating Guru Button -->
  <a href="https://wa.me/573052332296?text=Hola%20Guru!%20Quiero%20preguntarte%20por%20un%20casco" target="_blank" class="floating-guru" aria-label="WhatsApp">
    <span class="guru-float-bubble">Preguntame!</span>
    <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Gurú" class="guru-float-img">
  </a>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const loader = document.getElementById('scan-loader');

      setTimeout(() => {
        document.body.classList.add('loaded');
        loader.classList.add('done');
        setTimeout(() => loader.style.display = 'none', 500);
      }, 2000);

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

      // Stats counter animation
      const stats = document.querySelectorAll('.stat__number');
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animated');
          }
        });
      }, { threshold: 0.5 });

      stats.forEach(stat => observer.observe(stat));
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

    .scan-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.5rem;
    }

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

    @keyframes scanMove {
      0%, 100% { top: 0; opacity: 1; }
      50% { top: 100%; opacity: 0.5; }
    }

    @keyframes logoPulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    .scan-text {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 8px;
    }

    .scan-progress {
      width: 200px;
      height: 3px;
      background: var(--gray-700);
      border-radius: 3px;
      overflow: hidden;
    }

    .scan-progress-bar {
      height: 100%;
      background: var(--neon-primary);
      box-shadow: 0 0 10px var(--neon-glow);
      animation: progressFill 2s ease forwards;
    }

    @keyframes progressFill {
      from { width: 0; }
      to { width: 100%; }
    }

    /* Layout */
    .cascos-layout {
      display: flex;
      height: 100vh;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s ease 2s forwards;
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

    .floating-menu-toggle i {
      transition: transform 0.3s ease;
    }

    .floating-menu-toggle:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 30px rgba(57, 255, 20, 0.5);
    }

    .floating-menu-toggle:active {
      transform: scale(0.95);
    }

    .floating-menu-toggle.active {
      background: var(--neon-primary);
      color: var(--gray-900);
      transform: rotate(180deg) scale(1.1);
      box-shadow: 0 0 40px rgba(57, 255, 20, 0.7);
    }

    .floating-menu-toggle.active:hover {
      transform: rotate(180deg) scale(1.2);
    }

    .toggle-pulse {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 2px solid var(--neon-primary);
      animation: togglePulse 2s ease-out infinite;
      pointer-events: none;
    }

    .floating-menu-toggle.active .toggle-pulse {
      animation: none;
      opacity: 0;
    }

    @keyframes togglePulse {
      0% { transform: scale(1); opacity: 0.8; }
      100% { transform: scale(1.8); opacity: 0; }
    }

    /* Sidebar Overlay */
    .sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.7);
      z-index: 999;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

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
      transition: all 0.3s ease;
    }

    .sidebar__close:hover {
      border-color: var(--neon-primary);
      color: var(--neon-primary);
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

    .sidebar__header {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 2rem;
    }

    .sidebar__logo img {
      width: 70px;
      filter: drop-shadow(0 0 15px var(--neon-glow));
      transition: transform 0.3s ease;
    }

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

    .sidebar__link i { font-size: 1.3rem; min-width: 24px; text-align: center; }
    .sidebar__link span { font-size: 0.85rem; font-weight: 500; opacity: 0; white-space: nowrap; transition: opacity 0.3s ease; }
    .sidebar:hover .sidebar__link span { opacity: 1; }
    .sidebar__link:hover { background: var(--gray-700); color: var(--white); }

    .sidebar__link--active {
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      color: var(--gray-900);
    }

    .sidebar__footer { margin-top: auto; padding: 1rem 0; }

    .sidebar__social {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      align-items: center;
    }

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

    .sidebar__social a:hover {
      background: var(--neon-primary);
      color: var(--gray-900);
      transform: scale(1.1);
    }

    /* Main Content */
    .guru-main {
      flex: 1;
      height: 100%;
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      position: relative;
      overflow: hidden;
    }

    .decor {
      position: absolute;
      width: 80px;
      height: 80px;
      z-index: 1;
      pointer-events: none;
      opacity: 0.3;
    }

    .decor--top-left { top: 15px; left: 15px; border-top: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--top-right { top: 15px; right: 15px; border-top: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }
    .decor--bottom-left { bottom: 15px; left: 15px; border-bottom: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--bottom-right { bottom: 15px; right: 15px; border-bottom: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }

    /* Grid Layout */
    .guru-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      height: 100%;
    }

    /* Info Column */
    .guru-info {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3rem;
      position: relative;
      z-index: 2;
    }

    .guru-info__content {
      max-width: 500px;
    }

    .guru-tag {
      display: inline-block;
      padding: 0.4rem 1rem;
      background: rgba(57, 255, 20, 0.1);
      border: 1px solid var(--neon-primary);
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 600;
      color: var(--neon-primary);
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 1rem;
    }

    .guru-title {
      font-family: 'Orbitron', sans-serif;
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 1rem;
    }

    .guru-title .accent {
      color: var(--neon-primary);
      text-shadow: 0 0 20px var(--neon-glow);
    }

    .guru-subtitle {
      font-size: 1.1rem;
      color: var(--gray-100);
      font-style: italic;
      margin-bottom: 1rem;
      line-height: 1.6;
    }

    .guru-text {
      font-size: 0.95rem;
      color: var(--gray-200);
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }

    /* Stats */
    .guru-stats {
      display: flex;
      gap: 2rem;
      margin-bottom: 2rem;
      padding: 1.25rem 0;
      border-top: 1px solid var(--gray-600);
      border-bottom: 1px solid var(--gray-600);
    }

    .stat {
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }

    .stat__number {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--neon-primary);
    }

    .stat__label {
      font-size: 0.75rem;
      color: var(--gray-300);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Social */
    .guru-social-title {
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--white);
      margin-bottom: 0.75rem;
    }

    .guru-social {
      display: flex;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
    }

    .social-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1rem;
      background: var(--gray-700);
      border: 1px solid var(--gray-600);
      border-radius: 8px;
      color: var(--white);
      text-decoration: none;
      font-size: 0.85rem;
      transition: all 0.3s ease;
    }

    .social-btn i { font-size: 1.1rem; }

    .social-btn--youtube:hover { background: #ff0000; border-color: #ff0000; }
    .social-btn--instagram:hover { background: linear-gradient(135deg, #f09433, #e6683c, #dc2743); border-color: transparent; }
    .social-btn--tiktok:hover { background: #000; border-color: #00f2ea; color: #00f2ea; }

    /* CTA */
    .guru-cta {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      padding: 1rem 2rem;
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      border-radius: 50px;
      color: var(--gray-900);
      text-decoration: none;
      font-family: 'Orbitron', sans-serif;
      font-size: 0.9rem;
      font-weight: 700;
      letter-spacing: 1px;
      transition: all 0.3s ease;
    }

    .guru-cta:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(57, 255, 20, 0.3);
    }

    .guru-cta i { transition: transform 0.3s ease; }
    .guru-cta:hover i { transform: translateX(5px); }

    /* Video Column */
    .guru-video {
      position: relative;
      overflow: hidden;
    }

    .video-container {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .video-container video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .video-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, var(--gray-900) 0%, transparent 30%);
      pointer-events: none;
    }

    .video-frame {
      position: absolute;
      inset: 20px;
      border: 2px solid var(--neon-primary);
      opacity: 0.3;
      pointer-events: none;
    }

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
      .sidebar--open .sidebar__brand,
      .sidebar--open .sidebar__link span { opacity: 1; }

      .sidebar__close { display: flex; }

      .guru-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto 1fr;
      }

      .guru-info {
        padding: 2rem 2rem 2rem;
        order: 1;
      }

      .guru-video {
        order: 2;
        height: 40vh;
      }

      .decor { width: 50px; height: 50px; }
    }

    /* Responsive - Mobile */
    @media (max-width: 768px) {
      .guru-info { padding: 1.5rem 1.5rem 1.5rem; }
      .guru-info__content { max-width: 100%; }

      .guru-title { font-size: 1.8rem; }
      .guru-subtitle { font-size: 1rem; }
      .guru-text { font-size: 0.9rem; }

      .guru-stats { gap: 1.5rem; flex-wrap: wrap; }
      .stat__number { font-size: 1.3rem; }

      .guru-social { flex-wrap: wrap; }
      .social-btn span { display: none; }
      .social-btn { padding: 0.7rem; }

      .guru-cta { width: 100%; justify-content: center; }

      .guru-video { height: 35vh; }

      .decor { width: 40px; height: 40px; }
      .floating-guru { bottom: 15px; right: 15px; }
      .guru-float-img { width: 55px; height: 55px; }
      .guru-float-bubble { font-size: 0.6rem; padding: 0.3rem 0.6rem; }
    }

    /* Responsive - Small Mobile */
    @media (max-width: 480px) {
      .guru-info { padding: 1rem 1rem 1rem; }
      .guru-title { font-size: 1.5rem; }
      .guru-stats { gap: 1rem; }
      .stat__number { font-size: 1.1rem; }
      .guru-cta { padding: 0.85rem 1.5rem; font-size: 0.8rem; }
      .decor { width: 30px; height: 30px; opacity: 0.2; }

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
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
      #scan-loader { display: none !important; }
      .cascos-layout { opacity: 1; animation: none; }
    }
  </style>

</body>
</html>
