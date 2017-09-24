<?php
/**
 * Register a stories post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function bgs_stories_init() {
	$labels = array(
		'name'               => _x( 'Stories', 'post type general name', 'bg-stories' ),
		'singular_name'      => _x( 'Story', 'post type singular name', 'bg-stories' ),
		'menu_name'          => _x( 'Stories', 'admin menu', 'bg-stories' ),
		'name_admin_bar'     => _x( 'Story', 'add new on admin bar', 'bg-stories' ),
		'add_new'            => _x( 'Add New', 'Story', 'bg-stories' ),
		'add_new_item'       => __( 'Add New Story', 'bg-stories' ),
		'new_item'           => __( 'New Story', 'bg-stories' ),
		'edit_item'          => __( 'Edit Story', 'bg-stories' ),
		'view_item'          => __( 'View Story', 'bg-stories' ),
		'all_items'          => __( 'All Stories', 'bg-stories' ),
		'search_items'       => __( 'Search Stories', 'bg-stories' ),
		'parent_item_colon'  => __( 'Parent Stories:', 'bg-stories' ),
		'not_found'          => __( 'No Stories found.', 'bg-stories' ),
		'not_found_in_trash' => __( 'No Stories found in Trash.', 'bg-stories' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'bg-stories' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'story' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'menu_icon'			 => 'dashicons-smiley'
	);

	register_post_type( 'story', $args );
}
?>