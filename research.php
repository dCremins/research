<?php
/*
Plugin Name: ITRE Research Documents
GitHub Plugin URI: https://github.com/dcremins/research
GitHub Branch:      master
Description: Custom Post Type and Views for ITRE website use
Version: 0.1
Author: Devin Cremins
Author URI: http://octopusoddments.com
*/

require_once( dirname( __FILE__ ) . '/lib/functions.php' );

/* Add Style.css */
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style( 'myCSS', plugins_url( '/styles/main.css', __FILE__ ) );
});

/* Add Admin.css */
add_action('admin_enqueue_scripts', function () {
	wp_enqueue_style( 'adminCSS', plugins_url( '/styles/admin.css', __FILE__ ) );
});

?>
