<?php
/**
 * Enqueue Scripts for Production
 *
 * Enqueues css and javascript assets for website
 * Uses grunt for cache busting and uploading to the server. Excluded from version control for easier git deployment
 *
 * Included by functions.php in theme root folder
 *
 * @package WordPress
 * @subpackage WordPress-WPEngine-Deploy
 * @since 0.9
 */

// CSS
wp_enqueue_style( 'twentyfourteen-style', get_template_directory_uri() . '/style.min.css', array( 'genericons' ) );
wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.min.css', array( 'twentyfourteen-style', 'genericons' ), null );

// Javascript
wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/scripts.min.js', array( 'jquery' ), null, true );
