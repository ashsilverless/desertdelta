<?php
global $post; 

if ( is_page() && $post->post_parent ) {

if ($post->post_parent) $parent = $post->post_parent;
else $parent = $post->ID;
echo '<ul class="sub-nav">';
wp_list_pages(array(
    'child_of'=>$parent,
    'sort_column'=>'menu_order', 
    'title_li'=> '', 
));
echo '</ul>';

} else {

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );

$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : 
echo '<ul class="sub-nav">';?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

            <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

    <?php endwhile; 
        echo '</ul>';
        endif; wp_reset_postdata(); 
}?>