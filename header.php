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
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-branding" aria-label="Robert Kulig - Software Architect">
            <svg class="brand-logo" viewBox="0 0 280 60" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- RKULIG.DEV -->
                <text x="0" y="35" font-family="'JetBrains Mono', 'Fira Code', monospace" font-size="28" font-weight="700" fill="currentColor" letter-spacing="2">
                    RKULIG<tspan fill="#4da6ff">.DEV</tspan>
                </text>
                <!-- Separator line -->
                <line x1="0" y1="45" x2="280" y2="45" stroke="#4da6ff" stroke-width="2"/>
                <!-- SOFTWARE ARCHITECT -->
                <text x="0" y="58" font-family="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif" font-size="10" font-weight="400" fill="var(--color-text-secondary)" letter-spacing="3">
                    SOFTWARE ARCHITECT
                </text>
            </svg>
        </a>

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
