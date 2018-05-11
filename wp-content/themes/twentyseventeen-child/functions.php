<?php
	
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);

function enqueue_child_theme_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


add_action('rest_api_init', 'my_more_posts');

function my_more_posts() {
    register_rest_route('myplugin/v1', '/posts', array(
        'methods' => 'GET',
        'callback' => 'my_more_posts_callback',
    ));
}

function my_more_posts_callback( WP_REST_Request $request ) {
    $args = array(
        'per_page' => 200,
    );
    return get_posts($args);
}



?>
