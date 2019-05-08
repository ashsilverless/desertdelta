<div class="sub-hero">

    <?php if (have_rows('sub_hero')):
        while (have_rows('sub_hero')) : the_row();

        $subHeroImage = get_sub_field('image');?>
		
            <div class="sub-hero__item" style="background-image: url(<?php echo $subHeroImage['url']; ?>);">
            
                <h3 class="heading heading__md heading__light heading__title-case mb0"><?php the_sub_field('sub_heading');?></h3>
                
                <h3 class="heading heading__lg heading__light brand-dot"><?php the_sub_field('heading');?></h3>
			
		</div>

<?php endwhile; endif;?>

</div>