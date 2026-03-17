<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'stratos-one-portfolio',
        get_stylesheet_uri()
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
});
