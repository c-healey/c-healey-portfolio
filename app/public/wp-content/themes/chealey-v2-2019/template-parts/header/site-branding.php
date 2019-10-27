<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<?php if ( is_front_page()  ) : 
            $navButtonClass= "navigation__button";
            $headerLogoClass = "heading-secondary heading__logo--white";
	else :
        $navButtonClass = "navigation__button "; //navigation__button--color-2
        $headerLogoClass = "heading-secondary  heading__logo--white";
	endif; ?>
<div class="navigation">
            <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
            <label for="navi-toggle" class="<?php echo $navButtonClass?>"><span class="navigation__icon">&nbsp</span></label>
            <div class="navigation__background">&nbsp;</div>
            <?php if ( has_nav_menu( 'topNav' ) ) : ?>
				<nav class="navigation__nav" id="navi-toggle" aria-label="<?php esc_attr_e( 'Header Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'topNav',
							'menu_class'     => 'navigation__list',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .header-navigation -->
            <?php endif; ?>
            <!--
            <nav class="navigation__nav" id="navi-toggle">
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="#section-about" class="navigation__link"><span>01</span>About</a></li>
                    <li class="navigation__item"><a href="#key" class="navigation__link"><span>02</span>Key Attributes</a></li>
                    <li class="navigation__item"><a href="#Skills" class="navigation__link"><span>03</span>Skills and Expertise</a></li>
                    <li class="navigation__item"><a href="#work" class="navigation__link"><span>04</span>Work</a></li>
                    <li class="navigation__item"><a href="#book" class="navigation__link"><span>05</span>Get in Touch</a></li>
                    <li class="navigation__item"><a href="/blog" class="navigation__link"><span>06</span>Blog</a></li>
                </ul>
            </nav>
                -->
        </div>
        
        <div class="header__logo-box">
            <h1 class="<?php echo $headerLogoClass?>">
            
            <?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
			</h1>
		</div>


