<?php

define('THEME_INCLUDES_DIR', get_template_directory() . '/inc');

/**
 * Functions which enhance the theme by hooking into WordPress.
 */

if ( class_exists('ACF') ) {
    require THEME_INCLUDES_DIR .  '/acf/acf.php';
}

require THEME_INCLUDES_DIR .  '/base/base.php';
//require THEME_INCLUDES_DIR .  '/modal/modal.php';
//require THEME_INCLUDES_DIR .  '/cookies/cookies.php';
// require THEME_INCLUDES_DIR .  '/sprite/sprite.php';

require THEME_INCLUDES_DIR .  '/cpt/cpt.php';
// require THEME_INCLUDES_DIR .  '/loadmore/loadmore.php';
require THEME_INCLUDES_DIR .  '/menu/menu.php';
// require THEME_INCLUDES_DIR .  '/pagination/pagination.php';


/**
 * Plugins
 */

// require THEME_INCLUDES_DIR .  '/plugins/contact_form_7.php';
// require THEME_INCLUDES_DIR .  '/plugins/woocommerce.php';

?>
