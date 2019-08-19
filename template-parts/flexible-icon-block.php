<div class="col-8 offset-2">
    <div class="flexible-content icon-block pt2 pb1">
    
        <h2 class="heading heading__md mb2"><?php the_sub_field('heading'); ?></h2>
    	
        <?php if( have_rows('item') ): while ( have_rows('item') ) : the_row(); 
            $seasonIcon   = get_sub_field("icon")["url"];
        ?>
    
        <div class="item">
            <?php echo file_get_contents($seasonIcon); ?>
            <h2 class="heading heading__sm mb1"><?php the_sub_field('title'); ?></h2>
            <?php the_sub_field('copy'); ?>
        </div>
    
        <?php endwhile; endif; ?>
    	
    </div>
</div>