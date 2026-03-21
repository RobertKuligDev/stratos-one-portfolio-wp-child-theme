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
            <div class="feature-card" data-modal="structure">
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
                <button class="feature-card-btn" type="button" aria-label="View architecture details">
                    <span>View Architecture</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 2: Custom Blocks -->
            <div class="feature-card" data-modal="blocks">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7"/>
                        <rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Custom Gutenberg Blocks</h3>
                <p class="feature-card-text">
                    Reusable block patterns tailored to this theme. Hero, services, projects — all implemented as native blocks.
                </p>
                <button class="feature-card-btn" type="button" aria-label="View blocks details">
                    <span>View Blocks</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 3: Performance -->
            <div class="feature-card" data-modal="performance">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Performance First</h3>
                <p class="feature-card-text">
                    Zero page builders, minimal dependencies, optimized assets. Lighthouse scores 95+.
                </p>
                <button class="feature-card-btn" type="button" aria-label="View performance details">
                    <span>View Performance</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Feature 4: Security -->
            <div class="feature-card" data-modal="security">
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
                <button class="feature-card-btn" type="button" aria-label="View security details">
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
