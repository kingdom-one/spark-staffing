<?php

/**
 * Declare Custom Index types
 */

add_filter('bp_template_hierarchy_members_single_item', function ($templates) {
    $member_types = bp_get_member_type(bp_displayed_user_id(), false);
    if ($member_types) {
        foreach ($member_types as $member_type) {
            array_unshift($templates, "members/single/index-{$member_type}.php");
        };
    }
    // else {
    // array_unshift($templates, "members/single/index-subscriber.php");
    // }
    return $templates;
});
/**
 * Limit how many memebers should be shown per page
 */

// add_filter('bp_after_has_members_parse_args', function ($args) {
//     $args['per_page'] = 50;
//     return $args;
// });



/**
 * Define Avatar Size
 */
if (!defined('BP_AVATAR_THUMB_WIDTH')) define('BP_AVATAR_THUMB_WIDTH', 250);
if (!defined('BP_AVATAR_THUMB_HEIGHT')) define('BP_AVATAR_THUMB_HEIGHT', 250);
if (!defined('BP_AVATAR_FULL_WIDTH')) define('BP_AVATAR_FULL_WIDTH', 500);
if (!defined('BP_AVATAR_FULL_HEIGHT')) define('BP_AVATAR_FULL_HEIGHT', 500);

/** Exclude Profile Fields on View Profile from [BuddyDev Blog](https://buddydev.com/hiding-buddypress-profile-field-groups-conditionally/) */
function spark_exclude_profile_field_groups_on_view_profile($args) {
    if (bp_is_user_profile_edit()) return $args;
    // field group IDs to hide
    $hidden_groups = array(1, 6, 7);

    // check if groups are already hidden
    $excluded_groups = array();
    if (!empty($args['exclude_groups'])) {
        $excluded_groups = wp_parse_id_list($args['exclude_groups']);
    }
    $excluded_groups = array_merge($excluded_groups, $hidden_groups);

    $args['exclude_groups'] = join(',', $excluded_groups);

    return $args;
}
add_filter('bp_before_has_profile_parse_args', 'spark_exclude_profile_field_groups_on_view_profile');

/**
 * Skip Church Profile Fields from Public Viewing
 * @param {array} $args - field IDs to suppress
 */
function skip_church_xprofile_fields($args) {
    // display if editing profile
    if (bp_is_user_profile_edit() || is_admin()) return $args;
    if (bp_is_user_profile()) {
        $args['exclude_fields'] = array(181);
        return $args;
    }
}
// add_filter('bp_before_has_profile_parse_args', 'skip_church_xprofile_fields');

function removeDumbRedirects() {
    // apply_filters('wc4bp_activate_stream_activity', true);
    remove_action('template_redirect', 'wc4bp_redirect_to_profile');
    remove_filter('page_link', 'wc4bp_page_link_router', 9999, 2);
    remove_filter('wc4bp_checkout_page_link', 'home');
    $wc4bp_options = get_option('wc4bp_options');
    $wc4bp_pages_options = get_option('wc4bp_pages_options');
    $wc4bp_options['tab_cart_disabled'] = true;
    var_dump($wc4bp_pages_options);
}
// removeDumbRedirects();
/**
 * Add BudyPress fields to the WooCommerce checkout page by using the xprofile_get_field function from BudyPress
 *
 * @see xprofile_get_field()
 */
function addBuddyPressToWooCommerceCheckout($checkout_fields) {
    // text field example
    $bp_field          = xprofile_get_field(1); // Get BudyPress field with Field ID
    $bp_field_wc_id    = sanitize_title('bp_field_' .  $bp_field->name); // Field ID to identify through the WooCommerce checkout process
    $checkout_fields['billing'][$bp_field_wc_id] = [
        'type'        => 'text',
        'class'       => ['form-row-wide', 'budypress-field', 'budypress-field-' . $bp_field->id],
        'label'       => $bp_field->name,
        'placeholder' => '',
        'required'    => $bp_field->is_required,
        'default'     => '',
        'description'     => $bp_field->description,
    ];
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $product_id = $cart_item['product_id'];
    }
    // select box example
    $bp_field         = xprofile_get_field(63); // Get BudyPress field with Field ID
    $bp_field_wc_id   = sanitize_title('bp_field_' . $bp_field->name); // Field ID to identify through the WooCommerce checkout process
    $bp_field_options = [
        'option_1' => 'Candidate',
        'option_2' => 'Church',
    ]; // select box options
    foreach ($bp_field->get_children() as $option) $bp_field_options[$option->name] = $option->name; // Insert options from BuddyPress select box field
    $checkout_fields['billing'][$bp_field_wc_id] = [
        'type'     => 'radio',
        'checked'     => 'checked',
        'class'    => ['form-row-wide', 'budypress-field', 'budypress-field-' . $bp_field->id],
        'label'    => $bp_field->name,
        'required' => $bp_field->is_required,
        'options'  => $bp_field_options,
    ];
    //     if ($product_id = 398) { // church

    //     } 
    //         if ($product_id = 396) { // candidate
    // $checkout_fields['billing'][$bp_field_wc_id]['options'] = 
    //         }

    return $checkout_fields;
}
// if (!is_user_logged_in()) {
//     add_filter('woocommerce_checkout_fields', 'addBuddyPressToWooCommerceCheckout');
// }

// // echo '<script>console.log("hello there, ' . $customer_id . '")</script>';
// add_action('woocommerce_checkout_update_user_meta', 'syncWooCommerceAndBuddyPress', 10, 2);

/**
 * After checkout completion, sync and update the BuddyPress fields for the customer 
 *
 * @see xprofile_get_field()
 */
function syncWooCommerceAndBuddyPress($customer_id, $data) {
    // Update text field example
    $bp_field       = xprofile_get_field('211'); // Get BudyPress field by Field ID
    $bp_field_wc_id = sanitize_title('bp_field_' . $bp_field->name); // Field ID to identify through the WooCommerce checkout process
    if (isset($data[$bp_field_wc_id])) xprofile_set_field_data($bp_field->id, $customer_id, $data[$bp_field_wc_id]);
    // Update select box example
    $bp_field       = xprofile_get_field('958'); // Get BudyPress field by Field ID
    $bp_field_wc_id = sanitize_title('bp_field_' . $bp_field->name); // Field ID to identify through the WooCommerce checkout process
    if (isset($data[$bp_field_wc_id])) xprofile_set_field_data($bp_field->id, $customer_id, $data[$bp_field_wc_id]);
}