<?php
/**
 * Contact section template part
 *
 * Premium contact section with form
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!-- Contact Section -->
<section class="contact" id="contact">
    <div class="container">
        <h2 class="section-title">
            Let's build something exceptional together
        </h2>
        <p class="section-subtitle">
            I architect and deliver production-grade systems — from .NET + Angular applications,
            through API integrations, to custom WordPress themes.<br>
            Tell me about your project and I'll get back to you within 24 hours.
        </p>
        
        <div class="contact-highlights">
            
            <div class="highlight-card">
                <h3 class="highlight-card-title">10+ years experience</h3>
                <p class="highlight-card-text">Enterprise-grade engineering, architecture and delivery.</p>
            </div>
            
            <div class="highlight-card">
                <h3 class="highlight-card-title">Production-ready code</h3>
                <p class="highlight-card-text">Clean, maintainable, scalable — built for long-term success.</p>
            </div>
            
            <div class="highlight-card">
                <h3 class="highlight-card-title">Clear communication</h3>
                <p class="highlight-card-text">Direct, transparent and reliable collaboration.</p>
            </div>
            
        </div>
        
        <div class="contact-form-wrapper">
            <?php
            // Render the Stratos One contact form block
            if (function_exists('stratos_one_render_contact_form')) {
                echo stratos_one_render_contact_form();
            }
            ?>
        </div>
    </div>
</section>
