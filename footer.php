<?php
/**
 * The template for displaying the footer
 * @package desertdelta
 */
?>

</main>

    <footer class="footer">

        <div class="pre-socket">

        <div class="container">
     
                <div class="row pt2 pb2">

                    <div class="col-3">
                        
                        <h2 class="heading heading__lg heading__title-case">Botswana's most diverse safari portfolio</h2>
    
                    </div><!--col-->
                    
                    <div class="col-4">
    
                        <h4 class="heading heading__sm heading__alt-font heading__primary-color">Camps</h4>
                        
                        <ul class="columns">
    
                        <?php
	
						$args = array(
							'numberposts' => -1,
							'post_type'   => 'camps'
						);
						$posts = get_posts( $args );
						
						foreach($posts as $post): ?>
							
							<li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
						
						<?php endforeach; ?>
						
                        </ul>
    
                    </div><!--col-->     

                    <div class="col-2">
    
                        <h4 class="heading heading__sm heading__alt-font heading__primary-color">Reservations</h4>
    
                        <ul>
                            
                            <li><?php the_field('email_address_reservations', 'options');?></li>
                            <li><?php the_field('telephone_number_reservations', 'options');?></li>
                            
                        </ul>
    
                    </div><!--col-->     

                    <div class="col-2">
    
                        <h4 class="heading heading__sm heading__alt-font heading__primary-color">Marketing</h4>

                        <ul>
                            
                            <li><?php the_field('email_address_marketing', 'options');?></li>
                            <li><?php the_field('telephone_number_marketing', 'options');?></li>
                            
                        </ul>
    
                    </div><!--col-->                         



                </div><!--row-->
        
        </div><!--container-->
    
    
</div>

        <div class="accreds">

            <div class="container">
         
                <?php if (have_rows('accreditations', 'options')):
                while (have_rows('accreditations', 'options')) : the_row();?>
                
                    <img src="<?php the_sub_field('image');?>"/>
                
                <?php endwhile; endif;?>
            
            </div><!--container-->

        </div>

        <div class="socket">
            
            <div class="container">     
             
                <div class="row">

                    <div class="col-4 socket__colophon">
                        
                        &copy; Desert & Delta <?php echo date ('Y');?>
    
                            
                    </div>

                    <div class="col-4">
                        
                        <div class="logo-holder">
                            
                            <a href="https://silverless.co.uk">
                                
                                <?php get_template_part('inc/img/silverless', 'logo');?>
                            
                            </a>
                        
                        </div>
    
                    </div>
    
                    <div class="col-4 mandatory text-right">
    
                        <a href="<?php echo home_url() . '/terms-conditions'; ?>">Terms</a>
    
                        <a href="<?php echo home_url() . '/privacy-policy'; ?>">Privacy</a>    

    
                    </div>
    
                </div><!--row-->
    
            </div><!--container-->
    
        </div><!--socket-->
    
    </footer>
    
    </div><!-- #page -->

    <?php wp_footer(); ?>
    
    </body>
    
</html>
