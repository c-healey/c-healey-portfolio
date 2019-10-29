<?php
/**
 * The main template file
 *

 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="container">

    <header class="section-header">
        <div class="bg-video">
            <video  class="bg-video__content" autoplay muted loop>
                <source src="<?php echo get_theme_file_uri('images/video.mp4')?>" type="video/mp4">
                <source src="<?php echo get_theme_file_uri('images/video.webm')?>" type="video/webm">
                Your browser is not supported!
            </video>
        </div>
        
        <h1 class="heading-primary heading-primary--main">Web Development</h1>
        <h1 class="heading-primary heading-primary--sub">bring design to life</h1>
        
        <a href="#contact" class="btn btn--white btn--animated jself-center">Get in Touch</a>
    </header>
    <?php
    get_template_part('template-parts/content/content', 'about');
    get_template_part('template-parts/content/content', 'attributes');
    get_template_part('template-parts/content/content', 'skills');
    get_template_part('template-parts/content/content', 'work-gallery');
    get_template_part('template-parts/content/content', 'contact-form-7');
    ?>
        
</div> <!--container -->
<?php
get_footer();
