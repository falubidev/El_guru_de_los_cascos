<!-- flotante.php -->
<style>
  @keyframes levitar {
    0% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0); }
  }

  #dudaBot {
    z-index: 9999;
  }
</style>

<!-- Botón flotante -->
<div id="dudaBot" class="position-fixed end-0 bottom-0 me-3 mb-3 text-center">
  <img src="assets/img/gurulogo.png" alt="Duda" class="mb-1" style="height: 60px; animation: levitar 2s ease-in-out infinite;">
  <br>
  <button class="btn btn-outline-success btn-sm text-white" onclick="new bootstrap.Modal(document.getElementById('modalDudas')).show()" style="background-color: rgba(0,255,128,0.2); border-color: #80ff80;">
    ¿Tienes dudas? Pregúntame
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDudas" tabindex="-1" aria-labelledby="modalDudasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white border-success border-2">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="modalDudasLabel">💬 Envíame tu duda</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <textarea id="mensajeDuda" class="form-control mb-3" placeholder="Escribe tu duda aquí..." rows="4"></textarea>
        <button class="btn btn-success w-100" onclick="enviarDuda()">Enviar</button>
      </div>
    </div>
  </div>
</div>
<script>
function enviarDuda() {
  const mensaje = document.getElementById('mensajeDuda').value.trim();
  if (mensaje === '') {
    alert('Por favor escribe tu duda antes de enviar.');
    return;
  }

  const formData = new FormData();
  formData.append('mensaje', mensaje);

  fetch('guardar_formulario.php', {
    method: 'POST',
    body: formData
  })
  .then(resp => resp.ok ? resp.text() : Promise.reject('Error al enviar'))
  .then(() => {
    alert('✅ Tu duda ha sido enviada. ¡Gracias!');
    document.getElementById('mensajeDuda').value = '';
    bootstrap.Modal.getInstance(document.getElementById('modalDudas')).hide();
  })
  .catch(error => alert('❌ Hubo un error: ' + error));
}
</script>
<script>
  window.addEventListener('load', function () {
    const loader = document.getElementById('loader');
    const flotante = document.getElementById('flotante-wrapper');

    // Esperar a que termine la animación del loader
    if (loader && flotante) {
      setTimeout(() => {
        flotante.style.display = "block";
      }, 2100); // 1500 de delay + 600 de explosión
    }
  });
</script>