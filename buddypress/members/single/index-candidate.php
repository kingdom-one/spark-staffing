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
                            <?php do_action('bp_before_member_home_content'); ?>
                            <header id="item-header" class="bp-profile__header" role="complementary">
                                <?php
                                /**
                                 * If the cover image feature is enabled, use a specific header
                                 */
                                if (bp_displayed_user_use_cover_image_header()) :
                                    bp_get_template_part('members/single/cover-image-header');
                                else :
                                    bp_get_template_part('members/single/member-header');
                                endif;
                                ?>
                            </header><!-- #item-header -->
                            <? do_action('bp_before_profile_content'); ?>
                            <nav class="bp-profile__subnav item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e('Member secondary navigation', 'buddypress'); ?>" role="navigation">

                                <ul class="bp-profile__subnav--container"><?php bp_get_options_nav(); ?></ul>
                            </nav>
                            <div id="item-body" class="bp-profile__body">
                                <?php
                                switch (bp_current_action()):
                                        // Edit
                                    case 'edit':
                                        bp_get_template_part('members/single/profile/edit');
                                        break;
                                        // Change Avatar
                                    case 'change-avatar':
                                        bp_get_template_part('members/single/profile/change-avatar');
                                        break;
                                        // Change Cover Image
                                    case 'change-cover-image':
                                        bp_get_template_part('members/single/profile/change-cover-image');
                                        break;
                                        // Compose
                                    case 'public':
                                        // Display XProfile
                                        if (bp_is_active('xprofile')) : ?>
                                            <div class="profile">
                                                <?
                                                if (bp_has_profile()) :
                                                    while (bp_profile_groups()) : bp_the_profile_group();
                                                        if (bp_profile_group_has_fields()) :
                                                            do_action('bp_before_profile_field_content');
                                                ?>
                                                            <section class="bp-widget <?php bp_the_profile_group_slug(); ?>">
                                                                <h2><?php bp_the_profile_group_name(); ?></h2>

                                                                <section class="profile-fields">
                                                                    <?php while (bp_profile_fields()) : bp_the_profile_field(); ?>
                                                                        <? if (bp_field_has_data()) : ?>
                                                                            <div <?php bp_field_css_class(); ?>>
                                                                                <div class="label"><?php bp_the_profile_field_name(); ?></div>
                                                                                <div class="data"><?php bp_the_profile_field_value(); ?></div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <? do_action('bp_profile_field_item'); ?>
                                                                    <? endwhile; ?>
                                                                </section>
                                                            </section>

                                    <?php
                                                            do_action('bp_after_profile_field_content');
                                                        endif;
                                                    endwhile;
                                                    do_action('bp_profile_field_buttons');
                                                endif;
                                                do_action('bp_after_profile_loop_content');


                                            // Display WordPress profile (fallback)
                                            else :
                                                bp_get_template_part('members/single/profile/profile-wp');
                                            endif;
                                            break;
                                            // Any other
                                        default:
                                            bp_get_template_part('members/single/plugins');
                                            break;
                                    endswitch;
                                    ?>

                                            </div><!-- #item-body -->

                                            <?php do_action('bp_after_member_home_content'); ?>
                                            <!-- END HOME.PHP -->
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