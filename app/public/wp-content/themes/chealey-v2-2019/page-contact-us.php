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
          
          <section class="section-book" id="contact">
      <div class="book">
          
        <div class="book__form">
        
          <h1 class="gallery__single-heading heading-secondary"><?php the_title(); ?></h1>
          <?php the_content();?>      
              
</div> <!-- container-->
  
</div>
  </section>
  <?php
    } ?>
</div>

<?php
get_footer();
?>