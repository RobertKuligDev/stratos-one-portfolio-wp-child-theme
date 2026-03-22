<?php
/**
 * Front Page Template
 *
 * Main template for the homepage displaying all sections.
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Render all homepage sections in order (matching robert-portfolio)
get_template_part('parts/section', 'hero');
get_template_part('parts/section', 'services');
get_template_part('parts/section', 'projects');
get_template_part('parts/section', 'custom-wp-theme');
get_template_part('parts/section', 'about');
get_template_part('parts/section', 'contact');

get_footer();
