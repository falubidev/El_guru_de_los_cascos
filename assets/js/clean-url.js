window.addEventListener('load', function () {
  var url = new URL(window.location.href);

  if (url.pathname.endsWith('.php')) {
    url.pathname = url.pathname.replace(/\.php$/, '');
    window.history.replaceState({}, document.title, url.pathname + url.search + url.hash);
  }
});
