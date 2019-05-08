<div class="owl-carousel testimonial-slider">
    
    <?php if (have_rows('testimonial', 'option')):
        while (have_rows('testimonial', 'option')) : the_row();
    ?>

    <div class="testimonial-slider__item">

      <p class="font400"><?php the_sub_field('testimonial', 'option');?>
      
        <span><?php the_sub_field('attribution', 'option');?></span>
      
      </p>

    </div>
  
  <?php endwhile;  endif; ?>

</div>