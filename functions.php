<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'stratos-one-portfolio',
        get_stylesheet_uri()
    );
    wp_enqueue_style(
        'stratos-one-header',
        get_stylesheet_directory_uri() . '/assets/css/header.css',
        [],
        filemtime(get_stylesheet_directory() . '/assets/css/header.css')
    );
    wp_enqueue_style(
        'stratos-one-hero',
        get_stylesheet_directory_uri() . '/assets/css/hero.css',
        [],
        filemtime(get_stylesheet_directory() . '/assets/css/hero.css')
    );
    wp_enqueue_style(
        'stratos-one-what-i-do',
        get_stylesheet_directory_uri() . '/assets/css/what-i-do.css',
        [],
        filemtime(get_stylesheet_directory() . '/assets/css/what-i-do.css')
    );
    wp_enqueue_style(
        'stratos-one-projects',
        get_stylesheet_directory_uri() . '/assets/css/projects.css',
        [],
        filemtime(get_stylesheet_directory() . '/assets/css/projects.css')
    );
    wp_enqueue_style(
        'stratos-one-project-content',
        get_stylesheet_directory_uri() . '/assets/css/project-content.css',
        [],
        filemtime(get_stylesheet_directory() . '/assets/css/project-content.css')
    );
    wp_enqueue_style(
        'stratos-one-custom-wp-theme',
        get_stylesheet_directory_uri() . '/assets/css/custom-wp-theme.css',
        [],
        filemtime( get_stylesheet_directory() . '/assets/css/custom-wp-theme.css' )
    );
    wp_enqueue_style(
        'stratos-one-about',
        get_stylesheet_directory_uri() . '/assets/css/about.css',
        [],
        filemtime( get_stylesheet_directory() . '/assets/css/about.css' )
    );
    wp_enqueue_style(
        'stratos-one-contact',
        get_stylesheet_directory_uri() . '/assets/css/contact.css',
        [],
        filemtime( get_stylesheet_directory() . '/assets/css/contact.css' )
    );
},);

add_action( 'init', function() {
    register_block_pattern(
        'stratos-one-portfolio/hero-portfolio',
        [
            'title'       => __( 'Hero (Portfolio EN)', 'stratos-one' ),
            'categories'  => [ 'stratos-one' ],
            'content'     => file_get_contents( get_stylesheet_directory() . '/patterns/hero.html' ),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/what-i-do-portfolio',
        [
            'title'       => __( 'What I Do (Portfolio EN)', 'stratos-one' ),
            'categories'  => [ 'stratos-one' ],
            'content'     => file_get_contents( get_stylesheet_directory() . '/patterns/what-i-do.html' ),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/projects',
        [
            'title'       => __( 'Projects', 'stratos-one' ),
            'categories'  => [ 'stratos-one' ],
            'content'     => file_get_contents( get_stylesheet_directory() . '/patterns/projects.html' ),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/project-content',
        [
            'title'      => __( 'Project Content', 'stratos-one' ),
            'categories' => [ 'stratos-one' ],
            'content'    => file_get_contents( get_stylesheet_directory() . '/patterns/project-content.html' ),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/custom-wp-theme',
        [
            'title'      => __( 'Custom WP Theme (Stratos One)', 'stratos-one' ),
            'categories' => [ 'stratos-one' ],
            'content'    => file_get_contents( get_stylesheet_directory() . '/patterns/custom-wp-theme.html' ),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/about',
        [
            'title'      => __( 'About', 'stratos-one' ),
            'categories' => [ 'stratos-one' ],
            'content'    => file_get_contents( get_stylesheet_directory() . '/patterns/about.html' ),
        ]
    );
    register_block_pattern(
        'stratos-one-portfolio/contact',
        [
            'title'      => __( 'Contact (Portfolio)', 'stratos-one' ),
            'categories' => [ 'stratos-one' ],
            'content'    => ( require get_stylesheet_directory() . '/patterns/contact.php' )['content'],
        ]
    );
});

/**
 * Register Stratos One block category
 * This ensures the category is available for patterns
 */
add_filter( 'block_categories_all', function( $categories ) {
    // Check if category already exists
    foreach ( $categories as $category ) {
        if ( $category['slug'] === 'stratos-one' ) {
            return $categories;
        }
    }

    // Add our category
    return array_merge(
        [
            [
                'slug'  => 'stratos-one',
                'title' => __( 'Stratos One Patterns', 'stratos-one' ),
            ],
        ],
        $categories
    );
}, 1 );

/**
 * Enqueue header scripts
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
});
