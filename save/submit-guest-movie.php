<?php
function bgs_submit_guest_movie() {
	
	$response = array( 'status'	=> 'fail' );
	if( empty($_POST['title']) || empty($_POST['content']) || empty($_POST['director']) || empty($_POST['writer']) || empty($_POST['stars']) || empty($_POST['tagline']) || empty($_POST['key_words']) || empty($_POST['genre']) || empty($_POST['audience']) || empty($_POST['certificate']) ) {
		wp_send_json( $response ); // send response and also kill the script
	}
	$title 							= sanitize_text_field( $_POST['title'] ); // Input sanitization
	$content 						= wp_kses_post( $_POST['content'] ); // For sanitization of html tags - better to go for _post since it is only for post and saves us time instead of using wp_kses
	// https://codex.wordpress.org/Function_Reference/wp_kses_post
	// https://codex.wordpress.org/Function_Reference/wp_kses
	$movie_data						= array();
	$movie_data['director'] 		= sanitize_text_field( $_POST['director'] );
	$movie_data['writer'] 			= sanitize_text_field( $_POST['writer'] );
	$movie_data['stars'] 			= sanitize_text_field( $_POST['stars'] );
	$movie_data['tagline'] 			= sanitize_text_field( $_POST['tagline'] );
	$movie_data['key_words'] 		= sanitize_text_field( $_POST['key_words'] );
	$movie_data['genre'] 			= sanitize_text_field( $_POST['genre'] );
	$movie_data['audience'] 		= sanitize_text_field( $_POST['audience'] );
	$movie_data['certificate'] 		= sanitize_text_field( $_POST['certificate'] );

	$post_id						= wp_insert_post(array(
		'post_content'	=>	$content,
		'post_name'		=>	$title, // slug
		'post_title'	=>	$title, // title of post
		'post_status'	=>	'pending', // default draft
		'post_type'		=>	'movie', // Default 'post'
	));
	update_post_meta( $post_id, 'movie_data', $movie_data );
	$response['status']	= 'pass';
	wp_send_json($response);
}
?>