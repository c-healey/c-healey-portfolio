<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<div class="container">
  <div class="site-branding sticky-header">

  <?php if ( has_custom_logo() ) : ?>
    <div class="site-logo"><?php the_custom_logo(); ?></div>
  <?php endif; ?>
  <?php $blog_info = get_bloginfo( 'name' ); ?>
  <h1 class="site-title  float-left"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  <!--
  <?php if ( ! empty( $blog_info ) ) : ?>
    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php else : ?>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php endif; ?>
  
  <?php endif; ?>
-->
  <?php
  $description = get_bloginfo( 'description', 'display' );
  if ( $description || is_customize_preview() ) :
    ?>
      <p class="site-description">
        <?php echo $description; ?>
      </p>
  <?php endif; ?>
  <?php if ( has_nav_menu( 'topNav' ) ) : ?>
    <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
    <div class="site-header__menu group">
      <nav id="site-navigation" class="main-navigation " aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
        

        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'topNav',
            'menu_class'     => 'min-list group main-menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          )
        );
        ?>
        <div class="site-header__util">
          <a href="<?php echo site_url('/contact-us'); ?>" class="btn btn--small btn--nav float-left push-right push-left">Contact</a>
          
          </div>
        
    
      </nav><!-- #site-navigation -->
   
    </div> <!-- site-header__menu-content-->

  <?php endif; ?>
  <?php if ( has_nav_menu( 'social' ) ) : ?>
    <nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'social',
          'menu_class'     => 'social-links-menu',
          'link_before'    => '<span class="screen-reader-text">',
          'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
          'depth'          => 1,
        )
      );
      ?>
    </nav><!-- .social-navigation -->
  <?php endif; ?>


</div><!-- .site-branding -->
</div>
<div class="sticky-header-trigger"></div>

 