<?php
/**
 * Displays gallery
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<figure class="gallery__item">
        <img src="<?php the_post_thumbnail_url('galleryLandscape'); ?>" alt="Gallery image 2" class="gallery__img">
        <div class="gallery__item-overlay">
            <h3 class="heading-tertiary"><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words(get_the_content(), 18);?></p>
            <div class="gallery__item-overlay-btn-box">
                <a href="<?php echo get_field('project_url') ?>" class="btn-txt col-1">Visit Site</a>
                <a href="<?php the_permalink() ?>" class="btn-txt col-2">Learn more</a>
            </div>
        </div>
</figure>