<?php if (have_rows('cta_contact', 'options')):
    while (have_rows('cta_contact', 'options')) : the_row();?>

<?php $ctaContactImage = get_sub_field('image');?>

    <div class="cta contact" style="background-image: url(<?php echo $ctaContactImage['url']; ?>);">
                
        <div class="content">
            
            <p><?php the_sub_field('copy');?>
                <span class="brand-dot">
                    <?php the_field('email_address_reservations', 'options');?><br/>
                    <?php the_field('telephone_number_reservations', 'options');?>
                </span>
            </p>
        
        
                    <div class="socials">
    
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
    
                        <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
    
                        <?php endwhile; endif; ?>
    
                    </div>        
        
            
        </div>
     
    </div>

<?php endwhile; endif;?>