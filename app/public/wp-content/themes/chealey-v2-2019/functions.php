<?php


function wpstandard_files() {

   // change chealey to yoursite whatever you choose

  $parent_style = 'twentynineteen-style'; // This is 'twentynineteen-style' for the Twenty nineteen theme.
 
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
  
  wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array( $parent_style ),
      wp_get_theme()->get('Version') 
  );
    
   
  wp_enqueue_script('main-chealeyv2-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style( 'dashicons' );

  wp_enqueue_style('chealeyv2_main_styles', get_stylesheet_uri(), NULL, microtime());

  wp_localize_script('main-chealeyv2-js', 'chealeyv2Data', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'wpstandard_files');

function site_features(){ 
  
    register_nav_menu ('topNav', 'Top Navigation'); // create a separate top man
    add_theme_support('post-thumbnails' ); //enable thumbnails for blog posts
    add_image_size('galleryLandscape', 400, 260, true);

}
add_action( 'after_setup_theme', 'site_features' );
add_action ('init', 'site_post_types');

?>
