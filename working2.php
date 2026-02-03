<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Estamos trabajando</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Icons y Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Orbitron', sans-serif;
    }

    .dark-background {
      background-image: url('assets/img/fondo.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      min-height: 100vh;
      overflow: hidden;
    }

    .dark-background::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 1;
    }

    .content {
      position: relative;
      z-index: 2;
      color: white;
      text-align: center;
    }

    .social-link {
      color: #39ff14;
      transition: transform 0.2s ease;
    }

    .social-link:hover {
      transform: scale(1.1);
      color: #fff;
    }

    .img-fluid {
      max-height: 300px;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>

<section class="dark-background d-flex align-items-center">
  <div class="container py-5 content">
    <div class="row align-items-center justify-content-center">
      
      <!-- Imagen -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="assets/img/trabajando.png" alt="Trabajando en el PC" class="img-fluid">
      </div> 
      
      <!-- Texto + redes -->
      <div class="col-lg-6">
        <h2 class="mb-4">Ey parcero</h2>
        <p class="fs-5">Estamos trabajando en esto.<br>Por lo pronto te invito a disfrutar de mi contenido en redes</p>
        <div class="social-icons mt-4 d-flex justify-content-center gap-4">
          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank" class="social-link">
            <i class="bi bi-youtube" style="font-size: 2rem;"></i>
          </a>
          <a href="https://www.instagram.com/elgurudeloscascos/" target="_blank" class="social-link">
            <i class="bi bi-instagram" style="font-size: 2rem;"></i>
          </a>
          <a href="https://www.tiktok.com/@elgurudeloscascos" target="_blank" class="social-link">
            <i class="bi bi-tiktok" style="font-size: 2rem;"></i>
          </a>
        </div>
      </div>

        <div class="mt-5">
        <a href="index.php" class="btn btn-outline-light px-4 py-2" style="    border-color: #25a00e;
            color: #ffffff;
            font-weight: bold;
            background: #25a00e;">
            <i class="bi bi-arrow-left-circle me-2"></i> Volver al inicio
        </a>
        </div>

    </div>
  </div>
</section>

</body>
</html>
