<?php
function bgs_movies_admin_init() {
	include( 'generate-metaboxes.php' );
	include( 'movie-metainfo.php' );
	include( 'enqueue.php' );
	// https://developer.wordpress.org/reference/hooks/add_meta_boxes_post_type/
	add_action( 'add_meta_boxes_movie', 'bgs_generate_metaboxes' ); // add_meta_boxes_cptslug
	add_action( 'admin_enqueue_scripts', 'bgs_admin_enqueue' ); // enqueue scripts for admin
}