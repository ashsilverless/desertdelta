<?php
/**
 * The template for displaying the footer
 * @package desertdelta
 */
?>

</main>

    <footer class="footer">

<div class="quick-contact">
    
    <div class="container">
    
        <div class="row pt3 pb3">            
            
            <div class="col-3">            
                
                <h3 class="heading heading__sm font400">QUICK CONTACT</h3>
                <p class="font400 mt2 mb0"><?php the_field('telephone_number', 'options');?></p>
                <p class="font400"><?php the_field('email_address', 'options');?></p>
            
            </div>            
            
            <div class="col-9">            
            <?php echo do_shortcode('[contact-form-7 id="1325"]');?>
            
            </div>                  
            
            
            
            
            
        </div><!--r-->
    
    </div><!--c-->    
    
    
</div>
        
        
        
        
        
        
        
        <div class="pre-socket">

        <div class="container">
     
                <div class="row pt2 pb2">

                    <div class="col-4">
                        
                        <p class="font700">Get job alerts to your inbox</p>
                        
                        <p>Excepteur sint occaecat cupidatat non proident</p>
    
    
                    </div><!--col-->
                    
                    <div class="col-2 offset-4">
    
                        <?php
                            wp_nav_menu( array(
                            'theme_location' => 'footer-menu1',
                            'container_class' => 'footer' ) );
                        ?>
    
                    </div><!--col-->                    

                    <div class="col-2">
                    
                        <?php
                            wp_nav_menu( array(
                            'theme_location' => 'footer-menu2',
                            'container_class' => 'footer' ) );
                        ?>
    
    
                    </div><!--col-->       

                </div><!--row-->
        
        </div><!--container-->
    
    
</div>



    
        <div class="container">
    
            <div class="socket">
     
                <div class="row">

                    <div class="col-4 socket__colophon">
                        
                        &copy; First Press <?php echo date ('Y');?>
    
                        <a href="<?php echo home_url() . '/terms-conditions'; ?>">Terms</a>
    
                        <a href="<?php echo home_url() . '/privacy-policy'; ?>">Privacy</a>    
    
                    </div>

                    <div class="col-4">
                        
                        <div class="logo-holder">
                            
                            <a href="https://desertdelta.co.uk">
                                
                                <?php get_template_part('inc/img/desertdelta', 'logo');?>
                            
                            </a>
                        
                        </div>
    
                    </div>
    
                    <div class="col-4 socials">
    
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
    
                        <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
    
                        <?php endwhile; endif; ?>
    
                    </div>
    
                </div><!--row-->
    
            </div><!--socket-->
    
        </div><!--container-->
    
    </footer>
    
    </div><!-- #page -->

    <?php wp_footer(); ?>
    
    </body>
    
</html>
