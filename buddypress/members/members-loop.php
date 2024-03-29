<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

do_action('bp_before_members_loop');
if (bp_get_current_member_type()) : ?>
<p class="current-member-type">
    <?php bp_current_member_type_message() ?>
</p>
<?php endif; ?>
<!-- bp_ajax_querystring('members') -->
<?php if (bp_has_members()) : ?>
<div id="pag-top" class="pagination">
    <div class="pag-count" id="member-dir-count-top">
        <?php bp_members_pagination_count(); ?>
    </div>
    <div class="pagination-links" id="member-dir-pag-top">
        <?php bp_members_pagination_links(); ?>
    </div>
</div>
<?php do_action('bp_before_directory_members_list'); ?>
<ul id="members-list" class="item-list" aria-live="assertive" aria-relevant="all">
    <?php while (bp_members()) : bp_the_member(); ?>
    <li <?php bp_member_class(); ?>>
        <figure class="item-avatar">
            <a href="<?php bp_member_permalink(); ?>">
                <?php bp_member_avatar(); ?>
            </a>
        </figure>
        <div class="item">
            <div class="item-title">
                <a href="<?php bp_member_permalink(); ?>">
                    <? $memberType = bp_get_member_type(bp_displayed_user_id()); ?>
                    <? var_dump($memberType); ?>
                    <? bp_member_profile_data('field=Church Name'); ?>
                    <?php bp_member_name(); ?>

                </a>
            </div>
            <div class="item-meta">
                <span class="activity"
                    data-livestamp="<?php bp_core_iso8601_date(bp_get_member_last_active(array('relative' => false))); ?>">
                    <?php bp_member_last_active(); ?>
                </span>
                <?php echo bp_member_profile_data('field=Location'); ?>
            </div>
            <?php do_action('bp_directory_members_item');
                    /***
                     * If you want to show specific profile fields here you can,
                     * but it'll add an extra query for each member in the loop
                     * (only one regardless of the number of fields you show):
                     *
                     * bp_member_profile_data( 'field=the field name' );
                     */

                    ?>
        </div>
        <div class="action">
            <?php do_action('bp_directory_members_actions'); ?>
        </div>
        <div class="clear"></div>
    </li>
    <?php endwhile; ?>
</ul>

<?php
    do_action('bp_after_directory_members_list');
    bp_member_hidden_fields();
    ?>
<div id="pag-bottom" class="pagination">
    <div class="pag-count" id="member-dir-count-bottom">
        <?php bp_members_pagination_count(); ?>
    </div>
    <div class="pagination-links" id="member-dir-pag-bottom">
        <?php bp_members_pagination_links(); ?>
    </div>
</div>

<?php else : ?>

<div id="message" class="info">
    <p>
        <?php _e("Sorry, no members were found.", 'buddypress'); ?>
    </p>
</div>
<?php endif;
do_action('bp_after_members_loop');