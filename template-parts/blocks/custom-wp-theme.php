<?php
/**
 * Custom WP Theme section template part
 *
 * Engineering showcase - Stratos One theme built from scratch
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Modal content for each feature
$modal_content = [
    'architecture' => '
        <h3>Theme Architecture</h3>
        <pre class="modal-code"><code>stratos-one-portfolio/
├── assets/
│   ├── css/
│   │   ├── header.css
│   │   ├── hero.css
│   │   ├── what-i-do.css
│   │   ├── projects.css
│   │   ├── custom-wp-theme.css
│   │   ├── about.css
│   │   ├── contact.css
│   │   └── footer.css
│   └── js/
│       ├── header-scroll.js
│       ├── menu-toggle.js
│       ├── services-accordion.js
│       ├── about-section.js
│       └── back-to-top.js
├── template-parts/
│   ├── header/
│   │   ├── site-branding.php
│   │   └── navigation.php
│   └── blocks/
│       ├── hero.php
│       ├── what-i-do.php
│       ├── projects.php
│       ├── custom-wp-theme.php
│       ├── about.php
│       └── contact.php
├── patterns/
├── functions.php
├── header.php
├── front-page.php
└── footer.php</code></pre>
    ',
    'blocks' => '
        <h3>Modular Sections</h3>
        <p>This theme implements reusable template parts for each section:</p>
        <ul>
            <li><strong>Hero</strong> - Headline, tech stack, CTA buttons, architecture diagram</li>
            <li><strong>What I Do</strong> - Services grid with features and tech badges</li>
            <li><strong>Projects</strong> - CPT query loop with project cards</li>
            <li><strong>Custom WP Theme</strong> - Feature showcase with modal details</li>
            <li><strong>About</strong> - Bio with parallax photo and accordion</li>
            <li><strong>Contact</strong> - Form with highlights grid</li>
        </ul>
        <p>All sections are implemented as separate template parts in <code>template-parts/blocks/</code> for easy maintenance and reusability.</p>
    ',
    'performance' => '
        <h3>Performance First</h3>
        <div class="performance-grid">
            <div class="performance-item">
                <span class="performance-value">95+</span>
                <span class="performance-label">Lighthouse Score</span>
            </div>
            <div class="performance-item">
                <span class="performance-value">&lt;1s</span>
                <span class="performance-label">First Contentful Paint</span>
            </div>
            <div class="performance-item">
                <span class="performance-value">0</span>
                <span class="performance-label">Page Builders</span>
            </div>
            <div class="performance-item">
                <span class="performance-value">100%</span>
                <span class="performance-label">Custom Code</span>
            </div>
        </div>
        <h4>Optimizations:</h4>
        <ul>
            <li>Minimal CSS with no frameworks</li>
            <li>Vanilla JavaScript (no jQuery)</li>
            <li>Lazy loading images</li>
            <li>Async script loading</li>
            <li>Cache busting with filemtime()</li>
            <li>Optimized asset delivery</li>
        </ul>
    ',
    'security' => '
        <h3>Security & Validation</h3>
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
        wp_send_json_success([\'message\' => \'Message sent\']); // Silent fail
    }

    // Process form...
}</code></pre>
        <h4>Security Features:</h4>
        <ul>
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

        <div class="custom-wp-theme-header">
            <span class="section-badge">Engineering Showcase</span>
            <h2 class="section-title">Engineering-Grade WordPress Theme</h2>
            <p class="section-subtitle">
                Built from scratch — no page builders, no bloat. Clean architecture, custom blocks, and production-ready performance.
            </p>
        </div>

        <div class="features-grid">

            <!-- Feature 1: Architecture -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path d="M3 3h18v18H3z"/>
                        <path d="M3 9h18M3 15h18M9 3v18M15 3v18"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Clean Architecture</h3>
                <p class="feature-card-text">
                    Modular template hierarchy, custom post types, and separation of concerns. No spaghetti code.
                </p>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="Theme Architecture"
                        data-content-ref="#modal-architecture">
                    <span>View Architecture</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 2: Custom Blocks -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Modular Sections</h3>
                <p class="feature-card-text">
                    Hero, What I Do, Projects and other sections are implemented as reusable template parts.
                </p>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="Modular Sections"
                        data-content-ref="#modal-blocks">
                    <span>View Sections</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 3: Performance -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Performance First</h3>
                <p class="feature-card-text">
                    Zero page builders, minimal dependencies, optimized assets. Lighthouse scores 95+.
                </p>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="Performance Metrics"
                        data-content-ref="#modal-performance">
                    <span>View Performance</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 4: Security -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Security & Validation</h3>
                <p class="feature-card-text">
                    Custom form handlers with nonce verification, anti-spam, and input sanitization.
                </p>
                <button class="feature-card-btn stratos-modal-trigger"
                        type="button"
                        data-type="inline"
                        data-title="Security Features"
                        data-content-ref="#modal-security">
                    <span>View Security</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

        </div>

        <p class="section-note">
            Stratos One is my own WordPress product — this portfolio is both a live demo and a real-world use case.
        </p>
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
