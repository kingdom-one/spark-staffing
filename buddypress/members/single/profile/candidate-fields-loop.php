<?php

/**
 * Spark - Candidate Profile Loop
 *
 */
do_action('bp_before_profile_loop_content');
if (!is_user_logged_in()) echo '<style>#item-buttons,.x-item-list-tabs-subnav {display: none;}</style>';

?>

<div class="profile">
    <? if (bp_has_profile()) : ?>
    <? while (bp_profile_groups()) : bp_the_profile_group(); ?>
    <? if (bp_profile_group_has_fields()) : ?>
    <? do_action('bp_before_profile_field_content'); ?>
    <section class="bp-widget bp-profile__section--container <?php bp_the_profile_group_slug(); ?>">
        <h2 class="bp-profile__section--header">
            <?php
                        $user = wp_get_current_user();
                        if (bp_get_the_profile_group_id() === 2) {
                            echo bp_get_the_profile_group_name() . ' ' . $user->first_name;
                        } elseif (bp_get_the_profile_group_id() === 5) {
                            echo 'Get connected';
                        } else  bp_the_profile_group_name();
                        ?>
        </h2>
        <div class="profile-fields bp-profile__section--content">
            <?php while (bp_profile_fields()) : bp_the_profile_field(); ?>
            <? if (bp_field_has_data()) : ?>
            <? if (bp_get_the_profile_field_type() === 'web') : ?>
            <div <?php bp_field_css_class('social__container'); ?>>
                <? bp_the_profile_field_value() ?>
            </div>
            <? else : ?>
            <div <?php bp_field_css_class(); ?>>
                <h3 class="profile-fields--label"><?php bp_the_profile_field_name(); ?></h3>
                <div class="profile-fields--value"><?php bp_the_profile_field_value(); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <? do_action('bp_profile_field_item'); ?>
            <? endwhile; ?>
        </div>
    </section>

    <?php
                do_action('bp_after_profile_field_content');
            endif;
        endwhile;
        do_action('bp_profile_field_buttons');
    endif;
    do_action('bp_after_profile_loop_content');

    /**
     * Hide Profile Field Groups from other users when viewing profile
     *
     * @param $args
     *
     * @return mixed
     */
    function buddydev_exclude_profile_field_groups_on_view_profile($args) {
        //allow site admin and the user himself to view the profile
        if (is_super_admin() || bp_is_my_profile()) {
            return $args;
        }

        //these are the field groups we want to hide
        $hidden_groups = array(1, 3); //change it with your own profile field group ids

        //let us check if some groups were already hidden
        $excluded_groups = array();

        if (!empty($args['exclude_groups'])) {
            $excluded_groups = wp_parse_id_list($args['exclude_groups']);
        }

        $excluded_groups = array_merge($excluded_groups, $hidden_groups);

        $args['exclude_groups'] = join(',', $excluded_groups);

        return $args;
    }
    add_filter('bp_after_has_profile_parse_args', 'buddydev_exclude_profile_field_groups_on_view_profile');