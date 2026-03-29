/**
 * WP Showcase — tabbed modal handler
 * Direct event delegation for tab switching
 */
(function () {
  'use strict';

  function initWpModalTabs() {
    // Only target tabs inside the modal content (cloned elements)
    const modalContent = document.querySelector('.stratos-modal-content .stratos-modal-inline');
    if (!modalContent) return;
    
    const tabs = modalContent.querySelectorAll('.wp-modal-tab');
    if (!tabs.length) return;

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        const target = this.dataset.tab;

        // Deactivate all tabs in modal
        tabs.forEach(function (t) { t.classList.remove('active'); });
        
        // Deactivate all panels in modal
        const panels = modalContent.querySelectorAll('.wp-modal-panel');
        panels.forEach(function (p) {
          p.classList.remove('active');
        });

        // Activate clicked tab
        this.classList.add('active');
        
        // Activate target panel
        const panel = modalContent.querySelector('[data-panel="' + target + '"]');
        if (panel) panel.classList.add('active');
      });
    });
  }

  // Expose globally for modal.js to call
  window.initWpModalTabs = initWpModalTabs;

  // Initialize on DOMContentLoaded for initial tabs
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initWpModalTabs);
  } else {
    initWpModalTabs();
  }

})();
