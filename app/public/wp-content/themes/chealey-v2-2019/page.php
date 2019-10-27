<?php
get_header();

?>
<div class="container">
 
    <?php
    while(have_posts()){
      the_post();
      //get_template_part('template-parts/content', 'gallery');
      content_banner([false,10]);
      ?>
          
      
        <section class="gallery__single--content">
          <h1 class="gallery__single-heading heading-secondary"><?php the_title(); ?></h1>
          <?php the_content();?>      
          
        </section>
        
</div> <!-- container-->
      <?php
    } ?>
  
</div>

<?php
get_footer();
?>