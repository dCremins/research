<?php
 /*
 Template Name: Research Archive
 Template Post Type: research
 */

 function page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;

	echo '<nav class="pagination">';

		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );

	echo '</nav>';
}

	if (!have_posts()) {
		echo '<div class="alert alert-warning">';
		_e('Sorry, no results were found.', 'sage');
		echo '</div>';
		get_search_form();
	} else {
		if ( category_description() ) {
			// If the category has a description, show it above the posts
			echo '<div class="category-description">';
			echo '<p>' . category_description() . '</p>';
			echo '</div>';
		}
		while (have_posts()) {
			the_post();
			echo '<article ';
			post_class();
			echo ' >';
			  echo ' <header class="post_head">'
			    . '<h3 class="entry-title">'
					. '<a href="';
					the_permalink();
					echo '">';
					the_title();
					echo '</a>'
					. '</h3>'
			  	. '</header>';
			  echo '<div class="entry-summary">';
			  	the_excerpt();
					echo '</div>';
			echo '</article>';
		}
		page_navi();
	}
