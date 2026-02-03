<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="cascos-page">

  <!-- Critical: ocultar contenido hasta que el loader termine -->
  <style>
    #explosion-loader {
      position: fixed;
      inset: 0;
      background: #0a0a0a;
      z-index: 99999;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }
    .cascos-layout {
      opacity: 0;
    }
  </style>

  <!-- Epic Loader -->
  <div id="explosion-loader">
    <div class="explosion-container">
      <div class="explosion-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
      </div>
      <div class="explosion-ring"></div>
      <div class="explosion-ring explosion-ring--2"></div>
      <div class="explosion-ring explosion-ring--3"></div>
      <div class="explosion-logo">
        <img src="assets/img/logos_new/logo_fondo_negro.png" alt="El Gurú de los Cascos">
      </div>
      <div class="explosion-text">CATÁLOGO</div>
    </div>
    <div class="door-panel door-panel--left"></div>
    <div class="door-panel door-panel--right"></div>
  </div>

  <!-- Floating Menu Toggle (Mobile) -->
  <button class="floating-menu-toggle" id="floatingMenuToggle" aria-label="Abrir menú">
    <i class="bi bi-list"></i>
    <span class="toggle-pulse"></span>
  </button>

  <!-- Sidebar Overlay -->
  <!-- Main Layout -->
  <div class="cascos-layout">

    <!-- Sidebar Overlay (dentro del layout para mismo stacking context) -->
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
    <main class="cascos-main">

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

      <!-- Header Section -->
      <header class="cascos-header">
        <h1 class="cascos-title">
          <span class="title-accent">Elige</span> tu estilo
        </h1>

        <!-- Search Bar -->
        <div class="search-container">
          <i class="bi bi-search search-icon"></i>
          <input type="text" id="categorySearch" class="search-input" placeholder="Buscar categoría..." autocomplete="off">
          <div class="search-line"></div>
        </div>

        <!-- Quick Filters -->
        <div class="quick-filters">
          <button class="filter-chip filter-chip--active" data-filter="all">
            <img src="assets/img/iconos_cascos/Multiprop.png" alt="Todos" class="filter-icon">
            <span>Todos</span>
          </button>
          <button class="filter-chip" data-filter="aventura">
            <img src="assets/img/iconos_cascos/Multiprop.png" alt="Aventura" class="filter-icon">
            <span>Aventura</span>
          </button>
          <button class="filter-chip" data-filter="abatible">
            <img src="assets/img/iconos_cascos/Abatible.png" alt="Abatible" class="filter-icon">
            <span>Abatible</span>
          </button>
          <button class="filter-chip" data-filter="integral">
            <img src="assets/img/iconos_cascos/Integral.png" alt="Integral" class="filter-icon">
            <span>Integral</span>
          </button>
          <button class="filter-chip" data-filter="jet">
            <img src="assets/img/iconos_cascos/Abierto.png" alt="Jet" class="filter-icon">
            <span>Jet</span>
          </button>
          <button class="filter-chip" data-filter="cross">
            <img src="assets/img/iconos_cascos/Cross.png" alt="Cross" class="filter-icon">
            <span>Cross</span>
          </button>
        </div>
      </header>

      <!-- Carousel Container -->
      <div class="carousel-wrapper">
        <button class="carousel-nav carousel-nav--prev" id="prevBtn">
          <i class="bi bi-chevron-left"></i>
        </button>

        <div class="carousel-track-container">
          <div class="carousel-track" id="carouselTrack">

            <a href="cascos_producto.php?tipo=aventura" class="categoria-card" data-category="aventura">
              <div class="categoria-card__bg"></div>
              <div class="categoria-card__glow"></div>
              <div class="categoria-card__image">
                <img src="assets/img/catalogo/submenu/cascos/aventurasinfondo.png" alt="Aventura">
              </div>
              <div class="categoria-card__content">
                <span class="categoria-card__tag">Off-Road</span>
                <h3 class="categoria-card__title">Aventura</h3>
                <p class="categoria-card__desc">Para los que buscan libertad</p>
                <div class="categoria-card__action">
                  <span>Explorar</span>
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
              <div class="categoria-card__particles">
                <span></span><span></span><span></span>
              </div>
            </a>

            <a href="cascos_producto.php?tipo=abatible" class="categoria-card" data-category="abatible">
              <div class="categoria-card__bg"></div>
              <div class="categoria-card__glow"></div>
              <div class="categoria-card__image">
                <img src="assets/img/catalogo/submenu/cascos/abatiblesinfondo.png" alt="Abatible">
              </div>
              <div class="categoria-card__content">
                <span class="categoria-card__tag">Versátil</span>
                <h3 class="categoria-card__title">Abatible</h3>
                <p class="categoria-card__desc">Comodidad y practicidad</p>
                <div class="categoria-card__action">
                  <span>Explorar</span>
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
              <div class="categoria-card__particles">
                <span></span><span></span><span></span>
              </div>
            </a>

            <a href="cascos_producto.php?tipo=integral" class="categoria-card" data-category="integral">
              <div class="categoria-card__bg"></div>
              <div class="categoria-card__glow"></div>
              <div class="categoria-card__image">
                <img src="assets/img/catalogo/submenu/cascos/integralsinfondo.png" alt="Integral">
              </div>
              <div class="categoria-card__content">
                <span class="categoria-card__tag">Máxima Protección</span>
                <h3 class="categoria-card__title">Integral</h3>
                <p class="categoria-card__desc">Seguridad total en pista</p>
                <div class="categoria-card__action">
                  <span>Explorar</span>
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
              <div class="categoria-card__particles">
                <span></span><span></span><span></span>
              </div>
            </a>

            <a href="cascos_producto.php?tipo=jet" class="categoria-card" data-category="jet">
              <div class="categoria-card__bg"></div>
              <div class="categoria-card__glow"></div>
              <div class="categoria-card__image">
                <img src="assets/img/catalogo/submenu/cascos/modularsinfondo2.png" alt="Jet">
              </div>
              <div class="categoria-card__content">
                <span class="categoria-card__tag">Urbano</span>
                <h3 class="categoria-card__title">Jet</h3>
                <p class="categoria-card__desc">Estilo clásico y ligero</p>
                <div class="categoria-card__action">
                  <span>Explorar</span>
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
              <div class="categoria-card__particles">
                <span></span><span></span><span></span>
              </div>
            </a>

            <a href="cascos_producto.php?tipo=cross" class="categoria-card" data-category="cross">
              <div class="categoria-card__bg"></div>
              <div class="categoria-card__glow"></div>
              <div class="categoria-card__image">
                <img src="assets/img/catalogo/submenu/cascos/crossinfondo.png" alt="Cross">
              </div>
              <div class="categoria-card__content">
                <span class="categoria-card__tag">Extremo</span>
                <h3 class="categoria-card__title">Cross</h3>
                <p class="categoria-card__desc">Diseñado para el barro</p>
                <div class="categoria-card__action">
                  <span>Explorar</span>
                  <i class="bi bi-arrow-right"></i>
                </div>
              </div>
              <div class="categoria-card__particles">
                <span></span><span></span><span></span>
              </div>
            </a>

          </div>
        </div>

        <button class="carousel-nav carousel-nav--next" id="nextBtn">
          <i class="bi bi-chevron-right"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators" id="carouselIndicators"></div>
      </div>

      <!-- No Results Message -->
      <div class="no-results" id="noResults">
        <i class="bi bi-search"></i>
        <p>No se encontraron categorías</p>
      </div>

    </main>

  </div>

  <!-- Floating Guru Button -->
  <a href="https://wa.me/573052332296?text=Hola%20Guru!%20Quiero%20preguntarte%20por%20un%20casco" target="_blank" class="floating-guru" aria-label="WhatsApp">
    <span class="guru-float-bubble">Pide el tuyo!</span>
    <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Gurú" class="guru-float-img">
  </a>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Loader Animation
      const loader = document.getElementById('explosion-loader');
      setTimeout(() => loader.classList.add('exploding'), 600);
      setTimeout(() => {
        document.body.classList.add('loaded');
        loader.classList.add('done');
        setTimeout(() => loader.style.display = 'none', 100);
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

      // Close sidebar on link click (mobile)
      document.querySelectorAll('.sidebar__link').forEach(link => {
        link.addEventListener('click', () => {
          if (window.innerWidth <= 968) closeSidebar();
        });
      });

      // Carousel Logic
      const track = document.getElementById('carouselTrack');
      const cards = document.querySelectorAll('.categoria-card');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const indicatorsContainer = document.getElementById('carouselIndicators');

      let currentIndex = 0;
      let visibleCards = getVisibleCards();
      let totalSlides = Math.ceil(cards.length / visibleCards);

      function getVisibleCards() {
        if (window.innerWidth <= 480) return 1;
        if (window.innerWidth <= 768) return 2;
        if (window.innerWidth <= 1200) return 3;
        return 4;
      }

      function createIndicators() {
        indicatorsContainer.innerHTML = '';
        for (let i = 0; i < totalSlides; i++) {
          const dot = document.createElement('button');
          dot.classList.add('carousel-dot');
          if (i === currentIndex) dot.classList.add('carousel-dot--active');
          dot.addEventListener('click', () => goToSlide(i));
          indicatorsContainer.appendChild(dot);
        }
      }

      function updateCarousel() {
        const cardWidth = cards[0].offsetWidth + 20; // gap
        const offset = currentIndex * visibleCards * cardWidth;
        track.style.transform = `translateX(-${offset}px)`;

        // Update indicators
        document.querySelectorAll('.carousel-dot').forEach((dot, i) => {
          dot.classList.toggle('carousel-dot--active', i === currentIndex);
        });

        // Update nav buttons
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= totalSlides - 1;
      }

      function goToSlide(index) {
        currentIndex = Math.max(0, Math.min(index, totalSlides - 1));
        updateCarousel();
      }

      prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
      nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));

      // Touch/Swipe Support
      let startX = 0;
      let isDragging = false;

      track.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        isDragging = true;
      });

      track.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
      });

      track.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        const endX = e.changedTouches[0].clientX;
        const diff = startX - endX;
        if (Math.abs(diff) > 50) {
          if (diff > 0) goToSlide(currentIndex + 1);
          else goToSlide(currentIndex - 1);
        }
        isDragging = false;
      });

      // Search Functionality
      const searchInput = document.getElementById('categorySearch');
      const noResults = document.getElementById('noResults');

      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        let hasResults = false;

        cards.forEach(card => {
          const category = card.dataset.category.toLowerCase();
          const title = card.querySelector('.categoria-card__title').textContent.toLowerCase();
          const match = category.includes(query) || title.includes(query);
          card.style.display = match ? '' : 'none';
          if (match) hasResults = true;
        });

        noResults.style.display = hasResults ? 'none' : 'flex';

        // Reset carousel when searching
        if (query === '') {
          currentIndex = 0;
          updateCarousel();
        }
      });

      // Quick Filters
      const filterChips = document.querySelectorAll('.filter-chip');
      filterChips.forEach(chip => {
        chip.addEventListener('click', () => {
          filterChips.forEach(c => c.classList.remove('filter-chip--active'));
          chip.classList.add('filter-chip--active');

          const filter = chip.dataset.filter;
          let hasResults = false;

          cards.forEach(card => {
            const show = filter === 'all' || card.dataset.category === filter;
            card.style.display = show ? '' : 'none';
            if (show) hasResults = true;
          });

          noResults.style.display = hasResults ? 'none' : 'flex';
          searchInput.value = '';
          currentIndex = 0;
          updateCarousel();
        });
      });

      // Resize Handler
      window.addEventListener('resize', () => {
        visibleCards = getVisibleCards();
        totalSlides = Math.ceil(cards.length / visibleCards);
        currentIndex = Math.min(currentIndex, totalSlides - 1);
        createIndicators();
        updateCarousel();
      });

      // Initialize
      createIndicators();
      updateCarousel();

      // Card Hover Animations (Desktop)
      if (window.innerWidth > 768) {
        cards.forEach(card => {
          card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
          });

          card.addEventListener('mouseleave', () => {
            card.style.transform = '';
          });
        });
      }

      // Keyboard Navigation
      document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') goToSlide(currentIndex - 1);
        if (e.key === 'ArrowRight') goToSlide(currentIndex + 1);
      });
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

    .explosion-logo img {
      width: 80px;
      filter: drop-shadow(0 0 30px var(--neon-glow));
      animation: logoPulse 1s ease-in-out infinite;
    }

    @keyframes logoPulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .explosion-text {
      margin-top: 1.5rem;
      font-family: 'Orbitron', sans-serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 8px;
      opacity: 0;
      animation: textFadeIn 0.5s ease 0.2s forwards;
    }

    @keyframes textFadeIn { to { opacity: 1; } }

    .explosion-ring {
      position: absolute;
      width: 120px;
      height: 120px;
      border: 2px solid var(--neon-primary);
      border-radius: 50%;
      opacity: 0.3;
      animation: ringRotate 3s linear infinite;
    }

    .explosion-ring--2 { width: 160px; height: 160px; border-style: dashed; animation-direction: reverse; }
    .explosion-ring--3 { width: 200px; height: 200px; border-style: dotted; animation-duration: 5s; }

    @keyframes ringRotate { to { transform: rotate(360deg); } }

    .explosion-particles span {
      position: absolute;
      width: 6px;
      height: 6px;
      background: var(--neon-primary);
      border-radius: 50%;
      top: 50%;
      left: 50%;
      opacity: 0.6;
      box-shadow: 0 0 10px var(--neon-glow);
    }

    .explosion-particles span:nth-child(1) { animation: particle 2s ease-in-out infinite 0s; --angle: 0deg; }
    .explosion-particles span:nth-child(2) { animation: particle 2s ease-in-out infinite 0.15s; --angle: 30deg; }
    .explosion-particles span:nth-child(3) { animation: particle 2s ease-in-out infinite 0.3s; --angle: 60deg; }
    .explosion-particles span:nth-child(4) { animation: particle 2s ease-in-out infinite 0.45s; --angle: 90deg; }
    .explosion-particles span:nth-child(5) { animation: particle 2s ease-in-out infinite 0.6s; --angle: 120deg; }
    .explosion-particles span:nth-child(6) { animation: particle 2s ease-in-out infinite 0.75s; --angle: 150deg; }
    .explosion-particles span:nth-child(7) { animation: particle 2s ease-in-out infinite 0.9s; --angle: 180deg; }
    .explosion-particles span:nth-child(8) { animation: particle 2s ease-in-out infinite 1.05s; --angle: 210deg; }
    .explosion-particles span:nth-child(9) { animation: particle 2s ease-in-out infinite 1.2s; --angle: 240deg; }
    .explosion-particles span:nth-child(10) { animation: particle 2s ease-in-out infinite 1.35s; --angle: 270deg; }
    .explosion-particles span:nth-child(11) { animation: particle 2s ease-in-out infinite 1.5s; --angle: 300deg; }
    .explosion-particles span:nth-child(12) { animation: particle 2s ease-in-out infinite 1.65s; --angle: 330deg; }

    @keyframes particle {
      0%, 100% { transform: translate(-50%, -50%) rotate(var(--angle)) translateX(0); opacity: 0.6; }
      50% { transform: translate(-50%, -50%) rotate(var(--angle)) translateX(80px); opacity: 1; }
    }

    .door-panel {
      position: absolute;
      top: 0;
      width: 50%;
      height: 100%;
      background: var(--gray-800);
      z-index: 20;
      transition: transform 0.8s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .door-panel--left { left: 0; border-right: 2px solid var(--neon-primary); }
    .door-panel--right { right: 0; border-left: 2px solid var(--neon-primary); }

    #explosion-loader.exploding .door-panel--left { transform: translateX(-100%); }
    #explosion-loader.exploding .door-panel--right { transform: translateX(100%); }
    #explosion-loader.exploding .explosion-logo img { animation: logoExplode 0.6s ease forwards; }
    #explosion-loader.exploding .explosion-ring { animation: ringExplode 0.6s ease forwards; }
    #explosion-loader.done { opacity: 0; pointer-events: none; }

    @keyframes logoExplode {
      0% { transform: scale(1); opacity: 1; }
      100% { transform: scale(0); opacity: 0; }
    }

    @keyframes ringExplode { to { transform: scale(2.5); opacity: 0; } }

    /* ==================== */
    /* Main Layout */
    /* ==================== */
    .cascos-layout {
      display: flex;
      height: 100vh;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s ease 1.8s forwards;
    }

    @keyframes fadeIn { to { opacity: 1; } }

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

    /* ==================== */
    /* Floating Menu Toggle */
    /* ==================== */
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

    /* Active state - cuando el menú está abierto */
    .floating-menu-toggle.active {
      background: var(--neon-primary);
      color: var(--gray-900);
      transform: rotate(180deg) scale(1.1);
      box-shadow: 0 0 40px rgba(57, 255, 20, 0.7);
    }

    .floating-menu-toggle.active:hover {
      transform: rotate(180deg) scale(1.2);
    }

    /* Pulse animation */
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

    .sidebar-overlay.active {
      opacity: 1;
    }

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

    /* ==================== */
    /* Main Content */
    /* ==================== */
    .cascos-main {
      flex: 1;
      height: 100%;
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      display: flex;
      flex-direction: column;
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    /* Sky glow - top ambient */
    .cascos-main::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 35%;
      background:
        radial-gradient(ellipse 80% 50% at 50% 0%, rgba(57, 255, 20, 0.06) 0%, transparent 70%),
        radial-gradient(ellipse 60% 40% at 30% 0%, rgba(46, 204, 113, 0.04) 0%, transparent 60%),
        radial-gradient(ellipse 50% 35% at 70% 0%, rgba(57, 255, 20, 0.03) 0%, transparent 55%);
      z-index: 0;
      pointer-events: none;
    }

    /* ==================== */
    /* Background Particles */
    /* ==================== */
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

    /* Decorative Corners */
    .decor { position: absolute; width: 60px; height: 60px; z-index: 1; pointer-events: none; opacity: 0.3; }
    .decor--top-left { top: 10px; left: 10px; border-top: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--top-right { top: 10px; right: 10px; border-top: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }
    .decor--bottom-left { bottom: 10px; left: 10px; border-bottom: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--bottom-right { bottom: 10px; right: 10px; border-bottom: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }

    /* Header */
    .cascos-header {
      text-align: center;
      margin-bottom: 1.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.25rem;
    }

    .cascos-title {
      font-family: 'Orbitron', sans-serif;
      font-size: clamp(1.8rem, 4vw, 2.8rem);
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 3px;
    }

    .title-accent {
      color: var(--neon-primary);
      text-shadow: 0 0 20px var(--neon-glow);
    }

    /* Search Container */
    .search-container {
      position: relative;
      width: 100%;
      max-width: 400px;
    }

    .search-input {
      width: 100%;
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 50px;
      padding: 0.9rem 1.25rem 0.9rem 3rem;
      color: var(--white);
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    .search-input::placeholder { color: var(--gray-400); }

    .search-input:focus {
      outline: none;
      border-color: var(--neon-primary);
      box-shadow: 0 0 20px rgba(57, 255, 20, 0.15);
    }

    .search-icon {
      position: absolute;
      left: 1.1rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      font-size: 1.1rem;
      transition: color 0.3s ease;
    }

    .search-input:focus + .search-icon { color: var(--neon-primary); }

    .search-line {
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: var(--neon-primary);
      transition: all 0.3s ease;
      transform: translateX(-50%);
    }

    .search-input:focus ~ .search-line { width: 80%; }

    /* Quick Filters */
    .quick-filters {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
      justify-content: center;
    }

    .filter-chip {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1.1rem;
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 50px;
      color: var(--gray-200);
      font-size: 0.85rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .filter-chip i { font-size: 0.9rem; }

    .filter-icon {
      width: 20px;
      height: 20px;
      object-fit: contain;
      filter: brightness(0) invert(0.7);
      transition: filter 0.3s ease;
    }

    .filter-chip:hover .filter-icon {
      filter: brightness(0) invert(0.3) sepia(1) saturate(5) hue-rotate(85deg);
    }

    .filter-chip--active .filter-icon {
      filter: brightness(0) invert(0.05);
    }

    .filter-chip:hover {
      border-color: var(--neon-primary);
      color: var(--neon-primary);
    }

    .filter-chip--active {
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      border-color: transparent;
      color: var(--gray-900);
    }

    /* ==================== */
    /* Carousel */
    /* ==================== */
    .carousel-wrapper {
      flex: 1;
      display: flex;
      align-items: center;
      position: relative;
      padding: 0 60px;
      min-height: 0;
    }

    .carousel-track-container {
      flex: 1;
      overflow: hidden;
      position: relative;
    }

    .carousel-track {
      display: flex;
      gap: 20px;
      padding: 20px 15px;
      transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .carousel-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 50px;
      height: 50px;
      background: var(--gray-800);
      border: 2px solid var(--gray-600);
      border-radius: 50%;
      color: var(--white);
      font-size: 1.4rem;
      cursor: pointer;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .carousel-nav:hover:not(:disabled) {
      border-color: var(--neon-primary);
      color: var(--neon-primary);
      box-shadow: 0 0 20px rgba(57, 255, 20, 0.3);
    }

    .carousel-nav:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    .carousel-nav--prev { left: 0; }
    .carousel-nav--next { right: 0; }

    .carousel-indicators {
      position: absolute;
      bottom: -30px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .carousel-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--gray-600);
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .carousel-dot:hover { background: var(--gray-400); }

    .carousel-dot--active {
      background: var(--neon-primary);
      box-shadow: 0 0 10px var(--neon-glow);
      transform: scale(1.2);
    }

    /* ==================== */
    /* Category Cards */
    /* ==================== */
    .categoria-card {
      flex: 0 0 calc(25% - 15px);
      min-width: 280px;
      height: calc(100vh - 320px);
      max-height: 420px;
      min-height: 320px;
      position: relative;
      border-radius: 24px;
      overflow: visible;
      text-decoration: none;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .categoria-card__bg {
      position: absolute;
      inset: 0;
      background: linear-gradient(145deg, var(--gray-700) 0%, var(--gray-800) 100%);
      border: 1px solid var(--gray-600);
      border-radius: 24px;
      overflow: hidden;
      transition: all 0.4s ease;
    }

    .categoria-card__glow {
      position: absolute;
      inset: -2px;
      border-radius: 26px;
      background: linear-gradient(135deg, var(--neon-primary), transparent 50%, var(--neon-primary));
      opacity: 0;
      z-index: -1;
      transition: opacity 0.4s ease;
      filter: blur(8px);
    }

    .categoria-card:hover .categoria-card__glow { opacity: 0.6; }
    .categoria-card:hover .categoria-card__bg { border-color: var(--neon-primary); }

    .categoria-card__image {
      position: absolute;
      top: 3%;
      left: 50%;
      transform: translateX(-50%);
      width: 92%;
      height: 60%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 2;
    }

    .categoria-card__image img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.5));
      transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .categoria-card:hover .categoria-card__image img {
      transform: scale(1.12) translateY(-10px);
      filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.6)) drop-shadow(0 0 30px var(--neon-glow));
    }

    .categoria-card__content {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 1.5rem;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 60%, transparent 100%);
      border-radius: 0 0 24px 24px;
      z-index: 3;
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
    }

    .categoria-card__tag {
      font-size: 0.7rem;
      font-weight: 600;
      color: var(--neon-primary);
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .categoria-card__title {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 2px;
      transition: all 0.3s ease;
    }

    .categoria-card:hover .categoria-card__title {
      color: var(--neon-primary);
      text-shadow: 0 0 20px var(--neon-glow);
    }

    .categoria-card__desc {
      font-size: 0.85rem;
      color: var(--gray-300);
      line-height: 1.4;
    }

    .categoria-card__action {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: 0.75rem;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--neon-primary);
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.4s ease;
    }

    .categoria-card:hover .categoria-card__action {
      opacity: 1;
      transform: translateY(0);
    }

    .categoria-card__action i {
      transition: transform 0.3s ease;
    }

    .categoria-card:hover .categoria-card__action i {
      animation: arrowBounce 0.6s ease infinite;
    }

    @keyframes arrowBounce {
      0%, 100% { transform: translateX(0); }
      50% { transform: translateX(5px); }
    }

    /* Card Particles */
    .categoria-card__particles {
      position: absolute;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
      border-radius: 24px;
      z-index: 1;
    }

    .categoria-card__particles span {
      position: absolute;
      width: 4px;
      height: 4px;
      background: var(--neon-primary);
      border-radius: 50%;
      opacity: 0;
    }

    .categoria-card:hover .categoria-card__particles span {
      animation: cardParticle 1.5s ease-out infinite;
    }

    .categoria-card__particles span:nth-child(1) { left: 20%; animation-delay: 0s; }
    .categoria-card__particles span:nth-child(2) { left: 50%; animation-delay: 0.3s; }
    .categoria-card__particles span:nth-child(3) { left: 80%; animation-delay: 0.6s; }

    @keyframes cardParticle {
      0% { bottom: 0; opacity: 1; transform: scale(1); }
      100% { bottom: 100%; opacity: 0; transform: scale(0); }
    }

    /* No Results */
    .no-results {
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      padding: 3rem;
      color: var(--gray-400);
      position: absolute;
      inset: 0;
      top: 200px;
    }

    .no-results i { font-size: 3rem; opacity: 0.5; }
    .no-results p { font-size: 1.1rem; }

    /* ==================== */
    /* Floating Guru Button */
    /* ==================== */
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

    /* ==================== */
    /* RESPONSIVE - TABLET */
    /* ==================== */
    @media (max-width: 1200px) {
      .categoria-card { flex: 0 0 calc(33.333% - 14px); min-width: 260px; }
    }

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

      .cascos-main { padding: 1.5rem; padding-top: 20px; }
      .carousel-wrapper { padding: 0 50px; }
      .carousel-track { padding: 20px 12px; }
      .carousel-nav { width: 40px; height: 40px; font-size: 1.2rem; }
      .categoria-card { flex: 0 0 calc(50% - 10px); min-width: 240px; height: calc(100vh - 320px); }
    }

    /* ==================== */
    /* RESPONSIVE - MOBILE */
    /* ==================== */
    @media (max-width: 768px) {
      .cascos-main { padding: 1rem; padding-top: 15px; }
      .cascos-header { gap: 1rem; margin-bottom: 1rem; }
      .cascos-title { font-size: 1.5rem; }

      .search-container { max-width: 100%; }
      .search-input { padding: 0.75rem 1rem 0.75rem 2.5rem; font-size: 0.9rem; }

      .quick-filters { gap: 0.5rem; }
      .filter-chip { padding: 0.5rem 0.9rem; font-size: 0.8rem; }
      .filter-chip span { display: none; }

      .carousel-wrapper { padding: 0 40px; }
      .carousel-track { padding: 18px 10px; }
      .carousel-nav { width: 35px; height: 35px; font-size: 1rem; }

      .categoria-card {
        flex: 0 0 calc(50% - 10px);
        min-width: 200px;
        height: calc(100vh - 340px);
        min-height: 260px;
        max-height: 350px;
      }

      .categoria-card__image { width: 95%; height: 58%; top: 2%; }
      .categoria-card__title { font-size: 1.2rem; }
      .categoria-card__desc { font-size: 0.75rem; }
      .categoria-card__content { padding: 1rem; }

      .floating-guru { bottom: 15px; right: 15px; }
      .guru-float-img { width: 55px; height: 55px; }
      .guru-float-bubble { font-size: 0.6rem; padding: 0.3rem 0.6rem; }
    }

    /* ==================== */
    /* RESPONSIVE - SMALL MOBILE */
    /* ==================== */
    @media (max-width: 480px) {
      .cascos-main { padding: 0.75rem; padding-top: 10px; }
      .cascos-title { font-size: 1.3rem; letter-spacing: 2px; }

      .floating-menu-toggle {
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
      }

      .carousel-wrapper { padding: 0 35px; }
      .carousel-track { padding: 15px 8px; }
      .carousel-nav { width: 30px; height: 30px; font-size: 0.9rem; }

      .categoria-card {
        flex: 0 0 100%;
        min-width: 100%;
        height: calc(100vh - 300px);
        min-height: 280px;
        max-height: 370px;
      }

      .categoria-card__image { width: 95%; height: 60%; top: 2%; }
      .categoria-card__title { font-size: 1.3rem; }
      .categoria-card__desc { font-size: 0.8rem; }

      .sidebar__toggle { width: 40px; height: 40px; top: 10px; left: 10px; font-size: 1.3rem; }
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

      #explosion-loader { display: none !important; }
      .cascos-layout { opacity: 1; animation: none; }
    }
  </style>

</body>
</html>
