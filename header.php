<?php
/**
 * @package WordPress
 * @subpackage Chameleon
 * @since Chameleon 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'Chameleon' ), max( $paged, $page ) );

	?></title>
	
	<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="screen" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--webfonts-->

	<!--Layout styles-->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon.png">
	<link rel="apple-itouch-icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/apple-itouch-icon.png">
	<?php 
	
	//template head
	wp_head();
	
	?>
	</head>
<body <?php body_class(); ?>>
<header class="container">
	<div class="row">
		<hgroup class="twelvecol last">
			<h1><?php bloginfo('name'); ?></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</hgroup>
	</div><!--.row-->
	<div class="row">
		<div class="twelvecol last">
			<nav>
				<?php wp_nav_menu( array('menu' => 'Primary Navigation' )); ?>
			</nav>
		</div><!--.twelvecol-->
	</div><!--.row-->
</header><!--.container-->