<?php

/**
 * Job listing preview when submitting job listings.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-preview.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.32.2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<form method="post" id="job_preview" class="job-listing-preview" action="<?php echo esc_url($form->get_action()); ?>">
    <?php do_action('preview_job_form_start'); ?>
    <div class="job-listing-preview__container">
        <h1>
            <?php esc_html_e('Job Preview', 'wp-job-manager'); ?>
        </h1>
        <div class="job-listing-preview__container--button-container">
            <input type="submit" name="continue" id="job_preview_submit_button" class="button job-manager__button--submit-listing" value="<?php echo esc_attr(apply_filters('submit_job_step_preview_submit_text', __('Submit Listing', 'wp-job-manager'))); ?>" />
            <input type="submit" name="edit_job" class="button job-manager__button--edit-listing" value="<?php esc_attr_e('Edit listing', 'wp-job-mana.ger'); ?>" />
        </div>
    </div>
    <div class="job-listing-preview__single-job-listing--container">
        <div class="job-listing-preview__single-job-listing--content">
            <h2>
                <? wpjm_the_job_title() ?>
            </h2>
            <?php get_job_manager_template_part('content-single', 'job_listing'); ?>
            <input type="hidden" name="job_id" value="<?php echo esc_attr($form->get_job_id()); ?>" />
            <input type="hidden" name="step" value="<?php echo esc_attr($form->get_step()); ?>" />
            <input type="hidden" name="job_manager_form" value="<?php echo esc_attr($form->get_form_name()); ?>" />
        </div>
    </div>
    <?php do_action('preview_job_form_end'); ?>
</form>