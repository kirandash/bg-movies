<?php 
function bgs_save_movie_post_admin( $post_id, $post, $update ) {
	if( !$update ){
		return; // dont do anything if post is being updated
	}
	/*echo '<pre>';
	print_r($_POST);
	die();*/
	$movie_data = array();
	$movie_data['director'] 		= sanitize_text_field( $_POST['bgs_inputDirector'] );
	$movie_data['writer'] 			= sanitize_text_field( $_POST['bgs_inputWriter'] );
	$movie_data['stars'] 			= sanitize_text_field( $_POST['bgs_inputStars'] );
	$movie_data['tagline'] 			= sanitize_text_field( $_POST['bgs_inputTagline'] );
	$movie_data['keywords'] 		= sanitize_text_field( $_POST['bgs_inputKeywords'] );
	$movie_data['genres'] 			= sanitize_text_field( $_POST['bgs_inputGenres'] );
	$movie_data['audience'] 		= sanitize_text_field( $_POST['bgs_inputLevel'] );
	$movie_data['certificate'] 		= sanitize_text_field( $_POST['bgs_inputCertificate'] );
	
	update_post_meta( $post_id, 'movie_data', $movie_data ); // can use add_post_meta but update_post_meta is better
	// https://codex.wordpress.org/Function_Reference/update_post_meta
}
?>