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
                        <div id="buddypress">
                            <?php do_action('bp_before_member_home_content');
                            ?>
                            <div id="item-header" role="complementary">
                                <?php
                                if (bp_displayed_user_use_cover_image_header()) {
                                    bp_get_template_part('members/single/cover-image-header');
                                } else {
                                    bp_get_template_part('members/single/member-header');
                                };
                                ?>
                            </div><!-- #item-header -->

                            <div id="item-body">
                                <?php
                                do_action('bp_before_member_body');
                                if (bp_is_user_front()) :
                                    bp_displayed_user_front_template_part();
                                elseif (bp_is_user_activity()) :
                                    bp_get_template_part('members/single/activity');
                                elseif (bp_is_user_blogs()) :
                                    bp_get_template_part('members/single/blogs');
                                elseif (bp_is_user_friends()) :
                                    bp_get_template_part('members/single/friends');
                                elseif (bp_is_user_groups()) :
                                    bp_get_template_part('members/single/groups');
                                elseif (bp_is_user_messages()) :
                                    bp_get_template_part('members/single/messages');
                                elseif (bp_is_user_profile()) :
                                    bp_get_template_part('members/single/profile');
                                elseif (bp_is_user_notifications()) :
                                    bp_get_template_part('members/single/notifications');
                                elseif (bp_is_user_members_invitations()) :
                                    bp_get_template_part('members/single/invitations');
                                elseif (bp_is_user_settings()) :
                                    bp_get_template_part('members/single/settings');
                                else : // If nothing sticks, load a generic template
                                    bp_get_template_part('members/single/plugins');
                                endif;

                                do_action('bp_after_member_body');
                                ?>

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