<?php
function bgs_generate_metaboxes() {
	add_meta_box(
		'bgs_movies_info_mb', // Meta box ID
		__( 'Movie Information', 'bg-movies' ), // Title of the meta box
		'bgs_movies_info_mb', // Function that fills the box with the desired content. The function should echo its output.
		'movie', // The screen or screens on which to show the box
		'normal', // The context within the screen where the boxes should display. 
		'high' // The priority within the context where the boxes should show 
	); // https://developer.wordpress.org/reference/functions/add_meta_box/
}