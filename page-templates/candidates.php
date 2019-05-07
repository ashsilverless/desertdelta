<?php
/**
 * ============== Template Name: Candidates Page
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
    
        <div class="row">
            
            <div class="col-7 pt3">
                
                <?php if( get_field('text_block_text') ): ?>

                <div class="mb5">
                    <?php get_template_part('template-parts/text-block');?>
                </div>

                <?php endif;?>
                
                <div class="candidates mb5">
	                
					<?php
                    
                    $pers = get_posts(
                    	array(
	                    	'post_type' => 'candidate',
						)
					);
					
					if($pers) {
						foreach($pers as $per) {
$id 		 = $per->ID;
$salary 	 = get_field("salary", $id);
$time   	 = human_time_diff( get_the_time('U'), current_time('timestamp') ) . " ago";
$type		 = get_the_terms($id, 'type')[0]->name;
$title 		 = get_the_title($id);
$location 	 = get_the_terms($id, 'location')[0]->name;
$description = get_field("description", $id);
$link 		 = get_permalink($id);
$skills     = get_field('skills', $id);
$language   = get_field('languages_spoken', $id);

$sex = get_field('sex', $id);

$transport  = get_field('transport', $id);
$accom  = get_field('skills');
$salary = $salary ? "£ " . number_format($salary, 0, '.', ',') : "";

							
							include(get_template_directory() . '/template-parts/candidate-card.php');
						}
					}
                    
                    ?>
                    
                </div>                         
                
            </div><!--col-->

            <div class="col-5">

                <div class="sidebar-wrapper">
                    
                    <?php get_template_part('template-parts/sidebar');?>
                
                </div>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->
 
<?php get_footer(); ?>