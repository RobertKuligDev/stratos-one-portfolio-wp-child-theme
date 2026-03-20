<?php
/**
 * Front Page Template
 *
 * Main template for the homepage displaying all portfolio sections.
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>
<!-- Hero Section -->
<?php get_template_part('template-parts/blocks/hero'); ?>

<!-- What I Do Section -->
<?php get_template_part('template-parts/blocks/what-i-do'); ?>

<!-- Projects Section -->
<?php get_template_part('template-parts/blocks/projects'); ?>

<!-- Custom WP Theme Section -->
<?php get_template_part('template-parts/blocks/custom-wp-theme'); ?>

<!-- About Section -->
<?php get_template_part('template-parts/blocks/about'); ?>

<!-- Contact Section -->
<?php get_template_part('template-parts/blocks/contact'); ?>
<?php

get_footer();
