<?php
/**
 * The template for displaying all single posts
 *
 * @package desertdelta
 */

get_header();

while ( have_posts() ) :
the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="hero h75" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
        <?php get_template_part('template-parts/logo');?>
    </a>
    
</div><!--hero-->


<!-- ******************* Hero Content END ******************* -->
 
<div class="container-camp">

    <div class="container">
    
    	<div class="camp-header">
	        <h1 class="heading heading__lg font700 camp-title"><?php the_title(); ?></h1>
	        
	        <?php 
		        
	        $destination = get_the_terms($post->ID, 'destination')[0];
	        if($destination):
	        
	        ?>
		        
	        <div class="camp-location"><?php echo $destination->name; ?></div>
	        
	        <?php endif; $description = "<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl nunc, lobortis eget cursus non, mollis ut ligula. Maecenas efficitur at arcu eu luctus. Nullam consectetur velit nisl, pretium tempor quam imperdiet vel. Duis a purus vitae est pharetra iaculis. Pellentesque sit amet magna gravida, dapibus quam in, consequat turpis. Donec placerat libero non ex rutrum, a luctus nisl pretium. Integer rutrum eget enim sit amet cursus. Cras id rhoncus tellus, et scelerisque nibh.
</p>
<p>
Cras bibendum imperdiet interdum. Donec quis sollicitudin arcu. Curabitur vitae condimentum nisi, ut consectetur sem. Pellentesque egestas commodo orci, ac viverra sem blandit nec. In hac habitasse platea dictumst. Morbi eu sem lorem. In elementum magna in auctor tristique. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam elementum tellus nunc.
</p>";?>
	        
	        <div class="camp-description closed">
		        <?php echo $description; ?>
	        </div>
	        
	        <div class="read-more">Read More</div>
	        
	        <div class="camp-actions">
		        <button>BUTTONS</button>
		        <button>BUTTONS</button>
		        <button>BUTTONS</button>
	        </div>
	    </div>
        
    </div>

</div><!--c-->

<?php
	
endwhile;

get_footer();
