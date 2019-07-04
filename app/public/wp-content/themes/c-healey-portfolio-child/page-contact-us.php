
  

<?php get_header(); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
              <?php the_content(); ?>

              <div class="container container--narrow page-section">
                <div class="site-header__util">
            <?php if (is_user_logged_in()){ ?>
               
              <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small  btn--dark-orange float-left btn--with-photo">
                <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60);?></span>
                <span class="btn__text">Log out</span></a>

            <?php } else { ?>
              <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
              <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>

           <?php }?>
            
               </div>
                <div class="create-contact">
                  
                  <input class="new-contact-name" placeholder="First and Last Name">
                  <textarea class="new-contact-message" placeholder="What can I do for you?"></textarea>
                  <span class="submit-contact">Create Contact</span>
                  <span class="contact-limit-message">Contact limit reached: delete an existing contact to make room for a new one.</span>
                </div>

                

              </div>


            </div><!-- .entry-content -->

          </article><!-- #post -->

      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->


<?php get_footer(); ?>