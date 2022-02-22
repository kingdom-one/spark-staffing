<?php

/**
 * Content for a single resume.
 *
 * This template can be overridden by copying it to yourtheme/wp-job-manager-resumes/content-single-resume.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager-resumes
 * @category    Template
 * @version     1.7.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (resume_manager_user_can_view_resume($post->ID)) : ?>
<div class="single-resume-content">
    <?php do_action('single_resume_start'); ?>
    <aside class="resume__header resume-aside">
        <div class="row row--1">
            <figure class="candidate--photo">
                <?php the_candidate_photo('full'); ?>
            </figure>
            <div class="candidate__info">
                <h2 class="candidate__info--name">
                    <? echo bp_core_get_userlink(get_the_author_meta('ID')) ?>
                </h2>
                <p class="candidate__info--job-title"><?php the_candidate_title(); ?></p>
                <div class="candidate__info--meta">
                    <p class="candidate__info--location"><?php the_candidate_location(); ?>
                    </p>
                    <span class="space"> • </span>
                    <p class="candidate__info--profile">
                        <a href="<? echo bp_core_get_userlink(get_the_author_meta('ID'), false, true) ?>">
                            View Profile
                        </a>
                    </p>
                </div>
            </div>
            <?php the_resume_links(); ?>
        </div>
        <div class="row row--2">
            <?php the_candidate_video(); ?>
        </div>
    </aside>

    <section class="resume__section resume_description resume__section--description">
        <div class="resume__description">
            <?php echo apply_filters('the_resume_description', get_the_content()); ?>
        </div>
    </section>

    <?php if (($skills = wp_get_object_terms($post->ID, 'resume_skill', ['fields' => 'names'])) && is_array($skills)) : ?>
    <section class="resume__section resume__section--skills">
        <div class="skills">
            <h2 class="resume__section--header"><?php _e('Skills', 'wp-job-manager-resumes'); ?></h2>
            <ul class="resume-manager-skills skills__container">
                <?php echo '<li class="skills--skill">' . implode('</li><li class="skills--skill">', $skills) . '</li>'; ?>
            </ul>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($items = get_post_meta($post->ID, '_candidate_education', true)) : ?>
    <section class="resume__section resume__section--education">
        <h2 class="resume__section--header"><?php _e('Education', 'wp-job-manager-resumes'); ?></h2>
        <div class="education__container">
            <dl class="resume-manager-education">
                <?php foreach ($items as $item) : ?>
                <dt class="education--date">
                    <small class=" date"><?php echo esc_html($item['date']); ?></small>
                    <h3><?php printf(__('%1$s at %2$s', 'wp-job-manager-resumes'), '<strong class="qualification">' . esc_html($item['qualification']) . '</strong>', '<strong class="location">' . esc_html($item['location']) . '</strong>'); ?>
                    </h3>
                </dt>
                <dd>
                    <?php echo wpautop(wptexturize($item['notes'])); ?>
                </dd>

                <?php
                        endforeach;
                        ?>
            </dl>
        </div>
    </section>
    <?php endif; ?>

    <?php if ($items = get_post_meta($post->ID, '_candidate_experience', true)) : ?>
    <section class="resume__section resume__section--experience">
        <h2 class="resume__section--header"><?php _e('Experience', 'wp-job-manager-resumes'); ?></h2>
        <dl class=" resume-manager-experience">
            <?php foreach ($items as $item) : ?>
            <dt>
                <small class="date"><?php echo esc_html($item['date']); ?></small>
                <h3><?php printf(__('%1$s at %2$s', 'wp-job-manager-resumes'), '<strong class="job_title">' . esc_html($item['job_title']) . '</strong>', '<strong class="employer">' . esc_html($item['employer']) . '</strong>'); ?>
                </h3>
            </dt>
            <dd>
                <?php echo wpautop(wptexturize($item['notes'])); ?>
            </dd>
            <?php endforeach; ?>
        </dl>
        <?php endif; ?>
    </section>
    <aside class="resume__meta">
        <ul class="meta">
            <?php do_action('single_resume_meta_start'); ?>

            <?php if (get_the_resume_category()) : ?>
            <li class="resume-category"><?php the_resume_category(); ?></li>
            <?php endif; ?>

            <li class="date-posted" itemprop="datePosted">
                <date>
                    <?php printf(__('Updated %s ago', 'wp-job-manager-resumes'), human_time_diff(get_the_modified_time('U'), current_time('timestamp'))); ?>
                </date>
            </li>

            <?php do_action('single_resume_meta_end'); ?>
        </ul>
    </aside>

    <?php get_job_manager_template('contact-details.php', ['post' => $post], 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/'); ?>

    <?php do_action('single_resume_end'); ?>
</div>
<?php else : get_job_manager_template_part('access-denied', 'single-resume', 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/'); ?>
<?php endif; ?>