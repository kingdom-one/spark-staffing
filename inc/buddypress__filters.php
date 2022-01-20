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
    // hide account type
    if (!is_admin()) {
        $args['exclude_fields'] = array(63);
        return $args;
    }
    // display if editing profile
    if (bp_is_user_profile_edit() || is_admin()) return $args;
    if (bp_is_user_profile()) {
        $args['exclude_fields'] = array(181);
        return $args;
    }
}
add_filter('bp_before_has_profile_parse_args', 'skip_church_xprofile_fields');



/** Only filter fields for new users */
if (!is_user_logged_in()) {
    add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
    add_action('woocommerce_form_field_text', 'account_settings_heading', 10, 2);
}

function custom_override_checkout_fields($fields) {
    unset($fields['order']['order_comments']);
    $fields['account']    = array(
        'account_username' => array(
            'type' => 'text',
            'label' => __('Username', 'woocommerce'),
            'description' => __('This will be your profile slug (e.g. sparkstaffing.co/profile/username)', 'woocommerce'),
            'placeholder' => _x('Username', 'placeholder', 'woocommerce'),
            'required' => true,
        ),
        'account_password' => array(
            'type' => 'password',
            'label' => __('Account password', 'woocommerce'),
            'placeholder' => _x('Password', 'placeholder', 'woocommerce'),
            'class' => array('form-row-first'),
            'required' => true,
        ),
        'account_password-2' => array(
            'type' => 'password',
            'label' => __('Verify password', 'woocommerce'),
            'placeholder' => _x('Password', 'placeholder', 'woocommerce'),
            'class' => array('form-row-last'),
            'label_class' => array('hidden'),
            'required' => true,
        )
    );
    return $fields;
}


function account_settings_heading($field, $key) {
    // will only execute if the field is account_username and we are on the checkout page...
    if (is_checkout() && ($key == 'account_username')) {
        $field = '<h2 class="form-row form-row-wide">Account Details</h2>' . $field;
    }
    return $field;
}
