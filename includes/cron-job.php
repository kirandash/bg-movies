<?php
function bgs_random_suggested_movie(){
	// Note that WordPress cron jobs run from the first visit of the day and not the start of the day.
	// Transient APIs let us save data for some amount of time - just like cookie but for server and not client
	global $wpdb;
	$movie_id 	= $wpdb->get_var( "SELECT `ID` FROM `". $wpdb->posts ."`
									WHERE post_status='publish' AND post_type='movie'
									ORDER BY rand() LIMIT 1" ); // this rand() fn is slower but will be fine for us since we want the query to only run once
	set_transient( 'bgs_suggested_movie_hook', $movie_id, 60 * 24 * 24 ); // value will be auto sanitized by wordpress
	// set_transient( $transient, $value, $expiration );
	// https://codex.wordpress.org/Function_Reference/set_transient	
}
?>