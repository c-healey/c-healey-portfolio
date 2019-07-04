<?php


function site_features(){ 
//Have to remove parent filters after theme setup, because child theme functions are loaded first
    //remove_filter( 'wp_nav_menu', 'twentynineteen_add_ellipses_to_nav');
    remove_filter( 'wp_nav_menu_objects', 'twentynineteen_add_mobile_parent_nav_menu_items');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('slideshow', 1500, 550, true);
    add_image_size('pageBanner', 1500, 350, true);
}
add_action( 'after_setup_theme', 'site_features' );


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
          <h2 class="headline  t-center"><?php the_title(); ?></h2>
          
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

add_filter('wp_insert_post_data', 'sanitizeContact', 10, 2);
function sanitizeContact ($data, $postarr){
  

  if($data['post_type'] == 'contact'){
    
    $data['post_content'] = sanitize_textarea_field($data['post_content']);
    $data['post_title'] = sanitize_text_field($data['post_title']);

  }
 
  
  return $data;

}

//Redirect subscriber members to homepage
add_action('admin_init', 'redirectSubsToFrontend');
function redirectSubsToFrontend (){
  $ourCurrentUser = wp_get_current_user();
  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
    wp_redirect(site_url('/'));
    exit;

  }

}
add_action('wp_loaded', 'noSubsAdminBar');
function noSubsAdminBar (){
  $ourCurrentUser = wp_get_current_user();
  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
    show_admin_bar(false);
  }

}
//customize login screen
add_filter('login_headerurl', 'ourHeaderURL');
function ourHeaderUrl (){
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');
function ourLoginCSS(){
  wp_enqueue_style('chealey_main_styles', get_stylesheet_uri());
   wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

}
add_filter('login_headertitle', 'ourLoginTitle');
function ourLoginTitle(){
  return get_bloginfo('name');
}

//1. Add a new form element...
add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {

    $first_name = ( ! empty( $_POST['first_name'] ) ) ? sanitize_text_field( $_POST['first_name'] ) : '';
        
        ?>
        <p>
            <label for="first_name"><?php _e( 'First Name', 'mydomain' ) ?><br />
                <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(  $first_name  ); ?>" size="25" /></label>
        </p>
        <?php

        $last_name = ( ! empty( $_POST['last_name'] ) ) ? sanitize_text_field( $_POST['last_name'] ) : '';
        
        ?>
        <p>
            <label for="last_name"><?php _e( 'Last Name', 'mydomain' ) ?><br />
                <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(  $last_name  ); ?>" size="25" /></label>
        </p>
        <?php
         $description = ( ! empty( $_POST['description'] ) ) ? sanitize_text_field( $_POST['description'] ) : '';
        
        ?>
        <p>
            <label for="description"><?php _e( 'What can I do for you?', 'mydomain' ) ?><br />
                <input type="text" name="description" id="description" class="input" value="<?php echo esc_attr(  $description  ); ?>" size="500" /></label>
        </p>
        <?php
    }

    //2. Add validation. In this case, we make sure first_name is required.
    add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
    function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {
       /* 
        if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
        $errors->add( 'first_name_error', sprintf('<strong>%s</strong>: %s',__( 'ERROR', 'mydomain' ),__( 'You must include a first name.', 'mydomain' ) ) );

        }
         if ( empty( $_POST['last_name'] ) || ! empty( $_POST['last_name'] ) && trim( $_POST['last_name'] ) == '' ) {
        $errors->add( 'last_name_error', sprintf('<strong>%s</strong>: %s',__( 'ERROR', 'mydomain' ),__( 'You must include a last name.', 'mydomain' ) ) );

        }
         if ( empty( $_POST['description'] ) || ! empty( $_POST['description'] ) && trim( $_POST['description'] ) == '' ) {
        $errors->add( 'description_error', sprintf('<strong>%s</strong>: %s',__( 'ERROR', 'mydomain' ),__( 'Please tell me a little about yourself.', 'mydomain' ) ) );

        }
        */

        return $errors;
    }

    //3. Finally, save our extra registration user meta.
    add_action( 'user_register', 'myplugin_user_register' );
    function myplugin_user_register( $user_id ) {
        if ( ! empty( $_POST['first_name'] ) ) {
            update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
        }
         if ( ! empty( $_POST['last_name'] ) ) {
            update_user_meta( $user_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
        }
        if ( ! empty( $_POST['description'] ) ) {
            update_user_meta( $user_id, 'description', sanitize_text_field( $_POST['description'] ) );
        }
    }

?>