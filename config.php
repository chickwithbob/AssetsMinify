<?php
/*
Plugin Name: Assets Minify
Plugin URI: https://github.com/acarbone/wp-rooms
Description: WordPress plugin to minify JS and CSS assets.
Author: Alessandro Carbone
Version: 0.1.0
Author URI: http://www.artera.it
*/

if ( !defined('AS_MINIFY_URL') )
	define( 'AS_MINIFY_URL', plugin_dir_url( __FILE__ ) );
if ( !defined('AS_MINIFY_PATH') )
	define( 'AS_MINIFY_PATH', plugin_dir_path( __FILE__ ) );
if ( !defined('AS_MINIFY_BASENAME') )
	define( 'AS_MINIFY_BASENAME', plugin_basename( __FILE__ ) );

define( 'AS_MINIFY_FILE', __FILE__ );

function AS_MINIFY_Init() {
	require AS_MINIFY_PATH . 'init.php';
}

spl_autoload_register(function( $classname ) {
	$filename = str_replace("\\", "/", __DIR__ . "/$classname.php");

	if ( file_exists( $filename ) )
		include_once $filename;
});

if ( !is_admin() ) {
	add_action( 'wp_footer', 'AS_MINIFY_Init', 0 );
}
//[0]=> string(6) "jquery" [1]=> string(7) "shutter" [2]=> string(12) "jquery-cycle" [3]=> string(13) "ngg-slideshow" [4]=> string(13) "comment-reply" [5]=> string(23) "twentytwelve-navigation" [6]=> string(13) "header-slider" [7]=> string(14) "jquery-ui-core" }