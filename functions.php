<?php
/**
 * Stratos One Portfolio Theme Functions
 *
 * @package Stratos_One_Portfolio
 */

/**
 * Register Custom Post Types and Taxonomies
 */
add_action('init', function() {
    // Project CPT
    $project_labels = [
        'name'               => __('Projects', 'stratos-one-portfolio'),
        'singular_name'      => __('Project', 'stratos-one-portfolio'),
        'add_new'            => __('Add New Project', 'stratos-one-portfolio'),
        'add_new_item'       => __('Add New Project', 'stratos-one-portfolio'),
        'edit_item'          => __('Edit Project', 'stratos-one-portfolio'),
        'new_item'           => __('New Project', 'stratos-one-portfolio'),
        'view_item'          => __('View Project', 'stratos-one-portfolio'),
        'search_items'       => __('Search Projects', 'stratos-one-portfolio'),
        'not_found'          => __('No projects found', 'stratos-one-portfolio'),
        'not_found_in_trash' => __('No projects found in trash', 'stratos-one-portfolio'),
        'menu_name'          => __('Projects', 'stratos-one-portfolio'),
    ];

    $project_args = [
        'labels'             => $project_labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => ['title', 'editor', 'excerpt', 'thumbnail'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'projects'],
        'show_in_rest'       => true,
        'capability_type'    => 'post',
        'map_meta_cap'       => true,
    ];

    register_post_type('project', $project_args);

    // Technology Taxonomy
    $tech_labels = [
        'name'          => __('Technologies', 'stratos-one-portfolio'),
        'singular_name' => __('Technology', 'stratos-one-portfolio'),
    ];

    $tech_args = [
        'labels'        => $tech_labels,
        'public'        => true,
        'hierarchical'  => false,
        'rewrite'       => ['slug' => 'technology'],
        'show_in_rest'  => true,
    ];

    register_taxonomy('technology', ['project'], $tech_args);
});

/**
 * Enqueue stylesheets
 *
 * MODULAR CSS LOAD ORDER:
 * 1. Google Fonts
 * 2. Parent theme (stratos-one) - base
 * 3. CSS Modules (variables → base → layout → components → sections → responsive)
 * 4. Overrides - Parent conflict fixes
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

    // 3. CSS Modules - Premium Design System
    
    // 3.1 Variables (CSS custom properties)
    wp_enqueue_style(
        'portfolio-variables',
        get_stylesheet_directory_uri() . '/assets/css/01-variables.css',
        ['parent-style'],
        filemtime(get_stylesheet_directory() . '/assets/css/01-variables.css')
    );

    // 3.2 Base (reset, typography, global styles)
    wp_enqueue_style(
        'portfolio-base',
        get_stylesheet_directory_uri() . '/assets/css/02-base.css',
        ['portfolio-variables'],
        filemtime(get_stylesheet_directory() . '/assets/css/02-base.css')
    );

    // 3.3 Layout (utilities, helpers, badges)
    wp_enqueue_style(
        'portfolio-layout',
        get_stylesheet_directory_uri() . '/assets/css/03-layout.css',
        ['portfolio-base'],
        filemtime(get_stylesheet_directory() . '/assets/css/03-layout.css')
    );

    // 3.4 Components (header, footer, buttons, modal)
    wp_enqueue_style(
        'portfolio-components',
        get_stylesheet_directory_uri() . '/assets/css/04-components.css',
        ['portfolio-layout'],
        filemtime(get_stylesheet_directory() . '/assets/css/04-components.css')
    );

    // 3.4.1 Stratos Modal Component
    wp_enqueue_style(
        'stratos-modal',
        get_stylesheet_directory_uri() . '/assets/css/components/_modal.css',
        ['portfolio-components'],
        filemtime(get_stylesheet_directory() . '/assets/css/components/_modal.css')
    );

    // 3.5 Sections (hero, services, projects, about, contact)
    wp_enqueue_style(
        'portfolio-sections',
        get_stylesheet_directory_uri() . '/assets/css/05-sections.css',
        ['portfolio-components'],
        filemtime(get_stylesheet_directory() . '/assets/css/05-sections.css')
    );

    // 3.6 Responsive (media queries - MUST BE LAST)
    wp_enqueue_style(
        'portfolio-responsive',
        get_stylesheet_directory_uri() . '/assets/css/06-responsive.css',
        ['portfolio-sections'],
        filemtime(get_stylesheet_directory() . '/assets/css/06-responsive.css')
    );

    // 4. Overrides.css - Fix parent theme conflicts (loaded after everything)
    wp_enqueue_style(
        'portfolio-overrides',
        get_stylesheet_directory_uri() . '/assets/css/overrides.css',
        ['portfolio-responsive'],
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
