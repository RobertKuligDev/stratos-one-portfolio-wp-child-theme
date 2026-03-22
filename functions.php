<?php
/**
 * Stratos One Portfolio Theme Functions
 *
 * @package Stratos_One_Portfolio
 */

/**
 * Enqueue stylesheets
 * 
 * Load order (minimalist approach):
 * 1. Google Fonts
 * 2. Parent theme (stratos-one) - base
 * 3. Bundle.css - Premium Design System (override parent)
 * 4. Overrides.css - Fix parent conflicts (final polish)
 */
add_action('wp_enqueue_scripts', function() {
    // 1. Google Fonts — Plus Jakarta Sans + JetBrains Mono
    wp_enqueue_style(
        'stratos-one-google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=JetBrains+Mono:wght@400;500&display=swap',
        [],
        null
    );

    // 2. Parent theme styles (stratos-one)
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css',
        ['stratos-one-google-fonts'],
        wp_get_theme()->get('Version')
    );

    // 3. Bundle.css - Premium Design System (override parent)
    wp_enqueue_style(
        'portfolio-bundle',
        get_stylesheet_directory_uri() . '/assets/css/bundle.css',
        ['parent-style'],
        filemtime(get_stylesheet_directory() . '/assets/css/bundle.css')
    );

    // 4. Overrides.css - Fix parent theme conflicts
    wp_enqueue_style(
        'portfolio-overrides',
        get_stylesheet_directory_uri() . '/assets/css/overrides.css',
        ['portfolio-bundle'],
        filemtime(get_stylesheet_directory() . '/assets/css/overrides.css')
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
