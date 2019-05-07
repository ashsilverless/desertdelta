<h2 class="heading heading__md font700"><?php the_field( 'heading' );?></h2>

<div class="expanding-copy <?php the_sub_field( 'text_type' );?> <?php the_sub_field( 'dev_class' );?>">

    <div class="expanding-copy__lead">
    
        <p><?php the_field( 'text_block_text' );?></p>
    
    </div>
    
    <?php if( get_field('text_block_text_more') ): ?>
    
        <a class="trigger-expand">Read More</a>    
    
    <?php endif; ?>
    
    <div class="expanding-copy__more">
    
        <p><?php the_field('text_block_text_more'); ?></p>          
    
    </div>    
    
    <?php if( get_field('text_block_text_more') ): ?>
    
        <a class="trigger-collapse hide">Read Less</a>    
    
    <?php endif; ?>

    <?php if( get_field('button_query') == 'true' ): ?>

        <a href="<?php the_field( 'button_target' );?>" type="button" class="button">
            
            <?php the_field( 'button_text' );?>
        
        </a>

    <?php endif;?>
    
</div>