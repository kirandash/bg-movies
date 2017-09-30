<?php
function bgs_plugin_activated() {
	if( version_compare( get_bloginfo('version'), '4.2', '<') ){
		// If wp version is less than 4.2 than plugin won't be activated , 3.2 is good enough but we will go for 4.2
		wp_die( __('You must update your WP installation to 4.2 or higher to use this plugin', 'bg-movies') );
	}
	// Create Table for ratings in db while activation
	global $wpdb;
	$createSQL = "
		CREATE TABLE `". $wpdb->prefix ."movie_ratings` (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `movie_id` bigint(20) NOT NULL,
		  `viewer_rating` float NOT NULL,
		  `user_ip` varchar(32) NOT NULL,
		  PRIMARY KEY  (id)
		) ENGINE=InnoDB ". $wpdb->get_charset_collate() .";
		";	
	require( ABSPATH . '/wp-admin/includes/upgrade.php' ); // to include dbDelta fn which allows us to modify the wp database
	dbDelta( $createSQL );
	// use exit(); at end of dbDelta fn in /wp-admin/includes/upgrade.php for debugging	
}
?>