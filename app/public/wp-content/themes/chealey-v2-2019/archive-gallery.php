<?php
get_header();

?>
<div class="container__secondary">
  <section class="gallery">

    <?php
    while(have_posts()){
      the_post();
     //content_gallery(); // can't get this to
      
      get_template_part('template-parts/content/content', 'gallery');
      ?>
      
     
      <?php
    } ?>
  
  </section>
</div>

<?php
get_footer();
?>