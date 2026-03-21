/**
 * Services Accordion - Mobile Toggle
 * Expands service cards on mobile devices
 *
 * @package Stratos_One_Portfolio
 */

(function() {
    'use strict';

    const toggleButtons = document.querySelectorAll('.service-card-toggle');

    if (!toggleButtons.length) return;

    /**
     * Toggle card expanded state
     */
    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const card = button.closest('.service-card');
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Toggle current card
            button.setAttribute('aria-expanded', !isExpanded);
            card.classList.toggle('expanded');
        });
    });

    /**
     * Optional: Close other cards when one is expanded (accordion behavior)
     * Uncomment if you want only one card open at a time
     */
    /*
    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const card = button.closest('.service-card');
            const isExpanded = button.getAttribute('aria-expanded') === 'true';

            // Close all other cards
            toggleButtons.forEach(function(otherButton) {
                if (otherButton !== button) {
                    otherButton.setAttribute('aria-expanded', 'false');
                    otherButton.closest('.service-card').classList.remove('expanded');
                }
            });

            // Toggle current card
            button.setAttribute('aria-expanded', !isExpanded);
            card.classList.toggle('expanded');
        });
    });
    */
})();
