<?php
/**
 * Footer template for Stratos One Portfolio
 *
 * Displays site footer with dynamic social links from Customizer.
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get footer settings from Customizer
$github_url = get_option('footer_github', 'https://github.com/RobertKuligDev');
$linkedin_url = get_option('footer_linkedin', 'https://linkedin.com/in/robert-kulig-ab5a064a/');
$telegram_url = get_option('footer_telegram', 'https://telegram.org');
$x_url = get_option('footer_x', 'https://twitter.com');
$copyright_text = get_option('footer_copyright', '');

// Build copyright text
if (!empty($copyright_text)) {
    $copyright = esc_html($copyright_text);
} else {
    $copyright = sprintf(
        /* translators: %1$s: current year, %2$s: site name */
        __('&copy; %1$s %2$s. All rights reserved.', 'stratos-one-portfolio'),
        date('Y'),
        get_bloginfo('name')
    );
}
?>
</main>

<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-left">
            <p><?php echo $copyright; ?></p>
        </div>

        <!-- Footer Menu (from WordPress) -->
        <?php if (has_nav_menu('footer')): ?>
        <nav class="footer-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'depth'          => 1,
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>
        <?php endif; ?>

        <div class="footer-social">
            <?php if (!empty($github_url)): ?>
            <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="GitHub">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                </svg>
            </a>
            <?php endif; ?>

            <?php if (!empty($linkedin_url)): ?>
            <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                    <rect x="2" y="9" width="4" height="12"/>
                    <circle cx="4" cy="4" r="2"/>
                </svg>
            </a>
            <?php endif; ?>

            <?php if (!empty($telegram_url)): ?>
            <a href="<?php echo esc_url($telegram_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="Telegram">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="22" y1="2" x2="11" y2="13"/>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                </svg>
            </a>
            <?php endif; ?>

            <?php if (!empty($x_url)): ?>
            <a href="<?php echo esc_url($x_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="X (Twitter)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 4l11.733 16h4.267l-11.733 -16z"/>
                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/>
                </svg>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="Back to top" type="button">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M18 15l-6-6-6 6"/>
        </svg>
    </button>
</footer>

<!-- Page Content Modal -->
<div class="page-modal" id="page-modal" role="dialog" aria-modal="true" aria-labelledby="page-modal-title">
    <div class="page-modal-content">
        <button class="page-modal-close" aria-label="<?php esc_attr_e('Close modal', 'stratos-one-portfolio'); ?>" type="button">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
            </svg>
        </button>

        <div class="page-modal-header">
            <h2 class="page-modal-title" id="page-modal-title"></h2>
        </div>

        <div class="page-modal-body">
            <div class="page-modal-content-loader">
                <div class="loader-spinner"></div>
                <p><?php esc_html_e('Loading...', 'stratos-one-portfolio'); ?></p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
