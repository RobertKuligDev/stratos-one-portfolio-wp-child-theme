<?php
/**
 * Contact section template part
 *
 * Contact form with contact cards, GDPR notice and microcopy
 *
 * @package Stratos_One_Portfolio
 * @version 2.1.0
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
            <h2 class="section-title"><?php esc_html_e("Let's build something exceptional together", 'stratos-one-portfolio'); ?></h2>
            <p class="section-subtitle">
                <?php esc_html_e("I architect and deliver production-grade systems — from .NET + Angular applications, through API integrations, to custom WordPress themes. Tell me about your project.", 'stratos-one-portfolio'); ?>
            </p>
        </header>

        <div class="contact-grid">

            <!-- Left Column: Contact Info -->
            <div class="contact-info">

                <!-- Contact Cards -->
                <div class="contact-cards">
                    <a href="mailto:contact@robertkulig-dev.eu" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label"><?php esc_html_e('Email', 'stratos-one-portfolio'); ?></span>
                            <span class="contact-card-value">contact@robertkulig-dev.eu</span>
                        </div>
                        <svg class="contact-card-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="tel:+48530872470" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label"><?php esc_html_e('Phone', 'stratos-one-portfolio'); ?></span>
                            <span class="contact-card-value">+48 530 872 470</span>
                        </div>
                        <svg class="contact-card-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="https://linkedin.com/in/robert-kulig-ab5a064a" target="_blank" rel="noopener noreferrer" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label">LinkedIn</span>
                            <span class="contact-card-value">Robert Kulig</span>
                        </div>
                        <svg class="contact-card-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="https://github.com/RobertKuligDev" target="_blank" rel="noopener noreferrer" class="contact-card">
                        <span class="contact-card-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                            </svg>
                        </span>
                        <div class="contact-card-content">
                            <span class="contact-card-label">GitHub</span>
                            <span class="contact-card-value">RobertKuligDev</span>
                        </div>
                        <svg class="contact-card-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Response time microcopy -->
                <div class="contact-response-badge">
                    <span class="contact-response-dot"></span>
                    <span><?php esc_html_e('I usually respond within 24 hours', 'stratos-one-portfolio'); ?></span>
                </div>

                <!-- Highlights -->
                <div class="contact-highlights">
                    <div class="highlight-item">
                        <span class="highlight-number">10+</span>
                        <span class="highlight-text"><?php esc_html_e('Years Experience', 'stratos-one-portfolio'); ?></span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-number">24h</span>
                        <span class="highlight-text"><?php esc_html_e('Response Time', 'stratos-one-portfolio'); ?></span>
                    </div>
                    <div class="highlight-item">
                        <span class="highlight-number">100%</span>
                        <span class="highlight-text"><?php esc_html_e('Project Success', 'stratos-one-portfolio'); ?></span>
                    </div>
                </div>

                <!-- Availability Status -->
                <div class="contact-status-card">
                    <div class="contact-status-header">
                        <span class="contact-status-dot contact-status-dot--available"></span>
                        <span class="contact-status-label"><?php esc_html_e('Current Status', 'stratos-one-portfolio'); ?></span>
                    </div>
                    <div class="contact-status-rows">
                        <div class="contact-status-row">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <div>
                                <span class="contact-status-row-label"><?php esc_html_e('Availability', 'stratos-one-portfolio'); ?></span>
                                <span class="contact-status-row-value contact-status-row-value--green"><?php esc_html_e('Open to new projects', 'stratos-one-portfolio'); ?></span>
                            </div>
                        </div>
                        <div class="contact-status-row">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <div>
                                <span class="contact-status-row-label"><?php esc_html_e('Timezone', 'stratos-one-portfolio'); ?></span>
                                <span class="contact-status-row-value">CET/CEST &mdash; <?php esc_html_e('Poland', 'stratos-one-portfolio'); ?></span>
                            </div>
                        </div>
                        <div class="contact-status-row">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                            </svg>
                            <div>
                                <span class="contact-status-row-label"><?php esc_html_e('Currently working on', 'stratos-one-portfolio'); ?></span>
                                <span class="contact-status-row-value"><?php esc_html_e('.NET + Angular e-commerce platform', 'stratos-one-portfolio'); ?></span>
                            </div>
                        </div>
                        <div class="contact-status-row">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <div>
                                <span class="contact-status-row-label"><?php esc_html_e('Location', 'stratos-one-portfolio'); ?></span>
                                <span class="contact-status-row-value"><?php esc_html_e('Poland — remote worldwide', 'stratos-one-portfolio'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Form -->
            <div class="contact-form-wrapper">

                <div class="contact-form-header">
                    <h3 class="contact-form-title"><?php esc_html_e('Send a message', 'stratos-one-portfolio'); ?></h3>
                    <p class="contact-form-subtitle"><?php esc_html_e("Fill out the form and I'll get back to you shortly.", 'stratos-one-portfolio'); ?></p>
                </div>

                <?php
                if (function_exists('stratos_one_render_contact_form')) {
                    echo stratos_one_render_contact_form();
                }
                ?>

                <!-- GDPR Notice -->
                <div class="contact-gdpr">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <p>
                        <?php esc_html_e('Your data is safe. I only use the information you provide to respond to your inquiry and never share it with third parties. By submitting this form you agree to my', 'stratos-one-portfolio'); ?>
                        <a href="#privacy-policy"><?php esc_html_e('Privacy Policy', 'stratos-one-portfolio'); ?></a>.
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>
