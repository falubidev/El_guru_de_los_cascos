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

    <!-- Content Container -->
    <div class="video-hero__content">

      <!-- Logo with Glow Ring -->
      <div class="video-hero__logo" data-aos="zoom-in" data-aos-duration="800">
        <div class="logo-ring"></div>
        <div class="logo-ring logo-ring--delay"></div>
        <img src="assets/img/gurulogo.png" alt="El Guru de los Cascos">
      </div>

      <!-- Title with Gradient -->
      <h1 class="video-hero__title" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <span class="title-line">El Gurú</span>
        <span class="title-line title-line--accent">de los Cascos</span>
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
          <a href="https://www.instagram.com/el_guru_de_los_cascos?igsh=MWZudTBkc2dud21saA==" target="_blank" aria-label="Instagram" class="social-icon social-icon--instagram">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="https://www.tiktok.com/@el_guru_de_los_cascos?_t=8mNTpgPyAPW&_r=1" target="_blank" aria-label="TikTok" class="social-icon social-icon--tiktok">
            <i class="bi bi-tiktok"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="1000">
      <span class="scroll-text">Explora</span>
      <div class="scroll-mouse">
        <span class="scroll-wheel"></span>
      </div>
    </div>

  </div>

  <!-- Floating WhatsApp Button -->
  <a href="https://wa.me/tuNumero" target="_blank" class="floating-whatsapp" aria-label="WhatsApp">
    <i class="bi bi-whatsapp"></i>
    <span class="whatsapp-pulse"></span>
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
    /* Content Container */
    /* ==================== */
    .video-hero__content {
      position: relative;
      z-index: 4;
      text-align: center;
      padding: 4rem 2rem;
      max-width: 1000px;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1.25rem;
    }

    /* ==================== */
    /* Logo with Glow Rings */
    /* ==================== */
    .video-hero__logo {
      position: relative;
      margin-bottom: 0.5rem;
      margin-top: 3rem;
      transition: transform 0.3s ease-out;
    }

    .logo-ring {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 180px;
      height: 180px;
      border: 2px solid var(--neon-primary);
      border-radius: 50%;
      opacity: 0.3;
      animation: ringPulse 3s ease-in-out infinite;
    }

    .logo-ring--delay {
      width: 220px;
      height: 220px;
      animation-delay: 1.5s;
      border-style: dashed;
    }

    @keyframes ringPulse {
      0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.3; }
      50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.6; }
    }

    .video-hero__logo img {
      position: relative;
      width: 130px;
      height: auto;
      filter: drop-shadow(0 0 30px var(--neon-glow)) drop-shadow(0 0 60px rgba(57, 255, 20, 0.3));
      animation: logoFloat 4s ease-in-out infinite;
      z-index: 2;
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
    /* Scroll Indicator */
    /* ==================== */
    .scroll-indicator {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      z-index: 5;
      cursor: pointer;
    }

    .scroll-text {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: rgba(255, 255, 255, 0.5);
    }

    .scroll-mouse {
      width: 26px;
      height: 40px;
      border: 2px solid rgba(255, 255, 255, 0.4);
      border-radius: 20px;
      display: flex;
      justify-content: center;
      padding-top: 8px;
    }

    .scroll-wheel {
      width: 4px;
      height: 8px;
      background: var(--neon-primary);
      border-radius: 4px;
      animation: scrollWheel 2s ease-in-out infinite;
    }

    @keyframes scrollWheel {
      0%, 100% { transform: translateY(0); opacity: 1; }
      50% { transform: translateY(10px); opacity: 0.3; }
    }

    /* ==================== */
    /* Floating WhatsApp */
    /* ==================== */
    .floating-whatsapp {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, #25d366, #128c7e);
      color: var(--white);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      text-decoration: none;
      box-shadow: 0 8px 30px rgba(37, 211, 102, 0.4);
      z-index: 99;
      transition: all 0.3s ease;
    }

    .floating-whatsapp:hover {
      transform: scale(1.1) translateY(-3px);
      box-shadow: 0 12px 40px rgba(37, 211, 102, 0.6);
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
      .decor { width: 80px; height: 80px; }

      .logo-ring { width: 140px; height: 140px; }
      .logo-ring--delay { width: 170px; height: 170px; }
      .video-hero__logo img { width: 100px; }

      .title-line { font-size: 2.5rem; letter-spacing: 2px; }

      .video-hero__buttons { gap: 1rem; }
      .video-hero__btn { padding: 1rem 1.8rem; font-size: 0.95rem; }
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
      .scroll-indicator { display: none; }

      .video-hero__content {
        padding: 1rem;
        gap: 1rem;
      }

      .video-hero__logo { margin-bottom: 0.5rem; }
      .logo-ring { width: 100px; height: 100px; }
      .logo-ring--delay { width: 120px; height: 120px; }
      .video-hero__logo img { width: 70px; }

      .title-line { font-size: 1.8rem; letter-spacing: 1px; }

      .video-hero__subtitle { font-size: 0.9rem; gap: 0.5rem; }
      .subtitle-icon { display: none; }

      .trust-badge {
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
        flex-wrap: wrap;
        justify-content: center;
      }

      .video-hero__buttons {
        flex-direction: column;
        width: 100%;
        max-width: 280px;
        gap: 0.75rem;
      }

      .video-hero__btn {
        width: 100%;
        padding: 0.9rem 1.5rem;
        font-size: 0.9rem;
        justify-content: center;
      }

      .btn-arrow { display: none; }

      .social-label { font-size: 0.7rem; letter-spacing: 2px; }
      .social-icons { gap: 0.75rem; }
      .social-icon { width: 44px; height: 44px; font-size: 1.1rem; }

      .floating-whatsapp {
        width: 52px;
        height: 52px;
        font-size: 1.5rem;
        bottom: 20px;
        right: 20px;
      }
    }

    /* ==================== */
    /* RESPONSIVE - SMALL MOBILE */
    /* ==================== */
    @media (max-width: 480px) {
      .decor { width: 45px; height: 45px; }
      .decor--top-left, .decor--top-right { top: 10px; }
      .decor--bottom-left, .decor--bottom-right { bottom: 10px; }
      .decor--top-left, .decor--bottom-left { left: 10px; }
      .decor--top-right, .decor--bottom-right { right: 10px; }

      .video-hero__content { gap: 0.8rem; }

      .logo-ring { width: 80px; height: 80px; }
      .logo-ring--delay { width: 100px; height: 100px; }
      .video-hero__logo img { width: 55px; }

      .title-line { font-size: 1.5rem; }

      .video-hero__subtitle { font-size: 0.8rem; }

      .trust-badge { font-size: 0.7rem; padding: 0.4rem 0.8rem; }

      .video-hero__btn { padding: 0.8rem 1.2rem; font-size: 0.85rem; }

      .social-icon { width: 40px; height: 40px; font-size: 1rem; }
    }

    /* ==================== */
    /* RESPONSIVE - VERY SMALL */
    /* ==================== */
    @media (max-width: 360px) {
      .decor { width: 35px; height: 35px; opacity: 0.3; }

      .video-hero__logo img { width: 45px; }
      .logo-ring, .logo-ring--delay { display: none; }

      .title-line { font-size: 1.3rem; }

      .trust-badge { display: none; }

      .video-hero__btn { padding: 0.7rem 1rem; font-size: 0.8rem; }
    }

    /* ==================== */
    /* RESPONSIVE - SHORT HEIGHT */
    /* ==================== */
    @media (max-height: 700px) {
      .decor { width: 50px; height: 50px; }

      .video-hero__content { gap: 0.8rem; }
      .video-hero__logo { margin-bottom: 0; }
      .logo-ring, .logo-ring--delay { display: none; }
      .video-hero__logo img { width: 60px; }
      .title-line { font-size: 1.8rem; }
      .trust-badge { display: none; }
      .scroll-indicator { display: none; }
    }

    @media (max-height: 550px) {
      .decor { width: 40px; height: 40px; opacity: 0.3; }

      .video-hero__logo img { width: 45px; }
      .title-line { font-size: 1.4rem; }
      .video-hero__subtitle { font-size: 0.8rem; }
      .video-hero__buttons { flex-direction: row; flex-wrap: wrap; max-width: none; }
      .video-hero__btn { width: auto; padding: 0.6rem 1rem; font-size: 0.8rem; }
      .social-icon { width: 36px; height: 36px; font-size: 0.95rem; }
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
  </style>

</body>
</html>
