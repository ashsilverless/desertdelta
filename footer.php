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

                    <div class="col-4">
                        
                        <h2 class="heading heading__lg heading__title-case">Botswana's most diverse safari portfolio</h2>
    
                    </div><!--col-->
                    
                    <div class="col-2">
    
                        <h4 class="heading heading__xs heading__alt-font">Camps</h4>
    
                        <?php
                            wp_nav_menu( array(
                            'theme_location' => 'footer-menu1',
                            'container_class' => 'footer' ) );
                        ?>
    
                    </div><!--col-->                    

                    <div class="col-2">

                        <h4 class="heading heading__xs heading__alt-font">Camps</h4>
    
                        <?php
                            wp_nav_menu( array(
                            'theme_location' => 'footer-menu2',
                            'container_class' => 'footer' ) );
                        ?>
    
                    </div><!--col-->         

                    <div class="col-2">
    
                        <h4 class="heading heading__xs heading__alt-font">Reservations</h4>
    
                    </div><!--col-->     

                    <div class="col-2">
    
                        <h4 class="heading heading__xs heading__alt-font">Marketing</h4>
    
                    </div><!--col-->                         



                </div><!--row-->
        
        </div><!--container-->
    
    
</div>

        <div class="accreds">

            <div class="container">
         
                ACCREDS
            
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
    
                    <div class="col-4 socials text-right">
    
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
