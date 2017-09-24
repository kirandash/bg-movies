<?php
function bgs_plugin_activated() {
	if( version_compare( get_bloginfo('version'), '4.2', '<') ){
		// If wp version is less than 4.2 than plugin won't be activated , 3.2 is good enough but we will go for 4.2
		wp_die( __('You must update your WP installation to 4.2 or higher to use this plugin', 'bg-movies') );
	}
}
?>