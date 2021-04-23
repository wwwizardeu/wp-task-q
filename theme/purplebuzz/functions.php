<?php
/**
 * purplebuzz functions and definitions
 * @package purplebuzz
 */

if ( ! function_exists( 'purplebuzz_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function purplebuzz_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on purplebuzz, use a find and replace
         * to change 'purplebuzz' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'purplebuzz', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * purplebuzz WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'purplebuzz-primary-menu' => 'Primary',
            'purplebuzz-works-menu' => 'Our Works',
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'gallery',
            'caption',
        ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

    }
endif;
add_action( 'after_setup_theme', 'purplebuzz_setup' );

/**
 * Enqueue scripts and styles.
 */

function purplebuzz_scripts() {

    // wp_deregister_script('jquery');
    // wp_enqueue_script('jquery-latest', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), null, true);

    // Styles

    wp_enqueue_style(
        'purplebuzz-bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        array(),
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/css/bootstrap.min.css' ))
    );

    wp_enqueue_style(
        'purplebuzz-boxicon',
        get_template_directory_uri() . '/assets/css/boxicon.min.css',
        array(),
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/css/boxicon.min.css' ))
    );

    wp_enqueue_style(
        'purplebuzz-google-font',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap',
        array(),
        ''
    );

    wp_enqueue_style(
        'purplebuzz-template',
        get_template_directory_uri() . '/assets/css/templatemo.css',
        array(),
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/css/templatemo.css' ))
    );

    wp_enqueue_style(
        'purplebuzz-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array(),
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/css/custom.css' ))
    );

    // Scripts

    wp_register_script(
        'purplebuzz-bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        '',
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/js/bootstrap.bundle.min.js' )),
        true
    );

    wp_register_script(
        'purplebuzz-jquery',
        get_template_directory_uri() . '/assets/js/jquery.min.js',
        '',
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/js/jquery.min.js' )),
        true
    );

    wp_register_script(
        'purplebuzz-isotope',
        get_template_directory_uri() . '/assets/js/isotope.pkgd.js',
        '',
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/js/isotope.pkgd.js' )),
        true
    );

    wp_register_script(
        'purplebuzz-template',
        get_template_directory_uri() . '/assets/js/templatemo.js',
        '',
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/js/templatemo.js' )),
        true
    );

    wp_register_script(
        'purplebuzz-custom',
        get_template_directory_uri() . '/assets/js/custom.js',
        '',
        date( 'Ymdhis', filemtime( get_template_directory() . '/assets/js/custom.js' )),
        true
    );

    wp_enqueue_script( 'purplebuzz-bootstrap');
    wp_enqueue_script( 'purplebuzz-jquery');
    wp_enqueue_script( 'purplebuzz-isotope');
    wp_enqueue_script( 'purplebuzz-template');
    wp_enqueue_script( 'purplebuzz-custom');

}
add_action( 'wp_enqueue_scripts', 'purplebuzz_scripts' );


/**
 * Functions which enhance the theme by hooking into WordPress.
 */

require get_template_directory() . '/inc/inc.php';
