<?php
/**
 * Contact section template part
 *
 * Contact form with contact cards and social links
 * Premium redesign matching About section style
 *
 * @package Stratos_One_Portfolio
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Contact Section -->
<section class="contact" id="contact">
    <div class="container">
        
        <!-- Section Header with Badge -->
        <header class="section-header reveal">
            <span class="section-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
                <?php esc_html_e('Get In Touch', 'stratos-one-portfolio'); ?>
            </span>
            <h2 class="section-title"><?php esc_html_e('Let\'s build something exceptional together', 'stratos-one-portfolio'); ?></h2>
            <p class="section-subtitle">
                <?php esc_html_e('I architect and deliver production-grade systems - from .NET + Angular applications, through API integrations, to custom WordPress themes. Tell me about your project and I\'ll get back to you within 24 hours.', 'stratos-one-portfolio'); ?>
            </p>
        </header>

        <div class="contact-grid">

            <!-- Left Column: Contact Info -->
            <div class="contact-info">
                
                <!-- Contact Cards -->
                <div class="contact-cards">
                    <a href="mailto:contact@robertkulig-dev.eu" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label">Email</span>
                            <span class="contact-card-value">contact@robertkulig-dev.eu</span>
                        </div>
                    </a>
                    
                    <a href="tel:+48530872470" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label">Phone</span>
                            <span class="contact-card-value">+48 530 872 470</span>
                        </div>
                    </a>
                    
                    <a href="https://linkedin.com/in/robert-kulig-ab5a064a" target="_blank" rel="noopener" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label">LinkedIn</span>
                            <span class="contact-card-value">Robert Kulig</span>
                        </div>
                    </a>
                    
                    <a href="https://github.com/RobertKuligDev" target="_blank" rel="noopener" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label">GitHub</span>
                            <span class="contact-card-value">RobertKuligDev</span>
                        </div>
                    </a>
                </div>

                <!-- Highlights -->
                <div class="contact-highlights">
                    <div class="highlight-item">
                        <span class="highlight-number">10+</span>
                        <span class="highlight-text">Years Experience</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-number">24h</span>
                        <span class="highlight-text">Response Time</span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-number">100%</span>
                        <span class="highlight-text">Project Success</span>
                    </div>
                </div>

            </div>

            <!-- Right Column: Form -->
            <div class="contact-form-wrapper">
                <?php
                // Render the Stratos One contact form block
                if (function_exists('stratos_one_render_contact_form')) {
                    echo stratos_one_render_contact_form();
                }
                ?>
            </div>

        </div>
    </div>
</section>
