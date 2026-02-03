<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require 'db.php';

$stmt = $pdo->query("SELECT * FROM formularios ORDER BY fecha DESC");
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$marcas_stmt = $pdo->query("SELECT id, nombre FROM tbl_marcas ORDER BY nombre ASC");
$marcas = $marcas_stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Admin - Formularios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">📋 Formularios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDashboard" aria-controls="navbarDashboard" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarDashboard">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../descargar_excel.php">📥 Descargar Excel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="crear_usuario.php">➕ Crear Usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recuperar.php">🔐 Cambiar Contraseña</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">➕ Agregar Producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalEditarProducto">✏️ Editar Producto</a>
        </li>

      </ul>
      <span class="navbar-text me-3">
        Admin activo
      </span>
      <a href="#" class="btn btn-danger btn-sm" onclick="confirmarLogout()">Cerrar sesión</a>

    </div>
  </div>
</nav>
<?php if (isset($_GET['ok'])): ?>
<!-- Modal de éxito -->
<div class="modal fade" id="modalExito" tabindex="-1" aria-labelledby="modalExitoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-success text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExitoLabel">✅ ¡Éxito!</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        El producto fue guardado correctamente.
      </div>
    </div>
  </div>
</div>

<?php endif; ?>

<div class="container">
  
    <?php if (count($datos) > 0): ?>
      <div class="mb-3">
  <label for="filtroEstado" class="form-label">Filtrar por estado:</label>
  <select id="filtroEstado" class="form-select w-auto d-inline-block">
    <option value="">Todos</option>
    <option value="PENDIENTE">Pendiente</option>
    <option value="RESUELTO">Resuelto</option>
    <option value="CANCELADO">Cancelado</option>
  </select>
  
</div>

      <div class="table-responsive">
        <table id="tablaFormularios" class="table table-striped table-bordered">

          <thead class="table-dark">
            <tr>
              <th>Fecha</th>
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Marca</th>
              <th>Referencia</th>
              <th>Observaciones</th>
              <th>IP</th>
              <th>Estado</th>
              <th class="d-none">TextoEstado</th> 
              <th>Tipo</th>
            </tr>
          </thead>
          <tbody>
<?php foreach ($datos as $fila): ?>
  <?php
    $estado = $fila['estado'] ?? 'PENDIENTE'; // Valor por defecto
    $colorClase = match ($estado) {
      'CANCELADO' => 'bg-danger text-white',
      'RESUELTO' => 'bg-success text-white',
      'PENDIENTE' => 'bg-warning text-dark',
      default => ''
    };

  ?>
  <tr>
    <td><?= htmlspecialchars($fila['fecha']) ?></td>
    <td><?= htmlspecialchars($fila['nombre']) ?></td>
    <td><?= htmlspecialchars($fila['telefono']) ?></td>
    <td><?= htmlspecialchars($fila['marca']) ?></td>
    <td><?= htmlspecialchars($fila['referencia']) ?></td>
    <td>
    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalObservaciones" data-obs="<?= htmlspecialchars($fila['observaciones']) ?>">
      Ver
    </a>
  </td>
    <td><?= htmlspecialchars($fila['ip']) ?></td>
    <td>
      <form action="cambiar_estado.php" method="POST" class="d-flex">
        <input type="hidden" name="id" value="<?= $fila['id'] ?>">
        <select name="estado" class="form-select form-select-sm me-1 <?= $colorClase ?>" onchange="this.form.submit()">
          <option value="PENDIENTE" <?= $estado === 'PENDIENTE' ? 'selected' : '' ?>>PENDIENTE</option>
          <option value="RESUELTO" <?= $estado === 'RESUELTO' ? 'selected' : '' ?>>RESUELTO</option>
          <option value="CANCELADO" <?= $estado === 'CANCELADO' ? 'selected' : '' ?>>CANCELADO</option>
        </select>

      </form>
    </td>
    <td class="d-none"><?= $fila['estado'] ?></td>
      <td>
        <?php if (($fila['tipo'] ?? '') === 'compra'): ?>
          <span class="badge bg-success">COMPRA</span>
        <?php else: ?>
          <?= !empty($fila['tipo']) ? htmlspecialchars(strtoupper($fila['tipo'])) : '<span class="text-muted">N/A</span>' ?>
        <?php endif; ?>
      </td>

  </tr>
<?php endforeach; ?>

          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-info text-center">No hay formularios registrados todavía.</div>
    <?php endif; ?>
    
  </div>

  
  </div>
  <!-- Formulario para agregar casco -->
<!-- Modal Agregar Producto -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="subir_producto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="modalAgregarProductoLabel">➕ Agregar nuevo casco</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="linea_id" class="form-label">Línea</label>
              <select class="form-select" name="linea_id" id="linea_id" required>
                <option value="">Seleccione una línea</option>
                <option value="1">Casco</option>
                <option value="2">Textil</option>
                <option value="3">Repuesto</option>
                <option value="4">Accesorios</option>
                <option value="5">Merch</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="tipo_id" class="form-label">Tipo</label>
              <select class="form-select" name="tipo_id" id="tipo_id" required>
                <option value="">Seleccione un tipo</option>
                <!-- Se llenará dinámicamente con JS si deseas -->
                <option value="1">Integral</option>
                <option value="2">Abatible</option>
                <option value="3">Aventura</option>
                <option value="4">Modular</option>
                <option value="5">Abierto</option>
                <option value="6">Cross</option>
                <!-- etc... -->
              </select>
            </div>
            
            <div class="col-md-6">
              <label for="nombre" class="form-label">Referencia (Nombre)</label>
              <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="col-md-6">
              <label for="nombre_grafico" class="form-label">Nombre del gráfico (solo cascos)</label>
              <input type="text" class="form-control" name="nombre_grafico" id="nombre_grafico" required>
            </div>
            <div class="col-md-6">
              <label for="marca" class="form-label">Marca</label>
              <select class="form-select" name="marca" id="marca" required>
                <option value="">Seleccione una marca</option>
                <?php foreach ($marcas as $marca): ?>
                  <option value="<?= htmlspecialchars($marca['nombre']) ?>">
                    <?= htmlspecialchars($marca['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="grafico_id" class="form-label">Gráfico (solo cascos)</label>
              <select class="form-select" name="grafico_id" id="grafico_id">
                <option value="">-- Ninguno --</option>
                <option value="1">Lineal</option>
                <option value="2">Agresivo</option>
                <option value="3">Sólido</option>
                <option value="4">Edición limitada</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="acabado_id" class="form-label">Acabado (solo cascos)</label>
              <select class="form-select" name="acabado_id" id="acabado_id">
                <option value="">-- Ninguno --</option>
                <option value="1">Brillo</option>
                <option value="2">Mate</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label">Tallas disponibles </label><br>
              <?php
                // Cargar desde base de datos
                $tallas_stmt = $pdo->query("SELECT id, nombre FROM tbl_tallas ORDER BY id ASC");
                $tallas = $tallas_stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tallas as $talla):
              ?>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="tallas[]" value="<?= $talla['id'] ?>" id="talla_<?= $talla['id'] ?>">
                  <label class="form-check-label" for="talla_<?= $talla['id'] ?>"><?= $talla['nombre'] ?></label>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="col-md-6">
              <label for="color" class="form-label">Color</label>
              <input type="text" class="form-control" name="color" id="color">
            </div>
            <div class="col-md-6">
              <label for="precio" class="form-label">Precio</label>
              <input type="number" step="0.01" class="form-control" name="precio" id="precio">
            </div>
            <div class="col-md-6">
              <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="estado" id="estado">
                <option value="">-- Sin estado --</option>
                <option value="activo">Disponible</option>
                <option value="inactivo">No disponible</option>
                <option value="proximo">Próximo</option>
              </select>
            </div>
            <div class="col-md-12">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>
            <div class="col-md-12">
              <label for="especificaciones_tecnicas" class="form-label">Especificaciones Técnicas</label>
              <textarea class="form-control" name="especificaciones_tecnicas" id="especificaciones_tecnicas" rows="4" placeholder="Coraza, ventilación, visor, cierre, etc."></textarea>
            </div>
            <div class="col-md-12">
              <label for="imagen" class="form-label">Imagen del casco (principal)</label>
              <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
            </div>
            <div class="col-md-12">
              <label for="galeria" class="form-label">Galería de fotos (opcional, múltiples)</label>
              <input type="file" class="form-control" name="galeria[]" id="galeria" accept="image/*" multiple>
              <small class="text-muted">Puedes seleccionar varias imágenes a la vez</small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Subir producto</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Editar Producto -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby="modalEditarProductoLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalEditarProductoLabel">✏️ Editar producto existente</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <!-- Aquí irá el contenido dinámico: buscador de productos, catálogo con botón Editar -->
          <div class="row g-2 mb-3">
              <div class="col-md-4">
                <label for="filtroMarca" class="form-label">Marca:</label>
                <select id="filtroMarca" class="form-select">
                  <option value="">Todas</option>
                  <?php foreach ($marcas as $marca): ?>
                    <option value="<?= htmlspecialchars($marca['nombre']) ?>"><?= htmlspecialchars($marca['nombre']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-4">
                <label for="filtroTipo" class="form-label">Tipo:</label>
                <select id="filtroTipo" class="form-select">
                  <option value="">Todos</option>
                  <option value="Aventura">Aventura</option>
                  <option value="Abatible">Abatible</option>
                  <option value="Modular">Modular</option>
                  <option value="Integral">Integral</option>
                  <option value="Jet">Jet</option>
                  <option value="Cross">Cross</option>
                </select>
              </div>
              <div class="col-md-12" style="display:none">
  <label for="buscarProducto" class="form-label">Buscar por nombre o marca:</label>
  <input type="text" id="buscarProducto" class="form-control" placeholder="Buscar por texto libre...">
</div>

              <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-success w-100" id="btnBuscarProductos">🔍 Buscar</button>
              </div>
            </div>

          <div id="resultadosBusqueda" class="row g-3">
            <!-- Aquí se cargarán los resultados como catálogo -->
          </div>
          <div id="formularioEdicionProducto" class="d-none">
  <h5 class="text-primary">✏️ Editar Producto</h5>
  <form id="formEditarProductoInterno">
    <input type="hidden" name="id" id="edit_id">
    <div class="row g-2">
      <div class="col-md-6">
        <label class="form-label">Referencia</label>
        <input type="text" class="form-control" name="referencia" id="edit_referencia" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Marca</label>
        <input type="text" class="form-control" name="marca" id="edit_marca" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Tipo</label>
        <input type="text" class="form-control" name="tipo" id="edit_tipo">
      </div>
      <div class="col-md-6">
        <label class="form-label">Color</label>
        <input type="text" class="form-control" name="color" id="edit_color">
      </div>
      <div class="col-md-12">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="edit_descripcion"></textarea>
      </div>
      <div class="col-md-12">
        <label class="form-label">Especificaciones Técnicas</label>
        <textarea class="form-control" name="especificaciones_tecnicas" id="edit_especificaciones_tecnicas" rows="4" placeholder="Coraza, ventilación, visor, cierre, etc."></textarea>
      </div>
    </div>
      <div class="mb-3">
      <label class="form-label">Imagen actual:</label><br>
      <img id="edit_imagen_actual" src="" style="max-height: 150px;">
      </div>
      <div class="mb-3">
        <label for="edit_nueva_imagen" class="form-label">Nueva imagen principal (opcional)</label>
        <input type="file" class="form-control" name="nueva_imagen" id="edit_nueva_imagen" accept="image/*">
      </div>
      <div class="mb-3">
        <label class="form-label">Galería actual:</label>
        <div id="edit_galeria_actual" class="d-flex flex-wrap gap-2 mb-2"></div>
        <label for="edit_nueva_galeria" class="form-label">Agregar más fotos a la galería</label>
        <input type="file" class="form-control" name="nueva_galeria[]" id="edit_nueva_galeria" accept="image/*" multiple>
      </div>
    <div class="mt-3 d-flex justify-content-between">
      <button type="button" class="btn btn-secondary" onclick="mostrarCatalogo()">⬅ Volver</button>
      <div>
        <button type="button" class="btn btn-danger me-2" onclick="eliminarProducto()">🗑 Eliminar</button>
        <button type="submit" class="btn btn-success">💾 Guardar</button>
      </div>
    </div>
  </form>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    
    </div>
  </div>
</div>


  <!-- Modal de Observaciones -->
<div class="modal fade" id="modalObservaciones" tabindex="-1" aria-labelledby="modalObsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="modalObsLabel">📝 Observaciones completas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body" id="contenidoObservaciones" style="white-space: pre-wrap;"></div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/dashboard.js"></script>
<script>
window.addEventListener('load', () => {
  const url = new URL(window.location.href);
  if (url.searchParams.get("ok") === "1") {
    const modal = new bootstrap.Modal(document.getElementById('modalExito'));
    modal.show();

    // Eliminar ?ok=1 de la URL después de mostrar el modal
    setTimeout(() => {
      url.searchParams.delete("ok");
      window.history.replaceState({}, document.title, url.pathname);
    }, 1000); // espera 1 segundo para no interrumpir la animación
  }
});

</script>
<script>
  function confirmarLogout() {
    if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
      window.location.href = "logout.php";
    }
  }
</script>

</body>
</html>
