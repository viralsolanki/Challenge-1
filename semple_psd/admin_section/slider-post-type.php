<?php
/**
 * Register Custom Post Type
 *
 * @package simple_theme
 */
 
/**
 * Create Custom Post Type slider
 */
function slider_post_type_texonomy() {
	$labels = array(
		'name'                  => _x( 'Create Slider', 'Post Type General Name', 'slider' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'slider' ),
		'menu_name'             => __( 'Slider', 'slider' ),
		'name_admin_bar'        => __( 'Slider_admin', 'slider' ),
		'archives'              => __( 'Slide Archives', 'slider' ),
		'attributes'            => __( 'Slide Attributes', 'slider' ),
		'parent_item_colon'     => __( 'Parent Item:', 'slider' ),
		'all_items'             => __( 'All Items', 'slider' ),
		'add_new_item'          => __( 'Add New Slide', 'slider' ),
		'add_new'               => __( 'Add New', 'slider' ),
		'new_item'              => __( 'New Slide', 'slider' ),
		'edit_item'             => __( 'Edit Slide', 'slider' ),
		'update_item'           => __( 'Update Slide', 'slider' ),
		'view_item'             => __( 'View Slide', 'slider' ),
		'view_items'            => __( 'View Slides', 'slider' ),
		'search_items'          => __( 'Search Slide', 'slider' ),
		'not_found'             => __( 'Not found', 'slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'slider' ),
		'featured_image'        => __( 'Featured Image', 'slider' ),
		'set_featured_image'    => __( 'Set featured image', 'slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'slider' ),
		'insert_into_item'      => __( 'Insert into Slide', 'slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Slide', 'slider' ),
		'items_list'            => __( 'Slides list', 'slider' ),
		'items_list_navigation' => __( 'Slides list navigation', 'slider' ),
		'filter_items_list'     => __( 'Filter Slides list', 'slider' ),
	);
	$args   = array(
		'label'               => __( 'Slider', 'slider' ),
		'description'         => __( 'Here is the custom post type for Slider', 'slider' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-video-alt2',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slider', $args );
}
add_action( 'init', 'slider_post_type_texonomy', 0 );
