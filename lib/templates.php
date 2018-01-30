<?php

namespace Research\Templates;

/* Search Theme for CPT templates and then use the templates in this Plugin if none are found */

add_filter('template_include', __NAMESPACE__ . '\\include_template_function', 99);

function include_template_function($template_path) {
	if (get_post_type() === 'research') {
		if (is_single()) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ($theme_file = locate_template(array ('single-research.php'))) {
				return $theme_file;
			}
			return plugin_dir_path(dirname(__FILE__)) . 'lib/single-research.php';
		} /*elseif (is_archive() && !is_search() && !is_author()) {
			// checks if the file exists in the theme first,
			// otherwise serve the file from the plugin
			if ($theme_file = locate_template(array ('archive-research.php'))) {
				return $theme_file;
			}
			return plugin_dir_path(dirname(__FILE__)) . 'lib/archive-research.php';
		}*/
	} else {
		return $template_path;
	}
}
?>
