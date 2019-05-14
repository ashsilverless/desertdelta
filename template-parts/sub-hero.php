<div class="sub-hero">

    <?php
	    
    $id = get_option("page_on_front");
    
    $links = get_field("sub_hero2", $id)["links"];
    
    foreach($links as $link): $page = url_to_postid($link["page"]);
    
    	$url = "";
    	$class = "";

		$image = get_field("hero_background_image", $page);
		
		if($image)
			$url = $image["url"];
			
		if(get_the_id() == $page)
			$class = "active"; ?>
			
		<a href="<?php echo $link["page"]; ?>" class="sub-hero__item <?php echo $class; ?>" style="background-image: url(<?php echo $url; ?>);">
    
	        <h3 class="heading heading__md heading__light heading__title-case mb0"><?php echo $link["sub_heading"]; ?></h3>
	        
	        <h3 class="heading heading__lg heading__light brand-dot"><?php echo $link["heading"]; ?></h3>
			
		</a>
			
    
    <?php endforeach;?>

</div>