<?php


function chealey_files() {

  $parent_style = 'twentynineteen-style'; // This is 'twentynineteen-style' for the Twenty nineteen theme.

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get('Version') 
  );


  wp_enqueue_script('main-chealey-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style( 'dashicons' );
  wp_enqueue_style('chealey_main_styles', get_stylesheet_uri(), NULL, microtime());
  wp_localize_script('main-chealey-js', 'chealeyData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'chealey_files');

/* dequeueing the touch nav allows us to have a smaller submenu  that does not obliterate the page with subnav item.
This touch nav broke the contact form 7.  It disabled the text fields
*/
function wpdocs_dequeue_script() {
  wp_dequeue_script('twentynineteen-touch-navigation');
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );


?>