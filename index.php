<!DOCTYPE html>
<html lang="es">
<?php include 'includes/head.php'; ?>

<body class="index-page video-landing" data-page="home">

  <!-- Loader -->
  <?php include 'includes/loader.php'; ?>

  <!-- Full Screen Video Background -->
  <div class="video-hero">

    <!-- Video Background -->
    <video class="video-hero__video" autoplay loop muted playsinline poster="assets/img/video-poster.jpg">
      <source src="assets/videos/guru-cascos.mp4" type="video/mp4">
    </video>

    <!-- Dark Overlay -->
    <div class="video-hero__overlay"></div>

    <!-- Decorative Elements -->
    <div class="decor decor--top-left"></div>
    <div class="decor decor--top-right"></div>
    <div class="decor decor--bottom-left"></div>
    <div class="decor decor--bottom-right"></div>

    <!-- Floating Particles -->
    <div class="particles">
      <span class="particle"></span>
      <span class="particle"></span>
      <span class="particle"></span>
      <span class="particle"></span>
      <span class="particle"></span>
      <span class="particle"></span>
    </div>

    <!-- Video Wheel - Posicionado absoluto a la izquierda -->
    <div class="video-wheel-float" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
      <div class="video-wheel-wrapper">
        <div class="video-wheel" id="videoWheel">
          <div class="video-wheel__item" data-index="0">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta1.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="1">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta2.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="2">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta3.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="3">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta4.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="4">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta5.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Video Wheel - Posicionado absoluto a la derecha (espejo) -->
    <div class="video-wheel-float video-wheel-float--right" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
      <div class="video-wheel-wrapper">
        <div class="video-wheel" id="videoWheelRight">
          <div class="video-wheel__item" data-index="0">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta5.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="1">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta6.jpg" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="2">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta7.jpg" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="3">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta8.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
          <div class="video-wheel__item" data-index="4">
            <a href="https://www.instagram.com/reel/DQs6aFpDqO2/?utm_source=ig_web_copy_link&igsh=NTc4MTIwNjQ2YQ==" target="_blank" class="video-card">
              <img src="assets/img/instagram/insta9.png" alt="Instagram">
              <div class="video-card__overlay">
                <i class="bi bi-instagram"></i>
                <span>Ver en Instagram</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Contenido centrado -->
    <div class="video-hero__content">

      <!-- Logo with Glow Ring -->
      <div class="video-hero__logo" data-aos="zoom-in" data-aos-duration="800">
        <div class="logo-ring"></div>
        <div class="logo-ring logo-ring--delay"></div>
        <img src="assets/img/logos_new/logo_fondo_negro.png" alt="El Guru de los Cascos">
      </div>

      <!-- Title with Gradient -->
      <h1 class="video-hero__title" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <span class="title-line title-line--small">El Gurú</span>
        <span class="title-line title-line--accent title-line--small">de los Cascos</span>
      </h1>

      <!-- Subtitle -->
      <p class="video-hero__subtitle" data-aos="fade-up" data-aos-duration="800" data-aos-delay="350">
        Pensado para ti, no para todos
      </p>

      <!-- Trust Badge -->
      <div class="trust-badge" data-aos="fade-up" data-aos-duration="800" data-aos-delay="450">
        <i class="bi bi-patch-check-fill"></i>
        <span>+500 cascos analizados</span>
        <span class="separator">•</span>
        <span>Asesoría certificada</span>
      </div>

      <!-- Three Buttons -->
      <div class="video-hero__buttons" data-aos="fade-up" data-aos-duration="800" data-aos-delay="550">

        <a href="cascos.php" class="video-hero__btn video-hero__btn--primary">
          <span class="btn-bg"></span>
          <i class="bi bi-grid-3x3-gap-fill"></i>
          <span>Ver Catálogo</span>
          <i class="bi bi-arrow-right btn-arrow"></i>
        </a>

        <a href="buscascasco.php" class="video-hero__btn video-hero__btn--secondary">
          <span class="btn-bg"></span>
          <i class="bi bi-headset"></i>
          <span>Asesoría Personalizada</span>
        </a>

        <a href="guru.php" class="video-hero__btn video-hero__btn--tertiary">
          <span class="btn-bg"></span>
          <i class="bi bi-person-circle"></i>
          <span>Sobre Mí</span>
        </a>

      </div>

      <!-- Social Icons -->
      <div class="video-hero__social" data-aos="fade-up" data-aos-duration="800" data-aos-delay="650">
        <span class="social-label">SÍGUENOS</span>
        <div class="social-icons">
          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank" aria-label="YouTube" class="social-icon social-icon--youtube">
            <i class="bi bi-youtube"></i>
          </a>
          <a href="https://www.instagram.com/elgurudeloscascos/" target="_blank" aria-label="Instagram" class="social-icon social-icon--instagram">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://www.tiktok.com/@elgurudeloscascos" target="_blank" aria-label="TikTok" class="social-icon social-icon--tiktok">
            <i class="bi bi-tiktok"></i>
          </a>
        </div>
      </div>

    </div>

  </div>

  <!-- Floating Guru Button -->
  <a href="https://wa.me/573052332296?text=Hola%20Guru!%20Quiero%20preguntarte%20por%20un%20casco" target="_blank" class="floating-guru" aria-label="WhatsApp">
    <span class="guru-float-bubble">Pregunta por el tuyo!</span>
    <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Gurú" class="guru-float-img">
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js" defer></script>

  <!-- Enhanced Interactions -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Initialize AOS
      if (typeof AOS !== 'undefined') {
        AOS.init({
          duration: 800,
          once: true,
          easing: 'ease-out-cubic'
        });
      }

      // Video playback
      const bgVideo = document.querySelector('.video-hero__video');
      if (bgVideo) {
        bgVideo.playbackRate = 1.3;
      }

      // Parallax effect on mouse move (desktop only)
      if (window.innerWidth > 768) {
        const content = document.querySelector('.video-hero__content');
        const logo = document.querySelector('.video-hero__logo');
        const particles = document.querySelectorAll('.particle');

        document.addEventListener('mousemove', (e) => {
          const x = (e.clientX / window.innerWidth - 0.5) * 2;
          const y = (e.clientY / window.innerHeight - 0.5) * 2;

          if (logo) {
            logo.style.transform = `translate(${x * 10}px, ${y * 10}px)`;
          }

          particles.forEach((particle, i) => {
            const speed = (i + 1) * 8;
            particle.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
          });
        });
      }

      // Button ripple effect
      document.querySelectorAll('.video-hero__btn').forEach(btn => {
        btn.addEventListener('mouseenter', function(e) {
          const bg = this.querySelector('.btn-bg');
          if (bg) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            bg.style.left = x + 'px';
            bg.style.top = y + 'px';
          }
        });
      });

      // Social icons stagger animation on hover
      const socialContainer = document.querySelector('.social-icons');
      if (socialContainer) {
        socialContainer.addEventListener('mouseenter', () => {
          document.querySelectorAll('.social-icon').forEach((icon, i) => {
            icon.style.transitionDelay = `${i * 50}ms`;
          });
        });
        socialContainer.addEventListener('mouseleave', () => {
          document.querySelectorAll('.social-icon').forEach(icon => {
            icon.style.transitionDelay = '0ms';
          });
        });
      }

      // ==================== //
      // Video Wheel Carousel  //
      // ==================== //
      const wheel = document.getElementById('videoWheel');
      const items = wheel ? wheel.querySelectorAll('.video-wheel__item') : [];
      const totalItems = items.length;

      if (wheel && totalItems > 0) {
        let currentIndex = 0;
        let isAnimating = false;
        let autoplayTimer = null;
        const angleStep = 360 / totalItems;
        // Radius of the wheel (distance from center)
        const radius = 250;

        function positionItems() {
          items.forEach((item, i) => {
            // Calculate angle offset from current
            let offset = i - currentIndex;
            // Normalize to shortest rotation path
            if (offset > totalItems / 2) offset -= totalItems;
            if (offset < -totalItems / 2) offset += totalItems;

            const angle = offset * angleStep;
            const radian = (angle * Math.PI) / 180;

            // Vertical wheel: Y position follows sin, Z follows cos
            const y = Math.sin(radian) * radius;
            const z = Math.cos(radian) * radius - radius;

            // Scale & opacity based on position (front = big, back = small)
            const normZ = (z + radius) / (2 * radius); // 0 (back) to 1 (front)
            const scale = 0.4 + normZ * 0.6;
            const opacity = 0.15 + normZ * 0.85;

            // Blur based on distance from center: active = 0, others = up to 3px
            const blurAmount = Math.abs(offset) === 0 ? 0 : Math.min(Math.abs(offset) * 1.5, 3);

            item.style.transform = `translate(-50%, -50%) translateY(${y}px) translateZ(${z}px) scale(${scale})`;
            item.style.opacity = opacity;
            item.style.zIndex = Math.round(normZ * 100);
            item.style.filter = blurAmount > 0 ? `blur(${blurAmount}px)` : 'none';

            // Mark active
            if (offset === 0) {
              item.classList.add('is-active');
            } else {
              item.classList.remove('is-active');
            }
          });
        }

        function goTo(index) {
          if (isAnimating) return;
          isAnimating = true;
          currentIndex = ((index % totalItems) + totalItems) % totalItems;
          positionItems();
          setTimeout(() => { isAnimating = false; }, 600);
          resetAutoplay();
        }

        function next() { goTo(currentIndex + 1); }
        function prev() { goTo(currentIndex - 1); }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowUp') { e.preventDefault(); prev(); }
          if (e.key === 'ArrowDown') { e.preventDefault(); next(); }
        });

        // Mouse wheel on the carousel
        const wheelWrapper = document.querySelector('.video-wheel-wrapper');
        wheelWrapper.addEventListener('wheel', (e) => {
          e.preventDefault();
          if (e.deltaY > 0) next();
          else prev();
        }, { passive: false });

        // Touch support
        let touchStartY = 0;
        wheelWrapper.addEventListener('touchstart', (e) => {
          touchStartY = e.touches[0].clientY;
        }, { passive: true });
        wheelWrapper.addEventListener('touchend', (e) => {
          const diff = touchStartY - e.changedTouches[0].clientY;
          if (Math.abs(diff) > 40) {
            if (diff > 0) next();
            else prev();
          }
        }, { passive: true });

        // Autoplay
        function resetAutoplay() {
          clearInterval(autoplayTimer);
          autoplayTimer = setInterval(next, 3500);
        }

        // Pause autoplay on hover
        wheelWrapper.addEventListener('mouseenter', () => clearInterval(autoplayTimer));
        wheelWrapper.addEventListener('mouseleave', resetAutoplay);

        // Init
        positionItems();
        resetAutoplay();
      }

      // ============================== //
      // Video Wheel Carousel - RIGHT    //
      // ============================== //
      const wheelR = document.getElementById('videoWheelRight');
      const itemsR = wheelR ? wheelR.querySelectorAll('.video-wheel__item') : [];
      const totalItemsR = itemsR.length;

      if (wheelR && totalItemsR > 0) {
        let currentIndexR = 2; // Start offset for variety
        let isAnimatingR = false;
        let autoplayTimerR = null;
        const angleStepR = 360 / totalItemsR;
        const radiusR = 250;

        function positionItemsR() {
          itemsR.forEach((item, i) => {
            let offset = i - currentIndexR;
            if (offset > totalItemsR / 2) offset -= totalItemsR;
            if (offset < -totalItemsR / 2) offset += totalItemsR;

            const angle = offset * angleStepR;
            const radian = (angle * Math.PI) / 180;
            const y = Math.sin(radian) * radiusR;
            const z = Math.cos(radian) * radiusR - radiusR;
            const normZ = (z + radiusR) / (2 * radiusR);
            const scale = 0.4 + normZ * 0.6;
            const opacity = 0.15 + normZ * 0.85;

            const blurAmountR = Math.abs(offset) === 0 ? 0 : Math.min(Math.abs(offset) * 1.5, 3);

            item.style.transform = `translate(-50%, -50%) translateY(${y}px) translateZ(${z}px) scale(${scale})`;
            item.style.opacity = opacity;
            item.style.zIndex = Math.round(normZ * 100);
            item.style.filter = blurAmountR > 0 ? `blur(${blurAmountR}px)` : 'none';

            if (offset === 0) {
              item.classList.add('is-active');
            } else {
              item.classList.remove('is-active');
            }
          });
        }

        function goToR(index) {
          if (isAnimatingR) return;
          isAnimatingR = true;
          currentIndexR = ((index % totalItemsR) + totalItemsR) % totalItemsR;
          positionItemsR();
          setTimeout(() => { isAnimatingR = false; }, 600);
          resetAutoplayR();
        }

        function nextR() { goToR(currentIndexR + 1); }
        function prevR() { goToR(currentIndexR - 1); }

        const wheelWrapperR = wheelR.closest('.video-wheel-wrapper');
        wheelWrapperR.addEventListener('wheel', (e) => {
          e.preventDefault();
          if (e.deltaY > 0) nextR();
          else prevR();
        }, { passive: false });

        let touchStartYR = 0;
        wheelWrapperR.addEventListener('touchstart', (e) => {
          touchStartYR = e.touches[0].clientY;
        }, { passive: true });
        wheelWrapperR.addEventListener('touchend', (e) => {
          const diff = touchStartYR - e.changedTouches[0].clientY;
          if (Math.abs(diff) > 40) {
            if (diff > 0) nextR();
            else prevR();
          }
        }, { passive: true });

        function resetAutoplayR() {
          clearInterval(autoplayTimerR);
          autoplayTimerR = setInterval(nextR, 4200); // Slightly different speed
        }

        wheelWrapperR.addEventListener('mouseenter', () => clearInterval(autoplayTimerR));
        wheelWrapperR.addEventListener('mouseleave', resetAutoplayR);

        positionItemsR();
        resetAutoplayR();
      }
    });
  </script>

  <style>
    /* ==================== */
    /* CSS Variables */
    /* ==================== */
    :root {
      --neon-primary: #39ff14;
      --neon-secondary: #7db749;
      --neon-glow: rgba(57, 255, 20, 0.5);
      --dark-bg: rgba(0, 0, 0, 0.85);
      --white: #ffffff;
      --gray-light: rgba(255, 255, 255, 0.7);
    }

    /* ==================== */
    /* Reset & Base */
    /* ==================== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      overflow: hidden;
    }

    .video-landing {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
    }

    /* ==================== */
    /* Video Hero Section */
    /* ==================== */
    .video-hero {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .video-hero__video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 1;
    }

    .video-hero__overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background:
        radial-gradient(ellipse at center, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%),
        linear-gradient(180deg, rgba(0,0,0,0.4) 0%, transparent 30%, transparent 70%, rgba(0,0,0,0.5) 100%);
      z-index: 2;
    }

    /* ==================== */
    /* Decorative Corners */
    /* ==================== */
    .decor {
      position: absolute;
      width: 150px;
      height: 150px;
      z-index: 3;
      pointer-events: none;
      opacity: 0.4;
    }

    .decor--top-left {
      top: 30px;
      left: 30px;
      border-top: 2px solid var(--neon-primary);
      border-left: 2px solid var(--neon-primary);
    }

    .decor--top-right {
      top: 30px;
      right: 30px;
      border-top: 2px solid var(--neon-primary);
      border-right: 2px solid var(--neon-primary);
    }

    .decor--bottom-left {
      bottom: 30px;
      left: 30px;
      border-bottom: 2px solid var(--neon-primary);
      border-left: 2px solid var(--neon-primary);
    }

    .decor--bottom-right {
      bottom: 30px;
      right: 30px;
      border-bottom: 2px solid var(--neon-primary);
      border-right: 2px solid var(--neon-primary);
    }

    /* ==================== */
    /* Floating Particles */
    /* ==================== */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 3;
      pointer-events: none;
      overflow: hidden;
    }

    .particle {
      position: absolute;
      width: 6px;
      height: 6px;
      background: var(--neon-primary);
      border-radius: 50%;
      opacity: 0.6;
      animation: particleFloat 8s ease-in-out infinite;
      box-shadow: 0 0 10px var(--neon-glow);
    }

    .particle:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { top: 60%; left: 5%; animation-delay: 1.5s; }
    .particle:nth-child(3) { top: 40%; right: 8%; animation-delay: 3s; }
    .particle:nth-child(4) { top: 80%; right: 12%; animation-delay: 4.5s; }
    .particle:nth-child(5) { top: 15%; right: 20%; animation-delay: 2s; }
    .particle:nth-child(6) { bottom: 25%; left: 15%; animation-delay: 5s; }

    @keyframes particleFloat {
      0%, 100% { transform: translateY(0) scale(1); opacity: 0.6; }
      50% { transform: translateY(-30px) scale(1.2); opacity: 1; }
    }

    /* ==================== */
    /* Video Wheel Flotante */
    /* ==================== */
    .video-wheel-float {
      position: absolute;
      left: 40px;
      top: 0;
      height: 100%;
      z-index: 5;
      display: flex;
      align-items: center;
    }

    .video-wheel-float--right {
      left: auto;
      right: 40px;
    }

    /* ==================== */
    /* Content Container - Centrado real */
    /* ==================== */
    .video-hero__content {
      position: relative;
      z-index: 4;
      width: 100%;
      max-width: 1000px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 0.9rem;
      padding: 1rem 2rem;
    }

    /* ==================== */
    /* Logo with Glow Rings */
    /* ==================== */
    .video-hero__logo {
      position: relative;
      margin-bottom: 0.25rem;
      margin-top: 1rem;
      transition: transform 0.3s ease-out;
    }

    .logo-ring {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 250px;
      height: 250px;
      border: 2px solid var(--neon-primary);
      border-radius: 50%;
      opacity: 0.3;
      animation: ringPulse 3s ease-in-out infinite;
    }

    .logo-ring--delay {
      width: 300px;
      height: 300px;
      animation-delay: 1.5s;
      border-style: dashed;
    }

    @keyframes ringPulse {
      0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.3; }
      50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.6; }
    }

    .video-hero__logo img {
      position: relative;
      width: 200px;
      height: auto;
      filter: drop-shadow(0 0 30px var(--neon-glow)) drop-shadow(0 0 60px rgba(57, 255, 20, 0.3));
      animation: logoFloat 4s ease-in-out infinite, logoShimmer 3s ease-in-out infinite;
      z-index: 2;
    }

    @keyframes logoShimmer {
      0%, 100% { filter: drop-shadow(0 0 30px var(--neon-glow)) drop-shadow(0 0 60px rgba(57, 255, 20, 0.3)) brightness(1); }
      50% { filter: drop-shadow(0 0 40px var(--neon-glow)) drop-shadow(0 0 80px rgba(57, 255, 20, 0.5)) brightness(1.15); }
    }

    @keyframes logoFloat {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      25% { transform: translateY(-8px) rotate(2deg); }
      75% { transform: translateY(-8px) rotate(-2deg); }
    }

    /* ==================== */
    /* Title */
    /* ==================== */
    .video-hero__title {
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
      margin: 0;
    }

    .title-line {
      font-size: clamp(2.2rem, 6vw, 4.5rem);
      font-weight: 900;
      color: var(--white);
      text-transform: uppercase;
      letter-spacing: 3px;
      line-height: 1.1;
      text-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    }

    .title-line--small {
      font-size: clamp(1.6rem, 4vw, 3rem);
      letter-spacing: 2px;
    }

    .title-line--accent {
      background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 0 20px var(--neon-glow));
    }

    /* ==================== */
    /* Subtitle */
    /* ==================== */
    .video-hero__subtitle {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: clamp(1rem, 2.5vw, 1.4rem);
      color: var(--white);
      font-weight: 400;
      letter-spacing: 2px;
      text-shadow: 0 2px 20px rgba(0, 0, 0, 0.8);
    }

    /* ==================== */
    /* Trust Badge */
    /* ==================== */
    .trust-badge {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.75rem 1.5rem;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 50px;
      font-size: 0.9rem;
      color: var(--gray-light);
    }

    .trust-badge i {
      color: var(--neon-primary);
      font-size: 1.1rem;
    }

    .trust-badge .separator {
      opacity: 0.4;
    }

    /* ==================== */
    /* Buttons */
    /* ==================== */
    .video-hero__buttons {
      display: flex;
      gap: 1.25rem;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 0.5rem;
    }

    .video-hero__btn {
      position: relative;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 1.1rem 2.2rem;
      text-decoration: none;
      border-radius: 22px;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 2px solid transparent;
      overflow: hidden;
      cursor: pointer;
    }

    .video-hero__btn .btn-bg {
      position: absolute;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      transform: translate(-50%, -50%);
      transition: width 0.6s ease, height 0.6s ease;
      pointer-events: none;
    }

    .video-hero__btn:hover .btn-bg {
      width: 400px;
      height: 400px;
    }

    .video-hero__btn i {
      font-size: 1.2rem;
      position: relative;
      z-index: 1;
    }

    .video-hero__btn span {
      position: relative;
      z-index: 1;
    }

    .btn-arrow {
      opacity: 0;
      transform: translateX(-10px);
      transition: all 0.3s ease;
    }

    .video-hero__btn:hover .btn-arrow {
      opacity: 1;
      transform: translateX(0);
    }

    /* Primary Button - Verde */
    .video-hero__btn--primary {
      background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary));
      color: #000;
      box-shadow: 0 0 30px var(--neon-glow), 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .video-hero__btn--primary:hover {
      transform: translateY(-4px) scale(1.02);
      box-shadow: 0 0 50px var(--neon-glow), 0 15px 50px rgba(0, 0, 0, 0.4);
    }

    /* Secondary Button - Gris */
    .video-hero__btn--secondary {
      background: rgba(120, 120, 120, 0.6);
      backdrop-filter: blur(15px);
      color: var(--white);
      border: 2px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .video-hero__btn--secondary:hover {
      background: rgba(150, 150, 150, 0.7);
      transform: translateY(-4px) scale(1.02);
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
      border-color: rgba(255, 255, 255, 0.5);
    }

    /* Tertiary Button - Gris claro */
    .video-hero__btn--tertiary {
      background: rgba(180, 180, 180, 0.7);
      backdrop-filter: blur(15px);
      color: #1a1a1a;
      border: 2px solid rgba(255, 255, 255, 0.4);
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .video-hero__btn--tertiary:hover {
      background: rgba(200, 200, 200, 0.85);
      transform: translateY(-4px) scale(1.02);
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
    }

    /* ==================== */
    /* Social Section */
    /* ==================== */
    .video-hero__social {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.75rem;
      margin-top: 0;
    }

    .social-label {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 3px;
      color: var(--white);
      text-shadow: 0 2px 15px rgba(0, 0, 0, 0.8);
      font-weight: 500;
    }

    .social-icons {
      display: flex;
      gap: 1rem;
    }

    .social-icon {
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
      color: var(--white);
      border-radius: 50%;
      text-decoration: none;
      font-size: 1.3rem;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .social-icon:hover {
      transform: translateY(-5px) scale(1.15);
      border-color: transparent;
    }

    .social-icon--youtube:hover {
      background: linear-gradient(135deg, #ff0000, #cc0000);
      box-shadow: 0 8px 30px rgba(255, 0, 0, 0.4);
    }

    .social-icon--instagram:hover {
      background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
      box-shadow: 0 8px 30px rgba(225, 48, 108, 0.4);
    }

    .social-icon--tiktok:hover {
      background: linear-gradient(135deg, #00f2ea, #ff0050);
      box-shadow: 0 8px 30px rgba(0, 242, 234, 0.4);
    }


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
      width: 60px;
      height: 60px;
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
      font-size: 0.75rem;
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

    @keyframes bubbleFloat {
      0%, 100% { transform: translateY(0); opacity: 1; }
      50% { transform: translateY(-4px); opacity: 0.9; }
    }

    @keyframes guruFloatBounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }

    /* ==================== */
    /* RESPONSIVE - TABLET */
    /* ==================== */
    @media (max-width: 1200px) {
      .video-wheel-float { left: 20px; }
      .video-wheel-float--right { left: auto; right: 20px; }
      .video-wheel-wrapper { width: 200px; }
      .video-wheel, .video-wheel__item { width: 180px; }
    }

    @media (max-width: 968px) {
      .decor { width: 80px; height: 80px; }

      .video-wheel-float { left: 5px; }
      .video-wheel-float--right { left: auto; right: 5px; }
      .video-wheel-wrapper { width: 170px; }
      .video-wheel, .video-wheel__item { width: 150px; }

      .logo-ring { width: 140px; height: 140px; }
      .logo-ring--delay { width: 170px; height: 170px; }
      .video-hero__logo img { width: 90px; }

      .title-line { font-size: 2rem; letter-spacing: 2px; }

      .video-hero__buttons { gap: 0.8rem; }
      .video-hero__btn { padding: 0.85rem 1.5rem; font-size: 0.9rem; }

      .social-icon { width: 44px; height: 44px; font-size: 1.1rem; }
    }

    /* ==================== */
    /* RESPONSIVE - MOBILE */
    /* ==================== */
    @media (max-width: 768px) {
      .decor { width: 60px; height: 60px; }
      .decor--top-left, .decor--top-right { top: 15px; }
      .decor--bottom-left, .decor--bottom-right { bottom: 15px; }
      .decor--top-left, .decor--bottom-left { left: 15px; }
      .decor--top-right, .decor--bottom-right { right: 15px; }

      .particles { display: none; }

      .video-wheel-float { display: none; }

      .video-hero__content {
        gap: 0.7rem;
        padding: 1rem;
      }

      .video-hero__logo { margin-bottom: 0.25rem; margin-top: 0.5rem; }
      .logo-ring { width: 140px; height: 140px; }
      .logo-ring--delay { width: 170px; height: 170px; }
      .video-hero__logo img { width: 100px; }

      .title-line { font-size: 1.8rem; letter-spacing: 1px; }

      .video-hero__subtitle { font-size: 0.9rem; }

      .trust-badge {
        padding: 0.4rem 0.8rem;
        font-size: 0.7rem;
        flex-wrap: wrap;
        justify-content: center;
      }

      .video-hero__buttons {
        flex-direction: column;
        width: 100%;
        max-width: 280px;
        gap: 0.6rem;
      }

      .video-hero__btn {
        width: 100%;
        padding: 0.8rem 1.4rem;
        font-size: 0.88rem;
        justify-content: center;
      }

      .btn-arrow { display: none; }

      .video-hero__social {
        position: fixed;
        bottom: 20px;
        left: 0;
        right: 0;
        margin-top: auto;
        z-index: 10;
      }
      .social-label { font-size: 0.75rem; letter-spacing: 3px; }
      .social-icons { gap: 1rem; }
      .social-icon { width: 50px; height: 50px; font-size: 1.3rem; }

      .floating-guru { bottom: 15px; right: 10px; }
      .guru-float-img { width: 45px; height: 45px; }
      .guru-float-bubble { font-size: 0.6rem; padding: 0.3rem 0.6rem; right: -5px; }
    }

    /* ==================== */
    /* RESPONSIVE - SMALL MOBILE */
    /* ==================== */
    @media (max-width: 480px) {
      .decor { width: 40px; height: 40px; }
      .decor--top-left, .decor--top-right { top: 10px; }
      .decor--bottom-left, .decor--bottom-right { bottom: 10px; }
      .decor--top-left, .decor--bottom-left { left: 10px; }
      .decor--top-right, .decor--bottom-right { right: 10px; }

      .video-hero__content { gap: 0.5rem; padding: 0.5rem 1rem; }

      .video-hero__logo { margin-top: 0; margin-bottom: 0; }
      .logo-ring { width: 120px; height: 120px; }
      .logo-ring--delay { width: 145px; height: 145px; }
      .video-hero__logo img { width: 80px; }

      .title-line { font-size: 1.4rem; }

      .video-hero__subtitle { font-size: 0.75rem; }

      .trust-badge { font-size: 0.65rem; padding: 0.3rem 0.7rem; }

      .video-hero__btn { padding: 0.7rem 1rem; font-size: 0.8rem; }
      .video-hero__buttons { gap: 0.5rem; }

      .video-hero__social { bottom: 15px; }
      .social-label { font-size: 0.7rem; }
      .social-icons { gap: 0.9rem; }
      .social-icon { width: 46px; height: 46px; font-size: 1.2rem; }
    }

    /* ==================== */
    /* RESPONSIVE - VERY SMALL */
    /* ==================== */
    @media (max-width: 360px) {
      .decor { display: none; }

      .video-hero__logo img { width: 70px; }

      .title-line { font-size: 1.2rem; }

      .trust-badge { display: none; }

      .video-hero__btn { padding: 0.6rem 0.9rem; font-size: 0.75rem; }

      .video-hero__social { bottom: 12px; }
      .social-label { font-size: 0.65rem; }
      .social-icons { gap: 0.8rem; }
      .social-icon { width: 42px; height: 42px; font-size: 1.1rem; }
    }

    /* ==================== */
    /* RESPONSIVE - SHORT HEIGHT */
    /* ==================== */
    @media (max-height: 700px) {
      .decor { width: 40px; height: 40px; }

      .video-hero__content { gap: 0.4rem; padding: 0.5rem 1rem; }
      .video-hero__logo { margin-bottom: 0; margin-top: 0; }
      .logo-ring, .logo-ring--delay { display: none; }
      .video-hero__logo img { width: 70px; }
      .title-line { font-size: 1.5rem; }
      .trust-badge { display: none; }
      .video-hero__subtitle { font-size: 0.8rem; }
      .video-hero__btn { padding: 0.65rem 1.2rem; font-size: 0.82rem; }
      .video-hero__buttons { gap: 0.5rem; }

      .video-hero__social { position: fixed; bottom: 12px; left: 0; right: 0; z-index: 10; }
      .social-label { font-size: 0.6rem; }
      .social-icon { width: 36px; height: 36px; font-size: 0.9rem; }

      .video-wheel-wrapper { height: 80vh; }
      .video-wheel, .video-wheel__item { width: 160px; }
    }

    @media (max-height: 550px) {
      .decor { display: none; }

      .video-hero__content { gap: 0.3rem; }
      .video-hero__logo img { width: 55px; }
      .title-line { font-size: 1.2rem; }
      .video-hero__subtitle { font-size: 0.7rem; }
      .video-hero__buttons { flex-direction: row; flex-wrap: wrap; max-width: none; gap: 0.4rem; }
      .video-hero__btn { width: auto; padding: 0.5rem 0.8rem; font-size: 0.72rem; }
      .video-hero__social { position: fixed; bottom: 8px; left: 0; right: 0; z-index: 10; }
      .social-label { font-size: 0.55rem; }
      .social-icon { width: 30px; height: 30px; font-size: 0.8rem; }
      .social-icons { gap: 0.4rem; }
      .video-wheel-float { display: none; }
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
    }

    .video-hero__btn:focus,
    .social-icon:focus,
    .floating-whatsapp:focus {
      outline: 3px solid var(--neon-primary);
      outline-offset: 3px;
    }

    /* ==================== */
    /* Video Wheel (inline) */
    /* ==================== */
    .video-wheel-wrapper {
      position: relative;
      width: 240px;
      height: 90vh;
      perspective: 1000px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .video-wheel {
      position: relative;
      width: 210px;
      height: 100%;
      transform-style: preserve-3d;
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .video-wheel__item {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 210px;
      transform-style: preserve-3d;
      transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1),
                  opacity 0.6s ease,
                  filter 0.6s ease;
    }

    /* 9:16 vertical video card */
    .video-card {
      position: relative;
      width: 100%;
      aspect-ratio: 9 / 16;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
      transition: box-shadow 0.4s ease;
    }

    .video-wheel__item.is-active .video-card {
      box-shadow:
        0 0 25px rgba(57, 255, 20, 0.2),
        0 15px 50px rgba(0, 0, 0, 0.8);
    }

    .video-card video,
    .video-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 14px;
      pointer-events: none;
      display: block;
      filter: saturate(1.2) contrast(1.05) brightness(1.05);
    }

    /* Overlay Instagram */
    .video-card__overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 35%;
      background: linear-gradient(
        to top,
        rgba(0, 0, 0, 0.75) 0%,
        rgba(0, 0, 0, 0.3) 50%,
        transparent 100%
      );
      border-radius: 0 0 14px 14px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-end;
      padding-bottom: 12%;
      gap: 0.4rem;
      transition: height 0.3s ease, opacity 0.3s ease;
      z-index: 2;
    }

    .video-card:hover .video-card__overlay {
      height: 45%;
    }

    .video-card__overlay i {
      font-size: 1.6rem;
      color: #fff;
      background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      filter: drop-shadow(0 2px 10px rgba(225, 48, 108, 0.9));
    }

    .video-card__overlay span {
      font-size: 0.6rem;
      color: #fff;
      font-weight: 700;
      letter-spacing: 1px;
      text-shadow: 0 1px 8px rgba(0, 0, 0, 0.7);
      text-transform: uppercase;
      background: linear-gradient(135deg, #f09433, #dc2743, #bc1888);
      padding: 3px 10px;
      border-radius: 20px;
      -webkit-text-fill-color: #fff;
    }

  </style>

</body>
</html>
