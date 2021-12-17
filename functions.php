<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to Pro in this file.
// =============================================================================

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

function child_enqueue_styles() {
    // enqueue child styles
    wp_enqueue_style('pro-child', get_stylesheet_directory_uri() . '/css/dist/bp-spark.min.css', array());
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');


// BuddyPress Customizations
// =============================================================================
/**
 * Remove BuddyPress styles from X theme queue
 */
function remove_x_buddypress() {
    remove_action('x_enqueue_styles', 'x_buddypress_enqueue_styles', 10, 2);
}
add_action('after_setup_theme', 'remove_x_buddypress');

// add_theme_support('job-manager-templates');
/** Calls WP Job Manager Hooks & Filters */
include_once get_theme_file_path('/job_manager/inc/filters.php');