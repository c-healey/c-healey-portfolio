<?php
/*
 mu-plugins folder is part of wordpress heirarchy. All files and functions within the fole=der are included automagically and exist outside of the theme.
*/
function site_post_types() {

	register_post_type('gallery', array(
		'supports'=> array('title', 'editor', 'thumbnail', 'excerpt'),
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'show_in_rest' => true, // required to use gutenberg editor along with 'editor' above
		'labels' => array (
			'name' => 'Gallery',
			'add_new_item' => 'Add New Gallery',
			'edit_item' => 'Edit Gallery',
			'all_items' => 'All Gallery',
			'singlar_name' => 'Gallery'
		),
		'menu_icon' => 'dashicons-images-alt',
	));

	
}
add_action('init', 'site_post_types');