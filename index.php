<!DOCTYPE html>
<html lang="es">
<?php include 'includes/head.php'; ?>

<body class="index-page" data-page="home">

  <!-- Skip to content link for accessibility -->
  <a href="#main-content" class="skip-to-content">Saltar al contenido</a>

  <!-- Loader -->
  <?php include 'includes/loader.php'; ?>

  <!-- Navbar -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Main Hero Landing Section -->
  <main id="main-content" class="hero-landing">

    <!-- Video Background -->
    <video class="hero-landing__video-bg" autoplay loop muted playsinline>
      <source src="assets/videos/guru-cascos.mp4" type="video/mp4">
      Tu navegador no soporta el elemento de video.
    </video>

    <!-- Gray Overlay -->
    <div class="hero-landing__overlay"></div>

    <!-- Diagonal Green Neon Line -->
    <div class="hero-landing__diagonal-line"></div>

    <!-- Diagonal Split Container -->
    <div class="hero-landing__split">

      <!-- Left Side: Dark with Product Image -->
      <div class="hero-landing__left" data-aos="fade-right">
        <div class="hero-landing__image-wrapper">
          <!-- Main product/hero image -->
          <img
            src="assets/img/gurufondo-removebg-preview.png"
            alt="El Guru de los Cascos - Experto en Cascos de Motocicleta"
            class="hero-landing__main-image"
            loading="eager"
          >
        </div>
      </div>

      <!-- Right Side: Vibrant Color with Content -->
      <div class="hero-landing__right" data-aos="fade-left" data-aos-delay="200">
        <div class="hero-landing__content">

          <!-- Main Title -->
          <h1 class="hero-landing__title">
            <span class="hero-landing__title-line">EL GURU</span>
            <span class="hero-landing__title-line">DE LOS CASCOS</span>
          </h1>

          <!-- Subtitle -->
          <p class="hero-landing__subtitle">
            Tu experto de confianza en cascos de motocicleta
          </p>

          <!-- Action Buttons with Icons -->
          <div class="hero-landing__buttons">

            <!-- Button 1: About/Biography -->
            <a href="index.php#about" class="hero-landing__btn" data-aos="fade-left" data-aos-delay="300">
              <span class="hero-landing__btn-icon">
                <i class="bi bi-person-circle"></i>
              </span>
              <span class="hero-landing__btn-text">Sobre Mí</span>
            </a>

            <!-- Button 2: Catalog -->
            <a href="cascos.php" class="hero-landing__btn" data-aos="fade-left" data-aos-delay="400">
              <span class="hero-landing__btn-icon">
                <i class="bi bi-grid-3x3-gap"></i>
              </span>
              <span class="hero-landing__btn-text">Catálogo</span>
            </a>

            <!-- Button 3: Search -->
            <a href="#buscascasco" class="hero-landing__btn" data-aos="fade-left" data-aos-delay="500">
              <span class="hero-landing__btn-icon">
                <i class="bi bi-search"></i>
              </span>
              <span class="hero-landing__btn-text">Buscar Casco</span>
            </a>

          </div>

        </div>
      </div>

    </div>

  </main>

  <!-- Additional Sections (hidden by default, can be shown with scroll or interaction) -->
  <div class="additional-sections" style="display: none;">
    <?php include 'banner1.5.php'; ?>
    <?php include 'buscascasco.php'; ?>
    <?php include 'sections/about.php'; ?>
    <?php include 'sections/working.php'; ?>
  </div>

  <!-- Floating Widget (optional) -->
  <div id="flotante-wrapper" style="display: none;">
    <?php include 'flotante.php'; ?>
  </div>

  <!-- Modern Landing Footer -->
  <footer class="footer-landing">
    <div class="footer-landing__container">

      <!-- Column 1: Social Media -->
      <div class="footer-landing__column">
        <h3 class="footer-landing__title">Síguenos</h3>
        <div class="footer-landing__social">
          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank" class="footer-landing__social-link" aria-label="YouTube">
            <i class="bi bi-youtube"></i>
          </a>
          <a href="https://www.instagram.com/el_guru_de_los_cascos?igsh=MWZudTBkc2dud21saA==" target="_blank" class="footer-landing__social-link" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://www.tiktok.com/@el_guru_de_los_cascos?_t=8mNTpgPyAPW&_r=1" target="_blank" class="footer-landing__social-link" aria-label="TikTok">
            <i class="bi bi-tiktok"></i>
          </a>
          <a href="#" class="footer-landing__social-link" aria-label="WhatsApp">
            <i class="bi bi-whatsapp"></i>
          </a>
        </div>
      </div>

      <!-- Column 2: Website Link -->
      <div class="footer-landing__column footer-landing__column--center">
        <h3 class="footer-landing__title">Visita Nuestro Sitio</h3>
        <a href="cascos.php" class="footer-landing__link">
          www.elgurudeloscascos.com
        </a>
      </div>

      <!-- Column 3: Copyright & Credits -->
      <div class="footer-landing__column footer-landing__column--right">
        <p class="footer-landing__copyright">
          © <?php echo date('Y'); ?> by EL GURU DE LOS CASCOS.<br>
          Todos los derechos reservados
        </p>
        <p class="footer-landing__powered">
          Desarrollado por <a href="https://missatest.com" target="_blank">Falubi</a>
        </p>
      </div>

    </div>
  </footer>

  <!-- Chat Widget -->
  <div class="chat-widget">
    <button class="chat-widget__button" aria-label="Abrir chat" onclick="window.open('https://wa.me/tuNumero', '_blank')">
      <i class="bi bi-chat-dots-fill"></i>
    </button>
  </div>

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center" aria-label="Volver arriba">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js" defer></script>
  <script src="assets/vendor/typed.js/typed.umd.js" defer></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js" defer></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js" defer></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js" defer></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js" defer></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js" defer></script>

  <!-- Custom Scripts -->
  <script src="assets/js/clean-url.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Initialize Navbar component -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Initialize Navbar
      if (typeof Navbar !== 'undefined') {
        new Navbar();
      }

      // Accelerate background video for dynamic effect
      const bgVideo = document.querySelector('.hero-landing__video-bg');
      if (bgVideo) {
        bgVideo.playbackRate = 1.5; // 1.5x speed for more dynamic look
      }

      // Smooth scroll for anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          const href = this.getAttribute('href');
          if (href !== '#' && href !== '#!') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
              target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
              });
            }
          }
        });
      });

      // Optional: Show additional sections on scroll or button click
      const showSectionsButton = document.querySelector('[href="#buscascasco"]');
      if (showSectionsButton) {
        showSectionsButton.addEventListener('click', (e) => {
          e.preventDefault();
          const additionalSections = document.querySelector('.additional-sections');
          if (additionalSections) {
            additionalSections.style.display = 'block';
            setTimeout(() => {
              document.querySelector('#buscascasco')?.scrollIntoView({
                behavior: 'smooth'
              });
            }, 100);
          }
        });
      }
    });
  </script>

</body>
</html>
