<?php
/**
 * Custom post type
 *
 * @package purplebuzz
 */


function create_cpt_services() {

    register_post_type( 'services',

        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
            'capability_type' => 'post',
            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies' => array( 'category' ),
        )
    );
}

add_action( 'init', 'create_cpt_services' );
