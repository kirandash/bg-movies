<?php 
function bgs_rate_movie() {
	/*print_r($_POST);
	die(); // die is used to avoid final o/p of 0*/

	global $wpdb;

	$response			= array( 'status'	=> 'fail' ); // failure status
	$movie_post_id 		= absint($_POST['movieid']);
	$viewer_rating 		= round($_POST['viewerRating'], 1);
	$user_ip			= $_SERVER['REMOTE_ADDR']; // get user's ip. This is optional but used for security purposes

	$rating_count = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "movie_ratings` WHERE movie_id='". $movie_post_id ."' AND user_ip='".$user_ip."'");
	
	if($rating_count > 0){
		wp_send_json($response);
	} // Insert rating only once
	$wpdb->insert(
		$wpdb->prefix . 'movie_ratings', // table name
		array(
			'movie_id'		=>	$movie_post_id,
			'viewer_rating'	=>  $viewer_rating,
			'user_ip'		=>	$user_ip
		), // values
		array(
			'%d', '%f', '%s'
		)  // formats ( %s string, %d integer, %f float )
	);

	// Grab meta data
	$movie_data	= get_post_meta( $movie_post_id, 'movie_data', true );
	
	$movie_data['average_rating']	= round($wpdb->get_var("SELECT AVG(`viewer_rating`) FROM `" . $wpdb->prefix . "movie_ratings` WHERE movie_id='". $movie_post_id ."'"), 1);
	// Update meta data
	update_post_meta( $movie_post_id, 'movie_data', $movie_data );

	// https://codex.wordpress.org/Plugin_API
	// https://developer.wordpress.org/reference/functions/do_action/
	do_action( 'movie_rating', array(
		'id'		=> $movie_post_id,
		'rating'	=> $viewer_rating,
		'ip'		=> $user_ip
	)); // Now any one can use add_action fn to hook into this hook

	$response['status']		= 'pass'; // success status 
	// echo $response['status'];
	// die();
	wp_send_json( $response );	
}