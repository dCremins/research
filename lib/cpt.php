<?php

namespace Research\CPT;

function research_post_type()
{
    register_post_type('research', [
      'labels'        => [
        'name'                => __('Research'),
        'singular_name'       => __('Research'),
        'add_new'             => __('Add New'),
        'add_new_item'        => __('Add New Research'),
        'new_item'            => __('New Research'),
        'edit_item'           => __('Edit Research'),
        'view_item'           => __('View Research'),
        'all_items'           => __('All Research'),
        'search_items'        => __('Search Research'),
        'parent_item_colon'   => __('Parent Research'),
        'not_found'           => __('No Research found.'),
        'not_found_in_trash'  => __('No Research found in Trash.'),
      ],
      'public'        => true,
      'query_var'     => true,
      'has_archive'   => true,
      'menu_icon'     => 'dashicons-book-alt',
      'supports'      => array('title', 'editor', 'author'),
      'taxonomies'          => array('category'),
    ]);
}

add_action('init', __NAMESPACE__ . '\\research_post_type');
