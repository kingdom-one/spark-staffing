<?php

/**
 * BuddyPress - Users Cover Image Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */


/**
 * Fires before the display of a member's header.
 *
 * @since 1.2.0
 */
do_action('bp_before_member_header');
?>
<div id="cover-image-container">
    <div id="header-cover-image">
        <div id="item-header-cover-image"></div><!-- #item-header-cover-image -->
    </div>
    <div id="item-header-avatar">
        <a href="<?php bp_displayed_user_link(); ?>">
            <?php bp_displayed_user_avatar('type=full'); ?>
        </a>
    </div><!-- #item-header-avatar -->
    <div id="item-header-content">
        <h2 class="user-nicename headline">
            <?
            $memberType = bp_get_member_type(bp_displayed_user_id());
            if ($memberType != 'church') {
                bp_displayed_user_fullname();
            } else bp_member_profile_data('field=Church Name');
            if (strpos('premium', $memberType) != false) :  ?>
            <span class="premium">
                <a href="/members/type/<?php echo $memberType ?>"><i class="x-icon " data-x-icon-s=""
                        aria-hidden="true"></i></a>
            </span>
            <? endif; ?>
        </h2>
        <div id="item-meta">
            <span class="subheadline">
                <?php
                bp_member_profile_data('field=Headline');
                ?>
            </span>
            <span class="location"><em>
                    <? bp_member_profile_data('field=Location'); ?>
                </em>
            </span>
            <?php
            // do_action('bp_profile_header_meta');
            ?>
        </div><!-- #item-meta -->
        <div id=" item-buttons">
            <?php
            // do_action('bp_member_header_actions'); // Fires in the member header actions section.
            ?>
        </div> <!-- #item-buttons -->
    </div><!-- #item-header-content -->


</div><!-- #cover-image-container -->

<?php
do_action('bp_after_member_header');  //  Fires after the display of a member's header.
?>