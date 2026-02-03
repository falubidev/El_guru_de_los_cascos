<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>El Gurú de los Cascos</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/logos_new/logo_fondo_negro.png">
  <link rel="shortcut icon" type="image/png" href="assets/img/logos_new/logo_fondo_negro.png">
  <link rel="apple-touch-icon" href="assets/img/logos_new/logo_fondo_negro.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@300;400;600&family=Raleway:wght@300;400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Critical: Hide content until loader finishes -->
  <style>
    body:not(.loaded) > *:not(#loader):not(#scan-loader):not(#explosion-loader):not(script):not(style) {
      opacity: 0 !important;
      visibility: hidden !important;
    }
    body:not(.loaded) {
      background: #000 !important;
    }
  </style>
  <script>
    // Fallback: if no loader exists, mark body as loaded immediately
    document.addEventListener('DOMContentLoaded', function() {
      if (!document.getElementById('loader') && !document.getElementById('scan-loader') && !document.getElementById('explosion-loader')) {
        document.body.classList.add('loaded');
      }
    });
  </script>

  <!-- Main CSS - Compiled and Minified -->
  <link href="dist/css/styles.min.css" rel="stylesheet">

  <!-- Vendor JS Files (con defer) -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
  <script src="assets/vendor/php-email-form/validate.js" defer></script>
  <script src="assets/vendor/aos/aos.js" defer></script>
  <script src="assets/vendor/typed.js/typed.umd.js" defer></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js" defer></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js" defer></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js" defer></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js" defer></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js" defer></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js" defer></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js" defer></script>

  <!-- reCAPTCHA v2 -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
