<?php

/**
 * Template for resume content inside a list of resumes.
 *
 * This template can be overridden by copying it to yourtheme/wp-job-manager-resumes/content-resume.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager-resumes
 * @category    Template
 * @version     1.18.4
 */

if (!defined('ABSPATH')) {
    exit;
}
global $post;
$category = get_the_resume_category(); ?>
<li <?php resume_class(); ?> data-longitude="<?php echo esc_attr($post->geolocation_long); ?>"
    data-latitude="<?php echo esc_attr($post->geolocation_lat); ?>">
    <a href="<?php the_resume_permalink(); ?>" class="candidate">
        <figure class="candidate__photo">
            <?php the_candidate_photo(); ?>
        </figure>
        <div class="candidate-column candidate__info">
            <h3 class="candidate__info--name"><?php the_title(); ?></h3>
            <div class="candidate-title candidate__info--title">
                <?php the_candidate_title('<strong>', '</strong> '); ?>
            </div>
        </div>
        <div class="candidate__meta">
            <div class="candidate-location-column">
                <?php the_candidate_location(false); ?>
            </div>
            <div class="resume-posted-column
		<?php if ($category) : ?>
			resume-meta<?php endif; ?>">
                <date>
                    <?php printf(__('%s ago', 'wp-job-manager-resumes'), human_time_diff(get_post_time('U'), current_time('timestamp'))); ?>
                </date>

                <?php if ($category) : ?>
                <div class="resume-category">
                    <?php echo $category; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </a>
</li>