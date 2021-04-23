<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package purplebuzz
 */

/**
 * Sprite function.
 *
 * Example of usage:
 * <?php sprite('arrow-left', 'u-fill-current'); ?>
 *
 * @param string  $name    SVG icon name.
 * @param string  $classes Additional classes.
 * @param boolean $echo    Echo or return.
 * @return void|string
 */

function sprite( $name, $classes = '', $echo = true ) {
    $path = get_theme_file_uri( '/assets/sprite/sprite.svg#' . $name );
    $output = "<svg class=\"o-icon {$classes}\"><use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"{$path}\"></use></svg>";

    if ( ! $echo ) {
        return $output;
    }

    echo $output; // WPCS: xss ok.
}


/**
 * Convert youtube links to supported format
 *
 * @param string  $name    Youtube Video URL
 */


function purplebuzz_convert_youtube( $string ) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "https://www.youtube.com/embed/$2",
        $string
    );
}


/**
 * Allowed tags for wp_kses function
 *
 */

function purplebuzz_allowed_html() {

    $allowed_html = array(
        // layout
        'p' => array (
            'class' => array()
        ),
        'span' => array(
            'class' => array(),
        ),
        'br' => array(),
        'blockquote' => array(
            'cite' => array(),
        ),
        'cite' => array(),
        'code' => array(),
        'del' => array(
            'datetime' => array(),
        ),
        'dd' => array(),
        'dl' => array(),
        'dt' => array(),

        // headings
        'h1' => array(
            'class' => array(),
        ),
        'h2' => array(
            'class' => array(),
        ),
        'h3' => array(
            'class' => array(),
        ),
        'h4' => array(
            'class' => array(),
        ),
        'h5' => array(
            'class' => array(),
        ),
        'h6' => array(
            'class' => array(),
        ),

        // formatting
        'em' => array(),
        'i' => array(),
        'b' => array(),
        'strong' => array(),

        // links
        'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array(),
        ),

        // images
        'img' => array(
            'alt'    => array(),
            'class'  => array(),
            'height' => array(),
            'src'    => array(),
            'width'  => array(),
        ),

        // lists
        'ul' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'li' => array(
            'class' => array(),
        ),

    );

    return $allowed_html;
}
