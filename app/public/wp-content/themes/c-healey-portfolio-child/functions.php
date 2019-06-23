<?php


function remove_parent_filters(){ //Have to do it after theme setup, because child theme functions are loaded first
    //remove_filter( 'wp_nav_menu', 'twentynineteen_add_ellipses_to_nav');
    remove_filter( 'wp_nav_menu_objects', 'twentynineteen_add_mobile_parent_nav_menu_items');
}
add_action( 'after_setup_theme', 'remove_parent_filters' );


function wpdocs_dequeue_script() {
     wp_dequeue_script('twentynineteen-touch-navigation');
}
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

function chealey_files() {

   $parent_style = 'twentynineteen-style'; // This is 'twentynineteen-style' for the Twenty nineteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version') 
    );
    
   
  wp_enqueue_script('main-chealey-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_localize_script('main-chealey-js', 'chealeyData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'chealey_files');

function ch_slideshow_func (){
  ob_start();
  ?>
  <div class="hero-slider">
  <?php 
    $homepageSlides = new WP_Query(array(
      "posts_per_page" => -1,
      "post_type" => "ch-slideshow"

    ));
    while ($homepageSlides->have_posts()){
      $homepageSlides->the_post(); ?>

  <div class="hero-slider__slide" style="background-image: url(<?php the_post_thumbnail_url("medium"); ?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center"><?php the_title(); ?></h2>
          
          <p class="t-center no-margin"><a href="<?php the_field("ch_slideshow"); ?>" class="btn btn--blue">Learn More</a></p>
        </div>
      </div>
    </div>
    <?php } wp_reset_postdata();
        ?>
  </div>
  <?php

  $html = ob_get_clean();
  
  return $html;
}

add_shortcode ('ch_slideshow', 'ch_slideshow_func');
?>