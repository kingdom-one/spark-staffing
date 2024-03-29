<?php

/**
 * Job dashboard shortcode content.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-dashboard.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.35.0
 *
 * @since 1.34.4 Available job actions are passed in an array (`$job_actions`, keyed by job ID) and not generated in the template.
 * @since 1.35.0 Switched to new date functions.
 *
 * @var array     $job_dashboard_columns Array of the columns to show on the job dashboard page.
 * @var int       $max_num_pages         Maximum number of pages
 * @var WP_Post[] $jobs                  Array of job post results.
 * @var array     $job_actions           Array of actions available for each job.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<div id="job-manager__job-dashboard">
    <table class="job-manager__job-table">
        <thead class="job-manager__job-table--headers">
            <tr>
                <?php foreach ($job_dashboard_columns as $key => $column) : ?>
                    <th class="<?php echo esc_attr($key); ?>"><?php echo esc_html($column); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!$jobs) : ?>
                <tr>
                    <td colspan="<?php echo intval(count($job_dashboard_columns)); ?>">
                        <?php esc_html_e('You do not have any active listings.', 'wp-job-manager'); ?></td>
                </tr>
            <?php else : ?>
                <?php foreach ($jobs as $job) : ?>
                    <tr class="job-manager__job-table--row">
                        <?php foreach ($job_dashboard_columns as $key => $column) : ?>
                            <td class="job-manager__job--<?php echo esc_attr($key); ?>">
                                <?php if ('job_title' === $key) : ?>
                                    <?php if ($job->post_status == 'publish') : ?>
                                        <a href="<?php echo esc_url(get_permalink($job->ID)); ?>"><?php wpjm_the_job_title($job); ?></a>
                                    <?php else : ?>
                                        <?php wpjm_the_job_title($job); ?> <small>(<?php the_job_status($job); ?>)</small>
                                    <?php endif; ?>
                                    <?php echo is_position_featured($job) ? '<span class="featured-job-icon" title="' . esc_attr__('Featured Job', 'wp-job-manager') . '"></span>' : ''; ?>
                                    <ul class="job-manager__job-dashboard-actions">
                                        <?php
                                        if (!empty($job_actions[$job->ID])) {
                                            foreach ($job_actions[$job->ID] as $action => $value) {
                                                $action_url = add_query_arg([
                                                    'action' => $action,
                                                    'job_id' => $job->ID
                                                ]);
                                                if ($value['nonce']) {
                                                    $action_url = wp_nonce_url($action_url, $value['nonce']);
                                                }
                                                echo '<li><a href="' . esc_url($action_url) . '" class="job-manager__job-dashboard-actions--' . esc_attr($action) . '">' . esc_html($value['label']) . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                <?php elseif ('date' === $key) : ?>
                                    <?php echo esc_html(wp_date(get_option('date_format'), get_post_datetime($job)->getTimestamp())); ?>
                                <?php elseif ('expires' === $key) : ?>
                                    <?php
                                    $job_expires = WP_Job_Manager_Post_Types::instance()->get_job_expiration($job);
                                    echo esc_html($job_expires ? wp_date(get_option('date_format'), $job_expires->getTimestamp()) : '&ndash;');
                                    ?>
                                <?php elseif ('filled' === $key) : ?>
                                    <?php echo is_position_filled($job) ? '&#10004;' : '&ndash;'; ?>
                                <?php else : ?>
                                    <?php do_action('job_manager_job_dashboard_column_' . $key, $job); ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php get_job_manager_template('pagination.php', ['max_num_pages' => $max_num_pages]); ?>
</div>