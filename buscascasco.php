<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="asesoria-page">

  <!-- Scan Loader -->
  <div id="scan-loader">
    <div class="scan-container">
      <div class="scan-logo">
        <img src="assets/img/gurulogo.png" alt="El Gurú de los Cascos">
        <div class="scan-line"></div>
      </div>
      <div class="scan-text">ASESORÍA</div>
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
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- Main Layout -->
  <div class="cascos-layout">

    <!-- Sidebar Navigation -->
    <nav class="sidebar" id="sidebar">
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
          <a href="cascos.php" class="sidebar__link">
            <i class="bi bi-grid-3x3-gap"></i>
            <span>Catálogo</span>
          </a>
        </li>
        <li>
          <a href="buscascasco.php" class="sidebar__link sidebar__link--active">
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

      <button class="sidebar__close" id="sidebarClose">
        <i class="bi bi-x-lg"></i>
      </button>
    </nav>

    <!-- Main Content -->
    <main class="asesoria-main">

      <!-- Decorative Corners -->
      <div class="decor decor--top-left"></div>
      <div class="decor decor--top-right"></div>
      <div class="decor decor--bottom-left"></div>
      <div class="decor decor--bottom-right"></div>

      <!-- Content Container - Two Column Layout -->
      <div class="asesoria-content">

        <!-- Left Column: Info -->
        <div class="info-column">
          <header class="asesoria-header">
            <h1 class="asesoria-title">
              <span class="title-accent">¿Buscas</span><br>un casco?
            </h1>
            <p class="asesoria-subtitle">Te ayudo a elegir el ideal para ti</p>
          </header>

          <!-- Brands Marquee - REVERSE Direction, FULL COLOR -->
          <div class="brands-marquee">
            <div class="brands-marquee__track">
              <div class="brands-marquee__content">
                <div class="brand-item">
                  <img src="assets/img/hjc.png" alt="HJC">
                </div>
                <div class="brand-item">
                  <img src="assets/img/nexx.jpg" alt="NEXX">
                </div>
                <div class="brand-item">
                  <img src="assets/img/nolan.png" alt="NOLAN">
                </div>
                <div class="brand-item">
                  <img src="assets/img/agv.png" alt="AGV">
                </div>
                <div class="brand-item">
                  <img src="assets/img/hjc.png" alt="LS2">
                </div>
                <div class="brand-item">
                  <img src="assets/img/hjc.png" alt="SHAFT">
                </div>
              </div>
              <!-- Duplicate for seamless loop -->
              <div class="brands-marquee__content">
                <div class="brand-item">
                  <img src="assets/img/hjc.png" alt="HJC">
                </div>
                <div class="brand-item">
                  <img src="assets/img/nexx.jpg" alt="NEXX">
                </div>
                <div class="brand-item">
                  <img src="assets/img/nolan.png" alt="NOLAN">
                </div>
                <div class="brand-item">
                  <img src="assets/img/agv.png" alt="AGV">
                </div>
                <div class="brand-item">
                  <img src="assets/img/hjc.png" alt="LS2">
                </div>
                <div class="brand-item">
                  <img src="assets/img/hjc.png" alt="SHAFT">
                </div>
              </div>
            </div>
          </div>

          <div class="info-features">
            <div class="feature-item">
              <i class="bi bi-shield-check"></i>
              <span>Asesoría personalizada</span>
            </div>
            <div class="feature-item">
              <i class="bi bi-truck"></i>
              <span>Envíos a todo el país</span>
            </div>
            <div class="feature-item">
              <i class="bi bi-award"></i>
              <span>Marcas certificadas</span>
            </div>
          </div>
        </div>

        <!-- Right Column: Form -->
        <div class="form-column">
          <div class="form-card">
            <form id="formCasco">
              <div class="form-grid">
                <div class="form-group">
                  <input type="text" name="nombre" id="nombre" class="form-input" placeholder="Nombre" required>
                  <i class="bi bi-person form-icon"></i>
                </div>
                <div class="form-group">
                  <input type="tel" name="telefono" id="telefono" class="form-input"
                        placeholder="Teléfono" required
                        pattern="[0-9]+" inputmode="numeric"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                  <i class="bi bi-phone form-icon"></i>
                </div>
                <div class="form-group">
                  <select name="marca" id="marca" class="form-input" required>
                    <option value="">Selecciona marca</option>
                    <option value="HJC">HJC</option>
                    <option value="NEXX">NEXX</option>
                    <option value="NOLAN">NOLAN</option>
                    <option value="AGV">AGV</option>
                    <option value="LS2">LS2</option>
                    <option value="SHAFTPRO">SHAFT PRO</option>
                  </select>
                  <i class="bi bi-tag form-icon"></i>
                </div>
                <div class="form-group">
                  <input type="text" name="referencia" id="referencia" class="form-input" placeholder="Referencia o modelo" required>
                  <i class="bi bi-search form-icon"></i>
                </div>
                <div class="form-group form-group--full">
                  <textarea name="observaciones" id="observaciones" rows="2" class="form-input" placeholder="Color, Talla, Observaciones..."></textarea>
                  <i class="bi bi-chat-text form-icon"></i>
                </div>

                <!-- CAPTCHA - Compact Inline -->
                <div class="form-group form-group--full captcha-row">
                  <div class="captcha-inline">
                    <i class="bi bi-robot captcha-icon"></i>
                    <span class="captcha-label" id="captchaQuestion"></span>
                    <input type="text" id="captchaAnswer" class="captcha-answer" placeholder="?" required inputmode="numeric" autocomplete="off">
                    <button type="button" class="captcha-refresh" id="refreshCaptcha" title="Nueva pregunta">
                      <i class="bi bi-arrow-clockwise"></i>
                    </button>
                  </div>
                </div>

                <div class="form-group form-group--full">
                  <button type="submit" class="btn-submit" id="submitBtn">
                    <span>Pregúntame por el tuyo</span>
                    <i class="bi bi-send"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>

    </main>

  </div>

  <!-- Floating WhatsApp -->
  <a href="https://wa.me/tuNumero" target="_blank" class="floating-whatsapp">
    <i class="bi bi-whatsapp"></i>
    <span class="whatsapp-pulse"></span>
  </a>

  <!-- Modals -->
  <div class="modal fade" id="modalLimite" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-custom modal-custom--warning">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>¡Ey parcero!</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Has hecho muchas solicitudes. ¡Ten paciencia y déjame ayudarte bien!
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalBloqueo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-custom modal-custom--error">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-x-octagon me-2"></i>Demasiados intentos</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          Tu solicitud ha sido bloqueada por 24 horas.<br>Vuelve mañana.
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalCaptchaError" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-custom modal-custom--error">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-robot me-2"></i>Verificación fallida</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          La respuesta no es correcta. Por favor, intenta de nuevo.
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-custom modal-custom--success">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-check-circle me-2"></i>¡Gracias por tu solicitud!</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <p>Pronto te contactaré.</p>
          <img src="assets/img/gurulogo.png" alt="Logo" class="modal-logo">
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    // CAPTCHA System
    let captchaNum1, captchaNum2, captchaOperator, captchaResult;

    function generateCaptcha() {
      captchaNum1 = Math.floor(Math.random() * 10) + 1;
      captchaNum2 = Math.floor(Math.random() * 10) + 1;

      // Random operator: +, -, ×
      const operators = ['+', '-', '×'];
      captchaOperator = operators[Math.floor(Math.random() * operators.length)];

      // Ensure no negative results for subtraction
      if (captchaOperator === '-' && captchaNum2 > captchaNum1) {
        [captchaNum1, captchaNum2] = [captchaNum2, captchaNum1];
      }

      // Calculate result
      switch (captchaOperator) {
        case '+':
          captchaResult = captchaNum1 + captchaNum2;
          break;
        case '-':
          captchaResult = captchaNum1 - captchaNum2;
          break;
        case '×':
          captchaResult = captchaNum1 * captchaNum2;
          break;
      }

      document.getElementById('captchaQuestion').textContent = `${captchaNum1} ${captchaOperator} ${captchaNum2} =`;
      document.getElementById('captchaAnswer').value = '';
    }

    function verifyCaptcha() {
      const userAnswer = parseInt(document.getElementById('captchaAnswer').value, 10);
      return userAnswer === captchaResult;
    }

    document.addEventListener('DOMContentLoaded', () => {
      // Initialize CAPTCHA
      generateCaptcha();

      // Refresh CAPTCHA button
      document.getElementById('refreshCaptcha').addEventListener('click', generateCaptcha);

      // Loader
      const loader = document.getElementById('scan-loader');
      setTimeout(() => {
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

      // Form submission with CAPTCHA
      document.getElementById('formCasco').addEventListener('submit', function(e) {
        e.preventDefault();

        // Verify CAPTCHA first
        if (!verifyCaptcha()) {
          const modalCaptchaError = new bootstrap.Modal(document.getElementById('modalCaptchaError'));
          modalCaptchaError.show();
          generateCaptcha();
          return false;
        }

        const nombre = document.getElementById('nombre').value;
        const telefono = document.getElementById('telefono').value;
        const marca = document.getElementById('marca').value;
        const referencia = document.getElementById('referencia').value;
        const observaciones = document.getElementById('observaciones').value;

        // Disable submit button
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>Enviando...</span><i class="bi bi-hourglass-split"></i>';

        fetch('verificar_ip.php')
          .then(response => response.json())
          .then(data => {
            if (data.count >= data.limitBloqueo) {
              const modalBloqueo = new bootstrap.Modal(document.getElementById('modalBloqueo'));
              modalBloqueo.show();
              throw new Error("Bloqueado por IP");
            }

            if (data.count >= data.limitAdvertencia) {
              const modalAdvertencia = new bootstrap.Modal(document.getElementById('modalLimite'));
              modalAdvertencia.show();
            }

            const formData = new FormData();
            formData.append('nombre', nombre);
            formData.append('telefono', telefono);
            formData.append('marca', marca);
            formData.append('referencia', referencia);
            formData.append('observaciones', observaciones);
            formData.append('tipo', 'formulario');

            return fetch('guardar_formulario.php', {
              method: 'POST',
              body: formData
            });
          })
          .then(response => {
            if (!response.ok) throw new Error("No se pudo guardar");

            const modalConfirmacion = new bootstrap.Modal(document.getElementById('modalConfirmacion'));
            modalConfirmacion.show();

            document.getElementById('formCasco').reset();
            generateCaptcha();

            if (window.history.replaceState) {
              window.history.replaceState(null, null, window.location.pathname);
            }

            setTimeout(() => {
              modalConfirmacion.hide();
              location.reload();
            }, 4000);
          })
          .catch(error => {
            if (error.message !== "Bloqueado por IP") {
              alert("Error al guardar: " + error.message);
            }
          })
          .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Pregúntame por el tuyo</span><i class="bi bi-send"></i>';
          });

        return false;
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

    * { margin: 0; padding: 0; box-sizing: border-box; }

    html, body {
      height: 100%;
      overflow: hidden;
      background: var(--gray-900);
      font-family: 'Poppins', sans-serif;
    }

    /* ==================== */
    /* Scan Loader */
    /* ==================== */
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
      letter-spacing: 8px;
    }

    .scan-progress { width: 200px; height: 3px; background: var(--gray-700); border-radius: 3px; overflow: hidden; }
    .scan-progress-bar { height: 100%; background: var(--neon-primary); animation: progressFill 2s ease forwards; }
    @keyframes progressFill { from { width: 0; } to { width: 100%; } }

    /* ==================== */
    /* Main Layout */
    /* ==================== */
    .cascos-layout {
      display: flex;
      height: 100vh;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s ease 2s forwards;
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

    .sidebar__header { display: flex; flex-direction: column; align-items: center; gap: 0.5rem; margin-bottom: 2rem; }
    .sidebar__logo img { width: 45px; filter: drop-shadow(0 0 15px var(--neon-glow)); transition: transform 0.3s ease; }
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

    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, 0.7); z-index: 999; opacity: 0; transition: opacity 0.3s ease; }
    .sidebar-overlay.active { opacity: 1; }

    /* ==================== */
    /* Main Content - NO SCROLL */
    /* ==================== */
    .asesoria-main {
      flex: 1;
      height: 100%;
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    /* Two Column Layout */
    .asesoria-content {
      flex: 1;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      padding: 2rem 3rem;
      align-items: center;
      max-height: 100%;
    }

    .decor { position: absolute; width: 60px; height: 60px; z-index: 1; pointer-events: none; opacity: 0.3; }
    .decor--top-left { top: 10px; left: 10px; border-top: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--top-right { top: 10px; right: 10px; border-top: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }
    .decor--bottom-left { bottom: 10px; left: 10px; border-bottom: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--bottom-right { bottom: 10px; right: 10px; border-bottom: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }

    /* ==================== */
    /* Left Column - Info */
    /* ==================== */
    .info-column {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      padding-right: 1rem;
    }

    .asesoria-header { position: relative; z-index: 2; }

    .asesoria-title {
      font-family: 'Orbitron', sans-serif;
      font-size: clamp(1.8rem, 3.5vw, 2.8rem);
      font-weight: 700;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 3px;
      line-height: 1.2;
      margin-bottom: 0.5rem;
    }

    .title-accent { color: var(--neon-primary); text-shadow: 0 0 20px var(--neon-glow); }

    .asesoria-subtitle {
      font-size: clamp(0.9rem, 1.5vw, 1.1rem);
      color: var(--gray-200);
      letter-spacing: 2px;
    }

    /* Features */
    .info-features {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }

    .feature-item {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.6rem 1rem;
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .feature-item:hover {
      border-color: var(--neon-primary);
      transform: translateX(5px);
    }

    .feature-item i {
      color: var(--neon-primary);
      font-size: 1.1rem;
    }

    .feature-item span {
      color: var(--gray-200);
      font-size: 0.85rem;
    }

    /* ==================== */
    /* Brands Marquee - REVERSE, FULL COLOR */
    /* ==================== */
    .brands-marquee {
      width: 100%;
      overflow: hidden;
      position: relative;
      padding: 0.75rem 0;
      mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
      -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }

    .brands-marquee__track {
      display: flex;
      width: max-content;
      animation: marqueeReverse 15s linear infinite;
    }

    .brands-marquee:hover .brands-marquee__track {
      animation-play-state: paused;
    }

    .brands-marquee__content {
      display: flex;
      gap: 1rem;
      padding: 0 0.5rem;
    }

    .brand-item {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.6rem 1rem;
      background: linear-gradient(145deg, var(--gray-800), var(--gray-700));
      border: 1px solid var(--gray-600);
      border-radius: 10px;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .brand-item:hover {
      border-color: var(--neon-primary);
      transform: scale(1.1);
      box-shadow: 0 5px 20px rgba(57, 255, 20, 0.3);
    }

    /* FULL COLOR - No grayscale filter */
    .brand-item img {
      width: 45px;
      height: 45px;
      object-fit: contain;
      transition: transform 0.3s ease;
    }

    .brand-item:hover img {
      transform: scale(1.1);
    }

    /* REVERSE Animation - Right to Left (opposite direction) */
    @keyframes marqueeReverse {
      0% { transform: translateX(-50%); }
      100% { transform: translateX(0); }
    }

    /* ==================== */
    /* Right Column - Form */
    /* ==================== */
    .form-column {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-card {
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 16px;
      padding: 1.5rem;
      width: 100%;
      max-width: 420px;
      position: relative;
      z-index: 2;
    }

    .form-card::before {
      content: '';
      position: absolute;
      inset: -1px;
      border-radius: 16px;
      padding: 1px;
      background: linear-gradient(135deg, var(--neon-primary), transparent, var(--neon-primary));
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      opacity: 0.3;
      pointer-events: none;
    }

    .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem; }
    .form-group { position: relative; }
    .form-group--full { grid-column: 1 / -1; }

    .form-input {
      width: 100%;
      background: var(--gray-700);
      border: 1px solid var(--gray-500);
      border-radius: 10px;
      padding: 0.75rem 1rem 0.75rem 2.5rem;
      color: var(--white);
      font-size: 0.85rem;
      transition: all 0.3s ease;
    }

    .form-input::placeholder { color: var(--gray-300); }
    .form-input:focus { outline: none; border-color: var(--neon-primary); box-shadow: 0 0 0 3px rgba(57, 255, 20, 0.1); }

    select.form-input { cursor: pointer; appearance: none; }
    select.form-input option { background: var(--gray-800); color: var(--white); }
    textarea.form-input { resize: none; min-height: 60px; }

    .form-icon {
      position: absolute;
      left: 0.85rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      font-size: 0.95rem;
      pointer-events: none;
      transition: color 0.3s ease;
    }

    textarea + .form-icon { top: 0.9rem; transform: none; }
    .form-input:focus + .form-icon { color: var(--neon-primary); }

    /* ==================== */
    /* CAPTCHA - Compact Inline */
    /* ==================== */
    .captcha-row {
      margin-top: 0.25rem;
    }

    .captcha-inline {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background: linear-gradient(145deg, var(--gray-700), var(--gray-800));
      border: 1px solid var(--gray-500);
      border-radius: 10px;
      padding: 0.5rem 0.75rem;
    }

    .captcha-icon {
      color: var(--neon-primary);
      font-size: 1.2rem;
      flex-shrink: 0;
    }

    .captcha-label {
      font-family: 'Orbitron', sans-serif;
      font-size: 0.95rem;
      font-weight: 600;
      color: var(--white);
      letter-spacing: 2px;
      white-space: nowrap;
    }

    .captcha-answer {
      width: 60px;
      background: var(--gray-600);
      border: 1px solid var(--gray-500);
      border-radius: 8px;
      padding: 0.5rem;
      color: var(--neon-primary);
      font-family: 'Orbitron', sans-serif;
      font-size: 1rem;
      font-weight: 700;
      text-align: center;
      letter-spacing: 2px;
      transition: all 0.3s ease;
    }

    .captcha-answer:focus {
      outline: none;
      border-color: var(--neon-primary);
      box-shadow: 0 0 0 2px rgba(57, 255, 20, 0.2);
    }

    .captcha-answer::placeholder {
      color: var(--gray-400);
    }

    .captcha-refresh {
      width: 36px;
      height: 36px;
      background: var(--gray-600);
      border: 1px solid var(--gray-500);
      border-radius: 8px;
      color: var(--gray-300);
      font-size: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
      flex-shrink: 0;
      margin-left: auto;
    }

    .captcha-refresh:hover {
      border-color: var(--neon-primary);
      color: var(--neon-primary);
      background: rgba(57, 255, 20, 0.1);
    }

    .captcha-refresh:active i {
      animation: spinOnce 0.5s ease;
    }

    @keyframes spinOnce {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    /* ==================== */
    /* Submit Button */
    /* ==================== */
    .btn-submit {
      width: 100%;
      background: linear-gradient(135deg, var(--neon-primary), #2ecc71);
      border: none;
      border-radius: 10px;
      padding: 0.85rem 1.5rem;
      color: var(--gray-900);
      font-family: 'Orbitron', sans-serif;
      font-size: 0.85rem;
      font-weight: 700;
      letter-spacing: 1px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      transition: all 0.3s ease;
    }

    .btn-submit:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(57, 255, 20, 0.3);
    }

    .btn-submit:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    .btn-submit i { font-size: 1rem; }

    /* ==================== */
    /* Modals */
    /* ==================== */
    .modal-custom {
      background: var(--gray-800);
      border: 1px solid var(--gray-600);
      border-radius: 16px;
      color: var(--white);
    }

    .modal-custom .modal-header { border-bottom: 1px solid var(--gray-600); padding: 1rem 1.5rem; }
    .modal-custom .modal-body { padding: 1.5rem; }

    .modal-custom--success .modal-title { color: var(--neon-primary); }
    .modal-custom--warning .modal-title { color: #ffc107; }
    .modal-custom--error .modal-title { color: #dc3545; }

    .modal-logo {
      height: 60px;
      margin-top: 1rem;
      filter: drop-shadow(0 0 15px var(--neon-glow));
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

    .floating-whatsapp:hover { transform: scale(1.1); color: var(--white); }
    .whatsapp-pulse { position: absolute; width: 100%; height: 100%; border-radius: 50%; background: rgba(37, 211, 102, 0.4); animation: whatsappPulse 2s ease-out infinite; }
    @keyframes whatsappPulse { 0% { transform: scale(1); opacity: 0.6; } 100% { transform: scale(1.8); opacity: 0; } }

    /* ==================== */
    /* RESPONSIVE - TABLET */
    /* ==================== */
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

      /* Stack columns on tablet */
      .asesoria-content {
        grid-template-columns: 1fr;
        padding: 1.5rem;
        gap: 1.5rem;
        overflow-y: auto;
      }

      .info-column {
        padding-right: 0;
        text-align: center;
      }

      .info-features {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
      }

      .feature-item {
        flex: 0 1 auto;
        padding: 0.5rem 0.75rem;
      }

      .feature-item:hover {
        transform: translateY(-3px);
      }

      .form-column {
        justify-content: center;
      }

      .form-card {
        max-width: 100%;
      }

      .decor { width: 40px; height: 40px; }
    }

    /* ==================== */
    /* RESPONSIVE - MOBILE */
    /* ==================== */
    @media (max-width: 768px) {
      .asesoria-content { padding: 1rem; gap: 1rem; }
      .form-grid { grid-template-columns: 1fr; gap: 0.6rem; }
      .form-card { padding: 1rem; }
      .brands-marquee { padding: 0.5rem 0; }
      .brand-item { padding: 0.5rem 0.75rem; }
      .brand-item img { width: 35px; height: 35px; }
      .decor { width: 35px; height: 35px; }
      .floating-whatsapp { width: 48px; height: 48px; font-size: 1.4rem; bottom: 15px; right: 15px; }

      .info-features { display: none; }

      .captcha-label { font-size: 0.85rem; }
      .captcha-answer { width: 50px; font-size: 0.9rem; }
    }

    /* ==================== */
    /* RESPONSIVE - SMALL MOBILE */
    /* ==================== */
    @media (max-width: 480px) {
      .asesoria-content { padding: 0.75rem; }
      .asesoria-title { font-size: 1.3rem; }
      .asesoria-subtitle { font-size: 0.8rem; }

      .brand-item { padding: 0.4rem 0.6rem; }
      .brand-item img { width: 30px; height: 30px; }

      .form-card { padding: 0.85rem; }
      .form-input { padding: 0.65rem 1rem 0.65rem 2.2rem; font-size: 0.8rem; }
      .btn-submit { padding: 0.75rem 1rem; font-size: 0.75rem; }

      .captcha-inline { padding: 0.4rem 0.6rem; gap: 0.4rem; }
      .captcha-icon { font-size: 1rem; }
      .captcha-label { font-size: 0.8rem; letter-spacing: 1px; }
      .captcha-answer { width: 45px; padding: 0.4rem; font-size: 0.85rem; }
      .captcha-refresh { width: 32px; height: 32px; font-size: 0.9rem; }

      .decor { width: 25px; height: 25px; opacity: 0.2; }

      .floating-menu-toggle {
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        font-size: 1.3rem;
      }
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
      #scan-loader { display: none !important; }
      .cascos-layout { opacity: 1; animation: none; }
      .brands-marquee__track { animation: none; }
    }
  </style>

</body>
</html>
