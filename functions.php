<?php
/**
 * WordPress Functions.php
 * The most important php file in a WP Theme.
 * 
 * @package blesschicago
 */

define("ASSETS", get_template_directory_uri() . "/assets");



/**
 * 
 */
function blesschicago_enqueue_scripts() {
  // Enqueue CSS files
  wp_register_style( "blesschicago-main", ASSETS . "/css/main.css", [], true, "all" );
  wp_enqueue_style( "blesschicago-main" );

  // Enqueue JS files
  wp_register_script( "blesschicago-main", ASSETS . "/js/main.js", [], true, true );
  wp_enqueue_script( "blesschicago-main" );
}
add_action( "wp_enqueue_scripts", "blesschicago_enqueue_scripts" );



/**
 * Removes wp-embed-js script
 * added by WordPress by default
 */
function blesschicago_deregister_scripts() {
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'blesschicago_deregister_scripts' );



/**
 * Removes wp-block-library-css stylesheet
 * added by WordPress by default
 */
function blesschicago_deregister_styles() {
  wp_deregister_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'blesschicago_deregister_styles' );



/**
 * Removes code related to WP Emoji
 * added by WordPress by default
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
