<?php
/**
 * Custom WP Theme section template part
 *
 * Showcase section about Stratos One theme
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Custom WP Theme Section -->
<section class="custom-wp-theme" id="custom-wp-theme">
    <div class="container">
        <h2 class="section-title">This portfolio runs on my own WordPress theme</h2>
        <p class="section-subtitle">
            Stratos One is a lightweight, custom-built WordPress theme designed as an engineering-grade base for portfolios, landing pages, and production-ready sites.
        </p>
        
        <div class="features-grid">
            
            <!-- Feature 1: Built from Scratch -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Built from Scratch</h3>
                <p class="feature-card-text">
                    No page builders, no heavy frameworks. Clean PHP, custom templates and full control over markup and performance.
                </p>
            </div>
            
            <!-- Feature 2: Modular Sections -->
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
            </div>
            
            <!-- Feature 3: Custom Post Types -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Custom Post Types</h3>
                <p class="feature-card-text">
                    Projects and future case studies are registered as custom post types with their own templates.
                </p>
            </div>
            
            <!-- Feature 4: Engineered Backend -->
            <div class="feature-card">
                <span class="feature-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2"/>
                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2"/>
                        <line x1="6" y1="6" x2="6.01" y2="6"/>
                        <line x1="6" y1="18" x2="6.01" y2="18"/>
                    </svg>
                </span>
                <h3 class="feature-card-title">Engineered Backend</h3>
                <p class="feature-card-text">
                    Custom PHP handlers for forms, validation, security and minimal plugin usage for reliability.
                </p>
            </div>
            
        </div>
        
        <p class="section-note">
            Stratos One is my own WordPress product — this portfolio is both a live demo and a real-world use case.
        </p>
    </div>
</section>
