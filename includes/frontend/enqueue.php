<?php
function bgs_enqueue_frontend_scripts(){
	// https://codex.wordpress.org/Function_Reference/plugins_url
	wp_enqueue_script( 'bgs_main', plugins_url( '/assets/js/main.js', BGMOVIES_PLUGIN_URL ), array(), '1.0.0', true );

	// fn for translation through ajax or also can be used for sending ajax request in front end
	wp_localize_script("bgs_main", "movie_obj", array(
		"ajax_url"	=> admin_url("admin-ajax.php") // send ajax request to wp-admin/admin-ajax.php
	));	
}