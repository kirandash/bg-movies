<?php
/*
Plugin Name:  BG movies
Plugin URI:   http://bgwebagency.com/
Description:  BG movies is a plugin that creates a custom post type for movies that admin can publish straight on their website. It also allows guest users to rate the movies and also allows them to post their own movies for the website.
Version:      1.0.0
Author:       Kiran Dash
Author URI:   http://bgwebagency.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  bg-movies
Domain Path:  /languages
*/

/*****************************
* Setting up plugin
*****************************/
if( !function_exists( 'add_action' ) ) {
	echo 'You do not have access to this page.';
	exit();
}
define( 'BGmovies_PLUGIN_URL', __FILE__ ); // define path of plugin folder instead of dirname(__FILE__)

/***************************** 
* Includes for plugin
*****************************/
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/admin/init.php' );
include( 'save/save-post-movie.php' );

/***************************** 
* Hooks for plugin
*****************************/
register_activation_hook( __FILE__ , 'bgs_plugin_activated' ); 
// register_activation_hook( $file, $function ); 
// Fn will be called when plugin is activated
add_action( 'init', 'bgs_movies_init' );
add_action( 'admin_init', 'bgs_movies_admin_init' );
add_action( 'save_post_movie', 'bgs_save_movie_post_admin', 10, 3 );
/***************************** 
* Shortcodes for plugin
*****************************/