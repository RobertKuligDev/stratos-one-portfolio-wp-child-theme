<?php
/**
 * Header template for Stratos One Portfolio
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-content">
        <?php get_template_part('template-parts/header/site-branding'); ?>

        <button class="menu-toggle" aria-label="<?php esc_attr_e('Toggle menu', 'stratos-one'); ?>" aria-expanded="false">
            <span class="menu-toggle-icon">☰</span>
        </button>

        <nav class="main-navigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>

        <div class="header-cta-group">
            <a href="#projects" class="header-cta header-cta-secondary">
                <?php esc_html_e('Projects', 'stratos-one'); ?>
            </a>
            <a href="#contact" class="header-cta header-cta-primary">
                <?php esc_html_e('Contact', 'stratos-one'); ?>
            </a>
        </div>
    </div>
</header>

<main class="site-main">
