<?php
/*
Plugin Name: ITRE Research Documents
GitHub Plugin URI: https://github.com/dcremins/research
GitHub Branch: master
Description: Custom Post Type and Views for ITRE website use
Version: 1.1.5.1
Author: Devin Cremins
Author URI: http://octopusoddments.com
*/

// Add all files in lib folder into array
$include = [
	'/lib/bylines_filters.php',  // Display Bylines
  '/lib/cpt.php',       			// Register Post Type
  '/lib/add-acf.php',   			// Register Advanced Custom Fields
  '/lib/templates.php',   		// Register Views
];

// Require Once each file in the array
foreach ($include as $file) {
    if (!$filepath = (dirname(__FILE__) .$file)) {
        trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

/* Add Style.css */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('research_css', plugins_url('/styles/main.css', __FILE__));
});

/* Add Admin.css */
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('research_admin_css', plugins_url('/styles/admin.css', __FILE__));
});
?>
