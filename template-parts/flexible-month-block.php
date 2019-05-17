<div class="flexible-content month-block pt2 pb1">
	
<?php if( have_rows('month') ): while ( have_rows('month') ) : the_row(); ?>
	
	<div class="wrapper mb2">
		
		<div class="img"><img src="<?php the_sub_field('image'); ?>"/></div>
		
	    <label><?php the_sub_field('name'); ?></label>
	    
	    <div class="mb2"><?php the_sub_field('description'); ?></div>
	    
	</div>
	
<?php endwhile; endif; ?>
	
</div>