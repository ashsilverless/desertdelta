<?php
/**
 * ============== Template Name: News Page
 *
 * @package desertdelta
 */
 
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php if( get_field('hero_background_image') ): 

    get_template_part('template-parts/hero');?>

<?php endif;?>
		
	<div class="container">
		
		<?php get_template_part('template-parts/latest-news'); ?>
		
		<div class="all-news">
		
		</div>
		
	</div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>