<div class="hero-slider">
  <?php 
    $homepageSlides = new WP_Query(array(
      "posts_per_page" => -1,
      "post_type" => "ch-slideshow"

    ));
    while ($homepageSlides->have_posts()){
      $homepageSlides->the_post(); ?>

  <div class="hero-slider__slide" style="background-image: url(<?php the_post_thumbnail_url("slideshow"); ?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline"><?php the_title(); ?></h2>
          
          <p class="t-center "><a href="<?php the_field("ch_slideshow"); ?>" class="btn btn--small btn--nav">Learn More</a></p>
        </div>
      </div>
    </div>
    <?php } wp_reset_postdata();
        ?>
  </div>