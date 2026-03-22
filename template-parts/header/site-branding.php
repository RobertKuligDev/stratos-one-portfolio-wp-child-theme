<?php
/**
 * Site branding template part
 *
 * Displays the logo/brand in the header
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<div class="site-branding">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-branding-link" aria-label="Robert Kulig - Software Architect">
        <svg class="brand-logo" viewBox="0 0 280 65" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <!-- RKULIG.DEV -->
            <text x="0" y="35" font-family="'Fira Code', 'Courier New', monospace" font-size="28" font-weight="700" fill="currentColor" letter-spacing="2">
                RKULIG<tspan fill="#4da6ff">.DEV</tspan>
            </text>
            <!-- Separator line -->
            <line x1="0" y1="45" x2="280" y2="45" stroke="#4da6ff" stroke-width="2"/>
            <!-- SOFTWARE ARCHITECT -->
            <text x="0" y="60" font-family="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif" font-size="10" font-weight="400" fill="currentColor" letter-spacing="3" class="subtitle">
                SOFTWARE ARCHITECT
            </text>
        </svg>
    </a>
</div>
