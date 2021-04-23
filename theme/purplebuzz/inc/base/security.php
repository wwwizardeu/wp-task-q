<?php
/**
 * Enhance security of WordPress
 *
 * @package dialog
 */

 /**
 * Remove WordPress Version
 */

remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');


/**
 * Disable login hints
 *
 * Override default WordPress login errors and disable login hints
 */

function dialog_no_wordpress_errors(){
    return __('Error: Something went wrong!');
}

add_filter( 'login_errors', 'dialog_no_wordpress_errors' );


/**
 * HTTP Security Headers
 *
 * Enable these only if they are not set via .htaccess
 *
 * Content Security Policy (CSP)
 * ----
 * CSP helps mitigate XSS attacks by whitelisting the allowed sources of content such as scripts,
 * styles, and images. A content security policy can prevent the browser from loading malicious assets.
 * Helper tool: https://www.cspisawesome.com, https://report-uri.com/home/generate
 *
 *
 * Permission Policy
 * ----
 * Enable and disable certain web platform features on website and embeds
 *
 *
 * Referrer Policy
 * ----
 * Controls how much referrer information (sent via the Referer header) should be included with requests.
 *
 *
 * X-Frame-Options
 * ----
 * This header helps prevent clickjacking by indicating to a browser that it shouldn’t render the page in
 * a frame (or an iframe or object).
 *
 *
 * X-XSS-Protection and X-Content-Type-Options
 * ----
 * The X-XSS-Protection helps mitigate Cross-site scripting (XSS) attacks and X-Content-Type-Options header
 * instructs IE not to sniff mime types, preventing attacks related to mime-sniffing.
 *
 *
 * HTTP Strict Transport Security (HSTS)
 * ----
 * HSTS is a way for the server to instruct the browser that the browser should only communicate with the
 * server over HTTPS.
 *
 *
 * Expires header
 * ----
 * The Expires header contains the date/time after which the response is considered stale.
 * If there is a Cache-Control header with the max-age or s-maxage directive in the response, the Expires
 * header is ignored.
 *
 *
 * Implement Cookie with HTTPOnly and Secure flag in WordPress
 * ----
 * This instructs the browser to trust the cookie only by the server and that cookie is accessible over
 * secure SSL channels.
 */

// header("Content-Security-Policy: default-src * 'self' data: 'unsafe-inline'; script-src * 'self' 'unsafe-inline' 'unsafe-hashes'; script-src-elem * 'self' data: 'unsafe-inline' 'unsafe-hashes'; script-src-attr * 'self' data: 'unsafe-inline' 'unsafe-hashes'; style-src * 'self' 'unsafe-inline' 'unsafe-hashes'; style-src-elem * 'self' data: 'unsafe-inline' 'unsafe-hashes'; style-src-attr * 'self' data: 'unsafe-inline' 'unsafe-hashes'; img-src 'self' https://secure.gravatar.com https://ps.w.org/; font-src * 'self' data: fonts.googleapis.com; connect-src 'self'; media-src 'self'; object-src *; prefetch-src *; child-src 'self'; frame-src 'self'; worker-src; frame-ancestors 'self'; form-action 'self'; upgrade-insecure-requests; block-all-mixed-content; base-uri; manifest-src; plugin-types; report-uri; report-to");

header('Permissions-Policy: fullscreen=*');
header('Referrer-Policy: strict-origin-when-cross-origin');

header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('Strict-Transport-Security:max-age=31536000; includeSubdomains; preload');

header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60))); // 1 hour

@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
