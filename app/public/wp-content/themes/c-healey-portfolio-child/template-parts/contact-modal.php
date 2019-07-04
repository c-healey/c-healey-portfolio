<div class="modal">
    <div class="modal__inner">
	    <h2 class="section-title section-title section-title--less-margin">
	    	<span class="section-title__icon"></span><strong>Contact</strong></h2>

	     <div class="wrapper wrapper--narrow wrapper--no-padding ">
	    <?php if (is_user_logged_in()){ ?>
	    	<div class="modal--contact">
			    <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small modal--contact__btn"><span class="btn">Log Out</span></a>
			    
			</div>
	    	<?php } else { ?>
		    <div class="modal--contact">
			    <a href="<?php echo wp_login_url(); ?>" class="btn btn--small modal--contact__btn">Login</a>
			    <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small modal--contact__btn">Sign Up</a>
			</div>
			<?php }?>

			 <div class="modal--contact">
			    <a href="mailto:cathy.healey@gmail.com" class="btn btn--small modal--contact__btn">Email</a>
			    <a href="#"                             class="btn btn--small modal--contact__btn modal--contact__cell">248-835-8797</a>
		    </div>
		
		 </div>
	    <div class="social-icons">
		    <a href="#" class="social-icons__icon"><span class="icon icon--facebook"></span></a>
		    <a href="#" class="social-icons__icon"><span class="icon icon--twitter"></span></a>
		    <a href="#" class="social-icons__icon"><span class="icon icon--instagram"></span></a>
		    <a href="#" class="social-icons__icon"><span class="icon icon--youtube"></span></a>
	    </div>
    </div>
    <div class="modal__close">X</div>
  </div>
  