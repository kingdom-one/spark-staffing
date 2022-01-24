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
    <div id="item-header__container">
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
                ?>
            </h2>
            <div id="item-meta">
                <span class="subheadline">
                    <?php
                    if ($memberType != 'church') {
                        bp_member_profile_data('field=Headline');
                    } else bp_member_profile_data('field=Church Tagline');
                    ?>
                </span>
                <span class="location"><em>
                        <? bp_member_profile_data('field=Location'); ?>
                    </em>
                </span>
                <?php if (bp_is_my_profile() || $memberType === 'candidate' && pmpro_hasMembershipLevel(array('3', '4'))) {
                    echo '<div class="premium-access">';
                    if (bp_get_member_profile_data('field=Open to new opportunities?') == 'Yes') {
                        echo '<span>Open to Opportunities!</span>';
                    }
                    if (bp_get_member_profile_data('field=Open to Relocating?') == 'Yes') {
                        echo '<span>Open to Relocating!</span>';
                    };
                    echo '</div>';
                } elseif ($memberType == 'church') {
                    return;
                } else {
                    accessRestricted();
                } ?>
            </div><!-- #item-meta -->
        </div><!-- #item-header-content -->
    </div>


</div><!-- #cover-image-container -->

<?php
do_action('bp_after_member_header');  //  Fires after the display of a member's header.
?>