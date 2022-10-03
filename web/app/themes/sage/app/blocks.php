<?php

/**
 * ACF Blocks
 */

/**
 * Register custom ACF Blocks.
 *
 * @return void
 */
function init_custom_block_types() {

    $blocks = array(
        array(
            'name'              => 'hero',
            'title'             => __('Hero'),
            'description'       => __('A hero block at the top of the page.'),
            'render_callback'   => '\App\acf_block_render_callback',
            'category'          => 'png-blocks',
            'icon'              => 'align-wide',
            'keywords'          => array( 'hero', 'heading', 'intro' ),
        ),
        array(
            'name'              => 'carousel',
            'title'             => __('Carousel'),
            'description'       => __('A carousel block'),
            'render_callback'   => '\App\acf_block_render_callback',
            'category'          => 'png-blocks',
            'icon'              => 'arrow-down-alt2',
            'keywords'          => array( 'carousel' ),
        ),
        array(
            'name'              => 'river-flow',
            'title'             => __('River Flow'),
            'description'       => __('A back and fourth river flow block'),
            'render_callback'   => '\App\acf_block_render_callback',
            'category'          => 'png-blocks',
            'icon'              => 'arrow-down-alt2',
            'keywords'          => array( 'river', 'flow', 'cross' ),
        ),
        array(
            'name'              => 'standard-block',
            'title'             => __('Standard'),
            'description'       => __('A standard content block'),
            'render_callback'   => '\App\acf_block_render_callback',
            'category'          => 'png-blocks',
            'icon'              => 'arrow-down-alt2',
            'keywords'          => array( 'standard', 'content' ),
        ),
    );

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        foreach ($blocks as $block) {
            acf_register_block_type($block);
        }
    }


}

add_action('acf/init', 'init_custom_block_types');

// // Add backend styles for Gutenberg.
// add_action('enqueue_block_editor_assets', 'block_editor_assets');

// function block_editor_assets() {
//   // Load the theme styles within Gutenberg.
//   wp_enqueue_style('my-gutenberg-editor-styles', get_theme_file_uri('/dist/styles/app.css'), FALSE);
// }


add_filter( 'render_block', 'wrap_core_blocks', 10, 2 );
function wrap_core_blocks( $block_content, $block ) {

    if( get_post_type() == 'post') {
        return $block_content;
    }

    switch( $block['blockName'] ) {
        case 'core/paragraph':
        case 'core/heading':
        case 'core/list':
        case 'core/code':
        case 'core/preformatted':
        case 'core/quote':
            if( ! empty( $block_content ) ) {
                $block_content = '<div class="container basic-page-content"><div class="mx-auto lg:w-3/4">' . $block_content . '</div></div>';
            }
            break;
    }

  return $block_content;
}

function custom_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom-blocks',
				'title' => __( 'Custom Blocks', 'custom-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'custom_block_category', 10, 2);
