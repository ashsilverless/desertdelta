<?php if (have_rows('cta_cares', 'options')):
while (have_rows('cta_cares', 'options')) : the_row();?>

<?php $ctaCaresImage = get_sub_field('image');?>

<div class="container container-cares">

    <div class="cta cares mt5 mb5" style="background-image: url(<?php echo $ctaCaresImage['url']; ?>);">
        
        <img src="<?php the_sub_field('overlay_image');?>"/>
        
        <div class="content">
            
            <p><?php the_sub_field('copy');?></p>
            
            <a href="<?php the_sub_field( 'button_target' );?>" class="button">
    
                <?php the_sub_field( 'button_text' );?>
    
            </a>
            
        </div>
     
    </div>

</div><!--c-->

<?php endwhile; endif;?>