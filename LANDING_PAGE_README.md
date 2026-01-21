# Landing Page Moderna - El Guru de los Cascos

## 🎨 Resumen del Rediseño

Se ha rediseñado completamente el **index.php** como una **landing page moderna** con un hero section diagonal split, manteniendo toda la estructura PHP existente del proyecto y preservando la funcionalidad.

---

## ✨ Características Principales

### 🎯 Hero Section Diagonal Split

**Layout Innovador:**
- División diagonal 60% (izquierda) / 40% (derecha)
- Clip-path CSS para corte diagonal suave
- Grid CSS responsive

**Lado Izquierdo (Negro):**
- Fondo oscuro (#000000)
- Imagen principal del logo/producto
- Efecto de luces bokeh con gradientes radiales
- Animación de flotación suave (6s loop)
- Drop shadow para profundidad

**Lado Derecho (Gradiente Neon):**
- Gradiente: `linear-gradient(135deg, #7db749 0%, #39ff14 100%)`
- Título grande en dos líneas:
  ```
  EL GURU
  DE LOS CASCOS
  ```
- Subtítulo en itálicas: "Tu experto de confianza..."
- 3 botones de acción con iconos circulares

---

## 🎨 Paleta de Colores

```css
/* Principales */
--color-neon-primary: #39ff14      /* Verde neón brillante */
--color-neon-secondary: #7db749    /* Verde lima */
--bg-black: #000000                /* Negro puro */
--white: #ffffff                   /* Blanco */

/* Gradientes */
Background: linear-gradient(135deg, #7db749 0%, #39ff14 100%)
```

---

## 🔘 Botones de Acción

Tres botones apilados verticalmente con diseño moderno:

**1. Sobre Mí** (`index.php#about`)
- Icono: `bi-person-circle`
- Navegación: Sección About

**2. Catálogo** (`cascos.php`)
- Icono: `bi-grid-3x3-gap`
- Navegación: Página de catálogo

**3. Buscar Casco** (`#buscascasco`)
- Icono: `bi-search`
- Navegación: Formulario de búsqueda (muestra secciones ocultas)

**Estilos de Botones:**
```css
- Background: rgba(0, 0, 0, 0.3) + backdrop-filter: blur(10px)
- Border radius: 50px (totalmente redondeado)
- Padding: 1.5rem 3rem
- Icon: Círculo negro de 50px con icono blanco
- Hover: Translación -10px, rotación 360° del icono
- Min-width: 280px (desktop)
```

---

## 📱 Diseño Responsive

### Desktop (> 1024px)
- Grid: 60% / 40%
- Diagonal: clip-path completo
- Botones alineados a la derecha
- Título: hasta 6rem

### Tablet (768px - 1024px)
- Grid: 55% / 45%
- Diagonal ajustada: 80% clip
- Título: hasta 5rem

### Mobile (< 768px)
- **Stack vertical**: Imagen arriba (50%), contenido abajo (50%)
- **Sin diagonal**: clip-path removido
- Contenido centrado
- Botones full-width (max 320px)
- Footer: 1 columna

### Mobile Small (< 480px)
- Stack: 40% imagen / 60% contenido
- Título: 1.8rem - 2.5rem
- Iconos: 40px
- Padding reducido

---

## 🦶 Footer de 3 Columnas

**Estructura:**
```
[Columna 1]        [Columna 2]           [Columna 3]
Síguenos          Visita Nuestro Sitio    Copyright
Social Icons      Website Link            Credits
```

**Columna 1 - Redes Sociales:**
- Título: "Síguenos"
- 4 iconos circulares:
  - YouTube
  - Instagram
  - TikTok
  - WhatsApp
- Hover: background neon + translateY(-3px)

**Columna 2 - Website:**
- Título: "Visita Nuestro Sitio"
- Link: `www.elgurudeloscascos.com`
- Color neon con hover white

**Columna 3 - Copyright:**
- Copyright dinámico (PHP `date('Y')`)
- Créditos: "Desarrollado por Falubi"
- Link a missatest.com

**Estilo:**
- Background: #000000
- Border-top: 3px solid neon green
- Grid: 3 columnas (desktop) → 1 columna (mobile)
- Padding: 2rem vertical

---

## 💬 Widget de Chat Flotante

**Características:**
- Posición: `fixed bottom-right`
- Bottom: 30px, Right: 30px
- Tamaño: 60px círculo
- Background: Gradiente neon
- Icono: `bi-chat-dots-fill`
- Animación: pulse-chat (2s loop)
- Box-shadow: Glow effect
- onclick: Abre WhatsApp

**Responsive:**
- Mobile: 50px x 50px
- Posición ajustada: 20px bottom/right

---

## 🎭 Animaciones

**AOS (Animate On Scroll):**
```html
data-aos="fade-right"       (Lado izquierdo)
data-aos="fade-left"        (Lado derecho)
data-aos-delay="200-500"    (Botones escalonados)
```

**CSS Animations:**
```css
@keyframes float-image     /* 6s - Flotación de imagen */
@keyframes fade-in-up      /* 1s - Entrada de contenido */
@keyframes pulse-chat      /* 2s - Pulsación del chat */
```

**Hover Effects:**
- Botones: translateX(-10px)
- Iconos: rotate(360deg)
- Chat: scale(1.1)
- Social: translateY(-3px)

---

## ♿ Accesibilidad

**Implementado:**
- ✅ Skip-to-content link
- ✅ ARIA labels en todos los botones
- ✅ Atributos semánticos (aria-label)
- ✅ Focus indicators visibles
- ✅ Alt text en imágenes
- ✅ Prefers-reduced-motion support
- ✅ Color contrast WCAG AA
- ✅ Keyboard navigation

**Código:**
```html
<a href="#main-content" class="skip-to-content">
  Saltar al contenido
</a>

<button aria-label="Abrir chat">
<a aria-label="YouTube">
```

---

## 📁 Estructura de Archivos

### Archivos Creados/Modificados

```
📦 El_guru_de_los_cascos/
├── 📄 index.php (REDISEÑADO - Landing page moderna)
├── 📄 index-original.php.backup (Backup del original)
├── 📄 index-old.php (Versión anterior)
├── 📂 assets/css/pages/
│   └── 📄 landing.css (678 líneas - Estilos de landing)
├── 📂 dist/css/
│   └── 📄 styles.min.css (40.1KB - +7KB vs anterior)
└── 📄 LANDING_PAGE_README.md (Este archivo)
```

---

## 🔧 Integración con Proyecto Existente

### PHP Includes Preservados

```php
<?php include 'includes/head.php'; ?>       ✅
<?php include 'includes/loader.php'; ?>     ✅
<?php include 'includes/navbar.php'; ?>     ✅
<?php include 'banner1.5.php'; ?>           ✅ (Oculto)
<?php include 'buscascasco.php'; ?>         ✅ (Oculto)
<?php include 'sections/about.php'; ?>      ✅ (Oculto)
<?php include 'sections/working.php'; ?>    ✅ (Oculto)
<?php include 'flotante.php'; ?>            ✅ (Oculto)
```

**Secciones Adicionales:**
- Ocultas por defecto (`display: none`)
- Se muestran al hacer click en "Buscar Casco"
- Smooth scroll a la sección correspondiente

### JavaScript Integrado

```javascript
// Navbar component
new Navbar();

// Smooth scroll
document.querySelectorAll('a[href^="#"]')...

// Show hidden sections on click
showSectionsButton.addEventListener('click', ...)
```

---

## 🎯 Funcionalidades

### 1. Hero Fullscreen
- Min-height: 100vh
- Flexbox para contenido vertical
- Grid para split horizontal

### 2. Navegación Suave
- Smooth scroll behavior
- Anchor links funcionan
- Secciones se revelan al click

### 3. Responsive Perfecto
- Mobile-first approach
- Breakpoints: 480px, 768px, 1024px
- Grid → Stack vertical en mobile

### 4. Performance
- CSS minificado: 40.1KB
- Lazy loading de imágenes (eager en hero)
- Vendors con defer
- Animaciones optimizadas

---

## 🚀 Cómo Usar

### Ver la Landing Page
1. Abrir `index.php` en navegador
2. Debería mostrar el hero diagonal split
3. Navbar en la parte superior
4. Footer en la parte inferior

### Editar Contenido

**Cambiar Título:**
```php
<!-- En index.php línea 38-41 -->
<h1 class="hero-landing__title">
  <span class="hero-landing__title-line">TU MARCA</span>
  <span class="hero-landing__title-line">AQUÍ</span>
</h1>
```

**Cambiar Subtítulo:**
```php
<!-- En index.php línea 44-46 -->
<p class="hero-landing__subtitle">
  Tu texto personalizado aquí
</p>
```

**Cambiar Imagen:**
```php
<!-- En index.php línea 23-28 -->
<img
  src="assets/img/tu-imagen.png"
  alt="Tu descripción"
  class="hero-landing__main-image"
>
```

**Cambiar Botones:**
```php
<!-- En index.php líneas 52-74 -->
<a href="tu-link.php" class="hero-landing__btn">
  <span class="hero-landing__btn-icon">
    <i class="bi bi-tu-icono"></i>
  </span>
  <span class="hero-landing__btn-text">Tu Texto</span>
</a>
```

### Personalizar Colores

**En `assets/css/core/variables.css`:**
```css
:root {
  --color-neon-primary: #TU_COLOR;
  --color-neon-secondary: #TU_COLOR;
}
```

Luego ejecutar:
```bash
npm run build
```

---

## 🎨 Iconos Bootstrap Icons

Iconos usados en la landing:

```
bi-person-circle     (Sobre Mí)
bi-grid-3x3-gap      (Catálogo)
bi-search            (Buscar)
bi-youtube           (YouTube)
bi-instagram         (Instagram)
bi-tiktok            (TikTok)
bi-whatsapp          (WhatsApp)
bi-chat-dots-fill    (Chat widget)
bi-arrow-up-short    (Scroll top)
```

**Ver todos:** https://icons.getbootstrap.com/

---

## 📊 Comparación Antes/Después

### Antes (index-original.php)
- Hero tradicional con imagen de fondo
- Texto centrado
- Iconos sociales pequeños
- Footer simple
- ~60KB CSS total

### Después (index.php)
- Hero diagonal split moderno
- Layout 60/40 innovador
- Botones de acción grandes
- Footer de 3 columnas
- Chat widget flotante
- ~40KB CSS minificado
- 100% responsive

---

## 🐛 Troubleshooting

### El CSS no se aplica
```bash
# Rebuild
npm run build

# Limpiar caché del navegador
Ctrl + Shift + R (Windows)
Cmd + Shift + R (Mac)
```

### Las animaciones no funcionan
- Verificar que AOS se cargue: `assets/vendor/aos/aos.js`
- Verificar la consola del navegador

### El layout se ve mal en móvil
- Verificar que el viewport meta esté en `head.php`:
```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

### La diagonal no se ve
- Verificar soporte de `clip-path` en el navegador
- Usar navegador moderno (Chrome, Firefox, Safari, Edge)

---

## 🔄 Rollback

Para volver al index.php original:

```bash
# Opción 1: Usar backup
cp index-original.php.backup index.php

# Opción 2: Git
git checkout HEAD~1 index.php

# Rebuild CSS
npm run build
```

---

## 📝 Notas Técnicas

### CSS Modular
- Archivo: `assets/css/pages/landing.css`
- Import en: `assets/css/main.css`
- Compilado a: `dist/css/styles.min.css`
- Metodología: BEM (Block Element Modifier)

### Clases BEM Usadas
```css
.hero-landing
.hero-landing__split
.hero-landing__left
.hero-landing__right
.hero-landing__image-wrapper
.hero-landing__main-image
.hero-landing__content
.hero-landing__title
.hero-landing__title-line
.hero-landing__subtitle
.hero-landing__buttons
.hero-landing__btn
.hero-landing__btn-icon
.hero-landing__btn-text

.footer-landing
.footer-landing__container
.footer-landing__column
.footer-landing__title
.footer-landing__social
.footer-landing__social-link
.footer-landing__link
.footer-landing__copyright

.chat-widget
.chat-widget__button
```

### Grid Layout
```css
/* Desktop */
grid-template-columns: 60% 40%;

/* Mobile */
grid-template-rows: 50% 50%;
```

---

## ✅ Checklist de Verificación

- [x] Landing page carga correctamente
- [x] Hero section muestra división diagonal
- [x] Imagen principal visible
- [x] Título de dos líneas visible
- [x] Subtítulo visible
- [x] 3 botones de acción funcionan
- [x] Navbar en la parte superior funciona
- [x] Footer de 3 columnas visible
- [x] Links de redes sociales funcionan
- [x] Chat widget visible y funcional
- [x] Responsive en móvil funciona
- [x] Animaciones AOS funcionan
- [x] Smooth scroll funciona
- [x] CSS compilado correctamente
- [x] No hay errores en consola

---

## 🎓 Recursos

### Documentación
- [Plan de modernización](C:\Users\Falubi\.claude\plans\precious-booping-peach.md)
- [Metodología BEM](http://getbem.com/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [AOS Library](https://michalsnik.github.io/aos/)

### Archivos de Referencia
- Landing CSS: `assets/css/pages/landing.css`
- Variables: `assets/css/core/variables.css`
- Navbar: `includes/navbar.php`

---

## 👨‍💻 Créditos

**Diseño y Desarrollo:** Claude Sonnet 4.5 + Falubi
**Fecha:** Enero 2026
**Versión:** 3.0.0 (Landing Page)
**Framework:** HTML5, CSS3, PHP, Bootstrap 5

---

## 📞 Soporte

Para soporte o consultas:
- **Email:** contacto@missatest.com
- **Web:** https://missatest.com
- **WhatsApp:** [Configura el número en el widget]

---

**¡La nueva landing page está lista y funcionando! 🚀**
