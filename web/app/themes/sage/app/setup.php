<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\asset;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    //wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ['jquery'], null, true);
    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), ['jquery'], null, true);

    //wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');

    wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), false, null);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    if ($manifest = asset('scripts/manifest.asset.php')->get()) {
        //wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), $manifest['dependencies'], null, true);
        //wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), ['sage/vendor.js'], null, true);

        //wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');
    }

    wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
    wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), false, null);
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer' => __( 'Footer Navigation'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Add theme support for Wide Alignment
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Enable responsive embeds
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Enable theme color palette support
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
     */
    add_theme_support('editor-color-palette', [
        [
            'name'  => __('Primary', 'sage'),
            'slug'  => 'primary',
            'color' => '#525ddc',
        ]
    ]);
}, 20);

// ACF options Page
if(function_exists('acf_add_options_page')) {
	acf_add_options_page('Site Options');
}


/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});

// remove defined width on image captions
add_filter( 'img_caption_shortcode_width', '__return_false' );

/**
 * Initialize Glide
 *
 * @return void
 */
$wpGlide = wp_glide();
$wpGlide->init(
    // Glide server config. See: http://glide.thephpleague.com/1.0/config/setup/
    [
        // Image driver
        'driver'     => 'imagick',
        // Watermarks path
        //'watermarks' => new \League\Flysystem\Filesystem(new \League\Flysystem\Adapter\Local(get_template_directory() . '/assets/img')),
    ],

    // Base path. By default set to 'img/' and the final URL will look like so: http://example.com/BASE-PATH/SIZE-SLUG/image.jpg.
    'img/',

    // Path to WordPress upload directory. If not set the default upload directory will be used.
    //'upload_path',
    //wp_upload_dir()['basedir'],
    // Cache path. If not set the cache will be placed in cache directory at the root of the default upload path.
    //wp_upload_dir()['basedir'] . '/cache'
);

$glideDefaults = [
    'q' => 90,
    'fit' => 'crop',
    'fm' => 'pjpg',
];

$glidePresets = [
    'hero' => [
        'w' => 1440,
        'h' => 643,
        'q' => 80,
    ],
];

foreach($glidePresets as $name => $preset) {
    $options = array_merge($glideDefaults, $preset);
    $wpGlide->addSize($name, $options);

    // add retina version
    $options['w'] = floor($options['w'] * 1.75);
    $options['h'] = floor($options['h'] * 1.75);
    $options['q'] = 70;
    $wpGlide->addSize($name . '-2x', $options);
}


// $wpGlide->addSize('16x9', [
//     'w'   => 16 * 10 * 2,
//     'h'   => 9 * 10 * 2,
//     'fit' => 'crop',
//     'q'   => 75,
//     'fm'  => 'pjpg',
// ]);
