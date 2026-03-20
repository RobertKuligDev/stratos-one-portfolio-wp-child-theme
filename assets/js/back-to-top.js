/**
 * Back to Top Button
 * Shows/hides button based on scroll position
 *
 * @package Stratos_One_Portfolio
 */

(function() {
    'use strict';

    const backToTop = document.getElementById('back-to-top');

    if (!backToTop) return;

    /**
     * Toggle button visibility based on scroll
     */
    function onScroll() {
        if (window.scrollY > 400) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    }

    /**
     * Smooth scroll to top
     */
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Check on load
    onScroll();

    // Listen for scroll (passive for better performance)
    document.addEventListener('scroll', onScroll, { passive: true });
})();
