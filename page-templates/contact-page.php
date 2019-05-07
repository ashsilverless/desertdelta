<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package desertdelta
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3">

                <div class="mb5">
                    <?php get_template_part('template-parts/text-block');?>
                </div>
                
                <div class="mb5">
                    <?php echo do_shortcode('[contact-form-7 id="1676" title="Full Contact Form"]');?>
                </div>                               

                <div class="callout mb5">
                        <?php if( have_rows('callout') ): while( have_rows('callout') ): the_row(); ?>
                            <h2 class="heading heading__md font700"><?php the_sub_field('heading');?></h2>
                            
                            <p><?php the_sub_field('copy');?></p>
                    
                            <a href="<?php the_sub_field('link');?>" class="button button__ghost button__fullwidth button__mandatory mb1">Read More</a>    
                    
                        <?php endwhile; endif;?>
                
                </div>

                <div class="mb5">
                    <?php the_field('body_content');?>
                    
                    <a href="/terms-conditions" class="button button__ghost button__fullwidth button__mandatory mb1">Read our full Terms & Conditions</a>
                    
                    <a href="/gdpr-policy" class="button button__ghost button__fullwidth button__mandatory mb1">Read our GDPR Policy</a>
                    
                    <a href="/privacy-policy" class="button button__ghost button__fullwidth button__mandatory mb1">Read our Privacy Policy</a>
                    
                </div>            

                <?php get_template_part('template-parts/testimonial');?>
                
            </div><!--col-->
            
            <div class="col-5 offset-1 sticky-sidebar">
                
                <div class="sidebar-wrapper">
                    
                    <div class="sidebar-contacts">
                        
                        <h4 class="heading heading__md font700">Contact Details</h4>   
                        <p class="font400 mt2 mb0"><?php the_field('telephone_number', 'options');?></p>
                        
                        <p class="font400"><?php the_field('email_address', 'options');?></p>
                        
                        <p><?php the_field('address', 'options');?></p>                        
                        
                        
                    </div>
                    
                    <?php get_template_part('template-parts/sidebar');?>
                
                </div>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>