<?php if (have_rows('cta_itinerary', 'options')):
while (have_rows('cta_itinerary', 'options')) : the_row();?>

<?php $ctaCaresImage = get_sub_field('image');?>

    <div class="cta itinerary" style="background-image: url(<?php echo $ctaCaresImage['url']; ?>);">
                
        <div class="content">
            
            <img src="<?php echo get_template_directory_uri(); ?>/inc/img/itinerary-icon.svg"/>
            
            <p class="quote"><em>&ldquo; </em><?php the_sub_field('quote');?><em>&rdquo;</em>
                <span><?php the_sub_field('attribute');?></span>
            </p>
            
            <a href="<?php the_sub_field( 'button_target' );?>" class="button">
    
                <?php the_sub_field( 'button_text' );?>
    
            </a>
            
        </div>
     
    </div>

<?php endwhile; endif;?>