<?php
function bgs_admin_enqueue(){
	global $typenow; // global variable that stores current post type - only in admin side
	if( $typenow !== 'movie' ){
		return; // Enqueue the styles only for movie cpt
	}
	// https://codex.wordpress.org/Function_Reference/plugins_url
	wp_enqueue_style( 'bgs_bootstrap', plugins_url( '/vendors/bootstrap/css/bootstrap.css', BGMOVIES_PLUGIN_URL ) );
}