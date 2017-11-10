<?php
 /*
 Template Name: Research Archive
 Template Post Type: research
 */

	if (!have_posts()) {
		echo '<div class="alert alert-warning">';
		_e('Sorry, no results were found.', 'sage');
		echo '</div>';
		get_search_form();
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
	the_posts_navigation();
