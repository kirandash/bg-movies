<?php
/**
 * Register a Movies post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function bgs_Movies_init() {
	$labels = array(
		'name'               => _x( 'Movies', 'post type general name', 'bg-Movies' ),
		'singular_name'      => _x( 'Movie', 'post type singular name', 'bg-Movies' ),
		'menu_name'          => _x( 'Movies', 'admin menu', 'bg-Movies' ),
		'name_admin_bar'     => _x( 'Movie', 'add new on admin bar', 'bg-Movies' ),
		'add_new'            => _x( 'Add New', 'Movie', 'bg-Movies' ),
		'add_new_item'       => __( 'Add New Movie', 'bg-Movies' ),
		'new_item'           => __( 'New Movie', 'bg-Movies' ),
		'edit_item'          => __( 'Edit Movie', 'bg-Movies' ),
		'view_item'          => __( 'View Movie', 'bg-Movies' ),
		'all_items'          => __( 'All Movies', 'bg-Movies' ),
		'search_items'       => __( 'Search Movies', 'bg-Movies' ),
		'parent_item_colon'  => __( 'Parent Movies:', 'bg-Movies' ),
		'not_found'          => __( 'No Movies found.', 'bg-Movies' ),
		'not_found_in_trash' => __( 'No Movies found in Trash.', 'bg-Movies' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'bg-Movies' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'movie' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'menu_icon'			 => 'dashicons-video-alt2'
	);

	register_post_type( 'movie', $args );
}
?>