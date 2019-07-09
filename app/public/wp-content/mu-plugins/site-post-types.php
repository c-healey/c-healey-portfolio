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

	
}
add_action('init', 'site_post_types');