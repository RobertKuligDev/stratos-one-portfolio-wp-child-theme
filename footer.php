<?php
/**
 * Footer template for Stratos One Portfolio
 *
 * Displays site footer with social links and back to top button.
 *
 * @package Stratos_One_Portfolio
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Social links - configurable via Customizer or defaults
$github_url = get_option('footer_github', 'https://github.com/RobertKuligDev');
$linkedin_url = get_option('footer_linkedin', 'https://linkedin.com/in/robert-kulig-ab5a064a/');
$twitter_url = get_option('footer_twitter', 'https://twitter.com');
$email_url = get_option('footer_email', 'mailto:contact@robertkulig.dev');

?>
</main>

<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-left">
            <p class="footer-copyright">
                &copy; <?php echo date('Y'); ?> <strong>Robert Kulig</strong>. All rights reserved.
            </p>
            <p class="footer-tagline">
                Software Architect & Full-Stack Engineer
            </p>
        </div>

        <!-- Footer Menu -->
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

        <!-- Social Links -->
        <div class="footer-social">
            <?php if (!empty($github_url)): ?>
            <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="GitHub Profile">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/>
                </svg>
            </a>
            <?php endif; ?>

            <?php if (!empty($linkedin_url)): ?>
            <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn Profile">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                    <rect x="2" y="9" width="4" height="12"/>
                    <circle cx="4" cy="4" r="2"/>
                </svg>
            </a>
            <?php endif; ?>

            <?php if (!empty($twitter_url)): ?>
            <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" rel="noopener" class="social-link" aria-label="Twitter Profile">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                </svg>
            </a>
            <?php endif; ?>

            <?php if (!empty($email_url)): ?>
            <a href="<?php echo esc_url($email_url); ?>" class="social-link" aria-label="Send Email">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
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

<?php wp_footer(); ?>
</body>
</html>
