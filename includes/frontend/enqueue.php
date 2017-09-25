<?php
function bgs_enqueue_frontend_scripts(){
	// https://codex.wordpress.org/Function_Reference/plugins_url
	wp_enqueue_script( 'bgs_main', plugins_url( '/assets/js/main.js', BGMOVIES_PLUGIN_URL ), array(), '1.0.0', true );
}