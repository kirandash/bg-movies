<?php
function bgs_plugin_deactivated() {
	wp_clear_scheduled_hook( 'bgs_suggested_movie_hook' ); // Clear scheduled events/cron jobs when plugin is deactivated
}
?>