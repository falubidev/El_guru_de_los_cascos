<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
</head>
<body class="index-page">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">

<!-- Loader funcional con logo -->
<div id="loader" style="position: fixed; inset: 0; background: #000; z-index: 99999; display: flex; align-items: center; justify-content: center;">
  <img src="assets/img/gurulogo.png" alt="Cargando..." style="width: 100px; animation: pulse 1.5s infinite;">
</div>

<?php include 'includes/navbar.php'; ?>

<main class="main" style="background-color: #030303;">

<section class="section text-white text-center py-5 seccion-fondo" id="catalogo-cascos">
    <div class="container">
      <div class="mb-5 text-shadow">
  <h2 class="catalogo-titulo">¿Qué tipo de casco estás buscando?</h2>
  <p class="catalogo-subtitulo">Descubre nuestras categorías y encuentra el ideal para ti.</p>
</div>

      <div class="categorias-grid">
          <a href="cascos_producto.php?tipo=aventura" class="categoria">
            <img src="assets/img/catalogo/submenu/cascos/aventurasinfondo.png" alt="Cascos Aventura">
            <div class="overlay">Cascos de Aventura</div>
        </a>

<a href="cascos_producto.php?tipo=abatible" class="categoria">
            <img src="assets/img/catalogo/submenu/cascos/abatiblesinfondo.png" alt="Cascos Abatibles">
            <div class="overlay">Cascos Abatibles</div>
        </a>
        <a href="cascos_producto.php?tipo=modular" class="categoria">
            <img src="assets/img/catalogo/submenu/cascos/modularsinfondo1.png" alt="Cascos Modulares">
            <div class="overlay">Cascos Modulares</div>
        </a>
         <a href="cascos_producto.php?tipo=integral" class="categoria">
            <img src="assets/img/catalogo/submenu/cascos/integralsinfondo.png" alt="Cascos Integrales">
            <div class="overlay">Cascos Integrales</div>
        </a>
        <a href="cascos_producto.php?tipo=jet" class="categoria">
            <img src="assets/img/catalogo/submenu/cascos/modularsinfondo2.png" alt="Cascos Jet">
            <div class="overlay">Cascos Jet</div>
        </a>
        <a href="cascos_producto.php?tipo=cross" class="categoria">
            <img src="assets/img/catalogo/submenu/cascos/crossinfondo.png" alt="Cascos Cross">
            <div class="overlay">Cascos Cross / Enduro</div>
        </a>

        </div>

    </div>

  </section>

</main>

<?php include 'includes/footer.php'; ?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader (vacío porque el loader real está al inicio) -->
<div id="preloader"></div>

<!-- JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/clean-url.js"></script>

<!-- Ocultar loader al cargar -->
<script>
window.addEventListener('load', function () {
  const loader = document.getElementById('loader');
  if (loader) {
    setTimeout(() => {
      loader.classList.add('explode');
      setTimeout(() => {
        loader.style.display = "none";
      }, 600); // Tiempo del efecto explosion
    }, 1500); // Esperar 4 segundos antes de desaparecer
  }
});
</script>


<!-- Estilos -->
<style>
    .text-shadow {
  text-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14;
}

.catalogo-titulo {
  font-size: 2.0rem;
  font-weight: 900;
  color: #e6ffe2;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 1rem;
  animation: glowTitle 2s ease-in-out infinite alternate;
}

.catalogo-subtitulo {
  font-size: 1.2rem;
  color: #ffffffbd;
  max-width: 600px;
  margin: 0 auto;
  font-style: italic;
  animation: fadeIn 2s ease forwards;
}
.overlay:hover {
  letter-spacing: 1.5px;
}
.categorias-grid {
  gap: 20px;
  padding: 10px;
}

@keyframes glowTitle {
  from {
    text-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14;
  }
  to {
    text-shadow: 0 0 20px #39ff14, 0 0 40px #39ff14;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

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


    .seccion-fondo {
  position: relative;
  background-image: url('assets/img/catalogo/fondo.jpg'); /* cambia el path según tu imagen */
  background-size: cover;
  background-position: center;
  z-index: 1;
}

.seccion-fondo::before {
  content: "";
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.87); /* tono gris oscuro encima */
  z-index: 2;
}

.seccion-fondo > .container {
  position: relative;
  z-index: 3;
}

.categorias-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0;
}

@media (max-width: 768px) {
  .categorias-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 480px) {
  .categorias-grid {
    grid-template-columns: 1fr;
  }
}


.categoria {
  position: relative;
  overflow: hidden;
}

.categoria img {
  width: 100%;
  height: auto;
  object-fit: contain;
  display: block;
  aspect-ratio: 4 / 5;
  object-position: center;
  transition: transform 0.4s ease, filter 0.4s ease;
  filter: drop-shadow(0 0 6pxrgb(0, 0, 0)); /* Silueta siempre con brillo sutil */
}



.categoria:hover img {
  transform: scale(1.01);
  filter: drop-shadow(0 0 15px #39ff14) brightness(1.2);
}
.categoria img {
  filter: drop-shadow(0 0 6px rgb(52, 151, 14)) drop-shadow(0 4px 12px rgba(0, 0, 0, 0.5));
}

body {
  background: radial-gradient(ellipse at center, #0c0c0c 0%, #000000 100%);
  background-attachment: fixed;
}
.navbar {
  border-bottom: 2px solid #39ff14;
  box-shadow: 0 0 15px #39ff14;
}
/* .overlay::before {
  content: "";
  display: block;
  width: 40px;
  height: 40px;
  background-image: url('assets/img/iconos/aliencasco.png');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  margin: 0 auto 8px;
} */


body {
  font-family: 'Orbitron', sans-serif;
}

.categoria:hover img {
  animation: glowGreen 1s infinite alternate;
}

@keyframes glowGreen {
  from { filter: drop-shadow(0 0 5px #39ff14) brightness(1); }
  to { filter: drop-shadow(0 0 15px #39ff14) brightness(1.3); }
}
.categoria {
  transition: transform 0.6s ease, box-shadow 0.6s ease;
}

/* .categoria:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 25px rgba(57, 255, 20, 0.3);
} */
.categoria {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s ease forwards;
}

.categoria:nth-child(1) { animation-delay: 0.2s; }
.categoria:nth-child(2) { animation-delay: 0.4s; }
.categoria:nth-child(3) { animation-delay: 0.6s; }
.categoria:nth-child(4) { animation-delay: 0.8s; }
.categoria:nth-child(5) { animation-delay: 1s; }
.categoria:nth-child(6) { animation-delay: 1.2s; }

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.overlay {
  position: absolute;
  bottom: 0;
  width: 100%;
  padding: 15px;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.75), transparent);
  color: #39ff14;
  text-align: center;
  font-weight: bold;
  font-size: 1.1rem;
  transition: background 0.3s ease;
}

.categoria:hover .overlay {
  background: rgba(0, 0, 0, 0.9);
}

  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.1); opacity: 1; }
  }

  .card-img-top {
    height: 250px;
    object-fit: cover;
  }

  .card {
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
  }
  /* Fondo con estrellas animadas */
  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: url('https://www.transparenttextures.com/patterns/stardust.png'); /* puedes cambiar a un fondo de estrellas personalizado */
    opacity: 0.06;
    z-index: 0;
    animation: moveStars 60s linear infinite;
    pointer-events: none;
  }

  @keyframes moveStars {
    0% { background-position: 0 0; }
    100% { background-position: 1000px 1000px; }
  }

</style>

</body>
</html>
