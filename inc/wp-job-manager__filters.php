<?php

add_theme_support('job-manager-templates');

class SparkJobManager {
    function __construct() {
        add_filter('submit_job_form_fields', array($this, 'sparkFormFields'));
        add_filter('single_job_listing_meta_start', array($this, 'dm_display_wpjm_single_categories'));
    }
    /** Edits Front-End Job Submission Fields on /post-a-job
     * @link [View editable fields here](https://github.com/mikejolley/WP-Job-Manager/blob/master/includes/forms/class-wp-job-manager-form-submit-job.php)
     */
    function sparkFormFields($fields) {
        // Job Fields
        $fields['job']['job_description']['label'] = 'Job Description';
        // $fields['job']['application']['description'] = 'Where applicants can apply or send their resumes.';
        $fields['job']['job--salary'] = array(
            'label'       => __('Salary Range', 'job_manager'),
            'type'        => 'text',
            'required'    => true,
            'placeholder' => 'e.g. $20,000 to $50,000',
            'priority'    => 5
        );
        // Company Fields
        unset($fields['company']['company_video']);
        unset($fields['company']['company_twitter']);
        $fields['company']['company_logo']['required'] = true;
        $fields['company']['company_logo']['priority'] = 2;
        $fields['company']['company_logo']['description'] = 'File Types Allowed: .JPG, .GIF, .PNG<br> Maximum File Size: 300MB';
        $fields['company']['company_name']['label'] = 'Organization Name';
        $fields['company']['company_name']['placeholder'] = 'Enter the name of the organization';
        $fields['company']['company_website']['placeholder'] = 'https://';
        $fields['company']['company_website']['required'] = true;
        $fields['company']['company_website']['priority'] = 3;
        $fields['company']['company_tagline']['priority'] = 7;

        return $fields;
    }
    /** Display Job Categories on Single Job Posts. */
    function dm_display_wpjm_single_categories() {
        $terms = wp_get_post_terms(get_the_ID(), 'job_listing_category');
        if (!empty($terms) && !is_wp_error($terms)) {
            if (count($terms) > 1) {
                echo '<ul class="single-job-listing__meta--categories"> Job Categories: ';
            } else echo '<ul class="single-job-listing__meta--categories">Job Category: ';
            foreach ($terms as $term) {
                echo '<li>' . '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a></li>';
            }
            echo '</ul>';
        }
    }
}

$sparkJobManager = new SparkJobManager();