<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	

	<footer id="colophon" class="site-footer container container__footer">
		<div class="section-footer">
				
			<h1 class="heading-secondary footer__logo-box"><?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?></h1>

			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer__navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer__list',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
		
			<p class="footer__copyright">Built by <a href="#" class="footer__link">Catherine Healey</a>
			&nbsp;Copyright &copy; 2019 Design adapted from Jonas Schmedtmann - Advanced CSS and Sass.</p>

			
		</div>
	</footer><!-- #colophon -->
				
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
