/**
 * Navbar Component
 * Handles mobile navigation toggle and catalog dropdown menu
 * Extracted from includes/navbar.php (lines 157-197)
 */

class Navbar {
  constructor() {
    this.toggleBtn = document.querySelector('.mobile-nav-toggle');
    this.body = document.querySelector('body');
    this.navMenu = document.querySelector('#navmenu');
    this.catalogBtn = document.getElementById('btnCatalogo');
    this.catalogMenu = document.getElementById('catalogoMenu');

    this.init();
  }

  init() {
    if (this.toggleBtn && this.navMenu) {
      this.setupMobileToggle();
    }

    if (this.catalogBtn && this.catalogMenu) {
      this.setupCatalogMenu();
      this.setupClickOutside();
    }
  }

  setupMobileToggle() {
    this.toggleBtn.addEventListener('click', () => {
      this.body.classList.toggle('mobile-nav-active');
      this.toggleBtn.classList.toggle('bi-list');
      this.toggleBtn.classList.toggle('bi-x');

      // Update ARIA attribute
      const isExpanded = this.body.classList.contains('mobile-nav-active');
      this.toggleBtn.setAttribute('aria-expanded', isExpanded);
    });

    // Close menu when clicking on a link
    document.querySelectorAll('#navmenu a').forEach(link => {
      link.addEventListener('click', () => {
        if (this.body.classList.contains('mobile-nav-active')) {
          this.closeMobileMenu();
        }
      });
    });
  }

  closeMobileMenu() {
    this.body.classList.remove('mobile-nav-active');
    this.toggleBtn.classList.add('bi-list');
    this.toggleBtn.classList.remove('bi-x');
    this.toggleBtn.setAttribute('aria-expanded', 'false');
  }

  setupCatalogMenu() {
    this.catalogBtn.addEventListener('click', (e) => {
      e.preventDefault();

      const isVisible = this.catalogMenu.style.display === 'flex' ||
                       this.catalogMenu.style.display === 'block';

      this.catalogMenu.style.display = isVisible ? 'none' : 'flex';

      // Update ARIA attribute
      this.catalogBtn.setAttribute('aria-expanded', !isVisible);
    });
  }

  setupClickOutside() {
    document.addEventListener('click', (e) => {
      if (!this.catalogMenu.contains(e.target) &&
          !this.catalogBtn.contains(e.target)) {
        this.catalogMenu.style.display = 'none';
        this.catalogBtn.setAttribute('aria-expanded', 'false');
      }
    });
  }
}

// Export for use in main.js
if (typeof module !== 'undefined' && module.exports) {
  module.exports = Navbar;
}
