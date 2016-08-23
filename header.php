<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="robots" content="noodp,noydir"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title><?php wp_title(); ?></title>
<?php wp_head();  ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'stylesheet_directory' ).'/style.css'; ?>">
</head>
<body <?php body_class(); ?>>
<header class="site-header">
	<div class="container">
	<?php
		echo '<h1 class="site-title">';
		echo '<a href="'.esc_url( home_url( '/' ) ).'">';
		echo '<img src="'.get_bloginfo( 'stylesheet_directory' ).'/images/logo.png" alt="'.get_bloginfo( 'name' ).'">';
		echo '</a>';
		echo '</h1>';
		echo '<nav class="navbar navbar-default">';
		wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ) );
		echo '</nav>';
	?>
	</div>
</header>
<div id="content" class="container">