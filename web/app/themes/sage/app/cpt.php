<?php

/**
 * Theme admin.
 */

namespace App;
// Custom Posts

$custom_posts = [
    [
        'title' => 'Custom Post',
        'plural' => 'Custom Posts',
        'slug' => 'custom-posts',
    ],
];

foreach($custom_posts as $i => $post) {
    $labels = [
        'name' => _x($post['title'], 'post type general name'),
        'singular_name' => _x($post['title'], 'post type singular name'),
        'add_new' => _x('Add New ' . $post['title'], $post['title']),
        'add_new_item' => __('Add New ' . $post['title']),
        'edit_item' => __('Edit ' . $post['title']),
        'new_item' => __('New ' . $post['title']),
        'view_item' => __('View ' . $post['title']),
        'search_items' => __('Search ' . $post['plural']),
        'not_found' =>  __('No '.$post['plural'].' Found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
    ];
    $args = [
        'labels' => $labels, // Set above
        'public' => true, // Make it publicly accessible
        'hierarchical' => false, // No parents and children here
        'menu_position' => ($i+4), // Appear right below "Posts"
        'has_archive' => false, // Activate the archive
        'rewrite' => array('with_front' => false),
    ];
    register_post_type( $post['slug'], $args ); // Create the post type, use options above
}
