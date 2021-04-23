<?php
/**
 * Branding for WP
 *
 * @package purplebuzz
 */

/**
 * Add BBDO dashboard widget
 *
 */

add_action( 'wp_dashboard_setup', 'purplebuzz_dashboard_setup_function' );

function purplebuzz_dashboard_setup_function() {
    add_meta_box( 'purplebuzz_dashboard_widget', 'A WWWIZARD website', 'purplebuzz_dashboard_widget_function', 'dashboard', 'normal', 'high' );
}

function purplebuzz_dashboard_widget_function() {
    echo "This website is maintained by WWWIZARD";
}


/**
 * Login page re-branding
 *
 */

function purplebuzz_login_logo() { ?>
    <style type="text/css">
        body {
            background: rgb(226,226,226)!important;
            background: linear-gradient(180deg, rgba(226,226,226,1) 0%, rgba(255,255,255,1) 50%)!important;
        }
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.svg');
            height: 100px;
            width: 200px;
            background-size: 200px 100px;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }

        .login form {
            border: 0!important;
            box-shadow: 0 -5px 10px 2px rgba(0,0,0,.05)!important;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'purplebuzz_login_logo' );

function purplebuzz_login_logo_url() {
    return home_url();
}

add_filter( 'login_headerurl', 'purplebuzz_login_logo_url' );

function purplebuzz_login_logo_url_title() {
    return get_bloginfo('name');
}

add_filter( 'login_headertitle', 'purplebuzz_login_logo_url_title' );
