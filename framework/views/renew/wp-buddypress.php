<?php

// =============================================================================
// VIEWS/RENEW/WP-BUDDYPRESS.PHP
// -----------------------------------------------------------------------------
// BuddyPress output for Renew.
// =============================================================================

get_header();
?>

<div class="x-container max width offset">
    <div class="<?php x_main_content_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-wrap">
                <?php do_action('x_before_the_content_begin'); ?>
                <div class="entry-content content">
                    <!-- BUDDYPRESS CALL, CHILD THEME -->
                    <?php
                        do_action('x_after_the_content_begin');
                        the_content();
                        x_link_pages();
                        do_action('x_before_the_content_end');
                        ?>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>