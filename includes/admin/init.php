<?php
function bgs_stories_admin_init() {
	include( 'generate-metaboxes.php' );
	include( 'story-metainfo.php' );
	// https://developer.wordpress.org/reference/hooks/add_meta_boxes_post_type/
	add_action( 'add_meta_boxes_story', 'bgs_generate_metaboxes' ); // add_meta_boxes_cptslug
}