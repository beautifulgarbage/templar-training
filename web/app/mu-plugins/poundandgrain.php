<?php

add_filter('acf/settings/save_json', function ($path) {
    return dirname(__FILE__) . '/field-groups';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = dirname(__FILE__) . '/field-groups';
    return $paths;
});

/**
 * Helper function to fix url path for glide and check if imageick is installed
 */
function glide($arg1, $arg2 = null) {
    // If PostID, convert to path
    if(is_int($arg1)) {
       $arg1 = wp_get_attachment_url($arg1);
    }

    if(!empty(CDN_HOST)) {
        // Do no processing, just return the CDN path
        $arg1 = str_replace(WP_HOME, CDN_HOST, $arg1);
        return $arg1;
    } elseif (!extension_loaded('imagick') || substr($arg1, -3) == 'svg') {
        // if it's an SVG or server does not have imageick, do nothing. just return uploads path
        return $arg1;
    } elseif (!$arg2) {
        return $arg1;
    } elseif (empty($arg1) || empty($arg2)) {
        return '//via.placeholder.com/500x500';
    }

    return str_replace('/wp/img', '/img', wp_glide_image($arg1, $arg2));
}

/**
 * Helper functino to fix url for cdn support
 */
function getAsset($url) {
    // If not CDN just return the url back
    if(empty(CDN_HOST)) {
        return $url;
    }
    return str_replace(WP_HOME, CDN_HOST, $url);
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Dequeue old jQuery and requeue one from node_modules
 *
 * @return void
 */
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    wp_deregister_script('focal-point');

    wp_deregister_script('wp-embed');
    wp_register_script('jquery', getAsset(get_stylesheet_directory_uri() . "/node_modules/jquery/dist/jquery.min.js"), false, null);
    wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

