<?php
/**
 * Stratos One Portfolio Theme Functions
 *
 * @package Stratos_One_Portfolio
 */

/**
 * Enqueue stylesheets
 * Load order:
 * 1. style.css (theme header)
 * 2. All app styles (base, layout, components, sections)
 * 3. bundle.css (premium styles - loaded LAST to override)
 */
add_action('wp_enqueue_scripts', function() {
    // 1. Main theme stylesheet (header only)
    wp_enqueue_style(
        'stratos-one-style',
        get_stylesheet_uri(),
        [],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // 2. Base styles
    wp_enqueue_style(
        'stratos-one-variables',
        get_stylesheet_directory_uri() . '/assets/css/base/_variables.css',
        ['stratos-one-style'],
        filemtime(get_stylesheet_directory() . '/assets/css/base/_variables.css')
    );

    wp_enqueue_style(
        'stratos-one-reset',
        get_stylesheet_directory_uri() . '/assets/css/base/_reset.css',
        ['stratos-one-variables'],
        filemtime(get_stylesheet_directory() . '/assets/css/base/_reset.css')
    );

    wp_enqueue_style(
        'stratos-one-responsive',
        get_stylesheet_directory_uri() . '/assets/css/base/_responsive.css',
        ['stratos-one-reset'],
        filemtime(get_stylesheet_directory() . '/assets/css/base/_responsive.css')
    );

    // 3. Layout styles
    wp_enqueue_style(
        'stratos-one-container',
        get_stylesheet_directory_uri() . '/assets/css/layout/_container.css',
        ['stratos-one-responsive'],
        filemtime(get_stylesheet_directory() . '/assets/css/layout/_container.css')
    );

    wp_enqueue_style(
        'stratos-one-grid',
        get_stylesheet_directory_uri() . '/assets/css/layout/_grid.css',
        ['stratos-one-container'],
        filemtime(get_stylesheet_directory() . '/assets/css/layout/_grid.css')
    );

    // 4. Component styles
    wp_enqueue_style(
        'stratos-one-buttons',
        get_stylesheet_directory_uri() . '/assets/css/components/_buttons.css',
        ['stratos-one-grid'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_buttons.css')
    );

    wp_enqueue_style(
        'stratos-one-badges',
        get_stylesheet_directory_uri() . '/assets/css/components/_badges.css',
        ['stratos-one-buttons'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_badges.css')
    );

    wp_enqueue_style(
        'stratos-one-modal',
        get_stylesheet_directory_uri() . '/assets/css/components/_modal.css',
        ['stratos-one-badges'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_modal.css')
    );

    wp_enqueue_style(
        'stratos-one-tooltip',
        get_stylesheet_directory_uri() . '/assets/css/components/_tooltip.css',
        ['stratos-one-modal'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_tooltip.css')
    );

    // 5. Utility styles
    wp_enqueue_style(
        'stratos-one-animations',
        get_stylesheet_directory_uri() . '/assets/css/utilities/_animations.css',
        ['stratos-one-tooltip'],
        filemtime(get_stylesheet_directory() . '/assets/css/utilities/_animations.css')
    );

    // 6. Section styles
    wp_enqueue_style(
        'stratos-one-header',
        get_stylesheet_directory_uri() . '/assets/css/sections/_header.css',
        ['stratos-one-animations'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_header.css')
    );

    wp_enqueue_style(
        'stratos-one-hero',
        get_stylesheet_directory_uri() . '/assets/css/sections/_hero.css',
        ['stratos-one-header'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_hero.css')
    );

    wp_enqueue_style(
        'stratos-one-about',
        get_stylesheet_directory_uri() . '/assets/css/sections/_about.css',
        ['stratos-one-hero'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_about.css')
    );

    wp_enqueue_style(
        'stratos-one-what-i-do',
        get_stylesheet_directory_uri() . '/assets/css/sections/_what-i-do.css',
        ['stratos-one-about'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_what-i-do.css')
    );

    wp_enqueue_style(
        'stratos-one-projects',
        get_stylesheet_directory_uri() . '/assets/css/sections/_projects.css',
        ['stratos-one-what-i-do'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_projects.css')
    );

    wp_enqueue_style(
        'stratos-one-project-content',
        get_stylesheet_directory_uri() . '/assets/css/sections/_project-content.css',
        ['stratos-one-projects'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_project-content.css')
    );

    wp_enqueue_style(
        'stratos-one-contact',
        get_stylesheet_directory_uri() . '/assets/css/sections/_contact.css',
        ['stratos-one-project-content'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_contact.css')
    );

    wp_enqueue_style(
        'stratos-one-custom-wp-theme',
        get_stylesheet_directory_uri() . '/assets/css/sections/_custom-wp-theme.css',
        ['stratos-one-contact'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_custom-wp-theme.css')
    );

    wp_enqueue_style(
        'stratos-one-footer',
        get_stylesheet_directory_uri() . '/assets/css/sections/_footer.css',
        ['stratos-one-custom-wp-theme'],
        filemtime(get_stylesheet_directory() . '/assets/css/sections/_footer.css')
    );

    // 7. Bundle.css - Premium styles (loaded LAST to override everything)
    wp_enqueue_style(
        'stratos-one-bundle',
        get_stylesheet_directory_uri() . '/assets/css/bundle.css',
        ['stratos-one-footer'],
        filemtime(get_stylesheet_directory() . '/assets/css/bundle.css')
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
            'content'    => (require get_stylesheet_directory() . '/patterns/contact.php')['content'],
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
    // Header scroll effect
    wp_enqueue_script(
        'stratos-one-header-scroll',
        get_stylesheet_directory_uri() . '/assets/js/header-scroll.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/header-scroll.js'),
        true
    );

    // Mobile menu toggle
    wp_enqueue_script(
        'stratos-one-menu-toggle',
        get_stylesheet_directory_uri() . '/assets/js/menu-toggle.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/menu-toggle.js'),
        true
    );

    // Back to top button
    wp_enqueue_script(
        'stratos-one-back-to-top',
        get_stylesheet_directory_uri() . '/assets/js/back-to-top.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/back-to-top.js'),
        true
    );

    // Services accordion (mobile)
    wp_enqueue_script(
        'stratos-one-services-accordion',
        get_stylesheet_directory_uri() . '/assets/js/services-accordion.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/services-accordion.js'),
        true
    );

    // About section (mobile accordion + parallax)
    wp_enqueue_script(
        'stratos-one-about-section',
        get_stylesheet_directory_uri() . '/assets/js/about-section.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/js/about-section.js'),
        true
    );
});
