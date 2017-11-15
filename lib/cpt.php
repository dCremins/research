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
      'taxonomies'    => array('category'),
    ]);
}

add_action('init', __NAMESPACE__ . '\\research_post_type');

function loop_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
		// Fetch current query post types
		$post_types = $query->get('post_type');
			// If there are already post types set and they aren't in an array
			// Split at the comma and put them into an array
      if (!is_array($post_types) && !empty($post_types)) {
				$post_types = explode(',', $post_types);
			}
			// If there are no post types set, create an array containing 'Post' post type
      if (empty($post_types))
          $post_types[] = 'post';
			// Add our custom post type
      $post_types[] = 'research';
			// Clean up the array, just in case
      $post_types = array_map('trim', $post_types);
      $post_types = array_filter($post_types);
			// Set query to our new post type array
      $query->set('post_type', $post_types);
  }
}

add_action('pre_get_posts', __NAMESPACE__ . '\\loop_filter');
