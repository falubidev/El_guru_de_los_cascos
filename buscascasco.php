<style>
  .swiper-slide img {
  transition: transform 0.3s ease;
}
.swiper-slide img:hover {
  transform: scale(1.1);
}
#buscascasco {
  position: relative;
}

#buscascasco .form-control {
  background-color: rgba(132, 228, 97, 0.08);
  border: 1px solid rgba(255,255,255,0.3);
  color: white;
}
#buscascasco select.form-control {
  background-color: rgba(132, 228, 97, 0.1);
  color: #d4ffd0;
  border: 1px solid rgba(132, 228, 97, 0.3);
}

#buscascasco select.form-control option {
  background-color: #0f1c0f; /* fondo oscuro */
  color: #80ff80; /* verde alienígena brillante */
}

#buscascasco .form-control::placeholder {
  color: #ccc;
}

#buscascasco .btn-success {
  background-color: #28a745;
  border: none;
  transition: all 0.3s ease-in-out;
}

#buscascasco .btn-success:hover {
  transform: scale(1.05);
  box-shadow: 0 0 12px rgba(72, 239, 125, 0.6);
}

#buscascasco .container {
  background-color: rgba(0, 0, 0, 0.5);
  padding: 40px;
  border-radius: 15px;
  backdrop-filter: blur(4px);
  box-shadow: 0 0 20px rgba(0, 255, 0, 0.6), 0 0 40px rgba(0, 255, 128, 0.3), 0 0 80px rgba(0, 255, 64, 0.2); /* 💚 Glow alienígena */
}
.carousel-3d {
  perspective: 1000px;
  width: 300px;
  height: 200px;
  margin: 0 100px 0;
  position: relative;
  overflow: visible;
}

.carousel-3d-inner {
  width: 100%;
  height: 100%;
  position: absolute;
  transform-style: preserve-3d;
  animation: rotate360 20s infinite linear;
}

.carousel-3d-inner img {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 70px;
  height: 70px;
  object-fit: contain;
  transform-origin: center center -150px;
transform: translateX(-50%) translateY(-50%);
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(255,255,255,0.4);
}



.carousel-3d-inner img:nth-child(1) { transform: rotateY(0deg) translateZ(150px); }
.carousel-3d-inner img:nth-child(2) { transform: rotateY(90deg) translateZ(150px); }
.carousel-3d-inner img:nth-child(3) { transform: rotateY(180deg) translateZ(150px); }
.carousel-3d-inner img:nth-child(4) { transform: rotateY(270deg) translateZ(150px); }

@keyframes rotate360 {
  from { transform: rotateY(0deg); }
  to { transform: rotateY(360deg); }
}
</style>
<!DOCTYPE html>
<section id="buscascasco" class="section text-white position-relative min-vh-100 d-flex align-items-center" style="background-image: url('assets/img/fondo-casco.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; overflow: hidden;">

  <!-- Overlay oscuro -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.8); z-index: 1;"></div>

  <!-- Contenido principal -->
  <div class="container position-relative z-2">
  <div class="carousel-3d mx-auto d-block mb-4 mt-n4">

    <div class="carousel-3d-inner" id="carousel3d">
      <img src="assets/img/hjc.png" alt="HJC" />
      <img src="assets/img/nexx.jpg" alt="NEXX" />
      <img src="assets/img/nolann.png" alt="NOLAN" />
      <img src="assets/img/agv.png" alt="AGV" />
      <img src="assets/img/gurulogo.png" alt="logoguru" />
      
    </div>
  </div>


    <h2 class="mb-4 text-white text-center fw-bold">¿Buscas un casco?</h2>

    <p class="lead text-center mb-5">Te ayudo a elegir el ideal para ti: seguro, con estilo y al mejor precio.</p>

    <form id="formCasco" onsubmit="return enviarYGuardar(event)">
      <div class="row justify-content-center">

        <div class="col-md-6 mb-3">
          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col-md-6 mb-3">
          <input type="tel" name="telefono" id="telefono" class="form-control"
                placeholder="Teléfono" required
                pattern="[0-9]+" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        </div>


        <div class="col-md-6 mb-3">
          <select name="marca" id="marca" class="form-control" required>
            <option value="">Selecciona la marca</option>
            <option value="HJC">HJC</option>
            <option value="NEXX">NEXX</option>
            <option value="NOLAN">NOLAN</option>
            <option value="AGV">AGV</option>
            <option value="LS2">LS2</option>
            <option value="SHAFTPRO">SHAFT PRO</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Referencia o modelo" required>
        </div>

        <div class="col-12 mb-3">
          <textarea name="observaciones" id="observaciones" rows="3" class="form-control" placeholder="Color, Talla, Observaciones o dudas..."></textarea>
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="btn btn-success px-5 py-2 mt-3"> Pregúntame por el tuyo</button>
        </div>

      </div>
    </form>
  </div>

</section>

<div class="modal fade" id="modalLimite" tabindex="-1" aria-labelledby="modalLimiteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-warning text-dark border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLimiteLabel">¡Ey parcero! </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Has hecho muchas solicitudes desde esta IP. ¡Ten paciencia y déjame ayudarte bien! 🛠️
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalBloqueo" tabindex="-1" aria-labelledby="modalBloqueoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-danger text-white border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBloqueoLabel">Demasiados intentos 🚫</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        Es mucho por hoy... tu solicitud ha sido bloqueada por 24 horas.<br>Vuelve mañana con toda la energía 🚀
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalConfirmacionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-white border-0 shadow" style="background-color: #000; box-shadow: 0 0 20px rgba(0,255,0,0.4);">
      
      <div class="modal-header border-0">
        <h5 class="modal-title text-success fw-bold" id="modalConfirmacionLabel">
          ✅ ¡Gracias por tu solicitud!
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body text-center">
        <p class="mb-3" style="color: #80ff80;">Pronto te contactaré. </p>
        <img src="assets/img/gurulogo.png" alt="Logo Gurú" style="height: 80px; " />
      </div>

    </div>
  </div>
</div>


<script>
function enviarYGuardar(event) {
  event.preventDefault();

  const nombre = document.getElementById('nombre').value;
  const telefono = document.getElementById('telefono').value;
  const marca = document.getElementById('marca').value;
  const referencia = document.getElementById('referencia').value;
  const observaciones = document.getElementById('observaciones').value;

  fetch('verificar_ip.php')
    .then(response => response.json())
    .then(data => {
      if (data.count >= data.limitBloqueo) {
        const modalBloqueo = new bootstrap.Modal(document.getElementById('modalBloqueo'));
        modalBloqueo.show();
        throw new Error("Bloqueado por IP"); // 🚫 Detiene flujo sin pasar al siguiente .then
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
        alert("❌ Error al guardar: " + error.message);
      }
    });

  return false;
}

</script>
<script>
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 2,
  spaceBetween: 10,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  }
});
</script>

<!-- Bootstrap CSS (si no lo tienes aún) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>





