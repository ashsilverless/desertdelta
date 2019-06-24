<?php
/**
 * ============== Template Name: Cares Children Page
 *
 * @package desertdelta
 */
 
get_header();

while ( have_posts() ) :
the_post(); ?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    $heroImage = get_field('hero_background_image');?>

	<div class="hero <?php the_field( 'hero_height' );?>" style="background-image: url(<?php echo $heroImage['url']; ?>);">
	
	    <div class="center">
		    
		    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
		        <?php get_template_part('template-parts/logo');?>
		    </a>
		    
	    </div>
	        
	    <div class="hero__content">
	        
	        <?php if($post->post_name == "cares"): ?>
	        
	        <h3 class="heading heading__sm heading__light center slow-fade"><?php the_field( 'hero_copy' );?></h2>
	        
	        <?php endif; ?>
	
	        <h2 class="heading heading__xl heading__light center slide-up"><?php the_field( 'hero_heading' );?></h2>
	
	        <h1 class="heading heading__md heading__light heading__title-case center slow-fade"><?php the_field( 'hero_sub_heading' );?></h1>
	        
	        <div>
		        
		        <?php
			        
			    $video = get_field('video')["video_file"];
			    
			    if($video)
			    	$video = "https://player.vimeo.com/video/" . $video; ?>
			    
	        	<canvas id="canvas" class="modal-toggle" video-url="<?php echo $video; ?>" width=60 height=60></canvas>
	        </div>
	   
	    </div>       
	    
	</div><!--hero-->


<?php endif;?>

<!-- ******************* Hero Content END ******************* -->
	
	<div class="container cares-children">
		
	    <?php get_template_part('template-parts/breadcrumb'); ?>
	    
	    <div class="content pt2 dark-dot">
	    	<?php the_content(); ?>
	    </div>
	    
	    <?php
		
		$args = array(
			'numberposts'     => -1,
			'post_type'       => 'page',
			'post_parent__in' => array($post->post_parent),
			'post__not_in'    => array(get_the_ID())
		);
		$posts = get_posts( $args ); ?>
		
		<div class="wrapper-cards mt5">
			
		<?php foreach($posts as $post): ?>
		
			<div class="wrapper-card">
				
			<?php
	
			set_query_var('post', $post);
			get_template_part('template-parts/info-card-video');
			
			?>
			
			</div>
		
		<?php endforeach; ?>
		
		</div>
    
	</div>
	
	<?php get_template_part('template-parts/map', 'camps');?>
	
    <?php get_template_part('template-parts/cta', 'itinerary');?>
    
    <?php get_template_part('template-parts/cta', 'newsletter');?>

</div><!--content-->

<?php endwhile; ?>
 
<?php get_footer(); ?>
