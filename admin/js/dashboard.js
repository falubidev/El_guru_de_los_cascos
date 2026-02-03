$(document).ready(function () {
  const tabla = $('#tablaFormularios').DataTable({
    responsive: true,
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    },
    columnDefs: [
      { targets: 8, visible: false } // columna oculta para filtro
    ]
  });

  $('#filtroEstado').on('change', function () {
    const valor = $(this).val();
    tabla.column(8).search(valor).draw();
  });

  // Modal de observaciones
  const contenido = document.getElementById('contenidoObservaciones');
  const modal = new bootstrap.Modal(document.getElementById('modalObservaciones'));

  document.querySelectorAll('[data-bs-target="#modalObservaciones"]').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const texto = this.getAttribute('data-obs') || 'Sin observaciones.';
      contenido.textContent = texto;
      modal.show();
    });
  });
});
$('#modalEditarProducto').on('shown.bs.modal', function () {
  $.getJSON('get_productos_catalogo.php', function (productos) {
    const contenedor = $('#catalogoProductos').empty();

    productos.forEach(producto => {
      const card = `
        <div class="col">
          <div class="card h-100 text-dark" data-id="${producto.id}" style="cursor:pointer;">
            <img src="uploads/${producto.imagen}" class="card-img-top" style="max-height:150px; object-fit:contain;">
            <div class="card-body">
              <h5 class="card-title">${producto.nombre}</h5>
              <p class="card-text"><strong>Marca:</strong> ${producto.marca}<br><strong>Tipo:</strong> ${producto.tipo}</p>
            </div>
          </div>
        </div>
      `;
      contenedor.append(card);
    });

    // Evento al hacer clic en una tarjeta
    $('#catalogoProductos .card').click(function () {
      const id = $(this).data('id');
      cargarProductoEnFormulario(id);
    });
  });
});

function cargarProductoEnFormulario(id) {
  $.getJSON('obtener_productos.php', function (productos) {
    const producto = productos.find(p => p.id == id);
    if (!producto) return;

    $('#catalogoProductos').hide();
    $('#formEdicionProducto').show();

    $('#edit_id').val(producto.id);
    $('#edit_referencia').val(producto.nombre);
    $('#edit_marca').val(producto.marca);
    $('#edit_tipo').val(producto.tipo);
    $('#edit_color').val(producto.color);
    $('#edit_descripcion').val(producto.descripcion);
    $('#edit_imagen_actual').attr('src', 'uploads/' + producto.imagen);
  });
}


let productosOriginales = [];

document.getElementById('btnBuscarProductos').addEventListener('click', function () {
  fetch('get_productos_catalogo.php')
    .then(res => res.json())
    .then(productos => {
      productosOriginales = productos;

      const marca = document.getElementById('filtroMarca').value.toLowerCase();
      const tipo = document.getElementById('filtroTipo').value.toLowerCase();
      const texto = document.getElementById('buscarProducto').value.toLowerCase();

      const filtrados = productosOriginales.filter(p => {
        const coincideMarca = !marca || (p.marca && p.marca.toLowerCase() === marca);
        const coincideTipo = !tipo || (p.tipo && p.tipo.toLowerCase() === tipo);
        const coincideTexto = !texto || (
          (p.referencia && p.referencia.toLowerCase().includes(texto)) ||
          (p.marca && p.marca.toLowerCase().includes(texto))
        );
        return coincideMarca && coincideTipo && coincideTexto;
      });

      renderizarCatalogo(filtrados);
    });
});


let productosPorPagina = 6;
let paginaActual = 1;

function renderizarCatalogo(productos) {
  const contenedor = document.getElementById('resultadosBusqueda');
  contenedor.innerHTML = '';

  if (productos.length === 0) {
    contenedor.innerHTML = '<div class="col-12 text-center text-muted">No se encontraron productos.</div>';
    return;
  }

  const totalPaginas = Math.ceil(productos.length / productosPorPagina);
  const inicio = (paginaActual - 1) * productosPorPagina;
  const fin = inicio + productosPorPagina;
  const productosPagina = productos.slice(inicio, fin);

  productosPagina.forEach(p => {
    const card = document.createElement('div');
    card.className = 'col-md-4';
    card.innerHTML = `
      <div class="card h-100 shadow-sm">
        <img src="uploads/productos/${p.imagen}" class="card-img-top" alt="${p.referencia}" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">${p.referencia}</h5>
          <p class="card-text">
            <strong>Marca:</strong> ${p.marca}<br>
            <strong>Tipo:</strong> ${p.tipo}<br>
            <strong>Color:</strong> ${p.color || '-'}<br>
            <strong>Estado:</strong> ${p.estado}<br>
          </p>
          <button class="btn btn-primary btn-sm w-100" onclick="editarProducto(${p.id})">Editar</button>
        </div>
      </div>
    `;
    contenedor.appendChild(card);
  });

  const paginacion = document.createElement('div');
  paginacion.className = 'col-12 text-center mt-3';
  for (let i = 1; i <= totalPaginas; i++) {
    paginacion.innerHTML += `<button class="btn btn-sm ${i === paginaActual ? 'btn-primary' : 'btn-outline-primary'} me-1" onclick="cambiarPagina(${i})">${i}</button>`;
  }
  contenedor.appendChild(paginacion);
}

function cambiarPagina(nuevaPagina) {
  paginaActual = nuevaPagina;
  renderizarCatalogo(productosOriginales); // Usa el array ya existente
}

function editarProducto(id) {
  const producto = productosOriginales.find(p => p.id == id);
  if (!producto) return;

  document.getElementById('resultadosBusqueda').classList.add('d-none');
  document.getElementById('formularioEdicionProducto').classList.remove('d-none');

  document.getElementById('edit_id').value = producto.id;
  document.getElementById('edit_referencia').value = producto.referencia;
  document.getElementById('edit_marca').value = producto.marca;
  document.getElementById('edit_tipo').value = producto.tipo;
  document.getElementById('edit_color').value = producto.color;
  document.getElementById('edit_descripcion').value = producto.descripcion;
  document.getElementById('edit_especificaciones_tecnicas').value = producto.especificaciones_tecnicas || '';

  cargarGaleria(producto.id);
}

function mostrarCatalogo() {
  document.getElementById('formularioEdicionProducto').classList.add('d-none');
  document.getElementById('resultadosBusqueda').classList.remove('d-none');
}
document.getElementById('formEditarProductoInterno').addEventListener('submit', function(e) {
  e.preventDefault();

  const datos = new FormData();
  datos.append('id', document.getElementById('edit_id').value);
  datos.append('referencia', document.getElementById('edit_referencia').value);
  datos.append('marca', document.getElementById('edit_marca').value);
  datos.append('tipo', document.getElementById('edit_tipo').value);
  datos.append('color', document.getElementById('edit_color').value);
  datos.append('descripcion', document.getElementById('edit_descripcion').value);
  datos.append('especificaciones_tecnicas', document.getElementById('edit_especificaciones_tecnicas').value);

  fetch('editar_producto.php', {
    method: 'POST',
    body: datos
  })
  .then(r => r.text())
  .then(resp => {
    const inputGaleria = document.getElementById('edit_nueva_galeria');
    if (inputGaleria && inputGaleria.files.length > 0) {
      const galeriaData = new FormData();
      galeriaData.append('producto_id', document.getElementById('edit_id').value);
      for (let i = 0; i < inputGaleria.files.length; i++) {
        galeriaData.append('galeria[]', inputGaleria.files[i]);
      }
      return fetch('subir_galeria.php', {
        method: 'POST',
        body: galeriaData
      }).then(r => r.json());
    }
  })
  .then(() => {
    alert('Producto actualizado');
    mostrarCatalogo();
    document.getElementById('btnBuscarProductos').click();
  });
});
function eliminarProducto() {
  const id = document.getElementById('edit_id').value;
  if (!confirm('¿Estás seguro de eliminar este producto?')) return;

  fetch('eliminar_producto.php?id=' + id)
    .then(r => r.text())
    .then(resp => {
      alert('Producto eliminado');
      mostrarCatalogo();
      document.getElementById('btnBuscarProductos').click();
    });
}

function cargarGaleria(productoId) {
  const contenedor = document.getElementById('edit_galeria_actual');
  contenedor.innerHTML = '<span class="text-muted">Cargando galería...</span>';

  fetch('get_galeria.php?producto_id=' + productoId)
    .then(r => r.json())
    .then(imagenes => {
      contenedor.innerHTML = '';
      if (imagenes.length === 0) {
        contenedor.innerHTML = '<span class="text-muted">Sin imágenes de galería</span>';
        return;
      }
      imagenes.forEach(img => {
        const div = document.createElement('div');
        div.className = 'position-relative';
        div.style.cssText = 'width:80px; height:80px;';
        div.innerHTML = `
          <img src="uploads/productos/${img.imagen}" style="width:100%; height:100%; object-fit:cover; border-radius:6px; border:1px solid #ccc;">
          <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" style="padding:0 5px; font-size:12px; line-height:1.4;" onclick="eliminarImagenGaleria(${img.id}, this)">&times;</button>
        `;
        contenedor.appendChild(div);
      });
    });
}

function eliminarImagenGaleria(id, btn) {
  if (!confirm('¿Eliminar esta imagen de la galería?')) return;

  const datos = new FormData();
  datos.append('id', id);

  fetch('eliminar_galeria.php', {
    method: 'POST',
    body: datos
  })
  .then(r => r.text())
  .then(resp => {
    if (resp.trim() === 'ok') {
      btn.closest('.position-relative').remove();
      const contenedor = document.getElementById('edit_galeria_actual');
      if (contenedor.children.length === 0) {
        contenedor.innerHTML = '<span class="text-muted">Sin imágenes de galería</span>';
      }
    } else {
      alert('Error al eliminar imagen');
    }
  });
}
