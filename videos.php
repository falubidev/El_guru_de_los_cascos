<?php
// ══════════════════════════════════════════════════════════════════════
//  CONFIGURACION  –  Edita estas listas para gestionar tus videos
// ══════════════════════════════════════════════════════════════════════

// YouTube: pega el ID del video (lo que va despues de ?v= en la URL)
//   Ejemplo: https://www.youtube.com/watch?v=ABC123  →  'ABC123'
$ytManualVideos = [
    ['id' => 'xMuPe_wXmRs', 'title' => 'SCORPION EXO 491 - Review completa'],
    ['id' => 'y7tLuS8axBQ', 'title' => 'TOP 5 cascos para AVENTURA 2025'],
    ['id' => 'RfAHTqv3EVo', 'title' => 'LS2 EXPLORER - El mejor casco trail?'],
    ['id' => 'CuGtnRSw_Oo', 'title' => 'SHARK RIDILL 2 - Review honesta'],
    ['id' => '6F-6CiIq4WI', 'title' => 'HJC i71 vs SHARK RIDILL 2'],
    ['id' => 'WDQH477evTk', 'title' => 'MT THUNDER 4 SV - Calidad precio'],
];

// Instagram: pega la URL completa del reel o post
$igPosts = [
    'https://www.instagram.com/reel/DFuRWWNJvQ0/',
    'https://www.instagram.com/reel/DFWBJPSJwwC/',
    'https://www.instagram.com/reel/DEz3H1mJjhi/',
    'https://www.instagram.com/reel/DEcWDMVpTaK/',
    'https://www.instagram.com/reel/DDjVz1JJ2BG/',
];

// ══════════════════════════════════════════════════════════════════════
//  YouTube RSS auto-fetch (intenta obtener los ultimos videos del canal)
// ══════════════════════════════════════════════════════════════════════
$ytChannelId = ''; // Pon tu channel ID aqui si lo sabes (empieza con UC...)
$cacheFile   = __DIR__ . '/cache/youtube_videos.json';
$cacheTime   = 7200; // 2 horas

$ytVideos = [];

// Intentar auto-fetch si hay channel ID
if (!empty($ytChannelId)) {
    // Revisar cache
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
        $ytVideos = json_decode(file_get_contents($cacheFile), true) ?: [];
    } else {
        $rssUrl = "https://www.youtube.com/feeds/videos.xml?channel_id=" . urlencode($ytChannelId);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $rssUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 8,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; RSS Reader)',
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $rssXml = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $rssXml) {
            $rss = @simplexml_load_string($rssXml);
            if ($rss) {
                $ns = $rss->getNamespaces(true);
                $count = 0;
                foreach ($rss->entry as $entry) {
                    if ($count >= 8) break;
                    $ytNs    = $ns['yt'] ?? 'http://www.youtube.com/xml/schemas/2015';
                    $videoId = (string) $entry->children($ytNs)->videoId;
                    $title   = (string) $entry->title;

                    if ($videoId) {
                        $ytVideos[] = ['id' => $videoId, 'title' => $title];
                        $count++;
                    }
                }
                @file_put_contents($cacheFile, json_encode($ytVideos));
            }
        }
    }
}

// Si el auto-fetch no dio resultados, usar la lista manual
if (empty($ytVideos)) {
    $ytVideos = $ytManualVideos;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include 'includes/head.php'; ?>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="videos-page">

  <!-- Loader -->
  <div id="scan-loader">
    <div class="scan-container">
      <div class="scan-logo">
        <img src="assets/img/logos_new/logo_fondo_negro.png" alt="El Guru de los Cascos">
        <div class="scan-line"></div>
      </div>
      <div class="scan-text">VIDEOS</div>
      <div class="scan-progress">
        <div class="scan-progress-bar"></div>
      </div>
    </div>
  </div>

  <!-- Floating Menu Toggle (Mobile) -->
  <button class="floating-menu-toggle" id="floatingMenuToggle" aria-label="Abrir menu">
    <i class="bi bi-list"></i>
    <span class="toggle-pulse"></span>
  </button>

  <!-- Sidebar Overlay -->
  <!-- Main Layout -->
  <div class="cascos-layout">

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar" id="sidebar">
      <div class="sidebar__header">
        <a href="index.php" class="sidebar__logo">
          <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Logo">
        </a>
      </div>

      <ul class="sidebar__menu">
        <li>
          <a href="index.php" class="sidebar__link">
            <i class="bi bi-house-door"></i>
            <span>Inicio</span>
          </a>
        </li>
        <li>
          <a href="cascos.php" class="sidebar__link">
            <i class="bi bi-grid-3x3-gap"></i>
            <span>Catalogo</span>
          </a>
        </li>
        <li>
          <a href="buscascasco.php" class="sidebar__link">
            <i class="bi bi-headset"></i>
            <span>Asesoria</span>
          </a>
        </li>
        <li>
          <a href="guru.php" class="sidebar__link">
            <i class="bi bi-person"></i>
            <span>Sobre Mi</span>
          </a>
        </li>
        <li>
          <a href="videos.php" class="sidebar__link sidebar__link--active">
            <i class="bi bi-play-circle"></i>
            <span>Videos</span>
          </a>
        </li>
      </ul>

      <div class="sidebar__footer">
        <div class="sidebar__social">
          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank"><i class="bi bi-youtube"></i></a>
          <a href="https://www.instagram.com/el_guru_de_los_cascos" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://www.tiktok.com/@el_guru_de_los_cascos" target="_blank"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>

      <button class="sidebar__close" id="sidebarClose">
        <i class="bi bi-x-lg"></i>
      </button>
    </nav>

    <!-- Main Content -->
    <main class="videos-main">

      <!-- Decorative Corners -->
      <div class="decor decor--top-left"></div>
      <div class="decor decor--top-right"></div>
      <div class="decor decor--bottom-left"></div>
      <div class="decor decor--bottom-right"></div>

      <!-- Header -->
      <header class="videos-header">
        <h1 class="videos-title">
          <span class="title-accent">Nuestros</span> Videos
        </h1>
        <p class="videos-subtitle">Reviews, unboxings y comparativas directo desde nuestras redes</p>

        <div class="tab-switcher">
          <button class="tab-btn tab-btn--active" data-tab="youtube">
            <i class="bi bi-youtube"></i>
            <span>YouTube</span>
          </button>
          <button class="tab-btn" data-tab="instagram">
            <i class="bi bi-instagram"></i>
            <span>Instagram</span>
          </button>
        </div>
      </header>

      <!-- Scrollable Content -->
      <div class="videos-content">

        <!-- ═══ YOUTUBE TAB ═══ -->
        <section class="video-tab video-tab--active" id="tab-youtube">

          <!-- Featured player -->
          <div class="featured-video">
            <div class="featured-video__player">
              <iframe id="featuredIframe"
                      src="https://www.youtube.com/embed/<?= htmlspecialchars($ytVideos[0]['id']) ?>?rel=0"
                      frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
            </div>
            <div class="featured-video__info">
              <h2 id="featuredTitle"><?= htmlspecialchars($ytVideos[0]['title']) ?></h2>
            </div>
          </div>

          <!-- Carousel de thumbnails -->
          <div class="thumb-carousel">
            <button class="thumb-nav thumb-nav--prev" id="ytPrev"><i class="bi bi-chevron-left"></i></button>
            <div class="thumb-track-wrapper">
              <div class="thumb-track" id="ytTrack">
                <?php foreach ($ytVideos as $i => $v): ?>
                <button class="video-thumb <?= $i === 0 ? 'video-thumb--active' : '' ?>"
                        data-video-id="<?= htmlspecialchars($v['id']) ?>"
                        data-title="<?= htmlspecialchars($v['title']) ?>">
                  <div class="video-thumb__img">
                    <img src="https://img.youtube.com/vi/<?= htmlspecialchars($v['id']) ?>/mqdefault.jpg"
                         alt="<?= htmlspecialchars($v['title']) ?>" loading="lazy">
                    <div class="video-thumb__play"><i class="bi bi-play-fill"></i></div>
                  </div>
                  <p class="video-thumb__title"><?= htmlspecialchars($v['title']) ?></p>
                </button>
                <?php endforeach; ?>
              </div>
            </div>
            <button class="thumb-nav thumb-nav--next" id="ytNext"><i class="bi bi-chevron-right"></i></button>
          </div>

          <a href="https://www.youtube.com/@EL_GURU_DE_LOS_CASCOS" target="_blank" class="btn-channel">
            <i class="bi bi-youtube"></i> Ver todos en YouTube
          </a>

        </section>

        <!-- ═══ INSTAGRAM TAB ═══ -->
        <section class="video-tab" id="tab-instagram">
          <div class="ig-section">

            <!-- Profile card -->
            <div class="ig-profile-card">
              <div class="ig-profile-card__left">
                <img src="assets/img/logos_new/logo_fondo_negro.png" alt="IG" class="ig-avatar">
                <div>
                  <h3>@el_guru_de_los_cascos</h3>
                  <p>Reels, reviews y contenido exclusivo</p>
                </div>
              </div>
              <a href="https://www.instagram.com/el_guru_de_los_cascos" target="_blank" class="btn-ig">
                <i class="bi bi-instagram"></i> Seguir
              </a>
            </div>

            <!-- Instagram embeds carousel -->
            <div class="ig-carousel">
              <button class="thumb-nav thumb-nav--prev" id="igPrev"><i class="bi bi-chevron-left"></i></button>
              <div class="ig-track-wrapper">
                <div class="ig-track" id="igTrack">
                  <?php foreach ($igPosts as $postUrl): ?>
                  <div class="ig-embed-item">
                    <blockquote class="instagram-media"
                                data-instgrm-captioned
                                data-instgrm-permalink="<?= htmlspecialchars($postUrl) ?>"
                                style="width:100%; min-width:280px; max-width:400px; margin:0;">
                    </blockquote>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <button class="thumb-nav thumb-nav--next" id="igNext"><i class="bi bi-chevron-right"></i></button>
            </div>

            <a href="https://www.instagram.com/el_guru_de_los_cascos" target="_blank" class="btn-channel btn-channel--ig">
              <i class="bi bi-instagram"></i> Ver todo en Instagram
            </a>

          </div>
        </section>

      </div>
    </main>
  </div>

  <!-- Floating Guru Button -->
  <a href="https://wa.me/573052332296?text=Hola%20Guru!%20Quiero%20preguntarte%20por%20un%20casco" target="_blank" class="floating-guru">
    <span class="guru-float-bubble">Preguntame!</span>
    <img src="assets/img/logos_new/logo_fondo_negro.png" alt="Guru" class="guru-float-img">
  </a>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script async src="//www.instagram.com/embed.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    // ── Loader ──
    const loader = document.getElementById('scan-loader');
    setTimeout(() => {
      document.body.classList.add('loaded');
      loader.classList.add('done');
      setTimeout(() => loader.style.display = 'none', 500);
    }, 1800);

    // ── Sidebar ──
    const floatingToggle = document.getElementById('floatingMenuToggle');
    const sidebarClose   = document.getElementById('sidebarClose');
    const sidebar        = document.getElementById('sidebar');
    const overlayEl      = document.getElementById('sidebarOverlay');

    function openSidebar() {
      sidebar.classList.add('sidebar--open');
      overlayEl.classList.add('active');
      floatingToggle.classList.add('active');
      floatingToggle.querySelector('i').classList.replace('bi-list', 'bi-x-lg');
      document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
      sidebar.classList.remove('sidebar--open');
      overlayEl.classList.remove('active');
      floatingToggle.classList.remove('active');
      floatingToggle.querySelector('i').classList.replace('bi-x-lg', 'bi-list');
      document.body.style.overflow = '';
    }
    floatingToggle.addEventListener('click', () =>
      sidebar.classList.contains('sidebar--open') ? closeSidebar() : openSidebar()
    );
    sidebarClose.addEventListener('click', closeSidebar);
    overlayEl.addEventListener('click', closeSidebar);
    document.querySelectorAll('.sidebar__link').forEach(l =>
      l.addEventListener('click', () => { if (window.innerWidth <= 968) closeSidebar(); })
    );

    // ── Tabs ──
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('tab-btn--active'));
        document.querySelectorAll('.video-tab').forEach(p => p.classList.remove('video-tab--active'));
        btn.classList.add('tab-btn--active');
        document.getElementById('tab-' + btn.dataset.tab).classList.add('video-tab--active');

        // Re-process Instagram embeds when tab is shown
        if (btn.dataset.tab === 'instagram' && window.instgrm) {
          window.instgrm.Embeds.process();
        }
      });
    });

    // ── YouTube: click thumb → play ──
    const thumbs         = document.querySelectorAll('.video-thumb');
    const featuredIframe = document.getElementById('featuredIframe');
    const featuredTitle  = document.getElementById('featuredTitle');

    thumbs.forEach(thumb => {
      thumb.addEventListener('click', () => {
        featuredIframe.src = 'https://www.youtube.com/embed/' + thumb.dataset.videoId + '?rel=0&autoplay=1';
        featuredTitle.textContent = thumb.dataset.title;
        thumbs.forEach(t => t.classList.remove('video-thumb--active'));
        thumb.classList.add('video-thumb--active');
        if (window.innerWidth <= 768) {
          document.querySelector('.videos-content').scrollTo({ top: 0, behavior: 'smooth' });
        }
      });
    });

    // ── Carousel helper ──
    function setupCarousel(trackId, prevId, nextId, itemSelector) {
      const track = document.getElementById(trackId);
      const prev  = document.getElementById(prevId);
      const next  = document.getElementById(nextId);
      if (!track || !prev || !next) return;

      const scrollAmount = () => {
        const item = track.querySelector(itemSelector);
        return item ? item.offsetWidth + 12 : 300;
      };

      next.addEventListener('click', () => track.scrollBy({ left: scrollAmount(), behavior: 'smooth' }));
      prev.addEventListener('click', () => track.scrollBy({ left: -scrollAmount(), behavior: 'smooth' }));
    }

    setupCarousel('ytTrack', 'ytPrev', 'ytNext', '.video-thumb');
    setupCarousel('igTrack', 'igPrev', 'igNext', '.ig-embed-item');
  });
  </script>

  <style>
    :root {
      --neon-primary: #39ff14;
      --neon-glow: rgba(57, 255, 20, 0.5);
      --gray-900: #0a0a0a;
      --gray-800: #141414;
      --gray-700: #1f1f1f;
      --gray-600: #2a2a2a;
      --gray-500: #3a3a3a;
      --gray-400: #4a4a4a;
      --gray-300: #6a6a6a;
      --gray-200: #8a8a8a;
      --gray-100: #aaaaaa;
      --white: #ffffff;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { height: 100%; overflow: hidden; background: var(--gray-900); font-family: 'Poppins', sans-serif; }

    /* ═══ LOADER ═══ */
    #scan-loader { position: fixed; inset: 0; background: var(--gray-900); z-index: 99999; display: flex; align-items: center; justify-content: center; transition: opacity 0.5s ease, visibility 0.5s ease; }
    #scan-loader.done { opacity: 0; visibility: hidden; }
    .scan-container { display: flex; flex-direction: column; align-items: center; gap: 1.5rem; }
    .scan-logo { position: relative; width: 120px; height: 120px; display: flex; align-items: center; justify-content: center; }
    .scan-logo img { width: 80px; filter: drop-shadow(0 0 20px var(--neon-glow)); animation: logoPulse 1.5s ease-in-out infinite; }
    .scan-line { position: absolute; width: 100%; height: 3px; background: linear-gradient(90deg, transparent, var(--neon-primary), transparent); box-shadow: 0 0 20px var(--neon-primary); animation: scanMove 1.5s ease-in-out infinite; }
    @keyframes scanMove { 0%,100% { top: 0; } 50% { top: 100%; } }
    @keyframes logoPulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.05); } }
    .scan-text { font-family: 'Orbitron', sans-serif; font-size: 1.2rem; font-weight: 700; color: var(--white); letter-spacing: 6px; }
    .scan-progress { width: 200px; height: 3px; background: var(--gray-700); border-radius: 3px; overflow: hidden; }
    .scan-progress-bar { height: 100%; background: var(--neon-primary); animation: progressFill 1.8s ease forwards; }
    @keyframes progressFill { from { width: 0; } to { width: 100%; } }

    /* ═══ LAYOUT ═══ */
    .cascos-layout { display: flex; height: 100vh; width: 100%; opacity: 0; animation: fadeIn 0.5s ease 1.8s forwards; }
    @keyframes fadeIn { to { opacity: 1; } }

    /* ═══ FLOATING TOGGLE ═══ */
    .floating-menu-toggle { display: none; position: fixed; top: 20px; left: 20px; width: 50px; height: 50px; background: linear-gradient(135deg, var(--gray-800), var(--gray-900)); border: 2px solid var(--neon-primary); border-radius: 50%; color: var(--neon-primary); font-size: 1.5rem; align-items: center; justify-content: center; cursor: pointer; z-index: 1002; transition: all 0.4s cubic-bezier(0.68,-0.55,0.27,1.55); box-shadow: 0 4px 20px rgba(57,255,20,0.3); }
    .floating-menu-toggle i { transition: transform 0.3s ease; }
    .floating-menu-toggle:hover { transform: scale(1.1); }
    .floating-menu-toggle.active { background: var(--neon-primary); color: var(--gray-900); transform: rotate(180deg) scale(1.1); }
    .toggle-pulse { position: absolute; width: 100%; height: 100%; border-radius: 50%; border: 2px solid var(--neon-primary); animation: togglePulse 2s ease-out infinite; pointer-events: none; }
    .floating-menu-toggle.active .toggle-pulse { animation: none; opacity: 0; }
    @keyframes togglePulse { 0% { transform: scale(1); opacity: .8; } 100% { transform: scale(1.8); opacity: 0; } }
    .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.7); z-index: 999; opacity: 0; transition: opacity .3s ease; }
    .sidebar-overlay.active { opacity: 1; }

    /* ═══ SIDEBAR ═══ */
    .sidebar { width: 80px; height: 100%; background: var(--gray-800); border-right: 1px solid var(--gray-600); display: flex; flex-direction: column; align-items: center; padding: 1.5rem 0; position: relative; z-index: 100; transition: width .3s ease; flex-shrink: 0; }
    .sidebar:hover { width: 200px; }
    .sidebar__header { display: flex; flex-direction: column; align-items: center; gap: .5rem; margin-bottom: 2rem; }
    .sidebar__logo img { width: 70px; filter: drop-shadow(0 0 15px var(--neon-glow)); transition: transform .3s ease; }
    .sidebar__logo:hover img { transform: scale(1.1); }
    .sidebar__brand { font-family: 'Orbitron', sans-serif; font-size: .65rem; font-weight: 700; color: var(--neon-primary); letter-spacing: 2px; opacity: 0; white-space: nowrap; transition: opacity .3s ease; }
    .sidebar:hover .sidebar__brand { opacity: 1; }
    .sidebar__menu { list-style: none; display: flex; flex-direction: column; gap: .5rem; width: 100%; padding: 0 .75rem; flex: 1; }
    .sidebar__link { display: flex; align-items: center; gap: 1rem; padding: .9rem; color: var(--gray-200); text-decoration: none; border-radius: 12px; transition: all .3s ease; overflow: hidden; }
    .sidebar__link i { font-size: 1.3rem; min-width: 24px; text-align: center; }
    .sidebar__link span { font-size: .85rem; font-weight: 500; opacity: 0; white-space: nowrap; transition: opacity .3s ease; }
    .sidebar:hover .sidebar__link span { opacity: 1; }
    .sidebar__link:hover { background: var(--gray-700); color: var(--white); }
    .sidebar__link--active { background: linear-gradient(135deg, var(--neon-primary), #2ecc71); color: var(--gray-900); }
    .sidebar__footer { margin-top: auto; padding: 1rem 0; }
    .sidebar__social { display: flex; flex-direction: column; gap: .75rem; align-items: center; }
    .sidebar:hover .sidebar__social { flex-direction: row; }
    .sidebar__social a { width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; background: var(--gray-700); color: var(--gray-200); border-radius: 50%; text-decoration: none; font-size: 1rem; transition: all .3s ease; }
    .sidebar__social a:hover { background: var(--neon-primary); color: var(--gray-900); transform: scale(1.1); }
    .sidebar__close { display: none; position: absolute; top: 1rem; right: 1rem; width: 36px; height: 36px; background: var(--gray-700); border: 1px solid var(--gray-600); border-radius: 8px; color: var(--white); font-size: 1rem; align-items: center; justify-content: center; cursor: pointer; }

    /* ═══ MAIN ═══ */
    .videos-main { flex: 1; height: 100%; background: linear-gradient(135deg, var(--gray-900), var(--gray-800)); display: flex; flex-direction: column; position: relative; overflow: hidden; }
    .decor { position: absolute; width: 60px; height: 60px; z-index: 1; pointer-events: none; opacity: .3; }
    .decor--top-left { top: 10px; left: 10px; border-top: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--top-right { top: 10px; right: 10px; border-top: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }
    .decor--bottom-left { bottom: 10px; left: 10px; border-bottom: 2px solid var(--neon-primary); border-left: 2px solid var(--neon-primary); }
    .decor--bottom-right { bottom: 10px; right: 10px; border-bottom: 2px solid var(--neon-primary); border-right: 2px solid var(--neon-primary); }

    /* ═══ HEADER ═══ */
    .videos-header { text-align: center; padding: 1.25rem 1.5rem 0; position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; gap: .6rem; flex-shrink: 0; }
    .videos-title { font-family: 'Orbitron', sans-serif; font-size: clamp(1.4rem, 3.5vw, 2rem); font-weight: 700; color: var(--white); text-transform: uppercase; letter-spacing: 3px; }
    .title-accent { color: var(--neon-primary); text-shadow: 0 0 20px var(--neon-glow); }
    .videos-subtitle { font-size: .85rem; color: var(--gray-300); max-width: 500px; }

    .tab-switcher { display: flex; gap: .5rem; margin-top: .25rem; }
    .tab-btn { display: flex; align-items: center; gap: .5rem; padding: .6rem 1.4rem; background: var(--gray-800); border: 1px solid var(--gray-600); border-radius: 50px; color: var(--gray-200); font-size: .85rem; font-weight: 500; cursor: pointer; transition: all .3s ease; }
    .tab-btn i { font-size: 1.1rem; }
    .tab-btn:hover { border-color: var(--neon-primary); color: var(--neon-primary); }
    .tab-btn--active { background: linear-gradient(135deg, var(--neon-primary), #2ecc71); border-color: transparent; color: var(--gray-900); font-weight: 600; }

    /* ═══ CONTENT ═══ */
    .videos-content { flex: 1; overflow-y: auto; padding: 1.25rem 1.5rem 2rem; position: relative; z-index: 2; }
    .video-tab { display: none; }
    .video-tab--active { display: block; }

    /* ── Featured Video ── */
    .featured-video { max-width: 860px; margin: 0 auto 1.5rem; }
    .featured-video__player { position: relative; width: 100%; padding-bottom: 56.25%; background: var(--gray-800); border-radius: 14px; overflow: hidden; border: 1px solid var(--gray-600); }
    .featured-video__player iframe { position: absolute; inset: 0; width: 100%; height: 100%; }
    .featured-video__info { padding: .75rem .25rem 0; }
    .featured-video__info h2 { font-family: 'Orbitron', sans-serif; font-size: .9rem; color: var(--white); font-weight: 600; line-height: 1.4; }

    /* ── Thumbnail Carousel ── */
    .thumb-carousel, .ig-carousel { position: relative; max-width: 860px; margin: 0 auto 1.25rem; display: flex; align-items: center; gap: .5rem; }
    .thumb-track-wrapper, .ig-track-wrapper { flex: 1; overflow: hidden; }
    .thumb-track, .ig-track { display: flex; gap: 12px; overflow-x: auto; scroll-behavior: smooth; -ms-overflow-style: none; scrollbar-width: none; padding: 4px 0; }
    .thumb-track::-webkit-scrollbar, .ig-track::-webkit-scrollbar { display: none; }

    .thumb-nav { width: 40px; height: 40px; flex-shrink: 0; background: var(--gray-800); border: 1px solid var(--gray-600); border-radius: 50%; color: var(--white); font-size: 1.1rem; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all .3s ease; }
    .thumb-nav:hover { border-color: var(--neon-primary); color: var(--neon-primary); box-shadow: 0 0 15px rgba(57,255,20,.2); }

    /* ── Video Thumbnails ── */
    .video-thumb { flex: 0 0 200px; background: var(--gray-800); border: 1px solid var(--gray-600); border-radius: 10px; overflow: hidden; cursor: pointer; text-align: left; transition: all .3s ease; padding: 0; }
    .video-thumb:hover { border-color: var(--neon-primary); transform: translateY(-2px); }
    .video-thumb--active { border-color: var(--neon-primary); box-shadow: 0 0 12px rgba(57,255,20,.25); }
    .video-thumb__img { position: relative; width: 100%; aspect-ratio: 16/9; overflow: hidden; }
    .video-thumb__img img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s ease; }
    .video-thumb:hover .video-thumb__img img { transform: scale(1.06); }
    .video-thumb__play { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,.35); opacity: 0; transition: opacity .3s ease; }
    .video-thumb:hover .video-thumb__play { opacity: 1; }
    .video-thumb__play i { font-size: 2rem; color: var(--white); filter: drop-shadow(0 0 8px rgba(0,0,0,.5)); }
    .video-thumb__title { padding: .5rem .6rem; font-size: .7rem; color: var(--gray-200); line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

    /* ── Channel CTA ── */
    .btn-channel { display: flex; align-items: center; justify-content: center; gap: .5rem; max-width: 860px; margin: 0 auto; padding: .75rem 1.5rem; background: var(--gray-800); border: 1px solid var(--gray-600); border-radius: 10px; color: var(--gray-200); text-decoration: none; font-size: .85rem; font-weight: 600; transition: all .3s ease; }
    .btn-channel:hover { border-color: #ff0000; color: #ff0000; box-shadow: 0 0 15px rgba(255,0,0,.15); }
    .btn-channel--ig:hover { border-color: #e1306c; color: #e1306c; box-shadow: 0 0 15px rgba(225,48,108,.15); }

    /* ═══ INSTAGRAM ═══ */
    .ig-section { max-width: 860px; margin: 0 auto; }
    .ig-profile-card { display: flex; align-items: center; justify-content: space-between; gap: 1rem; background: linear-gradient(145deg, var(--gray-700), var(--gray-800)); border: 1px solid var(--gray-600); border-radius: 14px; padding: 1rem 1.25rem; margin-bottom: 1.25rem; flex-wrap: wrap; }
    .ig-profile-card__left { display: flex; align-items: center; gap: .75rem; }
    .ig-avatar { width: 48px; height: 48px; border-radius: 50%; border: 2px solid var(--neon-primary); object-fit: cover; padding: 2px; }
    .ig-profile-card__left h3 { font-family: 'Orbitron', sans-serif; font-size: .8rem; color: var(--white); }
    .ig-profile-card__left p { font-size: .75rem; color: var(--gray-300); }
    .btn-ig { display: flex; align-items: center; gap: .4rem; padding: .6rem 1.2rem; background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #bc1888); border-radius: 8px; color: var(--white); text-decoration: none; font-size: .8rem; font-weight: 600; transition: all .3s ease; white-space: nowrap; }
    .btn-ig:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(225,48,108,.4); color: var(--white); }

    /* ── IG Embed Items ── */
    .ig-embed-item { flex: 0 0 340px; min-width: 280px; }
    .ig-embed-item .instagram-media { border-radius: 12px !important; }

    /* ═══ FLOATING GURU ═══ */
    .floating-guru { position: fixed; bottom: 25px; right: 25px; display: flex; flex-direction: column; align-items: center; text-decoration: none; z-index: 99; transition: transform .3s ease; animation: guruBounce 3s ease-in-out infinite; }
    .floating-guru:hover { transform: scale(1.1) translateY(-5px); animation: none; }
    .guru-float-img { width: 70px; height: 70px; object-fit: contain; filter: drop-shadow(0 0 15px var(--neon-glow)); transition: filter .3s ease; }
    .floating-guru:hover .guru-float-img { filter: drop-shadow(0 0 20px var(--neon-glow)) drop-shadow(0 0 40px rgba(57,255,20,.4)); }
    .guru-float-bubble { position: absolute; bottom: 100%; left: 50%; transform: translateX(-50%); margin-bottom: 6px; padding: .4rem .8rem; background: var(--neon-primary); color: #000; font-size: .7rem; font-weight: 800; white-space: nowrap; border-radius: 8px; box-shadow: 0 4px 15px rgba(57,255,20,.4); animation: bubbleFloat 2s ease-in-out infinite; }
    .guru-float-bubble::after { content: ''; position: absolute; top: 100%; left: 50%; transform: translateX(-50%); border: 6px solid transparent; border-top-color: var(--neon-primary); }
    @keyframes guruBounce { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
    @keyframes bubbleFloat { 0%,100% { transform: translateX(-50%) translateY(0); } 50% { transform: translateX(-50%) translateY(-4px); } }

    /* ═══ RESPONSIVE TABLET ═══ */
    @media (max-width: 968px) {
      .floating-menu-toggle { display: flex; }
      .sidebar-overlay { display: block; }
      .sidebar { position: fixed; left: 0; top: 0; width: 260px; height: 100%; transform: translateX(-100%); border-right: 2px solid var(--neon-primary); box-shadow: 5px 0 30px rgba(0,0,0,.5); transition: transform .3s ease; z-index: 1001; }
      .sidebar--open { transform: translateX(0); }
      .sidebar--open .sidebar__brand, .sidebar--open .sidebar__link span { opacity: 1; }
      .sidebar__close { display: flex; }
      .videos-header { padding: 1rem 1rem 0; }
      .videos-content { padding: 1rem 1rem 2rem; }
    }

    /* ═══ RESPONSIVE MOBILE ═══ */
    @media (max-width: 768px) {
      .videos-title { font-size: 1.3rem; }
      .videos-subtitle { font-size: .78rem; }
      .tab-btn span { display: none; }
      .tab-btn { padding: .55rem 1rem; }
      .video-thumb { flex: 0 0 160px; }
      .video-thumb__title { font-size: .65rem; }
      .ig-embed-item { flex: 0 0 300px; min-width: 260px; }
      .ig-profile-card { flex-direction: column; text-align: center; }
      .ig-profile-card__left { flex-direction: column; align-items: center; }
      .floating-guru { bottom: 15px; right: 15px; }
      .guru-float-img { width: 55px; height: 55px; }
      .guru-float-bubble { font-size: .6rem; padding: .3rem .6rem; }
    }

    /* ═══ RESPONSIVE SMALL ═══ */
    @media (max-width: 480px) {
      .videos-header { padding: .75rem .75rem 0; }
      .videos-content { padding: .75rem .75rem 2rem; }
      .video-thumb { flex: 0 0 145px; }
      .thumb-nav { width: 32px; height: 32px; font-size: .9rem; }
      .ig-embed-item { flex: 0 0 280px; min-width: 260px; }
      .floating-menu-toggle { top: 15px; left: 15px; width: 45px; height: 45px; font-size: 1.3rem; }
      .decor { width: 40px; height: 40px; opacity: .2; }
    }

    /* ═══ ACCESSIBILITY ═══ */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; }
      #scan-loader { display: none !important; }
      .cascos-layout { opacity: 1; animation: none; }
    }
  </style>

</body>
</html>
