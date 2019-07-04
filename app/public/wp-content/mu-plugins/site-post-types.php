<?php
/*
 mu-plugins folder is part of wordpress heirarchy. All files and functions within the fole=der are included automagically and exist outside of the theme.
*/
function site_post_types() {
//jquery slide post type implementing slick slider
	register_post_type('ch-slideshow', array(
		'supports'=> array('title', 'editor', 'thumbnail', 'excerpt'),
		'public' => true,
		'show_ui' => true,
		'labels' => array (
			'name' => 'CH Slide',
			'add_new_item' => 'Add New CH Slide',
			'edit_item' => 'Edit CH Slide',
			'all_items' => 'All CH Slides',
			'singlar_name' => 'CH Slide'
		),
		'menu_icon' => 'dashicons-images-alt',
	));

	register_post_type('contact', array(
		'capability_type' => 'contact',
		'map_meta_cap' => true,
		'show_in_rest' => true,
		'supports'=> array('title', 'editor'),
		'public' => false,
		'show_ui' => true,
		'labels' => array (
			'name' => 'Contacts',
			'add_new_item' => 'Add New Contact',
			'edit_item' => 'Edit Contact',
			'all_items' => 'All Contact',
			'singlar_name' => 'Contact'
		),
		'menu_icon' => 'dashicons-email-alt2',
	));
}
add_action('init', 'site_post_types');