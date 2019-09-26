<?php
/**
 * The template for displaying 404 pages
 *
 * @package desertdelta
 */

get_header();
?>

<div class="hero-404">
    
    	    <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="hero__brand slide-down">
	        <?php get_template_part('template-parts/logo');?>
	    </a>
    
    <div class="panel"></div>
    
    <div class="content">
    <h1>Oh dear.  Something isn't quite right.</h1>
    <p>Head back home and try again</p>
	<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back To Home</a>
    </h1>
    
</div>

<?php
get_footer();
