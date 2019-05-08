<?php
	
$post_url   = urlencode( esc_url( get_permalink($id) ) );

$post_title = urlencode( get_the_title($id) );

$facebook_link    = sprintf( 'https://www.facebook.com/sharer/sharer.php?u=%1$s', $post_url );
$twitter_link     = sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title );
    
?>

<div class="share-buttons">
	
    <a target="_blank" href="<?php echo $facebook_link; ?>" class="share-button facebook">
	    <i class="fab fa-facebook-square"></i>
    </a>
    
    <a target="_blank" href="<?php echo $twitter_link; ?>" class="share-button twitter">
	    <i class="fab fa-twitter"></i>
    </a>
    
</div>