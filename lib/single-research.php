<?php
 /*
 Template Name: Single Research
 Template Post Type: research
 */

	while (have_posts()) {
		the_post();
		echo '<article ';
			post_class('post-single');
		echo ' >';
			echo '<div class="entry-content">';
				echo '<div class="byline author vcard">';
					if (function_exists( 'Research\Bylines\get_the_bylines_posts_link' )) {
						//echo '<h2 class="author-name">' . Research\Bylines\get_the_bylines_posts_link() . '</h2>';
					}
				echo '</div>';
	    	echo the_content();
	      echo '<footer>';
	      	echo wp_link_pages([
						'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
						'after' => '</p></nav>']);
	      echo '</footer>'
	    	. '</div>';
	    echo '<div class="entry-data">';
				if(class_exists('acf')){
					// check if the repeater field has rows of data
					if( have_rows('files') ) {
						// loop through the rows of data
						echo '<div class="attachment-box">';
						echo '<h3>Project Resources</h3>';
						echo '<ul>';
						while ( have_rows('files') ) {
							the_row();
							// display a sub field value
							$file = get_sub_field('file');
							$title = get_sub_field('text');
							$type = get_sub_field('type');
							$text = get_sub_field('link');
							$link = '';

							if($text) {
								$link = $text;
							} else {
								$link = $file['url'];
							}

							echo '<li class="research-files"><a href="'
								. $link
								. '">'
								. $title
								. '</a> ['
								. $type
								. ']</li>';
						}
						echo '</ul>';
						echo '</div>';
					}
				}
				$category = get_the_category();
				if($category){
				  echo '<div class="attachment-box">';
				  echo '<h3>Categories</h3>';
				  echo '<ul>';
				  foreach ($category as $cat) {
				    $category_id = get_cat_ID( $cat->name );
				    $category_link = get_category_link( $category_id );
				    echo '<li class="research-files"><a href="'
							. $category_link
							. '">'
							. $cat->name
							. '</a></li>';
				  }
				}
			echo '</div>'
		. '</article>';
	}
