<?php
/**
 * Footer template for Stratos One Portfolio
 *
 * Modern footer with social links and back-to-top button
 *
 * @package Stratos_One_Portfolio
 * @version 2.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get social links from Customizer or defaults
$github_url = get_option('footer_github', 'https://github.com/RobertKuligDev');
$linkedin_url = get_option('footer_linkedin', 'https://linkedin.com/in/robert-kulig-ab5a064a/');
$x_url = get_option('footer_x', 'https://twitter.com');
$copyright_text = get_option('footer_copyright', '');

// Build copyright text
if (!empty($copyright_text)) {
    $copyright = esc_html($copyright_text);
} else {
    $copyright = sprintf(
        /* translators: %1$s: current year, %2$s: site name */
        __('&copy; %1$s %2$s. Built with .NET + Angular expertise.', 'stratos-one-portfolio'),
        date('Y'),
        get_bloginfo('name')
    );
}
?>
</main>

<!-- Back to Top Button (floating, not in footer) -->
<button id="back-to-top" class="back-to-top" aria-label="Back to top" type="button" title="Back to top">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path d="M18 15l-6-6-6 6"/>
    </svg>
</button>

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            
            <!-- Left: Copyright -->
            <div class="footer-left">
                <p class="footer-copyright"><?php echo $copyright; ?></p>
            </div>

            <!-- Center: Social Links -->
            <div class="footer-social">
                <span class="footer-social-label">Follow me:</span>
                <div class="social-links">
                    <?php if (!empty($github_url)): ?>
                    <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="GitHub">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if (!empty($linkedin_url)): ?>
                    <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                            <rect x="2" y="9" width="4" height="12"/>
                            <circle cx="4" cy="4" r="2"/>
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if (!empty($x_url)): ?>
                    <a href="<?php echo esc_url($x_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="X (Twitter)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M4 4l11.733 16h4.267l-11.733 -16z"/>
                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Footer Menu -->
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

        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
