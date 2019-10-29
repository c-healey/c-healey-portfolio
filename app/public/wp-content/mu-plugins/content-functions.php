<?php 
function content_gallery ($args = NULL){// this does not work
    $count = 6;
    $length = 18;
	if ($args && $args[0]){
		
		$count = $args[0];
    }
    if ($args && $args[1]){
		$length = $args[1];
    }
    ?>
	
  <figure class="gallery__item">
        <img src="<?php post_thumbnail('galleryLandscape'); ?>" alt="Gallery image 2" class="gallery__img">
        <div class="gallery__item-overlay">
        <h3 class="heading-tertiary"><?php the_title(); ?></h3>
        <p><?php echo wp_trim_words(get_the_content(), $length);?></p>
        <a href="<?php the_permalink() ?>" class="btn-txt">Learn more</a>
        </div>
  </figure>
<?php 
} ?>

<?php
function content_banner($args = NULL){ //parameters get-excerpt =  <true, false> length = <number>
    $getExcerpt = false;
    $length=18;
    
    if ($args && $args[0]){
        $getExcerpt = $args[0];
        
    }
    if ($args && $args[1]){
		$length = $args[1];
    }
    
    ?>
    <header class="gallery__single--header">
        <h1 class="gallery__single--heading heading-primary heading-primary--main"><?php the_title(); ?></h1>
        <?php
        if ($getExcerpt == true){ ?>
            <p class="gallery__single--excerpt paragraph"><?php get_my_excerpt([$length]);?></p>
        <?php } ?>  
    </header>
    <div class="gallery__single-canvas">
      <?php get_my_post_thumbnail(["gallery__single-img"]); ?>
        
        
    </div>    
          
  
  <?php
} ?>
