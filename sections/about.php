<!-- About Section Estilo Editorial -->
<section id="about" class="about section text-white position-relative min-vh-100 d-flex align-items-center" style="background-image: url('assets/img/espacio.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat; overflow: hidden;">
  
  <!-- Overlay oscuro -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgb(0 0 0 / 96%); z-index: 1;"></div>

  <div class="container-fluid position-relative" style="z-index: 2;">
    <div class="row g-0 align-items-center">

      <!-- Columna Izquierda -->
      <!-- Columna Izquierda -->
<div class="col-lg-6 px-5 py-5 d-flex flex-column justify-content-center">
  <div class="mb-4">
    <h2 class="display-4 fw-bold">¿Quién soy?</h2>
    <p class="fst-italic fs-5">Soy el Gurú de los Cascos. Te acompaño a elegir el casco ideal, con estilo, seguridad y verdad.</p>
  </div>
  <p class="mb-4">
    Llevo años analizando, probando y recomendando cascos. No vendo humo: te cuento lo bueno, lo malo y lo que debes saber antes de comprar.
  </p>
  <h5 class="fw-bold mb-3">Mis redes:</h5>
  <div class="social-icons mb-4">
    <a href="https://www.instagram.com/el_guru_de_los_cascos" target="_blank" class="social-link"><i class="bi bi-instagram"></i></a>
    <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank" class="social-link"><i class="bi bi-youtube"></i></a>
    <a href="https://www.tiktok.com/@el_guru_de_los_cascos" target="_blank" class="social-link"><i class="bi bi-tiktok" style="font-size: 2rem;"></i></a>
  </div>
</div>

<!-- Columna Derecha - Video -->
<div class="col-lg-6">
  <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover" style="min-height: 100%; object-fit: cover;">
    <source src="assets/videos/guru-cascos.mp4" type="video/mp4">
    Tu navegador no soporta videos HTML5.
  </video>
</div>





    </div>
  </div>
</section>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
 <script>
  document.addEventListener("DOMContentLoaded", function () {
    const aboutSection = document.querySelector("#about");

    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            aboutSection.classList.add("active");
          }
        });
      },
      {
        threshold: 0.3, // El 30% del elemento visible activa la animación
      }
    );

    if (aboutSection) {
      observer.observe(aboutSection);
    }
  });
</script>
<script>
 var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  centeredSlides: true,
  loop: false, // ✅ DESACTIVADO
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  speed: 800,
  grabCursor: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  }
});

</script>
 
<style>
  .mySwiper {
    padding: 30px 0;
  }

  .mySwiper .swiper-slide {
    transform: scale(0.8);
    opacity: 0.5;
    transition: transform 0.5s ease, opacity 0.5s ease;
  }

  .mySwiper .swiper-slide.swiper-slide-active {
    transform: scale(1);
    opacity: 1;
    z-index: 10;
  }
    .mySwiper .swiper-slide img {
    width: 20% !important; /* Aquí defines que se vea más pequeña */
    margin: 0 auto;
    display: block;
    border-radius: 10px;
    transition: transform 0.5s ease;
  }

</style>