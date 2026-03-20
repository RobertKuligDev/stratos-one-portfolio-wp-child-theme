/**
 * Mobile Menu Toggle
 * Handles mobile navigation open/close with ARIA attributes
 *
 * @package Stratos_One_Portfolio
 */

(function() {
    'use strict';

    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-navigation');

    if (!menuToggle || !mainNav) return;

    /**
     * Toggle menu state
     */
    menuToggle.addEventListener('click', function() {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

        menuToggle.setAttribute('aria-expanded', !isExpanded);
        mainNav.classList.toggle('active');
    });

    /**
     * Close menu on ESC key
     */
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mainNav.classList.contains('active')) {
            menuToggle.setAttribute('aria-expanded', 'false');
            mainNav.classList.remove('active');
            menuToggle.focus();
        }
    });
})();
