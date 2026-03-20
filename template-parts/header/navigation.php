<?php
/**
 * Navigation template part
 *
 * Displays the primary navigation menu
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
<nav class="main-navigation" aria-label="<?php esc_attr_e('Primary menu', 'stratos-one'); ?>">
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'fallback_cb'    => false,
        'menu_class'     => '',
    ]);
    ?>
</nav>
