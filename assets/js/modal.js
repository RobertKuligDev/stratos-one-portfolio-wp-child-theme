/**
 * Stratos One Modal Component
 * Universal modal for images, galleries, PDFs, code, video, iframes
 *
 * @package Stratos_One
 */

(function() {
    'use strict';

    // Modal elements - will be initialized after DOM is ready
    let overlay, modal, modalTitle, modalContent, modalClose, modalPrev, modalNext, modalCounter, loader;

    // State
    let currentGallery = [];
    let currentIndex = 0;
    let isOpen = false;

    /**
     * Initialize modal elements
     */
    function initElements() {
        overlay = document.getElementById('stratos-modal-overlay');
        modal = document.getElementById('stratos-modal');
        modalTitle = document.getElementById('stratos-modal-title');
        modalContent = modal.querySelector('.stratos-modal-content');
        modalClose = modal.querySelector('.stratos-modal-close');
        modalPrev = modal.querySelector('.stratos-modal-prev');
        modalNext = modal.querySelector('.stratos-modal-next');
        modalCounter = modal.querySelector('.stratos-modal-counter');
        loader = modal.querySelector('.stratos-modal-loader');
    }

    /**
     * Open modal
     * @param {Object} options - Modal options
     */
    function openModal(options = {}) {
        const {
            type = 'inline',
            title = '',
            content = '',
            url = '',
            postId = 0,
            gallery = [],
            index = 0,
        } = options;

        // Set state
        currentGallery = gallery;
        currentIndex = index;
        isOpen = true;

        // Lock body scroll
        document.body.classList.add('modal-open');

        // Show overlay
        overlay.classList.add('active');
        overlay.setAttribute('aria-hidden', 'false');

        // Set title
        modalTitle.textContent = title;

        // Show loader
        loader.style.display = 'flex';
        modalContent.innerHTML = '';

        // Load content based on type
        switch (type) {
            case 'image':
                loadImage(content || url);
                break;

            case 'gallery':
                loadGallery(gallery, index);
                break;

            case 'video':
                loadVideo(content || url);
                break;

            case 'iframe':
                loadIframe(url);
                break;

            case 'pdf':
                loadPdf(url);
                break;

            case 'code':
                loadCode(content);
                break;

            case 'ajax':
                loadAjax(postId, type);
                break;

            case 'inline':
            default:
                loadInline(content);
                break;
        }

        // Update navigation
        updateNavigation();

        // Focus trap
        modalClose.focus();
    }

    /**
     * Close modal
     */
    function closeModal() {
        isOpen = false;
        overlay.classList.remove('active');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
        currentGallery = [];
        currentIndex = 0;
    }

    /**
     * Load image
     */
    function loadImage(src) {
        loader.style.display = 'none';
        const img = document.createElement('img');
        img.src = src;
        img.className = 'stratos-modal-image';
        img.alt = modalTitle.textContent;
        modalContent.appendChild(img);
    }

    /**
     * Load gallery
     */
    function loadGallery(gallery, index) {
        if (!gallery || gallery.length === 0) return;

        currentIndex = index;
        const item = gallery[currentIndex];

        loader.style.display = 'none';

        if (item.type === 'image') {
            const img = document.createElement('img');
            img.src = item.src;
            img.className = 'stratos-modal-image';
            img.alt = item.alt || '';
            modalContent.appendChild(img);
        } else if (item.type === 'video') {
            loadVideo(item.src);
        }

        updateNavigation();
    }

    /**
     * Load video (YouTube, Vimeo, or self-hosted)
     */
    function loadVideo(url) {
        loader.style.display = 'none';

        const videoContainer = document.createElement('div');
        videoContainer.className = 'stratos-modal-video';

        let videoHtml = '';

        // YouTube
        const youtubeMatch = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/);
        if (youtubeMatch) {
            videoHtml = `<iframe src="https://www.youtube.com/embed/${youtubeMatch[1]}?autoplay=1" allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
        }
        // Vimeo
        else if (url.includes('vimeo.com')) {
            const vimeoId = url.match(/vimeo\.com\/(\d+)/);
            if (vimeoId) {
                videoHtml = `<iframe src="https://player.vimeo.com/video/${vimeoId[1]}?autoplay=1" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
            }
        }
        // Self-hosted
        else {
            videoHtml = `<video src="${url}" controls autoplay></video>`;
        }

        videoContainer.innerHTML = videoHtml;
        modalContent.appendChild(videoContainer);
    }

    /**
     * Load iframe
     */
    function loadIframe(url) {
        loader.style.display = 'none';
        const iframe = document.createElement('iframe');
        iframe.src = url;
        iframe.className = 'stratos-modal-iframe';
        iframe.allowFullscreen = true;
        modalContent.appendChild(iframe);
    }

    /**
     * Load PDF
     */
    function loadPdf(url) {
        loader.style.display = 'none';
        const iframe = document.createElement('iframe');
        iframe.src = url;
        iframe.className = 'stratos-modal-pdf';
        modalContent.appendChild(iframe);
    }

    /**
     * Load code
     */
    function loadCode(content) {
        loader.style.display = 'none';
        const pre = document.createElement('pre');
        pre.className = 'stratos-modal-code';
        const code = document.createElement('code');
        code.textContent = content;
        pre.appendChild(code);
        modalContent.appendChild(pre);
    }

    /**
     * Load inline content
     */
    function loadInline(content) {
        loader.style.display = 'none';
        const div = document.createElement('div');
        div.className = 'stratos-modal-inline';
        div.innerHTML = content;
        modalContent.appendChild(div);
        
        // Initialize WP showcase tabs if present (with small delay for DOM to update)
        setTimeout(function() {
            if (typeof window.initWpModalTabs === 'function') {
                window.initWpModalTabs();
            }
        }, 10);
    }

    /**
     * Load content via AJAX
     */
    function loadAjax(postId, type) {
        fetch(stratosModal.ajaxUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'stratos_modal_content',
                nonce: stratosModal.nonce,
                post_id: postId,
                type: type,
            }),
        })
        .then(response => response.json())
        .then(data => {
            loader.style.display = 'none';

            if (data.success) {
                modalTitle.textContent = data.data.title;

                const div = document.createElement('div');
                div.className = 'stratos-modal-inline';
                div.innerHTML = data.data.content;
                modalContent.appendChild(div);
            } else {
                modalContent.innerHTML = `<p class="error">${data.data.message || 'Error loading content'}</p>`;
            }
        })
        .catch(() => {
            loader.style.display = 'none';
            modalContent.innerHTML = '<p class="error">Error loading content</p>';
        });
    }

    /**
     * Update navigation buttons
     */
    function updateNavigation() {
        if (currentGallery.length > 1) {
            modalPrev.style.display = 'inline-flex';
            modalNext.style.display = 'inline-flex';
            modalCounter.style.display = 'block';
            modalCounter.textContent = `${currentIndex + 1} / ${currentGallery.length}`;

            modalPrev.disabled = currentIndex === 0;
            modalNext.disabled = currentIndex === currentGallery.length - 1;
        } else {
            modalPrev.style.display = 'none';
            modalNext.style.display = 'none';
            modalCounter.style.display = 'none';
        }
    }

    /**
     * Previous gallery item
     */
    function prevGallery() {
        if (currentIndex > 0) {
            loadGallery(currentGallery, currentIndex - 1);
        }
    }

    /**
     * Next gallery item
     */
    function nextGallery() {
        if (currentIndex < currentGallery.length - 1) {
            loadGallery(currentGallery, currentIndex + 1);
        }
    }

    // Expose API for child themes
    window.StratosModal = {
        open: openModal,
        close: closeModal,
        isOpen: () => isOpen,
        init: initElements,
    };

    // Initialize after DOM is ready (modal markup is in footer)
    // Try DOMContentLoaded first, then fallback to window load
    function tryInit() {
        initElements();
        
        // Only add event listeners if modal exists
        if (!modalClose) {
            console.warn('Modal not found - retrying in 100ms');
            setTimeout(tryInit, 100);
            return;
        }

        // Event listeners
        modalClose.addEventListener('click', closeModal);
        modalPrev.addEventListener('click', prevGallery);
        modalNext.addEventListener('click', nextGallery);

        // Close on overlay click
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                closeModal();
            }
        });

        // Close on ESC
        document.addEventListener('keydown', (e) => {
            if (!isOpen) return;

            if (e.key === 'Escape') {
                closeModal();
            } else if (e.key === 'ArrowLeft') {
                prevGallery();
            } else if (e.key === 'ArrowRight') {
                nextGallery();
            }
        });

        // Handle trigger buttons
        document.addEventListener('click', (e) => {
            const trigger = e.target.closest('.stratos-modal-trigger');
            if (!trigger) return;

            e.preventDefault();

            // Get content from data-content or from referenced element
            let content = trigger.dataset.content || '';
            
            // If data-content-ref is provided, get content from that element
            const contentRef = trigger.dataset.contentRef;
            if (contentRef) {
                const refElement = document.getElementById(contentRef.replace('#', ''));
                if (refElement) {
                    content = refElement.innerHTML;
                }
            }

            const options = {
                type: trigger.dataset.type || 'inline',
                title: trigger.dataset.title || '',
                content: content,
                url: trigger.dataset.url || '',
                postId: parseInt(trigger.dataset.postId) || 0,
                gallery: trigger.dataset.gallery ? JSON.parse(trigger.dataset.gallery) : [],
                index: parseInt(trigger.dataset.index) || 0,
            };

            openModal(options);
        });

        console.log('Modal initialized successfully');
    }

    // Start initialization
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', tryInit);
    } else {
        tryInit();
    }
})();
