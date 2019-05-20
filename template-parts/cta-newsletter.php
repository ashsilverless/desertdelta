<?php if (have_rows('cta_newsletter', 'options')):
while (have_rows('cta_newsletter', 'options')) : the_row();?>

    <div class="cta newsletter">
                
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

<?php endwhile; endif;?>