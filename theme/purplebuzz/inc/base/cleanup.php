<?php
/**
 * Functions which cleanup the theme by hooking into WordPress
 *
 * @package purplebuzz
 */


function purplebuzz_remove_version() {
    return '';
}
add_filter('the_generator', 'purplebuzz_remove_version');


/**
 * Remove all dashboard widgets
 */

function purplebuzz_remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );

    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'purplebuzz_remove_dashboard_widgets' );


/**
 * Remove Welcome panel
 */

remove_action('welcome_panel', 'wp_welcome_panel');


/**
 * Disable self pingbacks
 *
 * A pingback is basically an automated comment that gets created when another
 * blog links to you. A self-pingback is created when you link to an article within
 * your own blog. Pingbacks are essentially nothing more than spam and simply
 * waste resources.
 */

function purplebuzz_no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'purplebuzz_no_self_ping' );


/**
 * Disable XML-RPC
 *
 * XML-RPC was added in WordPress 3.5 and allows for remote connections, and
 * unless you are using your mobile device to post to WordPress it does more
 * bad than good. In fact, it can open your site up to a bunch of security
 * risks. There are a few plugins that utilize this such as JetPack,
 * but we don’t recommend using JetPack for performance reasons.
 */

add_filter('xmlrpc_enabled', '__return_false');


/**
 * Remove jQuery Migrate
 *
 * Most up-to-date frontend code and plugins don’t require jquery-migrate.min.js.
 * In most cases, this simply adds unnecessary load to your site.
 */

function purplebuzz_remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}

add_action( 'wp_default_scripts', 'purplebuzz_remove_jquery_migrate' );


/**
 * Remove wlwmanifest link
 *
 * The above link is actually used by Windows Live Writer. If you don’t know use Windows Live Writer,
 * which we are guessing you don’t, this is just unnecessary code.
 */

remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');


/**
 * Remove shortlink
 *
 * This is used for a shortlink to your pages and posts. However, if you are already using pretty permalinks,
 * such as domain.com/post, then there is no reason to keep this, it is just unnecessary code.
 */

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


/**
 * Disable RSS Feeds and RSS feed links
 *
 * By default, WordPress generates all types of different RSS feeds for your site. While RSS feeds can be useful
 * if you are running a blog, businesses might not always utilize these.
 */

function purplebuzz_disable_feed() {
    wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'purplebuzz_disable_feed', 1);
add_action('do_feed_rdf', 'purplebuzz_disable_feed', 1);
add_action('do_feed_rss', 'purplebuzz_disable_feed', 1);
add_action('do_feed_rss2', 'purplebuzz_disable_feed', 1);
add_action('do_feed_atom', 'purplebuzz_disable_feed', 1);
add_action('do_feed_rss2_comments', 'purplebuzz_disable_feed', 1);
add_action('do_feed_atom_comments', 'purplebuzz_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );


/**
 * Disable Emojis in WordPress
 *
 * Emojis are fun and all, but if you are aren’t using them they actually load a JavaScript
 * file (wp-emoji-release.min.js) on every page of your website. For a lot of businesses, this
 * is not needed and simply adds load time to your site.
 */

add_action( 'init', 'purplebuzz_disable_emojis' );

function purplebuzz_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'purplebuzz_disable_emojis_tinymce' );
}

function purplebuzz_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}


/**
 * Disable Embeds in WordPress
 *
 * This is basically the magic that auto converts your YouTube videos, Tweets,
 * and URLs into pretty previews while you are editing.
 */

add_action( 'wp_footer', 'purplebuzz_deregister_embed' );

function purplebuzz_deregister_embed(){
    wp_dequeue_script( 'wp-embed' );
}


/**
 * Remove Dashicons in WordPress (dashicons.min.css)
 *
 * This doesn’t affect the backend because the WordPress admin dashboard uses dashicons. This
 * purposely only removes dashicons on the front-end when not logged in.
 */

add_action( 'wp_enqueue_scripts', 'purplebuzz_remove_dashicons' );

function purplebuzz_remove_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_dequeue_style('dashicons');
    }
}


/**
 * Remove Gutenberg CSS
 *
 */

function purplebuzz_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}

add_action( 'wp_enqueue_scripts', 'purplebuzz_remove_wp_block_library_css', 100 );


/**
 * Create a Blank Favicon
 *
 * If you’re constantly benchmarking new WordPress sites, especially fresh installs,
 * it can be annoying as a missing favicon will generate a 404 error in speed testing tools.
 */

function purplebuzz_blank_favicon() {
    echo '<link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII=" rel="icon" type="image/x-icon" />';
}

add_action('wp_head', 'purplebuzz_blank_favicon');


/**
 * Remove plugin notices for non-admin users
 *
 */

function dialog_disable_admin_notices() {
    global $wp_filter;
    if (!current_user_can( 'manage_options' )) {
        if (isset($wp_filter['user_admin_notices'])) {
                unset( $wp_filter['user_admin_notices']);
        }
    }
}

add_action( 'admin_print_scripts', 'dialog_disable_admin_notices' );
