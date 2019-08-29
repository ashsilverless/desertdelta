<div class="col-8 offset-2">
<div class="flexible-content toggle-block pt3">

    <h2 class="heading heading__sm"><?php the_sub_field('heading'); ?></h2>
	<p><?php the_sub_field('introduction_text'); ?></p>
<?php if( have_rows('section') ): $count = 0; while ( have_rows('section') ) : the_row(); ?>

    <div class="item">

    <label <?php if($count == 0) echo " class='collapsed'"; ?>>
        <i class="fas fa-angle-right"></i>
        <h3 class="heading"><?php the_sub_field('title'); ?></h3>
    </label>
    <div class="content mb2">
        <?php the_sub_field('description'); ?>
    </div>

    </div>

<?php $count++; endwhile; endif; ?>
	
</div>
</div>