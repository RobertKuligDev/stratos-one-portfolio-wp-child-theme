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
<section class="contact-section wrapper contact-section--premium" id="contact">
    <div class="container">
        <h2 class="contact-title contact-title--premium">
            Let's build something exceptional together
        </h2>
        <p class="contact-subtitle contact-subtitle--premium">
            I architect and deliver production-grade systems — from .NET + Angular applications,
            through API integrations, to custom WordPress themes.<br>
            Tell me about your project and I'll get back to you within 24 hours.
        </p>
        <div class="contact-highlights">
            <div class="contact-highlight">
                <h3>10+ years experience</h3>
                <p>Enterprise-grade engineering, architecture and delivery.</p>
            </div>
            <div class="contact-highlight">
                <h3>Production-ready code</h3>
                <p>Clean, maintainable, scalable — built for long-term success.</p>
            </div>
            <div class="contact-highlight">
                <h3>Clear communication</h3>
                <p>Direct, transparent and reliable collaboration.</p>
            </div>
        </div>
        <div class="contact-form contact-form--premium">
            <?php
            // Render the Stratos One contact form block
            if (function_exists('stratos_one_render_contact_form')) {
                echo stratos_one_render_contact_form();
            }
            ?>
        </div>
    </div>
</section>
