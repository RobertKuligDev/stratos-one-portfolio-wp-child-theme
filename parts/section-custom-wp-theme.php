<?php
/**
 * Custom WP Theme section template part
 *
 * WordPress skills showcase — secondary narrative
 * Positions WP as an additional competency, not the main focus
 *
 * @package Stratos_One_Portfolio
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- Custom WP Theme Section -->
<section class="wp-showcase" id="custom-wp-theme">
    <div class="container">

        <!-- Section Header -->
        <header class="section-header reveal">
            <span class="section-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <?php esc_html_e('WordPress Engineering', 'stratos-one-portfolio'); ?>
            </span>
            <h2 class="section-title">
                <?php esc_html_e('Full-Stack WordPress — Production Quality', 'stratos-one-portfolio'); ?>
            </h2>
            <p class="section-subtitle">
                <?php esc_html_e('Beyond page builders. Custom themes, CPTs, AJAX handlers and REST API integrations — the same engineering standards I apply to .NET and Angular systems.', 'stratos-one-portfolio'); ?>
            </p>
        </header>

        <!-- Skills Grid -->
        <div class="wp-skills-grid">

            <!-- Card 1: Architecture -->
            <div class="wp-skill-card wp-skill-card--featured reveal">
                <div class="wp-skill-card-top">
                    <span class="wp-skill-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <path d="M3 9h18M3 15h18M9 3v18M15 3v18"/>
                        </svg>
                    </span>
                    <span class="wp-skill-tag"><?php esc_html_e('Architecture', 'stratos-one-portfolio'); ?></span>
                </div>
                <h3 class="wp-skill-title"><?php esc_html_e('Clean Theme Architecture', 'stratos-one-portfolio'); ?></h3>
                <p class="wp-skill-desc"><?php esc_html_e('Modular template hierarchy with clear separation of concerns. No page builders, no bloat — just clean PHP following WordPress coding standards.', 'stratos-one-portfolio'); ?></p>
                <div class="wp-skill-tags">
                    <span>Template Hierarchy</span>
                    <span>Child Themes</span>
                    <span>Hooks & Filters</span>
                </div>
            </div>

            <!-- Card 2: CPT -->
            <div class="wp-skill-card reveal">
                <div class="wp-skill-card-top">
                    <span class="wp-skill-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </span>
                    <span class="wp-skill-tag"><?php esc_html_e('Data', 'stratos-one-portfolio'); ?></span>
                </div>
                <h3 class="wp-skill-title"><?php esc_html_e('Custom Post Types & Taxonomies', 'stratos-one-portfolio'); ?></h3>
                <p class="wp-skill-desc"><?php esc_html_e('Structured content models with custom fields, meta boxes and query optimization.', 'stratos-one-portfolio'); ?></p>
                <div class="wp-skill-tags">
                    <span>CPT</span>
                    <span>Custom Taxonomies</span>
                    <span>WP_Query</span>
                </div>
            </div>

            <!-- Card 3: AJAX & REST -->
            <div class="wp-skill-card reveal">
                <div class="wp-skill-card-top">
                    <span class="wp-skill-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                        </svg>
                    </span>
                    <span class="wp-skill-tag"><?php esc_html_e('API', 'stratos-one-portfolio'); ?></span>
                </div>
                <h3 class="wp-skill-title"><?php esc_html_e('AJAX & REST API', 'stratos-one-portfolio'); ?></h3>
                <p class="wp-skill-desc"><?php esc_html_e('Custom AJAX handlers with nonce security and REST API endpoints for headless and hybrid setups.', 'stratos-one-portfolio'); ?></p>
                <div class="wp-skill-tags">
                    <span>admin-ajax.php</span>
                    <span>REST Endpoints</span>
                    <span>Nonce Auth</span>
                </div>
            </div>

            <!-- Card 4: Performance -->
            <div class="wp-skill-card reveal">
                <div class="wp-skill-card-top">
                    <span class="wp-skill-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
                    </span>
                    <span class="wp-skill-tag"><?php esc_html_e('Performance', 'stratos-one-portfolio'); ?></span>
                </div>
                <h3 class="wp-skill-title"><?php esc_html_e('Performance & Optimization', 'stratos-one-portfolio'); ?></h3>
                <p class="wp-skill-desc"><?php esc_html_e('Lighthouse 95+ scores. Asset enqueuing, lazy loading, cache busting and minimal dependency footprint.', 'stratos-one-portfolio'); ?></p>
                <div class="wp-skill-tags">
                    <span>Lighthouse 95+</span>
                    <span>Asset Pipeline</span>
                    <span>No jQuery</span>
                </div>
            </div>

            <!-- Card 5: Security -->
            <div class="wp-skill-card reveal">
                <div class="wp-skill-card-top">
                    <span class="wp-skill-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </span>
                    <span class="wp-skill-tag"><?php esc_html_e('Security', 'stratos-one-portfolio'); ?></span>
                </div>
                <h3 class="wp-skill-title"><?php esc_html_e('Security & Hardening', 'stratos-one-portfolio'); ?></h3>
                <p class="wp-skill-desc"><?php esc_html_e('Nonce verification, input sanitization, capability checks and anti-spam honeypots on all form handlers.', 'stratos-one-portfolio'); ?></p>
                <div class="wp-skill-tags">
                    <span>Nonces</span>
                    <span>Sanitization</span>
                    <span>Capability Checks</span>
                </div>
            </div>

            <!-- Card 6: Integrations — CTA -->
            <div class="wp-skill-card wp-skill-card--cta reveal">
                <div class="wp-skill-card-top">
                    <span class="wp-skill-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                        </svg>
                    </span>
                    <span class="wp-skill-tag"><?php esc_html_e('Integrations', 'stratos-one-portfolio'); ?></span>
                </div>
                <h3 class="wp-skill-title"><?php esc_html_e('Plugin & API Integrations', 'stratos-one-portfolio'); ?></h3>
                <p class="wp-skill-desc"><?php esc_html_e('WooCommerce, ACF, Elementor custom widgets, third-party REST APIs and webhook handlers.', 'stratos-one-portfolio'); ?></p>
                <div class="wp-skill-tags">
                    <span>WooCommerce</span>
                    <span>ACF</span>
                    <span>Webhooks</span>
                </div>
            </div>

        </div>

        <!-- Bottom CTA: open single detail modal -->
        <div class="wp-showcase-footer reveal">
            <div class="wp-showcase-note">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 16v-4m0-4h.01"/>
                </svg>
                <p><?php esc_html_e('This portfolio is itself a custom WordPress theme built from scratch — architecture, AJAX, CPTs and all.', 'stratos-one-portfolio'); ?></p>
            </div>
            <button class="btn btn-secondary stratos-modal-trigger wp-showcase-btn"
                    type="button"
                    data-type="inline"
                    data-title="<?php esc_attr_e('WordPress Engineering — Technical Details', 'stratos-one-portfolio'); ?>"
                    data-content-ref="#modal-wp-showcase">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <?php esc_html_e('View Technical Details', 'stratos-one-portfolio'); ?>
            </button>
        </div>

    </div>
</section>

<!-- Single unified modal with all technical details -->
<div id="modal-wp-showcase" style="display:none;">

    <!-- Tab navigation -->
    <div class="wp-modal-tabs">
        <button class="wp-modal-tab active" data-tab="architecture"><?php esc_html_e('Architecture', 'stratos-one-portfolio'); ?></button>
        <button class="wp-modal-tab" data-tab="performance"><?php esc_html_e('Performance', 'stratos-one-portfolio'); ?></button>
        <button class="wp-modal-tab" data-tab="security"><?php esc_html_e('Security', 'stratos-one-portfolio'); ?></button>
        <button class="wp-modal-tab" data-tab="integrations"><?php esc_html_e('Integrations', 'stratos-one-portfolio'); ?></button>
    </div>

    <!-- Tab: Architecture -->
    <div class="wp-modal-panel active" data-panel="architecture">
        <p class="modal-detail-intro"><?php esc_html_e('Modular file structure with clear separation of concerns. No spaghetti code, no page builders.', 'stratos-one-portfolio'); ?></p>
        <pre class="modal-code"><code>stratos-one-portfolio/       ← child theme
├── assets/
│   ├── css/
│   │   ├── 01-variables.css
│   │   ├── 02-base.css
│   │   ├── 03-layout.css
│   │   ├── 04-components.css
│   │   ├── 05-sections.css
│   │   └── 06-responsive.css
│   └── js/
│       ├── main.js
│       ├── modal.js
│       └── components/
├── parts/                   ← template parts per section
│   ├── section-hero.php
│   ├── section-services.php
│   ├── section-projects.php
│   ├── section-about.php
│   └── section-contact.php
├── inc/
│   ├── class-form-handler.php
│   ├── class-asset-loader.php
│   └── class-cpt-manager.php
├── functions.php
├── front-page.php
└── style.css</code></pre>
        <h4 class="modal-detail-subtitle"><?php esc_html_e('Key patterns:', 'stratos-one-portfolio'); ?></h4>
        <ul class="modal-detail-list">
            <li><?php esc_html_e('Child theme inherits parent styles, overrides only what needs changing', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Each section is a self-contained template part', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('PHP classes with single responsibility per file', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('WordPress hooks and filters — never modifying core', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Namespaced functions to avoid conflicts', 'stratos-one-portfolio'); ?></li>
        </ul>
    </div>

    <!-- Tab: Performance -->
    <div class="wp-modal-panel" data-panel="performance">
        <p class="modal-detail-intro"><?php esc_html_e('Zero page builders, minimal dependencies, optimized asset delivery.', 'stratos-one-portfolio'); ?></p>
        <div class="performance-grid">
            <div class="performance-card">
                <span class="performance-value">95+</span>
                <span class="performance-label">Lighthouse Score</span>
            </div>
            <div class="performance-card">
                <span class="performance-value">&lt;1s</span>
                <span class="performance-label">First Contentful Paint</span>
            </div>
            <div class="performance-card">
                <span class="performance-value">0</span>
                <span class="performance-label">Page Builders</span>
            </div>
            <div class="performance-card">
                <span class="performance-value">0</span>
                <span class="performance-label">jQuery Dependencies</span>
            </div>
        </div>
        <h4 class="modal-detail-subtitle"><?php esc_html_e('Optimizations applied:', 'stratos-one-portfolio'); ?></h4>
        <ul class="modal-detail-list">
            <li><?php esc_html_e('Vanilla JavaScript — no jQuery', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('CSS variables for design tokens — no preprocessor overhead', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Scripts loaded in footer with defer', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Cache busting with filemtime()', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('IntersectionObserver for scroll reveal — no scroll event listeners', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Images lazy loaded natively', 'stratos-one-portfolio'); ?></li>
        </ul>
    </div>

    <!-- Tab: Security -->
    <div class="wp-modal-panel" data-panel="security">
        <p class="modal-detail-intro"><?php esc_html_e('Production-ready form handling with multiple security layers on every endpoint.', 'stratos-one-portfolio'); ?></p>
        <pre class="modal-code"><code>// Every AJAX handler follows this pattern:
function handle_form_submission() {

    // 1. Verify nonce
    if ( ! wp_verify_nonce( $_POST['nonce'], 'my_action' ) ) {
        wp_send_json_error( [ 'message' => 'Invalid token' ] );
    }

    // 2. Capability check (where applicable)
    if ( ! current_user_can( 'read' ) ) {
        wp_send_json_error( [ 'message' => 'Forbidden' ], 403 );
    }

    // 3. Sanitize all inputs
    $name    = sanitize_text_field( $_POST['name'] );
    $email   = sanitize_email( $_POST['email'] );
    $message = sanitize_textarea_field( $_POST['message'] );

    // 4. Validate
    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => 'Invalid email' ] );
    }

    // 5. Honeypot anti-spam
    if ( ! empty( $_POST['website'] ) ) {
        wp_send_json_success(); // silently discard
    }

    // 6. Process...
}</code></pre>
        <ul class="modal-detail-list">
            <li><?php esc_html_e('WordPress nonce verification on every request', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Input sanitization — text, email, textarea, absint', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Server-side validation independent of JS', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('Anti-spam honeypot field', 'stratos-one-portfolio'); ?></li>
            <li><?php esc_html_e('No sensitive data exposed in JS global scope', 'stratos-one-portfolio'); ?></li>
        </ul>
    </div>

    <!-- Tab: Integrations -->
    <div class="wp-modal-panel" data-panel="integrations">
        <p class="modal-detail-intro"><?php esc_html_e('Extending WordPress with custom integrations and third-party APIs.', 'stratos-one-portfolio'); ?></p>
        <div class="feature-list">
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
                </span>
                <div>
                    <strong>WooCommerce</strong>
                    <span><?php esc_html_e('Custom product types, checkout hooks, order status integrations', 'stratos-one-portfolio'); ?></span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </span>
                <div>
                    <strong>ACF / Custom Fields</strong>
                    <span><?php esc_html_e('Advanced Custom Fields for structured content, flexible content layouts', 'stratos-one-portfolio'); ?></span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </span>
                <div>
                    <strong>REST API & Webhooks</strong>
                    <span><?php esc_html_e('Custom REST endpoints, webhook receivers, external API consumers', 'stratos-one-portfolio'); ?></span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </span>
                <div>
                    <strong><?php esc_html_e('Email & Transactional', 'stratos-one-portfolio'); ?></strong>
                    <span><?php esc_html_e('Custom wp_mail templates, SMTP configuration, Mailcow integration', 'stratos-one-portfolio'); ?></span>
                </div>
            </div>
        </div>
    </div>

</div>
