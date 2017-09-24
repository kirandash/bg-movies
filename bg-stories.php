<?php
/*
Plugin Name:  BG Stories
Plugin URI:   http://bgwebagency.com/
Description:  BG Stories is a plugin that creates a custom post type for stories that admin can publish straight on their website. It also allows guest users to rate the stories and also allows them to post their own stories for the website.
Version:      1.0.0
Author:       Kiran Dash
Author URI:   http://bgwebagency.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  bg-stories
Domain Path:  /languages
*/

/*****************************
* Setting up plugin
*****************************/
if( !function_exists( 'add_action' ) ) {
	echo 'You do not have access to this page.';
	exit();	
}

/***************************** 
* Includes for plugin
*****************************/
include( 'includes/activate.php' );

/***************************** 
* Hooks for plugin
*****************************/
register_activation_hook( __FILE__ , 'bgs_plugin_activated' ); 
// register_activation_hook( $file, $function ); 
// Fn will be called when plugin is activated

/***************************** 
* Shortcodes for plugin
*****************************/