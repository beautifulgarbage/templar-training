<?php

/**
 * Theme helpers.
 */

namespace App;


/**
 * Render callback for ACF $blocks
 * with help from https://medium.com/nicooprat/acf-blocks-avec-gutenberg-et-sage-d8c20dab6270
 * and
 * https://gist.github.com/marijoo/4673905393d04ddf7c50b2a43d8d52cf
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

function acf_block_render_callback($block) {

    $slug = str_replace('acf/', '', $block['name']);
    $classes = [$slug];

    $id = sprintf('%s-%s', $slug, $block['id']);
    if (!empty($block['anchor']))
        $id = $block['anchor'];

    if (!empty($block['className']))
        $classes[] = $block['className'];

    if (!empty($block['align']))
        $classes[] = $block['align'];

    $block['className'] = implode(' ', $classes);

    echo \Roots\view("blocks/${slug}", $block);
}


function get_meta_block_partial($name, $id = null) {

    if( empty($id) ) {
        $id = get_the_id();
    }

    $slug = str_replace('acf/', '', $name);
    $data = get_fields( $id );

    $block = array(
        'name' => $name,
        $slug => $data,
        'id' => $id,
    );

    acf_block_render_callback( $block );
}