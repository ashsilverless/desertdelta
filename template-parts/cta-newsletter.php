<?php if (have_rows('cta_newsletter', 'options')):
while (have_rows('cta_newsletter', 'options')) : the_row();?>

<div class="wrapper-newsletter">
    
    <div class="toggle-newsletter">
	    
	    <button class="button">Sign up to  our regular NEWSLETTER</button>
	    
    </div>

	<div class="collapse-newsletter">
		
    	<div class="cta newsletter">
	    	
	    	<div class="close-newsletter"><i class="fas fa-times"></i></div>
	                
	        <div class="content">
	            
	            <p><span>Sign up now for the</span> 
	                <span>Desert & Delta Safaris</span>
	                Newsletter                
	            </p>
	        
	            <img src="<?php the_sub_field('image');?>"/>
	            
	        </div>
	        
	        <div class="form mt2">
	            
	            <?php echo do_shortcode('[contact-form-7 id="2157" title="Newsletter Form" html_class="newsletter-form"]');?>
	
	            <p><em>We are extremely careful with your personal data and will not share it with anyone.</em></p>            
	        </div>
	     
	    </div>
	
	</div>
    
</div>

<?php endwhile; endif;?>