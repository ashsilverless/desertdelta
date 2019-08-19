<div class="col-8 offset-2">
<div class="flexible-content toggle-block pt3">

    <h2 class="heading heading__sm"><?php the_sub_field('heading'); ?></h2>
	<p><?php the_sub_field('introduction_text'); ?></p>
<?php if( have_rows('section') ): while ( have_rows('section') ) : the_row(); ?>

    <div class="item">

    <label>
        <i class="fas fa-angle-down"></i>
        <h3 class="heading"><?php the_sub_field('title'); ?></h3>
    </label>
    <div class=" content mb2">
        <?php the_sub_field('description'); ?>
    </div>

    </div>

<?php endwhile; endif; ?>
	
</div>
</div>