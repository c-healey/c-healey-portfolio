<section class="gallery gallery__work" id="work">
                   
    <h2 class="heading-secondary work__heading"> Work</h2>

    <?php
    $galleryPosts = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'gallery',
        'meta_query' => array(
          array (
            'key' => 'featured',
            'compare'=> '==',
            'value' => 1,
            'type' => 'numeric'
          )
        )
      ));
    while ($galleryPosts->have_posts()){
      $galleryPosts->the_post();

      get_template_part('template-parts/content/content', 'gallery');

    } ?>
   
    <a href="<?php echo get_post_type_archive_link( 'gallery' )?>" class="btn-txt work__btn">Gallery&rarr;</a>
        
</section>