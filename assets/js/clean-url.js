window.addEventListener('load', function () {
  const url = new URL(window.location.href);

  // 1. Ocultar .php si está en la URL
  if (url.pathname.endsWith('.php')) {
    url.pathname = url.pathname.replace(/\.php$/, '');
  }

  // 2. Ocultar parámetros de tipo ?tipo=&marca=...
  if (url.search.length > 0) {
    url.search = ''; // limpia todos los parámetros
  }

  // 3. Aplicar el cambio visual sin recargar
  window.history.replaceState({}, document.title, url.pathname);
});
