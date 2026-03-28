<?php
/**
 * Front Page Template
 *
 * Main template for the homepage displaying all sections.
 * This template completely overrides any page content from database
 * to ensure only child theme sections are rendered.
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.1
 */

if (!defined('ABSPATH')) {
    exit;
}

// Block: Prevent any content from page editor being rendered
// This ensures only our template sections are displayed
add_filter('the_content', function($content) {
    if (is_front_page()) {
        return '';
    }
    return $content;
}, 0); // Priority 0 = run first, before any other filters

get_header();

// Render all homepage sections in order (matching robert-portfolio)
get_template_part('parts/section', 'hero');
get_template_part('parts/section', 'services');
get_template_part('parts/section', 'projects');
get_template_part('parts/section', 'custom-wp-theme');
get_template_part('parts/section', 'about');
get_template_part('parts/section', 'contact');

get_footer();
