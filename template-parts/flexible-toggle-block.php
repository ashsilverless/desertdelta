<div class="flexible-content toggle-block pt2 pb1">
	
<?php if( have_rows('section') ): while ( have_rows('section') ) : the_row(); ?>

    <label><i class="fas fa-chevron-right"></i><?php the_sub_field('title'); ?></label>
    <div class="mb2"><?php the_sub_field('description'); ?></div>

<?php endwhile; endif; ?>
	
</div>