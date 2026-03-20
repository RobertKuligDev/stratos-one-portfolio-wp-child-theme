/**
 * Header Scroll Effect
 * Adds 'scrolled' class to site-header when page is scrolled
 *
 * @package Stratos_One_Portfolio
 */

(function() {
    'use strict';

    const header = document.querySelector('.site-header');

    if (!header) return;

    /**
     * Handle scroll event
     */
    function onScroll() {
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    // Check on load
    onScroll();

    // Listen for scroll (passive for better performance)
    document.addEventListener('scroll', onScroll, { passive: true });
})();
