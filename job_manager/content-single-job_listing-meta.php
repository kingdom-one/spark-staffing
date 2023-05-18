<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Single view job meta box.
 *
 * Hooked into single_job_listing_start priority 20
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing-meta.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.14.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

do_action( 'single_job_listing_meta_before' ); ?>

<ul class="single-job-listing__meta--listing meta">
<?php do_action( 'single_job_listing_meta_start' ); ?>
<li clas="date-posted"><?php the_job_publish_date(); ?></li>
<?php
if ( get_option( 'job_manager_enable_types' ) ) :
	$types = wpjm_get_the_job_types();
	if ( ! empty( $types ) ) :
		foreach ( $types as $job_type ) :
			?>
		<li class="job-job_type--<?php echo esc_attr( sanitize_title( $job_type->slug ) ); ?>"><?php echo esc_html( $type->name ); ?></li>
			<?php
	endforeach;
	endif;
	endif;
?>
<li class="location"><?php the_job_location( false ); ?></li>
<?php if ( is_position_filled() ) : ?>
<li class="position-filled"><?php _e( 'This position has been filled', 'wp-job-manager' ); ?></li>
<?php elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status ) : ?>
<li class="listing-expired"><?php _e( 'Applications have closed', 'wp-job-manager' ); ?></li>
<?php endif; ?>
<?php do_action( 'single_job_listing_meta_end' ); ?>
</ul>
<?php do_action( 'single_job_listing_meta_after' ); ?>