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
                    <div class="entry-content content" id="bp-members-directory">
                        <?php do_action('bp_before_directory_members_page'); ?>
                        <div id=" buddypress">
                            <?php
                            do_action('bp_before_directory_members');
                            do_action('bp_before_directory_members_content');
                            bp_get_template_part('common/search/dir-search-form');
                            do_action('bp_before_directory_members_tabs'); ?>

                            <form action="" method="post" id="members-directory-form" class="dir-form">
                                <div class="item-list-tabs" aria-label="<?php esc_attr_e('Members directory main navigation', 'buddypress'); ?>" role="navigation">
                                    <ul>
                                        <li class="selected" id="members-all"><a href="<?php bp_members_directory_permalink(); ?>"><?php printf(__('All Members %s', 'buddypress'), '<span>' . bp_get_total_member_count() . '</span>'); ?></a>
                                        </li>

                                        <?php if (is_user_logged_in() && bp_is_active('friends') && bp_get_total_friend_count(bp_loggedin_user_id())) : ?>
                                            <li id="members-personal"><a href="<?php echo esc_url(bp_loggedin_user_domain() . bp_get_friends_slug() . '/my-friends/'); ?>"><?php printf(__('My Friends %s', 'buddypress'), '<span>' . bp_get_total_friend_count(bp_loggedin_user_id()) . '</span>'); ?></a>
                                            </li>
                                        <?php endif;
                                        do_action('bp_members_directory_member_types'); ?>
                                    </ul>
                                </div><!-- .item-list-tabs -->
                                <div class="item-list-tabs" id="subnav" aria-label="<?php esc_attr_e('Members directory secondary navigation', 'buddypress'); ?>" role="navigation">
                                    <ul>
                                        <?php do_action('bp_members_directory_member_sub_types'); ?>
                                        <li id="members-order-select" class="last filter">
                                            <label for="members-order-by"><?php _e('Order By:', 'buddypress'); ?></label>
                                            <select id="members-order-by">
                                                <option value="active"><?php _e('Last Active', 'buddypress'); ?></option>
                                                <option value="newest"><?php _e('Newest Registered', 'buddypress'); ?>
                                                </option>

                                                <?php if (bp_is_active('xprofile')) : ?>
                                                    <option value="alphabetical"><?php _e('Alphabetical', 'buddypress'); ?>
                                                    </option>
                                                <?php endif;
                                                do_action('bp_members_directory_order_options'); ?>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="bp-screen-reader-text">
                                    <?php
                                    /* translators: accessibility text */
                                    _e('Members directory', 'buddypress');
                                    ?>
                                </h2>
                                <div id="members-dir-list" class="members dir-list">
                                    <?php bp_get_template_part('members/members-loop'); ?>
                                </div><!-- #members-dir-list -->

                                <?php
                                do_action('bp_directory_members_content');
                                wp_nonce_field('directory_members', '_wpnonce-member-filter');
                                do_action('bp_after_directory_members_content');
                                ?>

                            </form><!-- #members-directory-form -->

                            <?php do_action('bp_after_directory_members'); ?>

                        </div><!-- #buddypress -->

                        <?php do_action('bp_after_directory_members_page'); ?>
                    </div><!-- .entry-content -->
                </div><!-- .entry-wrap -->
            </article>
        <?php endwhile; ?>
    </div><!-- .x-main-->
</div>
<? get_footer() ?>