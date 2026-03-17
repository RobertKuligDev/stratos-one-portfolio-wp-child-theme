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
});
