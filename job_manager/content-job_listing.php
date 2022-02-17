<?php

/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.34.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $post;
$featured = get_featured_job_ids();
?>
<li <?php job_listing_class('job_listing'); ?> data-longitude="<?php echo esc_attr($post->geolocation_long); ?>"
    data-latitude="<?php echo esc_attr($post->geolocation_lat); ?>">
    <a href="<?php the_job_permalink(); ?>" class="job_listing__container">
        <figure class="job_listing__company-logo">
            <?php the_company_logo('large'); ?>
        </figure>
        <div class="job_listing__summary">
            <? if (in_array($post->ID, $featured)) : ?>
            <span class="spark__job-feature">Featured Job</span>
            <? endif; ?>
            <h3 class="job_listing__summary--title">
                <?php wpjm_the_job_title(); ?>
            </h3>
            <div class="job_listing__summary--company">
                <?php the_company_name('<h4 class="job_listing__summary--company-name">', '</h4> '); ?>
                <?php the_company_tagline('<span class="job_listing__summary--company-tagline">', '</span>'); ?>
            </div>
        </div>
        <div class="job_listing__details">
            <div class="job_listing__details--location">
                <?php the_job_location(false); ?>
            </div>
            <ul class="job_listing__details--meta">
                <?php do_action('job_listing_meta_start'); ?>

                <?php if (get_option('job_manager_enable_types')) { ?>
                <?php $types = wpjm_get_the_job_types(); ?>
                <?php if (!empty($types)) : foreach ($types as $type) : ?>
                <li class="job-type__<?php echo esc_attr(sanitize_title($type->slug)); ?>">
                    <?php echo esc_html($type->name); ?></li>
                <?php endforeach;
                    endif; ?>
                <?php } ?>

                <li class="date"><?php the_job_publish_date(); ?></li>
        </div>
        <?php do_action('job_listing_meta_end'); ?>
        </ul>
    </a>
</li>