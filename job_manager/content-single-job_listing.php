<?php

/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
?>
<div class="single-job-listing">
    <?php if (get_option('job_manager_hide_expired_content', 1) && 'expired' === $post->post_status) : ?>
    <div class="job-manager-info">
        <?php _e('This listing has expired.', 'wp-job-manager'); ?>
    </div>
    <?php else : ?>
    <?php do_action('single_job_listing_start'); ?>
    <div class="job-description">
        <?php wpjm_the_job_description(); ?>
    </div>
    <?php
		if (candidates_can_apply()) get_job_manager_template('job-application.php');
		do_action('single_job_listing_end'); ?>
    <?php endif; ?>
</div>