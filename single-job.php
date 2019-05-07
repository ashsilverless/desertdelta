<?php
/**
 *
 * @package desertdelta
 */
get_header();?>

<!-- ******************* Hero Content ******************* -->

<div class="content has-hero">

<?php $heroImage = get_field('image', $id);	
$defaultImage = get_field('default_job_image', 'options');?>
	
	<?php
    	    $salary   = get_field("salary") ? "£ " . number_format(get_field("salary"), 0, '.', ',') : "";
       $location = get_the_terms(get_the_ID(), 'location')[0]->name;
       $type     = get_the_terms(get_the_ID(), 'type')[0]->name;
    ?>

<?php if( get_field('image')): ?>
	    
	    <div class="hero h50" style="background-image: url(<?php echo $heroImage['url']; ?>);">
    	    
    <?php else: ?>
	    
	    <div class="hero h50" style="background-image: url(<?php echo $defaultImage['url']; ?>);">
    
    <?php endif;?>
	
	    <div class="container">
	    
	        <div class="row">
	                
	            <div class="hero__content text-center">       
	
				    <?php $brandImage = get_field('logo', 'options');?>	
				
					<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="logo">
						
						<img src="<?php echo $brandImage['url'];?>" alt="" title=""/>
						
					</a>
	
	                <h1 class="heading heading__xl heading__light mb1"><?php the_title(); ?></h1>
                    <h2 class="heading heading__md heading__light font400"><?php echo implode(" | ", [$location, $type]); ?></h3>
	            	  
	            	  <h5 class="heading__sm heading__light font200 mb1">Posted <?php echo get_the_date('j F Y'); ?></h5>         
	            
	            </div>       
	                
	        </div>
	    
	    </div>
	    
	</div><!--hero-->

    <div class="container">
    
        <div class="row">
            
            <div class="col-6 pt3 pb5">
           
	            <div class="description"><?php the_field("description"); ?></div>
                
                    <h5 class="heading heading__sm font700 mt1">Job Details</h5>                    							
                    <p class="mb0"><span class="font400">Job Type:</span> <?php echo $type;?></p>
                    <p class="mb0"><span class="font400">Location:</span> <?php echo $location;?></p>	                    			
                    <p class="mb1"><span class="font400">Salary:</span> <?php echo $salary;?></p>	

            <?php 

                $terms = wp_get_post_terms( $post->ID, 'location'); 
                $terms_ids = [];
                
                foreach ( $terms as $term ) {
                    $terms_ids[] = $term->term_id;
                }

                $args = array(
                    'post_type' => 'job',
                    'post__not_in' => array( $post->ID ),
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'location',
                            'field'    => 'term_id',
                            'terms'    => $terms_ids
                        )
                    ),
                );

                $query = new WP_Query($args);
                
                if ( $query->have_posts() ) {?>
                
                                <h5 class="heading heading__sm font700 mt3">Other Jobs in <?php echo $location;?></h5>       

                    <?php while ( $query->have_posts() ) {
                        $query->the_post();
                
                        get_template_part('template-parts/job-card-search');
                    }
                }?>
                
            </div><!--col-->
            
            <div class="col-5 offset-1 sticky-sidebar">

                <?php get_template_part('template-parts/job-sidebar');?>
                
            </div><!--col-->            

        </div>
      
    </div><!--c-->

</div><!--content-->

<?php get_footer(); ?>
