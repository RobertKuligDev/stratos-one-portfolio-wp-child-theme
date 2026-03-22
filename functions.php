<?php
/**
 * Stratos One Portfolio Theme Functions
 *
 * @package Stratos_One_Portfolio
 */

/**
 * Enqueue stylesheets
 * Load order (matching robert-portfolio):
 * 1. Google Fonts
 * 2. style.css (theme header)
 * 3. bundle.css (premium design system)
 * 4. Base styles (_variables, _reset)
 * 5. Layout styles (_utilities)
 * 6. Components (_header, _footer, _modal)
 * 7. Sections (_hero, _services, _projects, _case-studies, _process, _technologies, _about, _contact, _custom-wp-theme)
 * 8. Utilities (_helpers)
 * 9. Responsive (last)
 */
add_action('wp_enqueue_scripts', function() {
    // 1. Google Fonts — Plus Jakarta Sans + JetBrains Mono
    wp_enqueue_style(
        'stratos-one-google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=JetBrains+Mono:wght@400;500&display=swap',
        [],
        null
    );

    // 2. Main theme stylesheet
    wp_enqueue_style(
        'stratos-one-style',
        get_stylesheet_uri(),
        ['stratos-one-google-fonts'],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // 3. Bundle.css - Premium Design System (loaded EARLY, modular styles override)
    wp_enqueue_style(
        'stratos-one-bundle',
        get_stylesheet_directory_uri() . '/assets/css/bundle.css',
        ['stratos-one-style'],
        filemtime(get_stylesheet_directory() . '/assets/css/bundle.css')
    );

    // 3b. Overrides.css - Parent theme style fixes
    wp_enqueue_style(
        'stratos-one-overrides',
        get_stylesheet_directory_uri() . '/assets/css/overrides.css',
        ['stratos-one-bundle'],
        filemtime(get_stylesheet_directory() . '/assets/css/overrides.css')
    );

    // 4. Base styles
    wp_enqueue_style(
        'stratos-one-variables',
        get_stylesheet_directory_uri() . '/assets/css/base/_variables.css',
        ['stratos-one-bundle'],
        filemtime(get_stylesheet_directory() . '/assets/css/base/_variables.css')
    );

    wp_enqueue_style(
        'stratos-one-reset',
        get_stylesheet_directory_uri() . '/assets/css/base/_reset.css',
        ['stratos-one-variables'],
        filemtime(get_stylesheet_directory() . '/assets/css/base/_reset.css')
    );

    // 5. Layout styles
    wp_enqueue_style(
        'stratos-one-layout',
        get_stylesheet_directory_uri() . '/assets/css/layout/_utilities.css',
        ['stratos-one-reset'],
        filemtime(get_stylesheet_directory() . '/assets/css/layout/_utilities.css')
    );

    // 6. Component styles
    wp_enqueue_style(
        'stratos-one-header',
        get_stylesheet_directory_uri() . '/assets/css/components/_header.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_header.css')
    );

    wp_enqueue_style(
        'stratos-one-footer',
        get_stylesheet_directory_uri() . '/assets/css/components/_footer.css',
        ['stratos-one-header'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_footer.css')
    );

    wp_enqueue_style(
        'stratos-one-modal',
        get_stylesheet_directory_uri() . '/assets/css/components/_modal.css',
        ['stratos-one-footer'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_modal.css')
    );

    // 7. Section styles
    wp_enqueue_style(
        'stratos-one-hero',
        get_stylesheet_directory_uri() . '/assets/css/sections/_hero.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_hero.css')
    );

    wp_enqueue_style(
        'stratos-one-services',
        get_stylesheet_directory_uri() . '/assets/css/sections/_services.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_services.css')
    );

    wp_enqueue_style(
        'stratos-one-projects',
        get_stylesheet_directory_uri() . '/assets/css/sections/_projects.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_projects.css')
    );

    wp_enqueue_style(
        'stratos-one-case-studies',
        get_stylesheet_directory_uri() . '/assets/css/sections/_case-studies.css',
        ['stratos-one-projects'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_case-studies.css')
    );

    wp_enqueue_style(
        'stratos-one-process',
        get_stylesheet_directory_uri() . '/assets/css/sections/_process.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_process.css')
    );

    wp_enqueue_style(
        'stratos-one-technologies',
        get_stylesheet_directory_uri() . '/assets/css/sections/_technologies.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_technologies.css')
    );

    wp_enqueue_style(
        'stratos-one-about',
        get_stylesheet_directory_uri() . '/assets/css/sections/_about.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_about.css')
    );

    wp_enqueue_style(
        'stratos-one-contact',
        get_stylesheet_directory_uri() . '/assets/css/sections/_contact.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_contact.css')
    );

    wp_enqueue_style(
        'stratos-one-custom-wp-theme',
        get_stylesheet_directory_uri() . '/assets/css/sections/_custom-wp-theme.css',
        ['stratos-one-process'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_custom-wp-theme.css')
    );

    // 8. Utility styles
    wp_enqueue_style(
        'stratos-one-helpers',
        get_stylesheet_directory_uri() . '/assets/css/utilities/_helpers.css',
        ['stratos-one-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/utilities/_helpers.css')
    );

    // 9. Responsive styles (load last)
    wp_enqueue_style(
        'stratos-one-responsive',
        get_stylesheet_directory_uri() . '/assets/css/base/_responsive.css',
        ['stratos-one-helpers'],
        filemtime(get_stylesheet_directory() . '/assets/css/base/_responsive.css')
    );
});

/**
 * Register block patterns
 */
add_action('init', function() {
    register_block_pattern(
        'stratos-one-portfolio/hero-portfolio',
        [
            'title'       => __('Hero (Portfolio EN)', 'stratos-one'),
            'categories'  => ['stratos-one'],
            'content'     => file_get_contents(get_stylesheet_directory() . '/patterns/hero.html'),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/what-i-do-portfolio',
        [
            'title'       => __('What I Do (Portfolio EN)', 'stratos-one'),
            'categories'  => ['stratos-one'],
            'content'     => file_get_contents(get_stylesheet_directory() . '/patterns/what-i-do.html'),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/projects',
        [
            'title'       => __('Projects', 'stratos-one'),
            'categories'  => ['stratos-one'],
            'content'     => file_get_contents(get_stylesheet_directory() . '/patterns/projects.html'),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/project-content',
        [
            'title'      => __('Project Content', 'stratos-one'),
            'categories' => ['stratos-one'],
            'content'    => file_get_contents(get_stylesheet_directory() . '/patterns/project-content.html'),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/custom-wp-theme',
        [
            'title'      => __('Custom WP Theme (Stratos One)', 'stratos-one'),
            'categories' => ['stratos-one'],
            'content'    => file_get_contents(get_stylesheet_directory() . '/patterns/custom-wp-theme.html'),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/about',
        [
            'title'      => __('About', 'stratos-one'),
            'categories' => ['stratos-one'],
            'content'    => file_get_contents(get_stylesheet_directory() . '/patterns/about.html'),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/contact',
        [
            'title'      => __('Contact (Portfolio)', 'stratos-one'),
            'categories' => ['stratos-one'],
            'content'    => file_get_contents(get_stylesheet_directory() . '/patterns/contact.php'),
        ]
    );
});

/**
 * Register Stratos One block category
 */
add_filter('block_categories_all', function($categories) {
    foreach ($categories as $category) {
        if ($category['slug'] === 'stratos-one') {
            return $categories;
        }
    }

    return array_merge(
        [
            [
                'slug'  => 'stratos-one',
                'title' => __('Stratos One Patterns', 'stratos-one'),
            ],
        ],
        $categories
    );
}, 1);

/**
 * Enqueue JavaScript files
 */
add_action('wp_enqueue_scripts', function() {
    // Modal JS
    wp_enqueue_script(
        'stratos-one-modal',
        get_stylesheet_directory_uri() . '/assets/js/modal.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/modal.js'),
        true
    );

    // Localize modal script with AJAX URL
    wp_localize_script('stratos-one-modal', 'stratosModal', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('stratos_modal_nonce'),
        'i18n'    => [
            'close'   => __('Close', 'stratos-one'),
            'loading' => __('Loading...', 'stratos-one'),
        ],
    ]);

    // Panzoom library for diagram zoom/pan
    wp_enqueue_script(
        'panzoom',
        'https://cdn.jsdelivr.net/npm/@panzoom/panzoom@4.5.1/dist/panzoom.min.js',
        [],
        '4.5.1',
        true
    );

    // Main script (depends on modal.js)
    wp_enqueue_script(
        'stratos-one-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        ['stratos-one-modal', 'panzoom'],
        filemtime(get_stylesheet_directory() . '/assets/js/main.js'),
        true
    );

    // Localize script with AJAX URL
    wp_localize_script(
        'stratos-one-main',
        'stratosOneConfig',
        [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('stratos_one_portfolio_nonce'),
            'siteUrl' => get_site_url(),
        ]
    );
});
