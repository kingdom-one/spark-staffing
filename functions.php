<?php

// =============================================================================
// FUNCTIONS.PHP
// 

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter('x_enqueue_parent_stylesheet', '__return_true');



// Additional Functions
// =============================================================================

/** Load in spark* staffing styles & scripts */
function child_enqueue_styles() {
    // enqueue child styles
    wp_enqueue_style('pro-child', get_stylesheet_directory_uri() . '/build/index.css', array(), '2.1.4');
    // enuque child scripts
    wp_enqueue_script('spark-js', get_stylesheet_directory_uri() . '/build/index.js', array(), '1.1.1', true);
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');

include_once get_theme_file_path('/inc/wp-job-manager__filters.php');
include_once get_theme_file_path('/inc/paid-memberships-pro__register-helper.php');
include_once get_theme_file_path('/inc/buddypress__filters.php');


/**
 * Remove BuddyPress styles from X theme queue
 */
function remove_x_buddypress() {
    remove_action('x_enqueue_styles', 'x_buddypress_enqueue_styles', 10, 2);
}
add_action('after_setup_theme', 'remove_x_buddypress');



// Hide WP Admin Bar
// if (!current_user_can('manage_options')) {
//     add_filter('show_admin_bar', '__return_false');
// }