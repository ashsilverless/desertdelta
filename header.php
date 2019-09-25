<?php
/**
 * Header
 *
 * @package desertdelta
 */

?>
<!doctype html>
<?php
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
?>

<html <?php language_attributes(); ?> class="<?php echo $dir ?>">  

<head>

<meta charset="UTF-8">
<meta name="description" content=" ">
<meta name="keywords" content=" ">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Desert & Delta Safaris | Botswana’s Best Safari Portfolio</title> 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><!--Bootstrap CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"><!-- Font Awesome CDN-->

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png" type="image/x-icon" >
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png" type="image/x-icon" >
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png" type="image/x-icon" >
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/site.webmanifest">

<link rel="preconnect" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">

<link rel="stylesheet" href="https://use.typekit.net/phc5hfw.css">
	
<?php wp_head(); ?>
	
</head>

    <body <?php body_class(); ?>>

    <div class="page-border page-border__left-top"></div>
    <div class="page-border page-border__right-bottom"></div>

	<div id="page" class="site-wrapper">

		<nav>
            
            <div class="nav-menu">
            	
            	<div class="center">
	            	
	                <a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>" class="brand">
	                
	                <?php get_template_part('template-parts/logo');?>
	                
	                </a>   
	                        
            	</div>

            <?php
            wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'container_class' => 'mainMenu' ) );
            ?>
            
            </div>

			<div class="menu-trigger">
				
				<span>Menu</span>
				<span>Close</span>
				
			</div>

		</nav>
		
		<!-- Modal Video -->
		
		<?php get_template_part('template-parts/modal');?>
		
		<!-- Modal Video END -->

	<main>
