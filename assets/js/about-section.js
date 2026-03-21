/**
 * About Section - Mobile Accordion & Parallax
 *
 * @package Stratos_One_Portfolio
 */

(function() {
    'use strict';

    /* ================================
       Mobile Accordion Toggle
       ================================ */

    const aboutToggle = document.querySelector('.about-toggle');
    const aboutToggleText = document.querySelector('.about-toggle-text');
    const aboutSection = document.querySelector('.about-section');

    if (aboutToggle && aboutSection) {
        aboutToggle.addEventListener('click', function() {
            const isExpanded = aboutToggle.getAttribute('aria-expanded') === 'true';

            aboutToggle.setAttribute('aria-expanded', !isExpanded);
            aboutSection.classList.toggle('expanded');

            // Toggle button text
            if (aboutToggleText) {
                aboutToggleText.textContent = isExpanded ? 'Read More' : 'Read Less';
            }
        });
    }

    /* ================================
       Parallax Effect (Desktop Only)
       ================================ */

    const parallaxImg = document.querySelector('.about-image img[data-parallax]');
    const aboutPhoto = document.querySelector('.about-photo');

    if (parallaxImg && aboutPhoto && window.innerWidth > 992) {
        let lastScrollY = window.scrollY;
        let currentTranslate = 0;
        let targetTranslate = 0;

        function animate() {
            // Smooth interpolation (lerp)
            currentTranslate += (targetTranslate - currentTranslate) * 0.05;
            parallaxImg.style.transform = `translateY(${currentTranslate}px)`;

            requestAnimationFrame(animate);
        }

        function updateParallax() {
            const rect = aboutPhoto.getBoundingClientRect();
            const viewportHeight = window.innerHeight;

            // Only animate when in view
            if (rect.top < viewportHeight && rect.bottom > 0) {
                // Calculate how far section has scrolled through viewport
                const scrollProgress = (viewportHeight - rect.top) / (viewportHeight + rect.height);

                // Parallax offset: move image down as user scrolls down
                // Max 30px movement
                targetTranslate = scrollProgress * 30;
            }
        }

        // Throttled scroll handler
        let ticking = false;

        function onScroll() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    updateParallax();
                    ticking = false;
                });
                ticking = true;
            }
        }

        // Start animation loop
        animate();

        // Listen for scroll
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', updateParallax, { passive: true });

        // Initial update
        updateParallax();
    }
})();
