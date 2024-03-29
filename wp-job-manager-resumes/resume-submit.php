<?php

/**
 * Template to show when submitting a resume.
 *
 * This template can be overridden by copying it to yourtheme/wp-job-manager-resumes/resume-submit.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager-resumes
 * @category    Template
 * @version     1.18.0
 */

if (!defined('ABSPATH')) {
    exit;
}

wp_enqueue_script('wp-resume-manager-resume-submission');
?>
<form action="<?php echo $action; ?>" method="post" id="submit-resume-form" class="job-manager-form"
    enctype="multipart/form-data">
    <?php do_action('submit_resume_form_start');
    if (apply_filters('submit_resume_form_show_signin', true)) {
        get_job_manager_template('account-signin.php', ['class' => $class], 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/');
    }
    if (resume_manager_user_can_post_resume()) :
        // Resume Fields 
        $resume_fields['resume_content']['label'] = 'Resume Summary';
        $resume_fields['candidate_education']['fields']['qualification']['label'] = 'Degree or Certification Name';
        do_action('submit_resume_form_resume_fields_start');
        foreach ($resume_fields as $key => $field) : ?>
    <fieldset class="fieldset-<?php esc_attr_e($key); ?>">
        <label
            for="<?php esc_attr_e($key); ?>"><?php echo $field['label'] . apply_filters('submit_resume_form_required_label', $field['required'] ? ' <img class="requiredAsterisk" src=' . wp_get_attachment_url(12) . '>' : ' <small>' . __('(Recommended)', 'wp-job-manager-resumes') . '</small>', $field); ?></label>
        <div class="field">
            <?php $class->get_field_template($key, $field); ?>
        </div>
    </fieldset>
    <?php endforeach; ?>

    <?php do_action('submit_resume_form_resume_fields_end'); ?>
    <p>
        <input type="hidden" name="resume_manager_form" value="<?php echo $form; ?>" />
        <input type="hidden" name="resume_id" value="<?php echo esc_attr($resume_id); ?>" />
        <input type="hidden" name="job_id" value="<?php echo esc_attr($job_id); ?>" />
        <input type="hidden" name="step" value="<?php echo esc_attr($step); ?>" />
        <input type="submit" name="submit_resume" class="button" value="<?php esc_attr_e($submit_button_text); ?>" />
    </p>
    <?php
    else : do_action('submit_resume_form_disabled');
    endif;
    do_action('submit_resume_form_end'); ?>
</form>