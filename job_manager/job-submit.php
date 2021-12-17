<?php

/**
 * Content for job submission (`[submit_job_form]`) shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-submit.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.34.3
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $job_manager;
if (isset($resume_edit) && $resume_edit) {
    printf('<p><strong>' . esc_html__("You are editing an existing job. %s", 'wp-job-manager') . '</strong></p>', '<a href="?job_manager_form=submit-job&new=1&key=' . esc_attr($resume_edit) . '">' . esc_html__('Create A New Job', 'wp-job-manager') . '</a>');
} ?>

<form action="<?php echo esc_url($action); ?>" method="post" id="submit-job-form" class="job-manager-form"
    enctype="multipart/form-data">
    <?php
    do_action('submit_job_form_start');
    if (apply_filters('submit_job_form_show_signin', true)) {
        get_job_manager_template('account-signin.php');
    }
    if (
        job_manager_user_can_post_job() ||
        job_manager_user_can_edit_job($job_id)
    ) :
        do_action('submit_job_form_job_fields_start');
    ?>
    <h2 class="job-manager-form--headings">
        <?php esc_html_e('Job Details', 'wp-job-manager'); ?>
    </h2>
    <!-- Job Information Fields  -->
    <?php foreach ($job_fields as $key => $field) : ?>
    <fieldset class="fieldset__<?php echo esc_attr($key); ?> fieldset__type--<?php echo esc_attr($field['type']); ?>">
        <label class="fieldset--label" for="<?php echo esc_attr($key); ?>">
            <?php echo wp_kses_post($field['label']) . wp_kses_post(apply_filters('submit_job_form_required_label', $field['required'] ? ' <img class="required--icon" src=' . wp_get_attachment_url(13) . '>' : '')); ?>
        </label>
        <div class="fieldset--field <?php echo $field['required'] ? 'required-field' : ''; ?>">
            <?php get_job_manager_template('form-fields/' . $field['type'] . '-field.php', ['key' => $key, 'field' => $field]); ?>
        </div>
    </fieldset>
    <?php endforeach; ?>

    <?php do_action('submit_job_form_job_fields_end'); ?>

    <!-- Company Information Fields -->
    <?php if ($company_fields) : ?>
    <h2 class="job-manager-form--headings">
        <?php esc_html_e('Company Details', 'wp-job-manager'); ?>
    </h2>
    <?php do_action('submit_job_form_company_fields_start'); ?>
    <?php foreach ($company_fields as $key => $field) : ?>
    <fieldset class="fieldset__<?php echo esc_attr($key); ?> fieldset__type--<?php echo esc_attr($field['type']); ?>">
        <label class="fieldset--label" for="<?php echo esc_attr($key); ?>">
            <?php echo wp_kses_post($field['label']) . wp_kses_post(apply_filters('submit_job_form_required_label', $field['required'] ? '<img class="required--icon" src=' . wp_get_attachment_url(13) . '>' : ' <small>' . __('(optional)', 'wp-job-manager') . '</small>', $field)); ?>
        </label>
        <div class="field <?php echo $field['required'] ? 'required-field' : ''; ?>">
            <?php get_job_manager_template('form-fields/' . $field['type'] . '-field.php', ['key' => $key, 'field' => $field]); ?>
        </div>
    </fieldset>
    <?php endforeach;
            do_action('submit_job_form_company_fields_end');
        endif;
        do_action('submit_job_form_end'); ?>

    <p>
        <input type="hidden" name="job_manager_form" value="<?php echo esc_attr($form); ?>" />
        <input type="hidden" name="job_id" value="<?php echo esc_attr($job_id); ?>" />
        <input type="hidden" name="step" value="<?php echo esc_attr($step); ?>" />
        <input type="submit" name="submit_job" class="button" value="<?php echo esc_attr($submit_button_text); ?>" />
        <?php
            if (isset($can_continue_later) && $can_continue_later) {
                echo '<input type="submit" name="save_draft" class="button secondary save_draft" value="' . esc_attr__('Save Draft', 'wp-job-manager') . '" formnovalidate />';
            }
            ?>
        <span class="spinner"
            style="background-image: url(<?php echo esc_url(includes_url('images/spinner.gif')); ?>);"></span>
    </p>

    <?php else : ?>
    <?php do_action('submit_job_form_disabled'); ?>
    <?php endif; ?>
</form>