<!-- Loader funcional con logo -->
<div id="loader" style="position: fixed; inset: 0; background: #000; z-index: 99999; display: flex; align-items: center; justify-content: center;">
  <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Cargando..." style="width: 100px; animation: pulse 1.5s infinite;">
</div>

<style>
  #loader.explode {
    animation: explodeOut 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
  }

  @keyframes explodeOut {
    0% {
      opacity: 1;
      transform: scale(1) rotate(0deg);
      filter: brightness(1) blur(0);
    }
    40% {
      opacity: 0.9;
      transform: scale(2.5) rotate(180deg);
      filter: brightness(3) blur(3px);
    }
    70% {
      opacity: 0.7;
      transform: scale(3.5) rotate(300deg);
      filter: brightness(6) blur(8px);
    }
    100% {
      opacity: 0;
      transform: scale(4) rotate(720deg);
      filter: brightness(10) blur(12px);
    }
  }

  @keyframes pulse {
    0%, 100% {
      transform: scale(1);
      opacity: 0.8;
    }
    50% {
      transform: scale(1.1);
      opacity: 1;
    }
  }
</style>

<script>
  window.addEventListener('load', function () {
    const loader = document.getElementById('loader');
    if (loader) {
      setTimeout(() => {
        document.body.classList.add('loaded');
        loader.classList.add('explode');
        setTimeout(() => {
          loader.style.display = "none";
        }, 600);
      }, 1500);
    }
  });
</script>
