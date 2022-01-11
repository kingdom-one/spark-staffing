<?php

/**
 * Single view Company information box
 *
 * Hooked into single_job_listing_start priority 30
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing-company.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.14.0
 * @version     1.32.0
 */

if (!defined('ABSPATH')) exit;
if (!get_the_company_name()) return;
?>
<div class="company">
    <figure class="company__logo">
        <?php the_company_logo('large'); ?>
    </figure>
    <div class="company__info">
        <span>Posted by:</span>
        <h3 class="company__info--name"><?php the_company_name('', '', true); ?></h3>
        <?
        if ($website = get_the_company_website()) : ?>
            <a class="company__info--website" href="<?php echo esc_url($website); ?>" target="_blank" rel="nofollow">
                <?php esc_html_e("Website", "wp-job-manager"); ?>
            </a>
        <?php endif; ?>
        <?php the_company_tagline('<p class="company__info--tagline">', '</p>'); ?>
    </div>
</div>