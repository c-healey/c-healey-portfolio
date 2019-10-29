<?php 
function get_my_excerpt ($args = NULL){
  
  $length = 18;
  
	if ($args && $args[0]){
		
		$length = $args[0];
	}
	
	if (has_excerpt()) {
	    echo wp_trim_words(get_the_excerpt(), $length);
	 } else {
	    echo wp_trim_words(get_the_content(), $length);
	}
}
function get_my_post_thumbnail ($arg = NULL){
  $className = "";
  if ($args && $args[0]){
		
		$className = 'class = ' + $args[0];
	}
  if (has_post_thumbnail()){ ?>
    <img src="<?php the_post_thumbnail_url(); ?>" alt="image" class="gallery__single-img">
  <?php } else {?> <div>&nbsp;</div> <?php } 
}

?>