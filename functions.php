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
    wp_enqueue_style('pro-child', get_stylesheet_directory_uri() . '/build/index.css', array(), '2.1.9');
    // enuque child scripts
    wp_enqueue_script('spark-js', get_stylesheet_directory_uri() . '/build/index.js', array(), '1.1.2', true);
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles');

include_once get_theme_file_path('/inc/wp-job-manager__filters.php');
include_once get_theme_file_path('/inc/paid-memberships-pro__register-helper.php');
include_once get_theme_file_path('/inc/buddypress__filters.php');

function accessRestricted() {
    echo '<div class="access-restricted">You must have a premium membership to view this content.<span class="access-restricted--links"><a href="/product-category/membership" class="upsell">Get yours now!</a><a class="dismissThis">Dismiss this notice.</a></span></div>';
}


// Customize Login Screen

add_action('login_enqueue_scripts', 'ourLoginCSS');
function ourLoginCSS() {
    wp_enqueue_script('loginfonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap', array());
    wp_enqueue_style('pro-child', get_theme_file_uri() . ('/build/index.css'), array());
};

add_filter('login_headertitle', 'theLoginTitle');
function theLoginTitle() {
    return get_bloginfo('name');
}
add_filter('login_headerurl', 'ourHeaderUrl');
function ourHeaderUrl() {
    return esc_url(site_url('/'));
};

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