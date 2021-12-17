<?php get_header(); ?>

<!-- <div class="x-container max width offset"> -->
<div class="x-main full <?php //x_main_content_class(); 
                        ?>" role="main">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <? global $post; ?>
        <div class="single-job-listing" id="single-job-listing">
            <div class="single-job-listing__info">
                <h1 class="single-job-listing__info--title">
                    <? wpjm_the_job_title() ?>
                </h1>
                <div class="single-job-listing__info--meta">
                    <?php if (get_option('job_manager_hide_expired_content', 1) && 'expired' === $post->post_status) : ?>
                    <div class=" job-manager-info">
                        <?php _e('This listing has expired.', 'wp-job-manager'); ?>
                    </div>
                    <?php else : ?>
                    <?php do_action('single_job_listing_start'); ?>
                </div>
            </div>
            <div class="job-description">
                <?php wpjm_the_job_description(); ?>
            </div>
            <?php
                            if (candidates_can_apply()) get_job_manager_template('job-application.php');
                            do_action('single_job_listing_end'); ?>
            <?php endif; ?>
        </div>
    </article>
    <?php endwhile; ?>
</div>
<!-- <?php //get_sidebar(); 
        ?> -->
<!-- </div> -->
<?php get_footer(); ?>