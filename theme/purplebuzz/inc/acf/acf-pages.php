<?php

/**
 * ACF.
 *
 * @package purplebuzz
 */


 /**
 * Add ACF options page
 *
 * Use get_current_blog_id() for WordPress multisite and create separate Options page to avoid colision
 * Disable translation of the page_title and menu_title for WordPress multisite
 */

function purplebuzz_option_pages_acf_init() {

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Theme options', 'purplebuzz'),
            'menu_title' => __('Theme options', 'purplebuzz'),
            'menu_slug'  => 'purplebuzz-theme-options',
            'capability' => 'manage_options',
            'redirect'   => false,
        ));
    }

}
add_action('acf/init', 'purplebuzz_option_pages_acf_init');
