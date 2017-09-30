<?php
// https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
function add_new_movie_columns( $columns ) {
	// Fn to change the custom post types table columns
	$new_columns 					= array();
	$new_columns['cb']				= '<input type="checkbox" />';
	$new_columns['title'] 			= __("Title", "bg-movies");
	$new_columns['author'] 			= __("Author", "bg-movies");	
	$new_columns['director'] 		= __("Director", "bg-movies");
	$new_columns['genres'] 			= __("Genres", "bg-movies");
	$new_columns['certificate'] 	= __("Certificate", "bg-movies");
	$new_columns['average_rating'] 	= __("Average Rating", "bg-movies"); // Custom column
	$new_columns['date'] 			= __("Date", "bg-movies");
	return $new_columns;
}
function manage_movie_columns( $column_name, $id ) {
	// switch case for custom column datas, default ones will be taken care by WordPress
	switch ( $column_name ) {
		case 'director':
			# code...
			$movie_data	=	get_post_meta( $id, 'movie_data', true );
			echo $movie_data['director'];
			break;
		case 'genres':
			$movie_data	=	get_post_meta( $id, 'movie_data', true );
			echo $movie_data['genres'];
			break;	
		case 'certificate':
			$movie_data	=	get_post_meta( $id, 'movie_data', true );
			echo $movie_data['certificate'];
			break;				
		case 'average_rating':
			$movie_data	=	get_post_meta( $id, 'movie_data', true );
			echo $movie_data['average_rating'];
			break;	
		default:
			# code...
			break;
	}
}
?>