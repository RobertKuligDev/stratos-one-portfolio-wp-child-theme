<?php
/**
 * Custom WP Theme section template part
 *
 * Engineering showcase - Stratos One theme built from scratch
 * Premium redesign with enhanced visual hierarchy
 *
 * @package Stratos_One_Portfolio
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Modal content for each feature
$modal_content = [
    'architecture' => '
        <h3 class="modal-detail-title">Theme Architecture</h3>
        <p class="modal-detail-intro">Clean, modular file structure with clear separation of concerns. No spaghetti code, no page builders.</p>
        <pre class="modal-code"><code>stratos-one-portfolio/
├── assets/
│   ├── css/
│   │   ├── 01-variables.css
│   │   ├── 02-base.css
│   │   ├── 03-layout.css
│   │   ├── 04-components.css
│   │   ├── 05-sections.css
│   │   └── 06-responsive.css
│   ├── js/
│   │   ├── main.js
│   │   ├── modal.js
│   │   └── components/
│   └── images/
├── template-parts/
│   ├── header/
│   ├── blocks/
│   └── components/
├── parts/
├── patterns/
├── functions.php
├── front-page.php
└── style.css</code></pre>
    ',
    'blocks' => '
        <h3 class="modal-detail-title">Modular Template System</h3>
        <p class="modal-detail-intro">Each section is a reusable template part following WordPress block theme standards.</p>
        <div class="feature-list">
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                </span>
                <div>
                    <strong>Hero Section</strong>
                    <span>Headline, tech stack, CTA buttons, architecture diagram</span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                </span>
                <div>
                    <strong>What I Do</strong>
                    <span>Services grid with featured project showcase</span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
                </span>
                <div>
                    <strong>Projects</strong>
                    <span>CPT query loop with filterable project cards</span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v6m0 6v6m11-7h-6m-6 0H1m15.5-6.5l-4.5 4.5m-4 4L7.5 16.5"/></svg>
                </span>
                <div>
                    <strong>Custom WP Theme</strong>
                    <span>Feature showcase with detailed modals</span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </span>
                <div>
                    <strong>About</strong>
                    <span>Bio with parallax photo and skills accordion</span>
                </div>
            </div>
            <div class="feature-list-item">
                <span class="feature-list-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </span>
                <div>
                    <strong>Contact</strong>
                    <span>Form with validation and social links</span>
                </div>
            </div>
        </div>
    ',
    'performance' => '
        <h3 class="modal-detail-title">Performance Metrics</h3>
        <p class="modal-detail-intro">Zero page builders, minimal dependencies, optimized assets.</p>
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
                <span class="performance-value">100%</span>
                <span class="performance-label">Custom Code</span>
            </div>
        </div>
        <h4 class="modal-detail-subtitle">Optimizations:</h4>
        <ul class="modal-detail-list">
            <li>Minimal CSS with no frameworks</li>
            <li>Vanilla JavaScript (no jQuery)</li>
            <li>Lazy loading images</li>
            <li>Async script loading</li>
            <li>Cache busting with filemtime()</li>
            <li>Optimized asset delivery</li>
        </ul>
    ',
    'security' => '
        <h3 class="modal-detail-title">Security & Validation</h3>
        <p class="modal-detail-intro">Production-ready form handling with multiple security layers.</p>
        <pre class="modal-code"><code>// Form handler with nonce verification
function stratos_one_handle_form_submission() {
    // Verify nonce
    if (!isset($_POST[\'nonce\']) ||
        !wp_verify_nonce($_POST[\'nonce\'], \'stratos_one_nonce\')) {
        wp_send_json_error([\'message\' => \'Invalid security token\']);
    }

    // Sanitize inputs
    $name = sanitize_text_field($_POST[\'name\']);
    $email = sanitize_email($_POST[\'email\']);
    $message = sanitize_textarea_field($_POST[\'message\']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error([\'message\' => \'All fields are required\']);
    }

    // Validate email format
    if (!is_email($email)) {
        wp_send_json_error([\'message\' => \'Invalid email address\']);
    }

    // Anti-spam honeypot
    if (!empty($_POST[\'website\'])) {
        wp_send_json_success([\'message\' => \'Message sent\']);
    }

    // Process form...
}</code></pre>
        <h4 class="modal-detail-subtitle">Security Features:</h4>
        <ul class="modal-detail-list">
            <li>WordPress nonce verification</li>
            <li>Input sanitization (text, email, textarea)</li>
            <li>Server-side validation</li>
            <li>Anti-spam honeypot field</li>
            <li>Minimal plugin dependencies</li>
        </ul>
    ',
];
?>
<!-- Custom WP Theme Section - Engineering Showcase -->
<section class="custom-wp-theme" id="custom-wp-theme">
    <div class="container">
        
        <!-- Section Header -->
        <header class="section-header reveal">
            <span class="section-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <?php esc_html_e('Engineering Showcase', 'stratos-one-portfolio'); ?>
            </span>
            <h2 class="section-title"><?php esc_html_e('Engineering-Grade WordPress Theme', 'stratos-one-portfolio'); ?></h2>
            <p class="section-subtitle">
                <?php esc_html_e('Built from scratch — no page builders, no bloat. Clean architecture, custom blocks, and production-ready performance.', 'stratos-one-portfolio'); ?>
            </p>
        </header>

        <!-- Features Grid -->
        <div class="features-grid">

            <!-- Feature 1: Architecture -->
            <div class="feature-card feature-card-lg" data-modal="architecture">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M3 9h18M3 15h18M9 3v18M15 3v18"/>
                    </svg>
                </div>
                <div class="feature-card-content">
                    <h3 class="feature-card-title"><?php esc_html_e('Clean Architecture', 'stratos-one-portfolio'); ?></h3>
                    <p class="feature-card-text">
                        <?php esc_html_e('Modular template hierarchy, custom post types, and separation of concerns. No spaghetti code.', 'stratos-one-portfolio'); ?>
                    </p>
                </div>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="<?php esc_attr_e('Theme Architecture', 'stratos-one-portfolio'); ?>"
                        data-content-ref="#modal-architecture">
                    <span><?php esc_html_e('View Architecture', 'stratos-one-portfolio'); ?></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 2: Modular Sections -->
            <div class="feature-card" data-modal="blocks">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>
                </div>
                <div class="feature-card-content">
                    <h3 class="feature-card-title"><?php esc_html_e('Modular Sections', 'stratos-one-portfolio'); ?></h3>
                    <p class="feature-card-text">
                        <?php esc_html_e('Reusable template parts for each section. Easy maintenance and scalability.', 'stratos-one-portfolio'); ?>
                    </p>
                </div>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="<?php esc_attr_e('Modular Sections', 'stratos-one-portfolio'); ?>"
                        data-content-ref="#modal-blocks">
                    <span><?php esc_html_e('View Details', 'stratos-one-portfolio'); ?></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 3: Performance -->
            <div class="feature-card" data-modal="performance">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                </div>
                <div class="feature-card-content">
                    <h3 class="feature-card-title"><?php esc_html_e('Performance First', 'stratos-one-portfolio'); ?></h3>
                    <p class="feature-card-text">
                        <?php esc_html_e('Zero page builders, minimal dependencies. Lighthouse scores 95+.', 'stratos-one-portfolio'); ?>
                    </p>
                </div>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="<?php esc_attr_e('Performance Metrics', 'stratos-one-portfolio'); ?>"
                        data-content-ref="#modal-performance">
                    <span><?php esc_html_e('View Metrics', 'stratos-one-portfolio'); ?></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 4: Security -->
            <div class="feature-card" data-modal="security">
                <div class="feature-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <div class="feature-card-content">
                    <h3 class="feature-card-title"><?php esc_html_e('Security & Validation', 'stratos-one-portfolio'); ?></h3>
                    <p class="feature-card-text">
                        <?php esc_html_e('Custom form handlers with nonce verification and input sanitization.', 'stratos-one-portfolio'); ?>
                    </p>
                </div>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="<?php esc_attr_e('Security Features', 'stratos-one-portfolio'); ?>"
                        data-content-ref="#modal-security">
                    <span><?php esc_html_e('View Security', 'stratos-one-portfolio'); ?></span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Section Note -->
        <div class="section-note">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 16v-4m0-4h.01"/>
            </svg>
            <p>
                <?php esc_html_e('Stratos One is my own WordPress product — this portfolio is both a live demo and a real-world use case.', 'stratos-one-portfolio'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Hidden Modal Content -->
<div id="modal-architecture" style="display:none;">
    <?php echo $modal_content['architecture']; ?>
</div>
<div id="modal-blocks" style="display:none;">
    <?php echo $modal_content['blocks']; ?>
</div>
<div id="modal-performance" style="display:none;">
    <?php echo $modal_content['performance']; ?>
</div>
<div id="modal-security" style="display:none;">
    <?php echo $modal_content['security']; ?>
</div>
