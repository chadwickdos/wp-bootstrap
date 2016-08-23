<?php
//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
//add_theme_support( 'genesis-footer-widgets', 3 );

add_theme_support( 'post-thumbnails' );

//* WooCommerce Support
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<main class="content"><div class="entry">';
}

function my_theme_wrapper_end() {
  echo '</div></main>';
}

add_theme_support( 'woocommerce' );

//* Image size
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'slider', 700, 430, true);
	add_image_size( 'featured', 300, 198, true);	
}

//* Enqueue scripts for typekit and mobile menu
add_action( 'wp_head', 'gq_scripts' );
function gq_scripts() {
}

//* Add scripts
add_action( 'wp_enqueue_scripts', 'gq_add_scripts' );
function gq_add_scripts() {
}


//* Force layout - http://wpsites.net/web-design/change-layout-genesis/
// add_filter( 'genesis_pre_get_option_site_layout', 'gq_blog_layout' );
function gq_blog_layout( $full ) {
	if(is_post_type_archive('post') || is_singular('post') || is_category() || is_home()) {
		remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
		$full = 'full-width-content'; 
		return $full;
    } 
}


if (function_exists('register_sidebar')) {
	register_sidebar(
	array(
		'name'=> 'Primary',
		'id' => 'primary-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(
	array(
		'name'=> 'Secondary',
		'id' => 'secondary-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(
	array(
		'name'=> 'First Footer',
		'id' => 'first-footer-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(
	array(
		'name'=> 'Second Footer',
		'id' => 'second-footer-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(
	array(
		'name'=> 'Third Footer',
		'id' => 'third-footer-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));

}

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'bootstrap' ) );
}

function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );