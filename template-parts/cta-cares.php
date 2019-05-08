<div class="cta cares">
    
    <?php if (have_rows('cta-cares', 'options')):
    while (have_rows('cta-cares', 'options')) : the_row();?>
    
    <img src="<?php the_sub_field('image');?>"/>
    
    <div class="content">
        
        <?php the_sub_field('copy');?>
        
        <a href="<?php the_sub_field( 'button_target' );?>" class="button">

            <?php the_sub_field( 'button_text' );?>

        </a>
        
    </div>
 
</div>