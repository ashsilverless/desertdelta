<div class="col-8 offset-2">

<div class="flexible-content">
	
<?php if( have_rows('month') ): while ( have_rows('month') ) : the_row(); ?>
	
	<div class="wrapper mb3">
		
	    <h2 class="heading heading__sm"><?php the_sub_field('name'); ?></h2>
	    
	    <div class="mb2"><?php the_sub_field('description'); ?></div>
	    
	</div>
	
<?php endwhile; endif; ?>
	
</div>

</div>