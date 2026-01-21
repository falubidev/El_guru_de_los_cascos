<?php include 'includes/head.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/loader.php'; ?>
<main class="main bg-dark text-white">
  <section class="py-5 text-center">
    <div class="container">
      <h2 class="mb-3">Accesorios para Motociclistas</h2>
      <p class="lead text-secondary">Encuentra los mejores complementos para tu seguridad y comodidad</p>

      <!-- Filtros -->
      <!-- <div class="mb-4">
        <button class="btn btn-outline-light filter-btn me-2" data-filter="all">Todos</button>
        <button class="btn btn-outline-light filter-btn me-2" data-filter="chaqueta">Chaqueta Reflectiva</button>
        <button class="btn btn-outline-light filter-btn me-2" data-filter="porta">Porta Cascos</button>
        <button class="btn btn-outline-light filter-btn" data-filter="buf">Buffs</button>
      </div> -->

      <!-- Accesorios -->
<div class="row g-4 justify-content-center" id="accesorios-grid">
  <div class="col-md-4 accesorio-item" data-category="chaqueta">
    <a href="chaquetas.php" class="text-decoration-none text-white">
      <div class="position-relative overflow-hidden rounded">
        <img src="assets/img/accesorios/test.png" alt="Chaqueta Reflectiva" class="img-fluid">
        <div class="overlay-text">Chaqueta Reflectiva</div>
      </div>
    </a>
  </div>

  <div class="col-md-4 accesorio-item" data-category="porta">
    <a href="portacascos.php" class="text-decoration-none text-white">
      <div class="position-relative overflow-hidden rounded">
        <img src="assets/img/accesorios/test.png" alt="Porta Cascos" class="img-fluid">
        <div class="overlay-text">Porta Cascos</div>
      </div>
    </a>
  </div>

  <div class="col-md-4 accesorio-item" data-category="buf">
    <a href="buff.php" class="text-decoration-none text-white">
      <div class="position-relative overflow-hidden rounded">
        <img src="assets/img/accesorios/test.png" alt="Buff" class="img-fluid">
        <div class="overlay-text">Buff</div>
      </div>
    </a>
  </div>
</div>

    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>

<!-- Script de filtros -->
<script>
  const buttons = document.querySelectorAll('.filter-btn');
  const items = document.querySelectorAll('.accesorio-item');

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.getAttribute('data-filter');
      items.forEach(item => {
        item.style.display = (filter === 'all' || item.dataset.category === filter) ? 'block' : 'none';
      });
    });
  });
</script>

<!-- Estilos -->
<style>
    #accesorios-grid .img-fluid {
  width: 75%;
  margin: 0 auto;
  display: block;
  transition: transform 0.3s ease;
}

#accesorios-grid .img-fluid:hover {
  transform: scale(1.05);
}

  .overlay-text {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 12px;
    background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
    color: #39ff14;
    font-weight: bold;
    text-align: center;
  }
</style>
