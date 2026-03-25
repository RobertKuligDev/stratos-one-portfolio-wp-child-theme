/**
 * Robert Portfolio Theme - Main JavaScript
 *
 * Main entry point for theme JavaScript.
 * Imports: modal.js
 *
 * @package Robert_Portfolio
 * @version 1.0.0
 */

(function() {
  'use strict';

  /**
   * Services Accordion (mobile)
   * Handles accordion behavior for service cards on mobile
   */
  const ServicesAccordion = {
    cards: [],

    init: function() {
      this.cards = document.querySelectorAll('.service-card[data-service]');
      if (this.cards.length === 0) return;

      this.cards.forEach(card => {
        const toggle = card.querySelector('.service-card-toggle');
        if (!toggle) return;

        toggle.addEventListener('click', () => this.toggleCard(card));
      });
    },

    toggleCard: function(card) {
      const isExpanded = card.getAttribute('aria-expanded') === 'true';
      const toggle = card.querySelector('.service-card-toggle');

      // Close all other cards
      this.cards.forEach(c => {
        if (c !== card) {
          c.setAttribute('aria-expanded', 'false');
          c.classList.remove('active');
          const t = c.querySelector('.service-card-toggle');
          if (t) t.setAttribute('aria-expanded', 'false');
        }
      });

      // Toggle current card
      card.setAttribute('aria-expanded', !isExpanded);
      card.classList.toggle('active', !isExpanded);
      if (toggle) {
        toggle.setAttribute('aria-expanded', !isExpanded);
      }
    }
  };

  /**
   * About Section Accordion (mobile)
   * Handles read more toggle for about section
   */
  const AboutAccordion = {
    toggle: null,
    details: null,

    init: function() {
      this.toggle = document.querySelector('.about-toggle');
      this.details = document.querySelector('.about-details');
      if (!this.toggle || !this.details) return;

      this.toggle.addEventListener('click', () => this.toggleDetails());
    },

    toggleDetails: function() {
      const isExpanded = this.toggle.getAttribute('aria-expanded') === 'true';
      this.toggle.setAttribute('aria-expanded', !isExpanded);
      this.details.classList.toggle('active', !isExpanded);
    }
  };

  /**
   * Work Environment Modal Handler (About section)
   */
  const WorkEnvModal = {
    modal: null,
    btn: null,
    closeBtn: null,

    init: function() {
      this.modal = document.getElementById('work-env-modal');
      this.btn = document.getElementById('btn-work-env');
      if (!this.modal || !this.btn) return;

      this.closeBtn = this.modal.querySelector('.modal-close');

      // Open modal
      this.btn.addEventListener('click', this.open.bind(this));

      // Close modal
      if (this.closeBtn) {
        this.closeBtn.addEventListener('click', this.close.bind(this));
      }

      // Close on backdrop click
      this.modal.addEventListener('click', (e) => {
        if (e.target === this.modal) {
          this.close();
        }
      });

      // Close on ESC
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.modal.classList.contains('active')) {
          this.close();
        }
      });
    },

    open: function() {
      this.modal.classList.add('active');
      document.body.classList.add('modal-open');
      this.closeBtn.focus();
    },

    close: function() {
      this.modal.classList.remove('active');
      document.body.classList.remove('modal-open');
    }
  };

  /**
   * Page Modal Handler (for footer menu pages)
   */
  const PageModal = {
    modal: null,
    modalTitle: null,
    modalBody: null,
    closeBtn: null,

    init: function() {
      this.modal = document.getElementById('page-modal');
      if (!this.modal) return;

      this.modalTitle = this.modal.querySelector('.modal-title');
      this.modalBody = this.modal.querySelector('.modal-body');
      this.closeBtn = this.modal.querySelector('.modal-close');

      // Handle footer menu clicks
      const footerLinks = document.querySelectorAll('.footer-menu a[href*="#"]');
      footerLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.startsWith('#')) {
          const pageSlug = href.substring(1);
          link.addEventListener('click', (e) => {
            e.preventDefault();
            this.openPage(pageSlug);
          });
        }
      });

      // Close modal
      if (this.closeBtn) {
        this.closeBtn.addEventListener('click', this.close.bind(this));
      }

      // Close on backdrop click
      this.modal.addEventListener('click', (e) => {
        if (e.target === this.modal) {
          this.close();
        }
      });

      // Close on ESC
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.modal.classList.contains('active')) {
          this.close();
        }
      });
    },

    openPage: function(pageSlug) {
      if (!pageSlug) return;

      this.modal.classList.add('active');
      document.body.classList.add('modal-open');
      this.showLoader();

      // Fetch page content via AJAX
      const formData = new FormData();
      formData.append('action', 'robert_portfolio_fetch_page');
      formData.append('nonce', robertPortfolioConfig.nonce);
      formData.append('page_slug', pageSlug);

      fetch(robertPortfolioConfig.ajaxUrl, {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          this.modalTitle.textContent = data.data.title;
          this.modalBody.innerHTML = data.data.content;
        } else {
          this.showError(data.data.message || 'Failed to load page');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        this.showError('Failed to load page. Please try again.');
      });
    },

    showLoader: function() {
      this.modalBody.innerHTML = `
        <div class="modal-loader">
          <div class="modal-loader-spinner"></div>
          <p class="modal-loader-text">Ładowanie treści...</p>
        </div>
      `;
    },

    showError: function(message) {
      this.modalBody.innerHTML = `
        <div class="modal-error">
          <p>${message}</p>
        </div>
      `;
    },

    close: function() {
      this.modal.classList.remove('active');
      document.body.classList.remove('modal-open');
      this.modalTitle.textContent = '';
      this.modalBody.innerHTML = '';
    }
  };

  /**
   * Code Modal Handler (Custom WP Theme section)
   */
  const CodeModal = {
    modals: null,
    cards: null,
    closeButtons: null,

    init: function() {
      this.cards = document.querySelectorAll('.feature-card[data-modal-id]');
      this.modals = document.querySelectorAll('.modal[id^="modal-"]');

      if (!this.cards.length || !this.modals.length) return;

      // Open modal on card click
      this.cards.forEach(card => {
        card.addEventListener('click', this.open.bind(this));
        card.addEventListener('keydown', this.handleKeydown.bind(this));
      });

      // Close modal on close button click
      this.closeButtons = document.querySelectorAll('.modal-close');
      this.closeButtons.forEach(closeBtn => {
        closeBtn.addEventListener('click', this.close.bind(this));
      });

      // Close on backdrop click
      this.modals.forEach(modal => {
        modal.addEventListener('click', this.handleBackdropClick.bind(this));
      });

      // Close on ESC
      document.addEventListener('keydown', this.handleEscKey.bind(this));
    },

    open: function(e) {
      const modalId = e.currentTarget.dataset.modalId;
      const modal = document.getElementById(modalId);

      if (!modal) return;

      modal.classList.add('active');
      document.body.classList.add('modal-open');

      // Focus close button
      const closeBtn = modal.querySelector('.modal-close');
      if (closeBtn) closeBtn.focus();
    },

    close: function() {
      this.modals.forEach(modal => {
        modal.classList.remove('active');
      });
      document.body.classList.remove('modal-open');
    },

    handleBackdropClick: function(e) {
      if (e.target === e.currentTarget) {
        this.close();
      }
    },

    handleEscKey: function(e) {
      if (e.key === 'Escape') {
        this.close();
      }
    },

    handleKeydown: function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.open(e);
      }
    }
  };

  /**
   * Header Scroll Handler
   * Adds 'scrolled' class to header when page is scrolled
   */
  const HeaderScroll = {
    header: null,
    scrollThreshold: 50,

    init: function() {
      this.header = document.querySelector('.site-header');
      if (!this.header) return;

      window.addEventListener('scroll', this.handleScroll.bind(this));
      this.handleScroll(); // Check initial scroll position
    },

    handleScroll: function() {
      if (window.scrollY > this.scrollThreshold) {
        this.header.classList.add('scrolled');
      } else {
        this.header.classList.remove('scrolled');
      }
    }
  };

  /**
   * Case Study Modal Handler
   */
  const CaseStudyModal = {
    modals: null,
    buttons: null,
    closeButtons: null,

    init: function() {
      this.buttons = document.querySelectorAll('.btn-case-study');
      this.modals = document.querySelectorAll('.modal[id^="case-study-modal-"]');

      if (!this.buttons.length || !this.modals.length) return;

      // Open modal on button click
      this.buttons.forEach(button => {
        button.addEventListener('click', this.open.bind(this));
      });

      // Close modal on close button click
      this.closeButtons = document.querySelectorAll('.modal-close');
      this.closeButtons.forEach(closeBtn => {
        closeBtn.addEventListener('click', this.close.bind(this));
      });

      // Close on backdrop click
      this.modals.forEach(modal => {
        modal.addEventListener('click', this.handleBackdropClick.bind(this));
      });

      // Close on ESC
      document.addEventListener('keydown', this.handleEscKey.bind(this));
    },

    open: function(e) {
      const projectId = e.currentTarget.dataset.projectId;
      const modal = document.getElementById('case-study-modal-' + projectId);

      if (!modal) return;

      modal.classList.add('active');
      document.body.classList.add('modal-open');

      // Focus close button
      const closeBtn = modal.querySelector('.modal-close');
      if (closeBtn) closeBtn.focus();
    },

    close: function() {
      this.modals.forEach(modal => {
        modal.classList.remove('active');
      });
      document.body.classList.remove('modal-open');
    },

    handleBackdropClick: function(e) {
      if (e.target === e.currentTarget) {
        this.close();
      }
    },

    handleEscKey: function(e) {
      if (e.key === 'Escape') {
        this.close();
      }
    }
  };

  /**
   * Contact Form Handler
   */
  const ContactForm = {
    form: null,
    submitBtn: null,
    messageEl: null,

    init: function() {
      this.form = document.getElementById('contact-form');
      if (!this.form) return;

      this.submitBtn = this.form.querySelector('button[type="submit"]');
      this.messageEl = this.form.querySelector('.form-message');

      this.form.addEventListener('submit', this.handleSubmit.bind(this));
    },

    handleSubmit: function(e) {
      e.preventDefault();

      const formData = new FormData(this.form);
      formData.append('action', 'robert_portfolio_contact');

      this.setLoading(true);
      this.clearMessage();

      fetch(robertPortfolioConfig.ajaxUrl, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          this.showMessage(data.data.message, 'success');
          this.form.reset();
        } else {
          this.showMessage(data.data.message || 'Wystąpił błąd. Spróbuj ponownie.', 'error');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        this.showMessage('Wystąpił błąd. Spróbuj ponownie.', 'error');
      })
      .finally(() => {
        this.setLoading(false);
      });
    },

    setLoading: function(loading) {
      if (this.submitBtn) {
        this.submitBtn.disabled = loading;
        this.submitBtn.textContent = loading ? 'Wysyłanie...' : 'Wyślij wiadomość';
      }
    },

    showMessage: function(message, type) {
      if (!this.messageEl) return;

      this.messageEl.textContent = message;
      this.messageEl.className = 'form-message ' + (type === 'success' ? 'success' : 'error');
    },

    clearMessage: function() {
      if (this.messageEl) {
        this.messageEl.textContent = '';
        this.messageEl.className = 'form-message';
      }
    }
  };

  /**
   * Mobile Menu Toggle
   */
  const MobileMenu = {
    toggle: null,
    nav: null,

    init: function() {
      this.toggle = document.querySelector('.menu-toggle');
      this.nav = document.querySelector('.main-navigation');
      if (!this.toggle || !this.nav) return;

      this.toggle.addEventListener('click', this.toggleMenu.bind(this));
    },

    toggleMenu: function() {
      const isExpanded = this.toggle.getAttribute('aria-expanded') === 'true';
      this.toggle.setAttribute('aria-expanded', !isExpanded);
      this.nav.classList.toggle('active');
    }
  };

  /**
   * Smooth Scroll for Anchor Links
   */
  const SmoothScroll = {
    init: function() {
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', this.handleClick.bind(this));
      });
    },

    handleClick: function(e) {
      const href = e.currentTarget.getAttribute('href');
      if (href === '#') return;

      const target = document.querySelector(href);
      if (!target) return;

      e.preventDefault();
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  };

  /**
   * Projects Filter
   */
  const ProjectsFilter = {
    buttons: null,
    cards: null,

    init: function() {
      this.buttons = document.querySelectorAll('.filter-btn');
      // Include both standard cards and featured projects
      const standardCards = document.querySelectorAll('.project-card');
      const featuredCards = document.querySelectorAll('.featured-project');
      this.cards = [...standardCards, ...featuredCards];

      if (!this.buttons.length || !this.cards.length) return;

      this.buttons.forEach(button => {
        button.addEventListener('click', this.filter.bind(this));
      });
    },

    filter: function(e) {
      const filter = e.currentTarget.dataset.filter;

      // Update active button
      this.buttons.forEach(btn => btn.classList.remove('active'));
      e.currentTarget.classList.add('active');

      // Filter projects
      this.cards.forEach(card => {
        const category = card.dataset.category;

        if (filter === 'all' || category === filter) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    }
  };

  /**
   * Fade-in Animation on Scroll (Intersection Observer)
   */
  const FadeInAnimation = {
    observer: null,

    init: function() {
      if (!('IntersectionObserver' in window)) {
        // Fallback for older browsers
        document.querySelectorAll('.fade-in').forEach(el => {
          el.classList.add('visible');
        });
        return;
      }

      this.observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            this.observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      });

      document.querySelectorAll('.fade-in').forEach(el => {
        this.observer.observe(el);
      });
    }
  };

  /**
   * Back to Top Button
   */
  const BackToTop = {
    button: null,
    scrollThreshold: 300,

    init: function() {
      this.button = document.getElementById('back-to-top');
      if (!this.button) return;

      // Show/hide on scroll
      window.addEventListener('scroll', this.handleScroll.bind(this));

      // Click to scroll top
      this.button.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    },

    handleScroll: function() {
      if (window.scrollY > this.scrollThreshold) {
        this.button.classList.add('visible');
      } else {
        this.button.classList.remove('visible');
      }
    }
  };

  /**
   * Scroll Reveal — reveal elements as they enter viewport
   */
  const ScrollReveal = {
    init: function() {
      if (!("IntersectionObserver" in window)) {
        document.querySelectorAll(".reveal").forEach(el => el.classList.add("visible"));
        return;
      }
      const obs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.08, rootMargin: "0px 0px -40px 0px" });
      document.querySelectorAll(".reveal").forEach(el => obs.observe(el));
    }
  };

  // Initialize on DOM ready
  document.addEventListener('DOMContentLoaded', function() {
    ServicesAccordion.init();
    AboutAccordion.init();
    FadeInAnimation.init();
    BackToTop.init();
    WorkEnvModal.init();
    PageModal.init();
    CodeModal.init();
    HeaderScroll.init();
    CaseStudyModal.init();
    ContactForm.init();
    MobileMenu.init();
    SmoothScroll.init();
    ProjectsFilter.init();
    ScrollReveal.init();

    console.log('Robert Portfolio Theme loaded');
  });

})();
