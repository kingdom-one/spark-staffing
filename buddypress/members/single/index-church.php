<?php

/**
 * From BuddyPress - Members Home
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */
get_header()
?>
<div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-wrap">
                <?php do_action('x_before_the_content_begin'); ?>
                <div class="entry-content content">
                    <div id="buddypress" class="bp-church-profile">
                        <?php do_action('bp_before_member_home_content');
                            ?>
                        <header id="item-header" role="complementary">
                            <?php
                                if (bp_displayed_user_use_cover_image_header()) {
                                    bp_get_template_part('members/single/cover-image-header');
                                } else {
                                    bp_get_template_part('members/single/member-header');
                                };
                                ?>
                        </header><!-- #item-header -->
                        <? if (is_user_logged_in()) : ?>
                        <nav class="bp-profile__subnav item-list-tabs no-ajax" id="subnav"
                            aria-label="<?php esc_attr_e('Member secondary navigation', 'buddypress'); ?>"
                            role="navigation">
                            <ul class="bp-profile__subnav--container">
                                <?php bp_get_options_nav(); ?>
                            </ul>
                        </nav>
                        <? endif; ?>
                        <div id="item-body" class="bp-profile__body">
                            <?
                                switch (bp_current_action()):
                                    case 'edit':
                                        bp_get_template_part('members/single/profile/edit');
                                        break;
                                    case 'change-avatar':
                                        bp_get_template_part('members/single/profile/change-avatar');
                                        break;
                                    case 'change-cover-image':
                                        bp_get_template_part('members/single/profile/change-cover-image');
                                        break;
                                    case 'public':
                                        if (bp_is_active('xprofile')) :
                                            // do_action('bp_before_member_body');
                                            // if (bp_is_user_front()) :
                                            //     bp_displayed_user_front_template_part();
                                            // elseif (bp_is_user_activity()) :
                                            //     bp_get_template_part('members/single/activity');
                                            // elseif (bp_is_user_blogs()) :
                                            //     bp_get_template_part('members/single/blogs');
                                            // elseif (bp_is_user_friends()) :
                                            //     bp_get_template_part('members/single/friends');
                                            // elseif (bp_is_user_groups()) :
                                            //     bp_get_template_part('members/single/groups');
                                            // elseif (bp_is_user_messages()) :
                                            //     bp_get_template_part('members/single/messages');
                                            // elseif (bp_is_user_profile()) :
                                            //     bp_get_template_part('members/single/profile');
                                            // elseif (bp_is_user_notifications()) :
                                            //     bp_get_template_part('members/single/notifications');
                                            // elseif (bp_is_user_members_invitations()) :
                                            //     bp_get_template_part('members/single/invitations');
                                            // elseif (bp_is_user_settings()) :
                                            //     bp_get_template_part('members/single/settings');
                                            // else : // If nothing sticks, load a generic template
                                            //     bp_get_template_part('members/single/plugins');
                                            // endif;

                                            // do_action('bp_after_member_body');
                                            if (bp_has_profile()) : ?>
                            <?php while (bp_profile_groups()) : bp_the_profile_group(); ?>

                            <ul id="profile-groups">
                                <?php if (bp_profile_group_has_fields()) : ?>

                                <li>
                                    <?php bp_the_profile_group_name() ?>

                                    <ul id="profile-group-fields">
                                        <?php while (bp_profile_fields()) : bp_the_profile_field(); ?>

                                        <?php if (bp_field_has_data()) : ?>
                                        <li>
                                            <?php bp_the_profile_field_name() ?>
                                            <?php bp_the_profile_field_value() ?>
                                            <? bp_profile_field_data(array('field' => 1)) ?>
                                        </li>
                                        <?php endif; ?>

                                        <?php endwhile; ?>
                                    </ul>
                                </li>

                                <?php endif; ?>
                            </ul>

                            <?php endwhile; ?>

                            <?php else : ?>

                            <div id="message" class="info">
                                <p>This user does not have a profile.</p>
                            </div>

                            <?php endif;
                                        endif;
                                endswitch; ?>

                        </div><!-- #item-body -->
                        <?php do_action('bp_after_member_home_content'); ?>
                    </div><!-- #buddypress -->
                </div><!-- .entry-content -->
            </div><!-- .entry-wrap -->
        </article>
        <?php endwhile; ?>
    </div><!-- .x-main-->
</div>

<div id="template-notices" role="alert" aria-atomic="true">
    <?php
    do_action('template_notices'); // This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php 
    ?>

</div>
<? get_footer() ?>