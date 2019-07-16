<?php
/*
 * .
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'business_mission_enqueue_styles' );
function business_mission_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
/*
 * Your code goes below
 */

// hook in late to make sure the parent theme's registration 
// has fired so you can undo it. Otherwise the parent will simply
// enqueue its script anyway.
add_action('wp_enqueue_scripts', 'business_mission_script_fix', 100);
function business_mission_script_fix()
{
    wp_dequeue_script('business-epic-main');
    wp_enqueue_script('business-mission-main', get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery'));
}




/*load a file*/
require_once trailingslashit( get_stylesheet_directory() ) .'/inc/default.php';
require_once trailingslashit( get_stylesheet_directory() ) . '/inc/ample-themes/widgets/business-recents-post-widgets.php';
require_once trailingslashit( get_stylesheet_directory() ) . '/inc/ample-themes/widgets/our-work-service-widgets.php';