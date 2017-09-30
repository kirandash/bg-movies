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
define( 'BGMOVIES_PLUGIN_URL', __FILE__ ); // define path of plugin folder instead of dirname(__FILE__)

/***************************** 
* Includes for plugin
*****************************/
include( 'includes/activate.php' );
include( 'includes/deactivate.php' );
include( 'includes/init.php' );
include( 'includes/admin/init.php' );
include( 'save/save-post-movie.php' );
include( 'save/filter-postcontent.php' );
include( 'includes/frontend/enqueue.php' );
include( 'save/rate-movie.php' );
include( dirname(BGMOVIES_PLUGIN_URL) . '/includes/widgets.php' );
include( dirname(BGMOVIES_PLUGIN_URL) . '/includes/widgets/movie-suggestion.php' );
include( 'includes/cron-job.php' );
include( 'includes/shortcodes/movie-submission.php' );

/***************************** 
* Hooks for plugin
*****************************/
register_activation_hook( __FILE__ , 'bgs_plugin_activated' ); 
register_deactivation_hook( __FILE__ , 'bgs_plugin_deactivated' ); // Fn will be called when plugin is activated

// register_activation_hook( $file, $function ); 
// Fn will be called when plugin is activated
add_action( 'init', 'bgs_movies_init' );
add_action( 'admin_init', 'bgs_movies_admin_init' );
add_action( 'save_post_movie', 'bgs_save_movie_post_admin', 10, 3 ); // default value is 10 which means the priority is high
add_filter( 'the_content', 'bgs_filter_movie_post_content' );
add_action( 'wp_enqueue_scripts', 'bgs_enqueue_frontend_scripts', 9999 ); // change the priority from default value of 10 to 9999 to make sure that first theme loads and then plugin files
add_action( 'wp_ajax_bgs_rate_movie', 'bgs_rate_movie' ); // https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
add_action( 'wp_ajax_nopriv_bgs_rate_movie', 'bgs_rate_movie' ); // nopriv will accept request also from guest users and not just logged in users
add_action( 'widgets_init', 'bgs_widgets_init' );
add_action( 'bgs_suggested_movie_hook', 'bgs_random_suggested_movie' );

/***************************** 
* Shortcodes for plugin
*****************************/
add_shortcode( 'movie_submission', 'bgs_movie_submission_shortcode' );