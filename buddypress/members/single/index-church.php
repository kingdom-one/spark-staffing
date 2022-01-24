<?php

/**
 * Index-Church Loop
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */
get_header();

?>
<div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-wrap">
                    <?php do_action('x_before_the_content_begin'); ?>
                    <div class="entry-content content">
                        <div id="buddypress" class="bp-profile bp-church-profile">
                            <?php do_action('bp_before_member_home_content');
                            ?>
                            <header id="item-header" class="bp-profile__header" role="complementary">
                                <?php
                                if (bp_displayed_user_use_cover_image_header()) {
                                    bp_get_template_part('members/single/cover-image-header');
                                } else {
                                    bp_get_template_part('members/single/member-header');
                                };
                                ?>
                            </header><!-- #item-header -->
                            <? if (is_user_logged_in()) : ?>
                                <nav class="bp-profile__subnav item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e('Member secondary navigation', 'buddypress'); ?>" role="navigation">
                                    <ul class="bp-profile__subnav--container">
                                        <?php bp_get_options_nav(); ?>
                                    </ul>
                                </nav>
                            <? endif;
                            $memberType = bp_get_member_type(bp_displayed_user_id()); ?>
                            <div id="item-body" class="bp-profile__body">
                                <? $memberType = bp_get_member_type(bp_displayed_user_id());
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
                                        if (bp_is_active('xprofile')) {
                                            if ($memberType === 'church')
                                                bp_get_template_part('members/single/profile/church-fields-loop');
                                        } else {
                                            // Display WordPress profile (fallback)
                                            bp_get_template_part('members/single/profile/profile-wp');
                                        }
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