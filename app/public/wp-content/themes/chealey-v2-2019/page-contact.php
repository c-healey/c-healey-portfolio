<?php
get_header();

?>
<div class="container__secondary">
  <section class="section-book" id="contact">
      <div class="book">
          
        <div class="book__form">
                
          <h2 class="heading-secondary book__heading">
              Get in  Touch now
          </h2>
      
          <form action="/contact/#wpcf7-f150-p344-o1" method="post" class="wpcf7-form form" novalidate="novalidate">
            <div style="display: none;">
            <input type="hidden" name="_wpcf7" value="150" />
            <input type="hidden" name="_wpcf7_version" value="5.1.4" />
            <input type="hidden" name="_wpcf7_locale" value="en_US" />
            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f150-p344-o1" />
            <input type="hidden" name="_wpcf7_container_post" value="344" />
            </div>
                          
            <span class="wpcf7-form-control-wrap your-name">
              <input type="text" name="your-name" value="" size="40" 
              class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form__input" aria-required="true" aria-invalid="false" 
              id="name" placeholder="Full Name" required/>
              <label for="name" class="form__label">Full Name</label>
            </span> 
              
            <span class="wpcf7-form-control-wrap your-email">
              <input type="email" name="your-email" value="" size="40" 
              class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form__input" 
              aria-required="true" aria-invalid="false" 
              id="email" placeholder="Email Address" required/>
              <label for="email" class="form__label">Email Address</label>
            </span> 
              
            <span class="wpcf7-form-control-wrap tel-217">
              <input type="tel" name="tel-217" value="" size="40" 
              class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel form__input" 
              id="phone" placeholder="Phone Number" required aria-invalid="false" />
              <label for="phone" class="form__label">Phone Number</label>
            </span>

            <input type="submit" value="Next step &rarr;" class="btn btn--green form__btn wpcf7-form-control wpcf7-submit" />
            <div class="wpcf7-response-output wpcf7-display-none"></div>
          </form>    
          <div class="book__call-me heading-tertiary">248-835-8797</div>
        </div>
    </div>
  </section>
</div> <!-- container-->
      


<?php
get_footer();
?>