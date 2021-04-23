<?php

/**
 * ACF.
 *
 * @package purplebuzz
 */

 /**
 * Show ACF to admin.
 *
 */

function purplebuzz_acf_settings_show_admin() {
    return true;
}
add_filter('acf/settings/show_admin', 'purplebuzz_acf_settings_show_admin');

/**
 * Change ACF json save point.
 *
 */

function purplebuzz_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/data/acf';
}
add_filter('acf/settings/save_json', 'purplebuzz_acf_json_save_point');

/**
 * Change ACF json load point.
 *
 */

function purplebuzz_acf_json_load_point( $paths ) {
    unset( $paths[ 0 ] );
    $paths[] = get_stylesheet_directory() . '/data/acf';
    return $paths;
}
add_filter('acf/settings/load_json', 'purplebuzz_acf_json_load_point');
