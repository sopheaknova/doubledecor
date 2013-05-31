<?php 


##  CUSTOM LOGO LOGIN
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


##   SET FAVICONS FOR BACKEND CODE 
function adminfavicon() {
echo '<link rel="icon" type="image/x-icon" href="'.get_bloginfo('template_directory').'/favicon.png" />';
}

add_action( 'admin_head', 'adminfavicon' );


##  REMOVE ERROR MESSAGE LOGIN
add_filter('login_errors',create_function('$a', "return null;"));


##   REMOVE WORDPRESS VERSION GENERATION   
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');


##   REMOVE WORDPRESS LINK ON ADMIN LOGIN LOGO 
function remove_link_on_admin_login_info() {
     return  bloginfo('url');
}
  
add_filter('login_headerurl', 'remove_link_on_admin_login_info');


##   REMOVE WORDPRESS WP ADMIN BAR MENU
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	//$wp_admin_bar->remove_menu('my-account');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('appearance');
	$wp_admin_bar->remove_menu('new-link', 'new-content');
	$wp_admin_bar->remove_menu('new-post', 'new-content');
	$wp_admin_bar->remove_menu('new-page', 'new-content');
	$wp_admin_bar->remove_menu('new-user', 'new-content');
	$wp_admin_bar->remove_menu('new-theme', 'new-content');
	$wp_admin_bar->remove_menu('new-plugin', 'new-content');
	$wp_admin_bar->remove_menu('new-media', 'new-content');
	
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('about');
	$wp_admin_bar->remove_menu('wporg');
	$wp_admin_bar->remove_menu('documentation');
	$wp_admin_bar->remove_menu('support-forums');
	$wp_admin_bar->remove_menu('feedback');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

## MISC

//add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 56, 56, true ); // Normal thumbnails
	add_image_size( 'full', 2000, '', true ); // Full thumbnails
	add_image_size( 'large', 560, '', true ); // Large thumbnails
	add_image_size( 'medium', 234, '', true ); // Medium thumbnails
	add_image_size( 'small', 125, '', true ); // Small thumbnails
}


## REGISTER NAV MENUS

register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'Top Menu' ),
	'secondary' => __( 'Left Navigation', 'Left Menu' ),
) );

## DEFINE THEME CONSTANTS
//define(MSF, TEMPLATEPATH."/o_framework/");


## CREATE ARRAY OF INCLUDES

//$ms_files = array('o_custom_post_types', 'o_custom_write_panels');


## INCLUDE FRAMEWORK & THEME OPTIONS

//include(MSF."nova.php");


## Enable widgets
if ( function_exists('register_sidebar') ) {

register_sidebar(array('name'=>'Left Sidebar',
	'before_widget' => "<div class='sidebarwidget'>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));
}

?>